<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('status_login')) {
            //session kosong
            redirect('guru/login', 'refresh');
        } else if ($this->session->userdata('tipe') !== 'guru') {
            //akses bukan guru
			if ($this->session->userdata('tipe') == 'adm') {

				redirect('admin/dashboard', 'refresh');
			}
			if ($this->session->userdata('tipe') == 'usr') {

				redirect("beranda", "refresh");
			}
        }
	}

	public function index()
	{
		$data = array(

		);
		$this->load->view('guru/beranda', $data, FALSE);
		
	}


    public function ambil_semua2()
    {
        $this->load->database();
        $data = $this->db->query('SELECT buku.*, kategori.nama_kategori, GROUP_CONCAT(book_type.book_type_name ORDER BY resource.resource_id_tipe SEPARATOR \'&\') AS tipe_buku FROM `buku` JOIN `kategori` ON kategori.id_kategori = buku.kategori_id_kategori JOIN `resource` ON buku.id_buku = resource.resource_id_buku JOIN book_type ON resource.resource_id_tipe = book_type.id_book_type WHERE buku.deleted_at IS NULL GROUP BY buku.id_buku')->result_array();
		for ($i=0; $i < count($data); $i++) { 
			$data[$i]['no'] = $i+1;
		}
        echo json_encode(array("data" => $data));
    }

}

/* End of file Controllername.php */
