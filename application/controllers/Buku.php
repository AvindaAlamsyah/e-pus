<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_buku');
        if (!$this->session->userdata('status_login')) {
            //session kosong
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        $data = array(
            'buku' => $this->model_buku->select_all_where(array("level_buku <= " => $this->session->userdata('level')))
        );
        $this->load->view('buku', $data);
    }

    public function detail_buku($buku)
    {
        $data = array(
            "tipe_buku" => "",
            "pdf" => "",
            "link" => ""
        );
        $data_buku = $this->model_buku->select_where(array('id_buku' => $buku));
        if ($data_buku['tipe_buku'] == 0) {
            $data['pdf'] = '<iframe src="https://docs.google.com/gview?url=https://prototype.robotindo.id/assets/' . $data_buku['nama_file'] . '&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe>';
        } else {
            $data['link'] = '<div class="col-xl-3 text-sm-right text-left order-sm-2 order-3 order-xl-3 col-sm-6 mb-4 mb-xl-0">
            <a href="' . $data_buku['link_buku'] . '" class="btn btn-primary" target="_blank">Baca buku</a>
          </div>';
        }
        $data['detail'] = $data_buku;

        $this->load->view('detail_buku', $data);
    }
}

/* End of file Buku.php */
