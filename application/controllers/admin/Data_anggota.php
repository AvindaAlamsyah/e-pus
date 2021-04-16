<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_anggota extends CI_Controller
{
    private $response = array(
        "pesan" => "",
        "status" => 0
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_user');
        if (!$this->session->userdata('status_login')) {
            //session kosong
            redirect('admin/login', 'refresh');
        } else if (!$this->session->userdata('level') == 0) {
            //akses bukan admin
            redirect("login", "refresh");
        }
    }

    public function index()
    {
        $this->load->view('admin/data_anggota');
    }

    public function tambah_anggota()
    {
        $data_user = array(
            "nisn" => $this->input->post('tambah_nisn'),
            "password" => password_hash($this->input->post('tambah_password'), PASSWORD_ARGON2I),
            "level" => $this->input->post('tambah_level'),
            "nama_lengkap" => $this->input->post('tambah_nama'),
            "kelas" => $this->input->post('tambah_kelas'),
            "jurusan" => $this->input->post('tambah_jurusan'),
            "status" => 1
        );

        if ($this->model_user->insert($data_user)) {
            $this->response['status'] = 1;
            $this->response['pesan'] = "data anggota berhasil disimpan.";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "NISN sudah ada, harap periksa lagi data yang anda masukkan.";
        }

        echo json_encode($this->response);
    }

    public function ambil_semua_anggota()
    {
        echo json_encode(array("data" => $this->model_user->select_all()));
    }

    public function tampil_edit()
    {
        echo json_encode($this->model_user->select_where(array("nisn" => $this->input->post('edit_nisn'))));
    }

    public function simpan_edit()
    {
        $data_user = array(
            "nisn" => $this->input->post('edit_nisn'),
            "level" => $this->input->post('edit_level'),
            "nama_lengkap" => $this->input->post('edit_nama'),
            "kelas" => $this->input->post('edit_kelas'),
            "jurusan" => $this->input->post('edit_jurusan'),
            "status" => $this->input->post('edit_status')
        );

        if ($this->model_user->update($data_user, array("nisn" => $data_user['nisn']))) {
            $this->response['status'] = 1;
            $this->response['pesan'] = "Data anggota berhasil disimpan.";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "NISN sudah ada, harap periksa lagi data yang anda masukkan.";
        }

        echo json_encode($this->response);
    }

    public function hapus_anggota()
    {
        $where = array(
            "nisn" => $this->input->post('hapus_nisn')
        );

        if ($this->model_user->delete($where)) {
            $this->response['status'] = 1;
            $this->response['pesan'] = "Berhasil menghapus data anggota";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Gagal menghapus data anggota";
        }


        echo json_encode($this->response);
    }

    public function test()
    {
        echo json_encode($this->model_anggota->select_all());
    }
}


/* End of file Data_anggota.php */
