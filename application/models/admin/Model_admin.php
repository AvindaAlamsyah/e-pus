<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_admin extends CI_Model
{

    var $tabel = "admin";
    function get_where($where)
    {
        return $this->db->get_where($this->tabel, $where)->row_array();
    }
}

/* End of file Model_admin.php */
