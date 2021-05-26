<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_peminjaman');
        if (!$this->session->userdata('status_login')) {
            //session kosong
            redirect('admin/login', 'refresh');
        } else if ($this->session->userdata('tipe') !== 'adm') {
            //akses bukan admin
            redirect("beranda", "refresh");
        }
    }
    
    public function index()
    {
        $this->load->view('admin/laporan');
        
    }

    public function ambil_semua_bulanan()
    {
        $bulan = $this->input->post('bulan');

        $select = 'user.nama_lengkap, buku.judul_buku, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali, peminjaman.metode';
        $data = $this->model_peminjaman->select_join2_where($select, $bulan)->result();
        echo json_encode(array("data" =>$data));
    }

    public function ambil_semua_peminjam()
    {
        $select = 'user.nisn, user.nama_lengkap, COUNT(*) AS total_pinjam';
        $where = 'peminjaman.tanggal_kembali IS NOT NULL';
        $data = $this->model_peminjaman->select_join3_where($select, $where)->result();

        echo json_encode(array("data" => $data));
    }

}

/* End of file Laporan.php */

?>