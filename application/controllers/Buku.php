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
        
        if (!$this->session->userdata('status_login')) {
            //session kosong
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('/buku/index');
        $config['total_rows'] = $this->model_resource->count_buku();
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
            'buku' => $this->model_resource->select_all_join($this->session->userdata('level'), $config['per_page'], $this->uri->segment(3))
            // 'buku' => $this->model_resource->select_test($this->session->userdata('level'), $config['per_page'], $this->uri->segment(3))
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
        $this->db->select('b.*');
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
            "status" => false
        );

        date_default_timezone_set("Asia/Jakarta");

        $where = array(
            "user_nisn" => $this->session->userdata('nisn'),
            "tanggal_kembali" => null
        );

        $list_pinjam = $this->model_peminjaman->select_where($where);
        
        if ($list_pinjam->num_rows() < 5) {

            if ($this->model_peminjaman->select_where(array('tanggal_kembali' => null, 'buku_id_buku' => $this->input->post('id_buku')))->num_rows() > 0) {
                $data['data'] = "buku/detail_buku/".$this->input->post('id_buku');
                $data['status'] = true;
            } else {
                $data_peminjam = array(
                    'tanggal_pinjam' => date("Y-m-d H:i:s"),
                    'batas_tanggal_kembali' => date('Y-m-d H:i:s',strtotime('next Weeks')),
                    'metode' => 'online',
                    'buku_id_buku' => $this->input->post('id_buku'),
                    'user_nisn' => $this->session->userdata('nisn')
                );
    
                if ($this->model_peminjaman->insert($data_peminjam)) {
                    $data['data'] = "buku/detail_buku/".$this->input->post('id_buku');
                    $data['status'] = true;
                } 
            }
        } else {
            $data['data'] = $list_pinjam->result();
        }
        
        echo json_encode($data);
    }

    public function kembali()
    {
        $data = array(
            "data" => "",
            "status" => false
        );

        if ($this->model_peminjaman->update(array('tanggal_kembali'=>date("Y-m-d H:i:s")),array('id_peminjaman'=>$this->input->post('id_peminjaman')))) {
            $data['data'] = "berhasil mengembalikan buku, silahkan pinjam buku baru";
            $data['status']= true;
        } else {
            $data['data'] = "gagal mengembalikan buku";
        }

        echo json_encode($data);
    }

    public function test($level)
    {
        echo json_encode($this->model_resource->select_all_join($level));
    }
}

/* End of file Buku.php */
