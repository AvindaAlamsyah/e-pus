<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_admin extends CI_Controller
{

    private $response = array(
        "pesan" => "",
        "status" => 0
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/model_admin');
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
        $this->load->view('admin/data_admin');
    }

    public function ambil_semua_admin()
    {
        echo json_encode(array("data" => $this->model_admin->get_all(array("level" => 1))));
    }

    public function tambah_admin()
    {
        $data_admin = array(
            "username" => $this->input->post('tambah_username'),
            "password" => password_hash($this->input->post('tambah_password'), PASSWORD_ARGON2I),
            "level" => 1,
            "nama_admin" => $this->input->post('tambah_nama')
        );

        if ($this->model_admin->insert($data_admin)) {
            $this->response['status'] = 1;
            $this->response['pesan'] = "Data admin berhasil disimpan.";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Username sudah ada, harap masukkan username yang berbeda.";
        }

        echo json_encode($this->response);
    }

    public function tampil_edit()
    {
        echo json_encode($this->model_admin->get_where(array("id_admin" => $this->input->post('edit_id'))));
    }

    public function simpan_edit()
    {
        $data_admin = array(
            "username" => $this->input->post('edit_username'),
            "nama_admin" => $this->input->post('edit_nama')
        );

        $query = $this->model_admin->get_where(array("username" => $data_admin['username']));

        if ($query['id_admin'] == $this->input->post('edit_id') || $query == null) {
            if ($this->model_admin->update($data_admin, array("id_admin" => $this->input->post('edit_id')))) {
                $this->response['status'] = 1;
                $this->response['pesan'] = "Data admin berhasil disimpan.";
            } else {
                $this->response['status'] = 0;
                $this->response['pesan'] = "Gagal menyimpan data admin.";
            }
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Username sudah ada, harap masukkan username yang berbeda.";
        }

        echo json_encode($this->response);
    }

    public function hapus_admin()
    {
        $where = array(
            "id_admin" => $this->input->post('hapus_id')
        );

        if ($this->model_admin->delete($where)) {
            $this->response['status'] = 1;
            $this->response['pesan'] = "Berhasil menghapus data admin";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Gagal menghapus data admin";
        }

        echo json_encode($this->response);
    }

    public function reset_password()
    {
        $where = array(
            "id_admin" => $this->input->post('reset_id')
        );

        $query = $this->model_admin->get_where($where);

        if ($this->model_admin->update(array('password' => password_hash($query['username'], PASSWORD_ARGON2I)), $where)) {
            $this->response['status'] = 1;
            $this->response['pesan'] = "Berhasil reset password admin.";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Gagal reset password admin.";
        }

        echo json_encode($this->response);
    }
}

/* End of file Data_admin.php */