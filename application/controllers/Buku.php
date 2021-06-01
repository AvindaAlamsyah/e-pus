<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_buku');
        $this->load->model('model_resource');
        $this->load->model('model_peminjaman');
        $this->load->model('model_user');
        
        if (!$this->session->userdata('status_login')) {
            //session kosong
            redirect('login', 'refresh');
        } else if ($this->session->userdata('tipe') !== 'usr') {
            //akses bukan user
            redirect("admin/login", "refresh");
        }
    }

    public function index()
    {
        $this->load->library('pagination');

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('search_buku');
            $this->session->set_userdata('seacrh_buku', $data['keyword']);
            
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
            if ($this->uri->segment(3) == null) {
                $data['keyword'] = null;
            }
        }        

        $this->db->like('buku.judul_buku', $data['keyword']);
        $this->db->from('buku');
        $this->db->where('deleted_at', null);
        
        $config['base_url'] = base_url('/buku/index');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 9;
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        
        $this->pagination->initialize($config);
        
        $data = array(
            'buku' => $this->model_resource->select_all_join($this->session->userdata('level'), $config['per_page'], $this->uri->segment(3), $data['keyword'])
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

    public function pinjam()
    {
        $data = array(
            "data" => "",
            "status" => 0
        );

        date_default_timezone_set("Asia/Jakarta");

        $user_nisn = $this->session->userdata('nisn');
        $id_buku = $this->input->post('id_buku');
        $peminjam = $this->model_user->select_where(array('nisn' => $user_nisn));

        $list_pinjam = $this->model_peminjaman->select_join_where(array('user_nisn' => $user_nisn, 'tanggal_kembali' => null));
        $detail_buku = $this->model_peminjaman->select_join_where(array('tanggal_kembali' => null,'user_nisn' => $user_nisn, 'buku_id_buku' => $id_buku));

        $stok_buku = $this->model_buku->select_where(array('id_buku' => $id_buku));
        $buku_dipinjam = $this->model_peminjaman->select_join_where(array('tanggal_kembali' => null, 'buku_id_buku' => $id_buku));

        if ($peminjam->ttd !== null) {
            if ($detail_buku->num_rows() <= 0) {
                if ($list_pinjam->num_rows() < 5) {
                    if (($stok_buku['stok'] - $buku_dipinjam->num_rows()) > 0) {
                        $data_peminjam = array(
                            'tanggal_pinjam' => date("Y-m-d H:i:s"),
                            'batas_tanggal_kembali' => date('Y-m-d H:i:s',strtotime('next Weeks')),
                            'metode' => 'online',
                            'buku_id_buku' => $id_buku,
                            'user_nisn' => $user_nisn
                        );
    
                        if ($this->model_peminjaman->insert($data_peminjam)) {
                            $data['data'] = base_url()."buku/detail_buku/".$id_buku;
                            $data['status'] = 1;
                        } else {
                            $data['data'] = "Kesalahan teknis pencatatan data peminjamanmu.";
                            $data['status'] = 2;
                        }
                    } else {
                        $data['data'] = "Mohon maaf, stok buku sudah habis";
                        $data['status'] = 2;
                    }
                    
                } else {
                    $data['data'] = $list_pinjam->result();
                }
                
            } else {
                $data['data'] = base_url()."buku/detail_buku/".$id_buku;
                $data['status'] = 1;
            }
        } else {
            $data['data'] = "Harap daftarkan tanda tangan anda terlebih dahulu ke perpustakaan untuk melakukan peminjaman buku.";
            $data['status'] = 2;
        }
        
        echo json_encode($data);
    }

    public function kembali()
    {
        $data = array(
            "data" => "",
            "status" => false
        );

        $id_peminjaman = $this->input->post('id_peminjaman');
        $id_buku_baru = $this->input->post('id_buku');
        
        $stok_buku = $this->model_buku->select_where(array('id_buku' => $id_buku_baru));
        $buku_dipinjam = $this->model_peminjaman->select_join_where(array('tanggal_kembali' => null, 'buku_id_buku' => $id_buku_baru));
        $user_nisn = $this->session->userdata('nisn');        

        $detail_peminjaman = $this->model_peminjaman->select_where(array('id_peminjaman' => $id_peminjaman))->row();

        if ($detail_peminjaman->metode == 'online') {
            if (($stok_buku['stok'] - $buku_dipinjam->num_rows()) > 0) {
                if ($this->model_peminjaman->update(array('tanggal_kembali'=>date("Y-m-d H:i:s")),array('id_peminjaman'=>$this->input->post('id_peminjaman')))) {
                    $data_peminjam = array(
                        'tanggal_pinjam' => date("Y-m-d H:i:s"),
                        'batas_tanggal_kembali' => date('Y-m-d H:i:s',strtotime('next Weeks')),
                        'metode' => 'online',
                        'buku_id_buku' => $id_buku_baru,
                        'user_nisn' => $user_nisn
                    );

                    if ($this->model_peminjaman->insert($data_peminjam)) {
                        $data['data'] = base_url()."buku/detail_buku/".$id_buku_baru;
                        $data['status'] = true;
                    } else {
                        $data['data'] = "Kesalahan teknis pencatatan data peminjamanmu.";
                        $data['status'] = false;
                    }
                } else {
                    $data['data'] = "gagal mengembalikan buku";
                    $data['status'] = false;
                }
            } else {
                $data['data'] = "Mohon maaf, stok buku yang akan anda baca sudah habis";
                $data['status']= false;
            }
        } else {
            $data['data'] = "Mohon maaf, untuk buku dengan peminjaman ofline harus dikembalikan langsung ke perpustakaan.";
            $data['status'] = false;
        }
        
        echo json_encode($data);
    }
}

/* End of file Buku.php */