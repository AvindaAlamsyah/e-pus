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
        if ($this->session->userdata('status_login') && $this->session->userdata('username') != null && $this->session->userdata('level') == 0) {
            echo "mamang";
        } else {
            $this->load->view('admin/login', $this->pesan);
        }
    }

    public function verifikasi()
    {
        $dataLogin = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        if ($dataLogin['username'] == null || $dataLogin['password'] == null) {
            $this->pesan['status'] = 1;
            $this->pesan['isi'] = "Harap isi kolom Username dan Password";
        } else {

            $dataAdmin = $this->model_admin->get_where(array("username" => $dataLogin['username']));

            if ($dataAdmin != null) {
                if (password_verify($dataLogin['password'], $dataAdmin['password'])) {
                    $this->pesan['status'] = 1;
                    $this->pesan['isi'] = "Berhasil";
                    $dataSession = array(
                        "id" => $dataAdmin['id_admin'],
                        "username" => $dataAdmin['username'],
                        "level" => $dataAdmin['level'],
                        "status_login" => true
                    );
                    $this->session->set_userdata($dataSession);
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
        echo password_hash("supersu", PASSWORD_ARGON2I);
    }
}

/* End of file Login.php */
