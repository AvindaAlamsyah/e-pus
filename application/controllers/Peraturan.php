<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Peraturan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('status_login')) {
            //session kosong
            redirect('login', 'refresh');
        } else if ($this->session->userdata('tipe') !== 'usr') {
            //akses bukan user
			if ($this->session->userdata('tipe') == 'guru') {

				redirect('guru/beranda', 'refresh');
			}
			if ($this->session->userdata('tipe') == 'adm') {

				redirect("admin/dashboard", "refresh");
			}
        }
    }
    
    public function index()
    {
        $this->load->view('peraturan');
        
    }

}

/* End of file Peraturan.php */

?>
