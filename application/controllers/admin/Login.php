<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/model_admin');
    }

    private $pesan = array(
        "status" => 0,
        "isi" => ""
    );

    public function index()
    {
        if ($this->session->userdata('status_login')) {

            redirect('admin/data_anggota', 'refresh');
        } else {
            $this->load->view('admin/login', $this->pesan);
        }
    }

    public function verifikasi()
    {
        $data_login = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        if ($data_login['username'] == null || $data_login['password'] == null) {
            $this->pesan['status'] = 1;
            $this->pesan['isi'] = "Harap isi kolom Username dan Password";
        } else {

            $data_admin = $this->model_admin->get_where(array("username" => $data_login['username']));

            if ($data_admin != null) {
                if (password_verify($data_login['password'], $data_admin['password'])) {
                    $this->pesan['status'] = 1;
                    $this->pesan['isi'] = "Berhasil";
                    $data_session = array(
                        "id" => $data_admin['id_admin'],
                        "username" => $data_admin['username'],
                        "nama" => $data_admin['nama_admin'],
                        "level" => $data_admin['level'],
                        "tipe" => 'adm',
                        "status_login" => true
                    );
                    $this->session->set_userdata($data_session);

                    redirect('admin/Dashboard', 'refresh');
                } else {
                    $this->pesan['status'] = 1;
                    $this->pesan['isi'] = "Password salah";
                }
            } else {
                $this->pesan['status'] = 1;
                $this->pesan['isi'] = "Username atau Password salah";
            }
        }

        $this->load->view('admin/login', $this->pesan);
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect("admin/login", "refresh");
    }

    public function test()
    {
        //echo password_hash("supersu", PASSWORD_ARGON2I);
        //echo json_encode($this->session->userdata());
    }
}

/* End of file Login.php */
