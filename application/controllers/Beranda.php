<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_buku');
        $this->load->model('model_resource');
        
        if (!$this->session->userdata('status_login')) {
            //session kosong
            redirect('login', 'refresh');
        }
    }


    public function index()
    {
        $data = array(
            "buku" => "",
            "tipe"=> ""            
        );
        $data['buku'] = $this->model_buku->select_limit_where(array('buku.level_buku <= '=>$this->session->userdata('level')));
        $data['tipe'] = $this->model_resource->count_tipe()->result();
        $this->load->view('beranda', $data);
    }
}

/* End of file Beranda.php */