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
        if (!$this->session->userdata('status_login')) {
            //session kosong
            redirect('admin/login', 'refresh');
        } else if (!$this->session->userdata('level') == 0) {
            //akses bukan admin
            redirect("welcome", "refresh");
        }
    }

    public function index()
    {
        $this->load->view('admin/data_buku');
    }

    public function ambil_semua()
    {
        echo json_encode(array("data" => $this->model_buku->select_all()));
    }


    private function upload($name, $type, $msg)
    {
        $config['upload_path'] = './asset/admin/buku/';
        $config['allowed_types'] = $type;
        $config['max_size']  = '0';
        $config['file_name'] = substr(md5(time()), 0, 28);
        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload($name)) {
            $this->response['pesan'] = "Gagal upload $msg.".$this->upload->display_errors();
            $this->response['status'] = 0;
            die(json_encode($this->response));
        } else {
            $data_buku['cover'] = $config['file_name'] . $this->upload->data('file_ext');
            $this->response['status'] = 1;
            $this->response['pesan'] = $this->response['pesan'].", Berhasil menyimpan $msg";
        }
        return $this->upload->data();
    }

    public function tambah_buku()
    {
        $this->load->library('upload');
        $data_buku = array(
            "judul_buku" => $this->input->post('tambah_judul'),
            "penulis" => $this->input->post('tambah_penulis'),
            "penerbit" => $this->input->post('tambah_penerbit'),
            "tahun_terbit" => $this->input->post('tambah_tahun'),
            "level_buku" => $this->input->post('tambah_level'),
            "stok" => $this->input->post('tambah_stok'),
            
        );
        $data_upload= $this->upload('tambah_cover', 'png|jpg|jpeg', 'cover');
        $data_buku['cover'] = $data_upload['file_name'];
        
        //insert ke array data resource
        $data_resource = array();
        $tipe_buku = $this->input->post('tambah_tipe');
        if ($tipe_buku == 1) {
            $data_upload = $this->upload('tambah_file','pdf', 'file e-book');
            $data_resource[0]['resource_id_tipe'] = $tipe_buku;
            $data_resource[0]['source'] = $data_upload['file_name'];
        } else if ($tipe_buku == 2) {
            $data_resource[0]['resource_id_tipe'] = $tipe_buku;
            $data_resource[0]['source'] = $this->input->post('tambah_link');
            $this->response['status'] = 1;
            $this->response['pesan'] = $this->response['pesan'].", Berhasil menyimpan link";
        } else if ($tipe_buku == 3) {
            $data_upload = $this->upload('tambah_file','mp3', 'file audio');
            $data_resource[0]['resource_id_tipe'] = $tipe_buku;
            $data_resource[0]['source'] = $data_upload['file_name'];
        } else if ($tipe_buku == 4) {
            $data_upload = $this->upload('tambah_file','mp4', 'file video');
            $data_resource[0]['resource_id_tipe'] = $tipe_buku;
            $data_resource[0]['source'] = $data_upload['file_name'];
        } else if ($tipe_buku == 5) {
            $data_upload = $this->upload('tambah_file','pdf', 'file buku');
            $data_resource[0]['resource_id_tipe'] = $tipe_buku;
            $data_resource[0]['source'] = $data_upload['file_name'];
        } else if ($tipe_buku == 6) {
            $data_upload = $this->upload('tambah_file','pdf', 'file e-book');
            $data_resource[0]['resource_id_tipe'] = 1;
            $data_resource[0]['source'] = $data_upload['file_name'];
            $data_upload2 = $this->upload('tambah_file_2','mp3', 'file audio');
            $data_resource[1]['resource_id_tipe'] = 3;
            $data_resource[1]['source'] = $data_upload2['file_name'];
        }

        $id_buku = $this->model_buku->insert_last_id($data_buku);
        if ($id_buku > 0) {
            for ($i = 0; $i <count($data_resource); $i++) {
                $data_resource[$i]['resource_id_buku'] = $id_buku;
            }
            if ($this->model_resource->insert_batch($data_resource)){
                $this->response['status'] = 1;
                $this->response['pesan'] = $this->response['pesan'].", Berhasil menyimpan data";
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
        echo json_encode($this->model_buku->select_where(array("id_buku" => $this->input->post('edit_id'))));
    }

    public function simpan_edit()
    {
        $data_buku = array(
            "judul_buku" => $this->input->post('edit_judul'),
            "penerbit" => $this->input->post('edit_penerbit'),
            "penulis" => $this->input->post('edit_penulis'),
            "tahun_terbit" => $this->input->post('edit_tahun'),
            "level_buku" => $this->input->post('edit_level')
        );

        if ($this->model_buku->update(array("id_buku" => $this->input->post('edit_id')), $data_buku)) {
            $this->response['status'] = 1;
            $this->response['pesan'] = "Berhasil menyimpan perubahan data buku";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Gagal menyimpan perubahan data buku";
        }

        echo json_encode($this->response);
    }

    public function hapus_buku()
    {
        $where = array(
            "id_buku" => $this->input->post('hapus_id')
        );

        $data_buku = $this->model_buku->select_where($where);

        if ($this->model_buku->delete($where)) {
            $path = './asset/admin/buku/' . $data_buku['nama_file'];
            chmod($path, 0777);
            unlink($path);
            $this->response['status'] = 1;
            $this->response['pesan'] = "Berhasil menghapus data buku";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Gagal menghapus data buku";
        }


        echo json_encode($this->response);
    }

    public function test()
    {
        $path = './asset/buku/cv-dts.pdf';
        chmod($path, 0777);

        if (unlink($path)) {
            echo "berhasil";
        } else {
            echo "gagal";
        }
    }
}

/* End of file Data_buku.php */