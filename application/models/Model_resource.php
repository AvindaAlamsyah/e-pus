<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_resource extends CI_Model
{

    private $table = "resource";
    function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function insert_last_id($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function insert_batch($data)
    {
        return $this->db->insert_batch($this->table, $data);
    }
    
    function select_all()
    {
        return $this->db->get($this->table)->result();
    }

    function select_limit()
    {
        $this->db->order_by('id_resource', 'desc');

        return $this->db->get($this->table, 3)->result();
    }

    function select_limit_where($where)
    {
        $this->db->order_by('id_resource', 'desc');

        return $this->db->get_where($this->table, $where, 3)->result();
    }

    function select_all_where($where)
    {
        return $this->db->get_where($this->table, $where)->result();
    }

    function update($where, $data)
    {
        return $this->db->update($this->table, $data, $where);
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

/* End of file Model_resource.php */
