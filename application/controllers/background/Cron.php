<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cron extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_peminjaman');
    
    }

    public function kembali()
    {
        if(!$this->input->is_cli_request()){
            die('Command Line Only!');
        }
        $now = date('Y-m-d H:i:s');
        $where = array(
            "tanggal_kembali" => null,
            "metode" => "online",
            "batas_tanggal_kembali <=" => $now,
        );
        $a = $this->model_peminjaman->update(array('tanggal_kembali'=>$now), $where);
        echo "$now : Selesai kembali otomatis";
    }

}

/* End of file Cron.php */
