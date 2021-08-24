<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_guru extends CI_Controller
{
    private $response = array(
        "pesan" => "",
        "status" => 0
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('guru/model_guru');
        if (!$this->session->userdata('status_login')) {
            //session kosong
            redirect('admin/login', 'refresh');
        } else if ($this->session->userdata('tipe') !== 'adm') {
            //akses bukan admin
            if ($this->session->userdata('tipe') == 'guru') {

                redirect('guru/beranda', 'refresh');
            }
            if ($this->session->userdata('tipe') == 'usr') {

                redirect("beranda", "refresh");
            }
        }
    }

    public function index()
    {
        $this->load->view('admin/data_guru');
    }

    public function ambil_semua_guru()
    {
        echo json_encode(array("data" => $this->model_guru->get_all(array("status" => 1))));
    }

    public function tambah_guru()
    {
        $data_guru = array(
            "username" => $this->input->post('tambah_username'),
            "password" => password_hash($this->input->post('tambah_password'), PASSWORD_ARGON2I),
            "status" => 1,
            "nama_guru" => $this->input->post('tambah_nama')
        );

        if ($this->model_guru->insert($data_guru)) {
            $this->response['status'] = 1;
            $this->response['pesan'] = "Data guru berhasil disimpan.";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Username sudah ada, harap masukkan username yang berbeda.";
        }

        echo json_encode($this->response);
    }

    public function tampil_edit()
    {
        echo json_encode($this->model_guru->get_where(array("id_guru" => $this->input->post('edit_id'))));
    }

    public function simpan_edit()
    {
        $data_guru = array(
            "username" => $this->input->post('edit_username'),
            "nama_guru" => $this->input->post('edit_nama')
        );

        $query = $this->model_guru->get_where(array("username" => $data_guru['username']));

        if ($query['id_guru'] == $this->input->post('edit_id') || $query == null) {
            if ($this->model_guru->update($data_guru, array("id_guru" => $this->input->post('edit_id')))) {
                $this->response['status'] = 1;
                $this->response['pesan'] = "Data guru berhasil disimpan.";
            } else {
                $this->response['status'] = 0;
                $this->response['pesan'] = "Gagal menyimpan data guru.";
            }
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Username sudah ada, harap masukkan username yang berbeda.";
        }

        echo json_encode($this->response);
    }

    public function hapus_guru()
    {
        $where = array(
            "id_guru" => $this->input->post('hapus_id')
        );

        if ($this->model_guru->delete($where)) {
            $this->response['status'] = 1;
            $this->response['pesan'] = "Berhasil menghapus data guru";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Gagal menghapus data guru";
        }

        echo json_encode($this->response);
    }

    public function reset_password()
    {
        $where = array(
            "id_guru" => $this->input->post('reset_id')
        );

        $query = $this->model_guru->get_where($where);

        if ($this->model_guru->update(array('password' => password_hash($query['username'], PASSWORD_ARGON2I)), $where)) {
            $this->response['status'] = 1;
            $this->response['pesan'] = "Berhasil reset password guru.";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Gagal reset password guru.";
        }

        echo json_encode($this->response);
    }
}

/* End of file Data_guru.php */
