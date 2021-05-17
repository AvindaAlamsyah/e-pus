<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    

    public function index()
    {
        $this->load->view('admin/laporan');
        
    }

    public function ambil_semua_bulanan()
    {
        $bulan = $this->input->post('bulan');

        $this->load->database();
        $data = $this->db->query(
            'SELECT u.nama_lengkap, b.judul_buku, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali, peminjaman.metode
             FROM `peminjaman`
             JOIN buku b ON peminjaman.buku_id_buku = b.id_buku
             JOIN user u ON peminjaman.user_nisn = u.nisn
             JOIN resource r ON b.id_buku = r.resource_id_buku
             WHERE peminjaman.tanggal_pinjam LIKE "'.$bulan.'%" AND peminjaman.tanggal_kembali IS NOT NULL
             ORDER BY peminjaman.tanggal_pinjam ASC')->result();
        
        echo json_encode(array("data" =>$data));
    }

    public function ambil_semua_peminjam()
    {
        $this->load->database();
        $data = $this->db->query(
            'SELECT user.nisn, user.nama_lengkap, COUNT(*) AS total_pinjam
            FROM peminjaman
            JOIN user ON peminjaman.user_nisn = user.nisn
            WHERE peminjaman.tanggal_kembali IS NOT NULL
            GROUP BY peminjaman.user_nisn
            ORDER BY peminjaman.tanggal_pinjam DESC'
        )->result();

        echo json_encode(array("data" => $data));
    }

}

/* End of file Laporan.php */

?>