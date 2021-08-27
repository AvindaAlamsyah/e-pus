<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Embed extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
	}
	

	public function index($id)
	{
		$this->db->select('r.source, r.resource_id_tipe, b.judul_buku');
		$this->db->from('buku b');
		$this->db->join('resource r', 'b.id_buku = r.resource_id_buku', 'left');
		$this->db->where('b.id_buku', $id);
		$this->db->where('r.resource_id_tipe', 4);
		$data = $this->db->get()->row_array();

		$this->load->view('guru/embed', $data);
		
	}

}

/* End of file Controllername.php */
