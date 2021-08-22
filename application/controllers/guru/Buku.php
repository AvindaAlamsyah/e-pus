<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('status_login')) {
            //session kosong
            redirect('admin/login', 'refresh');
        } else if ($this->session->userdata('tipe') !== 'guru') {
            //akses bukan guru
			if ($this->session->userdata('tipe') == 'adm') {

				redirect('admin/dashboard', 'refresh');
			}
			if ($this->session->userdata('tipe') == 'usr') {

				redirect("beranda", "refresh");
			}
        }
		$this->load->model('guru/model_guru_pinjam');
		$this->load->model('model_buku');
		$this->load->model('model_kategori');
		$this->load->model('model_resource');
		
	}
	

	public function index($id)
	{
		$this->model_guru_pinjam->insert(["guru_id_guru"=>$this->session->userdata('id'), "buku_id_buku"=>$id, ]);
		
		$data = $this->model_buku->select_where(['id_buku'=>$id]);
		$data_kategori = $this->model_kategori->select_where(['id_kategori'=>$data['kategori_id_kategori']]);
		$data_resource = $this->model_resource->select_all_where(array("resource_id_buku" => $data['id_buku']));
        if (count($data_resource) == 1) {
            $data['tipe_buku'] = $data_resource[0]->resource_id_tipe;
        } else if (count($data_resource) > 1) {
            $data['tipe_buku'] = 6;
        }
        
        $data['kategori'] = $data_kategori['nama_kategori'];
        $data['resource'] = $data_resource;
		
		$this->load->view('guru/detail_buku', $data, FALSE);
		
	}

}

/* End of file Buku.php */
