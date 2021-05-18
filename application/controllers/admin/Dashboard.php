<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    private $response = array(
        "status" => 0,
        "pesan" => "",
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_peminjaman');
        if (!$this->session->userdata('status_login')) {
            //session kosong
            redirect('admin/login', 'refresh');
        } else if (!$this->session->userdata('tipe') == 'adm') {
            //akses bukan admin
            redirect("login", "refresh");
        }
    }

    public function index()
    {
        $this->load->view('admin/dashboard');
    }

    public function stats_anggota() {
        $this->load->database();
        $result = $this->db->query('SELECT kelas, count(nisn) as jumlah FROM user GROUP BY kelas ORDER BY kelas ASC')->result_array();
        
        $data = array();
        for ($i=0; $i < count($result); $i++) { 
            $data['kelas'][$i] = $result[$i]['kelas'];
            $data['jumlah'][$i] = (int)$result[$i]['jumlah'];
        }

        $this->response['status'] = true;
        $this->response['pesan'] = "Ok!";
        $this->response['data'] = $data;
        $this->response['total'] = array_sum($data['jumlah']);
        echo json_encode($this->response);
    }

    
}

/* End of file Dashboard.php */
