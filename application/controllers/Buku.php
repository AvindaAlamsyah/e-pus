<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
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
            'buku' => $this->model_buku->select_all_where(array("level_buku <= " => $this->session->userdata('level')))
        );
        $this->load->view('buku', $data);
    }

    public function detail_buku($id)
    {
        $where = array(
            'peminjaman.tanggal_kembali' => null,
            'peminjaman.buku_id_buku' => $id,
            'peminjaman.user_nisn' => $this->session->userdata('nisn'),
        );
        $this->load->database();
        $this->db->select('b.*, peminjaman.metode, peminjaman.batas_tanggal_kembali');
        $this->db->join('buku b', 'peminjaman.buku_id_buku = b.id_buku');
        $data = $this->db->get_where('peminjaman', $where)->row_array();
        if (empty($data)) {
            redirect('buku');
        }

        $data_resource = $this->model_resource->select_all_where(array("resource_id_buku" => $data['id_buku']));
        if (count($data_resource) == 1) {
            $data['tipe_buku'] = $data_resource[0]->resource_id_tipe;
        } else if (count($data_resource) > 1) {
            $data['tipe_buku'] = 6;
        }
        
        $data['resource'] = $data_resource;
        $this->load->view('detail_buku', $data);
    }
}

/* End of file Buku.php */
