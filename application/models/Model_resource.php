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

    function select_all_join($level, $limit, $offset, $like = null)
    {
        $this->db->select('buku.id_buku, buku.judul_buku, buku.level_buku, buku.cover, GROUP_CONCAT( IF(book_type.book_type_name = "book","E-book,Fisik",book_type.book_type_name)) AS tipe_buku', false);
        $this->db->join('resource', 'buku.id_buku = resource.resource_id_buku', 'inner');
        $this->db->join('book_type', 'resource.resource_id_tipe = book_type.id_book_type', 'inner');
        $this->db->where('buku.level_buku <=', $level);
        if($like){
            $this->db->like('buku.judul_buku', $like);
        }
        $this->db->group_by('buku.id_buku');
        
        return $this->db->get('buku',$limit,$offset)->result();
    }

    function count_tipe()
    {
        $this->db->select('book_type.book_type_name, COUNT(resource.id_resource) AS total');
        $this->db->from($this->table);
        $this->db->join('book_type', 'resource.resource_id_tipe = book_type.id_book_type');
        $this->db->group_by('book_type.id_book_type');
        
        return $this->db->get();
        
    }
}

/* End of file Model_resource.php */