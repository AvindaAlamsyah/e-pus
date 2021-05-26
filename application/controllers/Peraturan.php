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
            redirect("admin/login", "refresh");
        }
    }
    
    public function index()
    {
        $this->load->view('peraturan');
        
    }

}

/* End of file Peraturan.php */

?>