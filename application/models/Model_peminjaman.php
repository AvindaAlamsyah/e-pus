<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_peminjaman extends CI_Model {

    private $table = "peminjaman";

    function select_join_where($where)
    {
        $this->db->select('buku.judul_buku, peminjaman.id_peminjaman');
        $this->db->join('buku', 'buku.id_buku = peminjaman.buku_id_buku', 'inner');
        
        return $this->db->get_where($this->table, $where);
        
    }

    function select_where($where)
    {
        return $this->db->get_where($this->table, $where);
        
    }

    function select_all()
    {
        return $this->db->get($this->table);
        
    }

    function insert($data)
    {
        return $this->db->insert($this->table, $data);
        
    }

    function update($data,$where)
    {
        $this->db->where($where);
        return $this->db->update($this->table, $data);
        
    }

}

/* End of file Model_peminjaman.php */

?>