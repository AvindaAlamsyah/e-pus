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

    public function info_peminjaman()
    {
        $this->load->database();
        $sql = 'SELECT b.id_buku, b.judul_buku, b.penulis, b.penerbit, b.tahun_terbit, IF(a.pinjam IS NULL, 0, a.pinjam) as dipinjam, IF(a.sedia IS NULL, b.stok, a.sedia) as tersedia, b.stok as total FROM (SELECT buku.id_buku, COUNT(buku.id_buku) as pinjam, buku.stok-COUNT(buku.id_buku) as sedia FROM buku RIGHT JOIN peminjaman ON buku.id_buku = peminjaman.buku_id_buku WHERE peminjaman.tanggal_kembali IS NULL GROUP BY buku.id_buku) a RIGHT JOIN (SELECT buku.* FROM buku) b ON a.id_buku = b.id_buku';
        $data = $this->db->query($sql)->result_array();
        echo json_encode(array("data" => $data));
    }
}

/* End of file Laporan.php */

?>