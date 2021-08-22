<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_guru extends CI_Model
{

    var $tabel = "guru";
    function get_where($where)
    {
        return $this->db->get_where($this->tabel, $where)->row_array();
    }

    function get_all($where)
    {
        return $this->db->get_where($this->tabel, $where)->result();
    }

    function insert($data)
    {
        return $this->db->insert($this->tabel, $data);
    }

    function update($data, $where)
    {
        return $this->db->update($this->tabel, $data, $where);
    }

    function delete($where)
    {
        return $this->db->delete($this->tabel, $where);
    }
}

/* End of file Model_admin.php */
