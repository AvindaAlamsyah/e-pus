<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_user');
    }

    private $pesan = array(
        "status" => 0,
        "isi" => ""
    );

    public function index()
    {
        if ($this->session->userdata('status_login') && $this->session->userdata('tipe') == 'usr') {
            //session ada
            redirect('beranda', 'refresh');
        } else if ($this->session->userdata('status_login')) {
            //akses bukan user
            //akses bukan admin
			if ($this->session->userdata('tipe') == 'guru') {

				redirect('guru/beranda', 'refresh');
			}
			if ($this->session->userdata('tipe') == 'adm') {

				redirect("admin/dashboard", "refresh");
			}
        } else {
            $this->load->view('login', $this->pesan);
        }        
    }

    public function verifikasi()
    {
        $data_login = array(
            'nisn' => $this->input->post('nisn'),
            'password' => $this->input->post('password')
        );

        if ($data_login['nisn'] == null || $data_login['password'] == null) {
            $this->pesan['status'] = 1;
            $this->pesan['isi'] = "Harap isi kolom NISN dan Password";
        } else {
            $data_user = $this->model_user->select_where(array("nisn" =>  $data_login['nisn']));

            if ($data_user != null) {
                if (password_verify($data_login['password'], $data_user->password)) {
                    $this->pesan['status'] = 1;
                    $this->pesan['isi'] = "Berhasil";
                    $data_session = array(
                        "nisn" => $data_user->nisn,
                        "nama" => $data_user->nama_lengkap,
                        "level" => $data_user->level,
                        "tipe" => "usr",
                        "status_login" => true
                    );
                    $this->session->set_userdata($data_session);

                    redirect('beranda', 'refresh');
                } else {
                    $this->pesan['status'] = 1;
                    $this->pesan['isi'] = "Password salah";
                }
            } else {
                $this->pesan['status'] = 1;
                $this->pesan['isi'] = "NISN atau Password salah";
            }
        }

        $this->load->view('login', $this->pesan);
    }

    public function logout()
    {

        $this->session->sess_destroy();

        redirect('login', 'refresh');
    }
}

/* End of file Login.php */
