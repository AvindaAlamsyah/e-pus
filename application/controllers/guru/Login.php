<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('guru/model_guru');
		
	}
	
	private $pesan = array(
        "status" => 0,
        "isi" => ""
    );

    public function index()
    {
        if ($this->session->userdata('status_login') && $this->session->userdata('tipe') == 'guru') {
            //session ada
            redirect('guru/dashboard', 'refresh');
        } else if ($this->session->userdata('status_login')) {
            //akses bukan guru
			if ($this->session->userdata('tipe') == 'adm') {

				redirect('admin/dasboard', 'refresh');
			}
			if ($this->session->userdata('tipe') == 'usr') {

				redirect("beranda", "refresh");
			}
        } else{
            $this->load->view('guru/login', $this->pesan);
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

            $data_guru = $this->model_guru->get_where(array("username" => $data_login['username']));

            if ($data_guru != null) {
                if (password_verify($data_login['password'], $data_guru['password'])) {
                    $this->pesan['status'] = 1;
                    $this->pesan['isi'] = "Berhasil";
                    $data_session = array(
                        "id" => $data_guru['id_guru'],
                        "username" => $data_guru['username'],
                        "nama" => $data_guru['nama_guru'],
                        "tipe" => 'guru',
                        "status_login" => true
                    );
                    $this->session->set_userdata($data_session);

                    redirect('guru/beranda', 'refresh');
                } else {
                    $this->pesan['status'] = 1;
                    $this->pesan['isi'] = "Password salah";
                }
            } else {
                $this->pesan['status'] = 1;
                $this->pesan['isi'] = "Username atau Password salah";
            }
        }

        $this->load->view('guru/login', $this->pesan);
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect("guru/login", "refresh");
    }

}

/* End of file Login.php */
