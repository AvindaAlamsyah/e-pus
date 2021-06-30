<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_buku extends CI_Controller
{
    private $response = array(
        "pesan" => "",
        "status" => 0
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_buku');
        $this->load->model('model_resource');
        $this->load->model('model_peminjaman');
        $this->load->model('model_kategori');
        if (!$this->session->userdata('status_login')) {
            //session kosong
            redirect('admin/login', 'refresh');
        } else if ($this->session->userdata('tipe') !== 'adm') {
            //akses bukan admin
            redirect("beranda", "refresh");
        }
    }

    public function index()
    {
        $context = array(
            "data_kategori" => $this->model_kategori->select_all(),
        );
        $this->load->view('admin/data_buku', $context);
    }

    public function ambil_semua()
    {
        $where = array(
            "deleted_at" => null,
        );
        echo json_encode(array("data" => $this->model_buku->select_all_where($where)));
    }

    public function ambil_semua2()
    {
        $this->load->database();
        $data = $this->db->query('SELECT buku.*, GROUP_CONCAT(book_type.book_type_name ORDER BY resource.resource_id_tipe SEPARATOR \'&\') AS tipe_buku FROM `buku` JOIN `resource` ON buku.id_buku = resource.resource_id_buku JOIN book_type ON resource.resource_id_tipe = book_type.id_book_type WHERE buku.deleted_at IS NULL GROUP BY buku.id_buku')->result_array();
        echo json_encode(array("data" => $data));
    }

    private function upload($name, $type, $msg)
    {
        $config['upload_path'] = './asset/admin/buku/';
        $config['allowed_types'] = $type;
        $config['max_size']  = '0';
        $config['file_name'] = substr(md5(uniqid()), 0, 28);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($name)) {
            $this->response['pesan'] = "Gagal upload $msg." . $this->upload->display_errors();
            $this->response['status'] = 0;
            die(json_encode($this->response));
        } else {
            $this->response['status'] = 1;
            $this->response['pesan'] = $this->response['pesan'] . ", Berhasil upload $msg";
        }
        return $this->upload->data();
    }

    public function tambah_buku()
    {
        $this->load->library('upload');
        $data_buku = array(
            "kategori_id_kategori" => $this->input->post('tambah_kategori'),
            "judul_buku" => $this->input->post('tambah_judul'),
            "penulis" => $this->input->post('tambah_penulis'),
            "penerbit" => $this->input->post('tambah_penerbit'),
            "tahun_terbit" => $this->input->post('tambah_tahun'),
            "level_buku" => $this->input->post('tambah_level'),
            "stok" => $this->input->post('tambah_stok'),

        );
        $data_upload = $this->upload('tambah_cover', 'png|jpg|jpeg', 'cover');
        $data_buku['cover'] = $data_upload['file_name'];

        //insert ke array data resource
        $data_resource = array();
        $tipe_buku = $this->input->post('tambah_tipe');
        if ($tipe_buku == 1) {
            $data_upload = $this->upload('tambah_file', 'pdf', 'file e-book');
            $data_resource[0]['resource_id_tipe'] = $tipe_buku;
            $data_resource[0]['source'] = $data_upload['file_name'];
        } else if ($tipe_buku == 2) {
            $data_resource[0]['resource_id_tipe'] = $tipe_buku;
            $data_resource[0]['source'] = $this->input->post('tambah_link');
            $this->response['status'] = 1;
            $this->response['pesan'] = $this->response['pesan'] . ", Berhasil menyimpan link";
        } else if ($tipe_buku == 3) {
            $data_upload = $this->upload('tambah_file', 'mp3', 'file audio');
            $data_resource[0]['resource_id_tipe'] = $tipe_buku;
            $data_resource[0]['source'] = $data_upload['file_name'];
        } else if ($tipe_buku == 4) {
            $data_upload = $this->upload('tambah_file', 'mp4', 'file video');
            $data_resource[0]['resource_id_tipe'] = $tipe_buku;
            $data_resource[0]['source'] = $data_upload['file_name'];
        } else if ($tipe_buku == 5) {
            $data_upload = $this->upload('tambah_file', 'pdf', 'file buku');
            $data_resource[0]['resource_id_tipe'] = $tipe_buku;
            $data_resource[0]['source'] = $data_upload['file_name'];
        } else if ($tipe_buku == 6) {
            $data_upload = $this->upload('tambah_file', 'pdf', 'file e-book');
            $data_resource[0]['resource_id_tipe'] = 1;
            $data_resource[0]['source'] = $data_upload['file_name'];
            $data_upload2 = $this->upload('tambah_file_2', 'mp3', 'file audio');
            $data_resource[1]['resource_id_tipe'] = 3;
            $data_resource[1]['source'] = $data_upload2['file_name'];
        }

        $id_buku = $this->model_buku->insert_last_id($data_buku);
        if ($id_buku > 0) {
            for ($i = 0; $i < count($data_resource); $i++) {
                $data_resource[$i]['resource_id_buku'] = $id_buku;
            }
            if ($this->model_resource->insert_batch($data_resource)) {
                $this->response['status'] = 1;
                $this->response['pesan'] = $this->response['pesan'] . ", Berhasil menyimpan data";
            } else {
                $this->response['status'] = 0;
                $this->response['pesan'] = "Gagal menyimpan data";
            }
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Gagal menyimpan data";
        }
        echo json_encode($this->response);
    }

    public function tampil_edit()
    {
        $data_buku = $this->model_buku->select_where(array("id_buku" => $this->input->post('edit_id')));
        $data_resource = $this->model_resource->select_all_where(array("resource_id_buku" => $data_buku['id_buku']));

        if (count($data_resource) > 1) {
            $data_buku['tipe'] = 6;
            $data_buku['resource'] = $data_resource;
            echo json_encode($data_buku);
            return;
        }
        $data_buku['tipe'] = $data_resource[0]->resource_id_tipe;
        $data_buku['resource'] = $data_resource;
        echo json_encode($data_buku);
    }

    public function simpan_edit()
    {
        $id_buku = $this->input->post('edit_id');
        $db_buku = $this->model_buku->select_where(array("id_buku" => $id_buku));
        $db_resource = $this->model_resource->select_all_where(array("resource_id_buku" => $id_buku));
        $db_tipe = 0;
        if (count($db_resource) > 1) {
            $db_tipe = 6;
        } else {
            $db_tipe = $db_resource[0]->resource_id_tipe;
        }

        $this->load->library('upload');
        $data_buku = array(
            "kategori_id_kategori" => $this->input->post('edit_kategori'),
            "judul_buku" => $this->input->post('edit_judul'),
            "penulis" => $this->input->post('edit_penulis'),
            "penerbit" => $this->input->post('edit_penerbit'),
            "tahun_terbit" => $this->input->post('edit_tahun'),
            "level_buku" => $this->input->post('edit_level'),
            "stok" => $this->input->post('edit_stok'),

        );
        if (!(empty($_FILES['edit_cover']['tmp_name']) || !is_uploaded_file($_FILES['edit_cover']['tmp_name']))) {
            $data_upload = $this->upload('edit_cover', 'png|jpg|jpeg', 'cover');
            $data_buku['cover'] = $data_upload['file_name'];
            $this->delete_file($db_buku['cover']);
        }

        $data_resource = array();
        $tipe_buku = $this->input->post('edit_tipe');
        if ($tipe_buku == 1) {
            if (!(empty($_FILES['edit_file']['tmp_name']) || !is_uploaded_file($_FILES['edit_file']['tmp_name']))) {
                $data_upload = $this->upload('edit_file', 'pdf', 'file e-book');
                $data_resource[0]['resource_id_tipe'] = $tipe_buku;
                $data_resource[0]['source'] = $data_upload['file_name'];
                foreach ($db_resource as $key => $value) {
                    if ($value->resource_id_tipe != 2) {
                        $this->delete_file($value->source);
                    }
                    $this->model_resource->delete(array("id_resource" => $value->id_resource));
                }
            }
        } else if ($tipe_buku == 2) {
            $data_resource[0]['resource_id_tipe'] = $tipe_buku;
            $data_resource[0]['source'] = $this->input->post('edit_link');
            $this->response['status'] = 1;
            $this->response['pesan'] = $this->response['pesan'] . ", Berhasil menyimpan link";
            foreach ($db_resource as $key => $value) {
                if ($value->resource_id_tipe != 2) {
                    $this->delete_file($value->source);
                }
                $this->model_resource->delete(array("id_resource" => $value->id_resource));
            }
        } else if ($tipe_buku == 3) {
            if (!(empty($_FILES['edit_file']['tmp_name']) || !is_uploaded_file($_FILES['edit_file']['tmp_name']))) {
                $data_upload = $this->upload('edit_file', 'mp3', 'file audio');
                $data_resource[0]['resource_id_tipe'] = $tipe_buku;
                $data_resource[0]['source'] = $data_upload['file_name'];
                foreach ($db_resource as $key => $value) {
                    if ($value->resource_id_tipe != 2) {
                        $this->delete_file($value->source);
                    }
                    $this->model_resource->delete(array("id_resource" => $value->id_resource));
                }
            }
        } else if ($tipe_buku == 4) {
            if (!(empty($_FILES['edit_file']['tmp_name']) || !is_uploaded_file($_FILES['edit_file']['tmp_name']))) {
                $data_upload = $this->upload('edit_file', 'mp4', 'file video');
                $data_resource[0]['resource_id_tipe'] = $tipe_buku;
                $data_resource[0]['source'] = $data_upload['file_name'];
                foreach ($db_resource as $key => $value) {
                    if ($value->resource_id_tipe != 2) {
                        $this->delete_file($value->source);
                    }
                    $this->model_resource->delete(array("id_resource" => $value->id_resource));
                }
            }
        } else if ($tipe_buku == 5) {
            if (!(empty($_FILES['edit_file']['tmp_name']) || !is_uploaded_file($_FILES['edit_file']['tmp_name']))) {
                $data_upload = $this->upload('edit_file', 'pdf', 'file buku');
                $data_resource[0]['resource_id_tipe'] = $tipe_buku;
                $data_resource[0]['source'] = $data_upload['file_name'];
                foreach ($db_resource as $key => $value) {
                    if ($value->resource_id_tipe != 2) {
                        $this->delete_file($value->source);
                    }
                    $this->model_resource->delete(array("id_resource" => $value->id_resource));
                }
            }
        } else if ($tipe_buku == 6) {
            if ($db_tipe == 6) {
                if (!(empty($_FILES['edit_file']['tmp_name']) || !is_uploaded_file($_FILES['edit_file']['tmp_name']))) {
                    $data_upload = $this->upload('edit_file', 'pdf', 'file e-book');
                    $data_resource[0]['resource_id_tipe'] = 1;
                    $data_resource[0]['source'] = $data_upload['file_name'];
                    foreach ($db_resource as $key => $value) {
                        if ($value->resource_id_tipe != 2) {
                            $this->delete_file($value->source);
                        }
                        $this->model_resource->delete(array("id_resource" => $value->id_resource));
                    }
                }
                if (!(empty($_FILES['edit_file_2']['tmp_name']) || !is_uploaded_file($_FILES['edit_file_2']['tmp_name']))) {
                    $data_upload2 = $this->upload('edit_file_2', 'mp3', 'file audio');
                    $data_resource[1]['resource_id_tipe'] = 3;
                    $data_resource[1]['source'] = $data_upload2['file_name'];
                    foreach ($db_resource as $key => $value) {
                        if ($value->resource_id_tipe == 3) {
                            if ($value->resource_id_tipe != 2) {
                                $this->delete_file($value->source);
                            }
                            $this->model_resource->delete(array("id_resource" => $value->id_resource));
                        }
                    }
                }
            } else {
                $data_upload = $this->upload('edit_file', 'pdf', 'file e-book');
                $data_resource[0]['resource_id_tipe'] = 1;
                $data_resource[0]['source'] = $data_upload['file_name'];
                $data_upload2 = $this->upload('edit_file_2', 'mp3', 'file audio');
                $data_resource[1]['resource_id_tipe'] = 3;
                $data_resource[1]['source'] = $data_upload2['file_name'];
                foreach ($db_resource as $key => $value) {
                    if ($value->resource_id_tipe != 2) {
                        $this->delete_file($value->source);
                    }
                    $this->model_resource->delete(array("id_resource" => $value->id_resource));
                }
            }
        }

        if ($this->model_buku->update(array("id_buku" => $id_buku), $data_buku)) {
            $this->response['status'] = 1;
            $this->response['pesan'] = $this->response['pesan'] . ", Berhasil memperbarui data buku";
            if (!empty($data_resource)) {
                for ($i = 0; $i < count($data_resource); $i++) {
                    $data_resource[$i]['resource_id_buku'] = $id_buku;
                }
                if ($this->model_resource->insert_batch($data_resource)) {
                    $this->response['status'] = 1;
                    $this->response['pesan'] = $this->response['pesan'] . ", Berhasil memperbarui data resource";
                } else {
                    $this->response['status'] = 0;
                    $this->response['pesan'] = "Gagal memperbarui data resource";
                }
            }
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Gagal memperbarui data buku";
        }

        echo json_encode($this->response);
    }

    public function hapus_buku()
    {
        $id = $this->input->post('hapus_id');
        $where = array(
            "resource_id_buku" => $id,
        );

        if (!$this->model_peminjaman->select_where(['buku_id_buku'=>$id])->num_rows()) {
            $resource = $this->model_resource->select_all_where($where);
            foreach ($resource as $key => $value) {
                $this->delete_file($value->source);
            }
            if ($this->model_buku->delete(["id_buku" => $id])) {
                $this->response['status'] = 1;
                $this->response['pesan'] = "Berhasil menghapus data buku";
            } else {
                $this->response['status'] = 0;
                $this->response['pesan'] = "Gagal menghapus data buku";
            }
            echo json_encode($this->response);
            return;
        }

        $data = array(
            'deleted_at' => date('Y-m-d H:i:s'),
        );

        if ($this->model_buku->update($where, $data)) {
            $this->response['status'] = 1;
            $this->response['pesan'] = "Berhasil menghapus data buku";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Gagal menghapus data buku";
        }


        echo json_encode($this->response);
    }

    private function delete_file($file)
    {
        $path = "./asset/admin/buku/$file";
        @chmod($path, 0777);
        if (is_file($path)) {
            @unlink($path);
        }
    }
}

/* End of file Data_buku.php */