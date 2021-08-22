<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kategori extends CI_Model {

    private $table = "kategori";
    function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function insert_last_id($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function select_all()
    {
        return $this->db->get($this->table)->result();
    }

    function select_where($where)
    {
        return $this->db->get_where($this->table, $where)->row_array();
    }
}

/* End of file Model_kategori.php */
