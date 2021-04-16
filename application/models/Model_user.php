<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{

    private $table = "user";

    function select_all()
    {
        return $this->db->get($this->table)->result();
    }

    function select_where($where)
    {
        return $this->db->get_where($this->table, $where)->row();
    }

    function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function update($data, $where)
    {
        return $this->db->update($this->table, $data, $where);
    }

    function delete($where)
    {
        $this->db->delete($this->table, $where);

        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
}

/* End of file Model_user.php */
