<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->load->view('login');
    }

    public function verifikasi()
    {
        $dataLogin = array(
            'nim' => $this->input->post('inputNisn'),
            'password' => $this->input->post('password')
        );
    }
}

/* End of file Login.php */
