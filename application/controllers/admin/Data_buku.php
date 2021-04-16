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

    public function tambah_buku()
    {

        $config['upload_path'] = './asset/buku/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']  = '0';
        $config['file_name'] = substr(md5(time()), 0, 28);

        $this->load->library('upload', $config);

        $data_buku = array(
            "judul_buku" => $this->input->post('tambah_judul'),
            "penulis" => $this->input->post('tambah_penulis'),
            "penerbit" => $this->input->post('tambah_penerbit'),
            "tahun_terbit" => $this->input->post('tambah_tahun'),
            "level_buku" => $this->input->post('tambah_level'),
            "nama_file" => ""

        );

        if (!$this->upload->do_upload("tambah_file")) {
            $this->response['pesan'] = $this->upload->display_errors();
            $this->response['status'] = 0;
        } else {
            $data = array('upload_data' => $this->upload->data());
            $data_buku['nama_file'] = $config['file_name'] . ".pdf";

            if ($this->model_buku->insert($data_buku)) {
                $this->response['status'] = 1;
                $this->response['pesan'] = "Berhasil menyimpan data buku";
            } else {
                $this->response['status'] = 0;
                $this->response['pesan'] = "Gagal menyimpan data buku";
            }
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
