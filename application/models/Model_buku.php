<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_buku extends CI_Model
{

    private $table = "buku";
    function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function select_all()
    {
        return $this->db->get($this->table)->result();
    }

    function delete($where)
    {
        $this->db->delete($this->table, $where);

        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function select_where($where)
    {
        return $this->db->get_where($this->table, $where)->row_array();
    }
}

/* End of file Model_buku.php */
