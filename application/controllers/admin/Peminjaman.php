<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{

    private $response = array(
        "pesan" => "",
        "status" => 0
    );

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
        $this->load->view('admin/peminjaman');
    }

    public function ambil_semua()
    {
        $this->load->database();
        $data = $this->db->query('SELECT peminjaman.id_peminjaman, u.nama_lengkap, u.kelas, b.judul_buku, peminjaman.tanggal_pinjam, peminjaman.batas_tanggal_kembali, peminjaman.metode, IF(batas_tanggal_kembali < NOW(), CONCAT("telat ",DATEDIFF(NOW(), batas_tanggal_kembali)," hari"), "tidak") as telat FROM `peminjaman` JOIN buku b ON peminjaman.buku_id_buku = b.id_buku JOIN user u ON peminjaman.user_nisn = u.nisn JOIN resource r ON b.id_buku = r.resource_id_buku WHERE r.resource_id_tipe = 5 AND peminjaman.tanggal_kembali IS NULL')->result();
        
        echo json_encode(array("data" =>$data));
    }

    public function pinjam(){
        $id = $this->input->post('id_peminjaman');
        $data = array(
            'metode' => 'offline',
        );
        if ($this->model_peminjaman->update($data,["id_peminjaman"=>$id])) {
            $this->response['status'] = 1;
            $this->response['pesan'] = "Berhasil pinjam offline";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Gagal pinjam offline";
        }

        echo json_encode($this->response);
    }

    public function kembali(){
        $id = $this->input->post('id_peminjaman');
        $data = array(
            'tanggal_kembali' => date('Y-m-d H:i:s'),
        );
        if ($this->model_peminjaman->update($data,["id_peminjaman"=>$id])) {
            $this->response['status'] = 1;
            $this->response['pesan'] = "Berhasil mengembalikan buku";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Gagal mengembalikan buku";
        }

        echo json_encode($this->response);
    }
}

/* End of file Peminjaman.php */