<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_buku extends CI_Model
{

    private $table = "buku";
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

    function select_limit()
    {
        $this->db->order_by('id_buku', 'desc');

        return $this->db->get($this->table, 3)->result();
    }

    function select_limit_where($where)
    {
        $this->db->select('buku.id_buku, buku.judul_buku, buku.level_buku, buku.cover, (SELECT buku.stok - COUNT(peminjaman.id_peminjaman) FROM peminjaman WHERE peminjaman.tanggal_kembali IS NULL and peminjaman.buku_id_buku = buku.id_buku) AS stok, GROUP_CONCAT( IF(book_type.book_type_name = "book","E-book,Fisik",book_type.book_type_name)) AS tipe_buku', false);
        $this->db->join('resource', 'buku.id_buku = resource.resource_id_buku', 'inner');
        $this->db->join('book_type', 'resource.resource_id_tipe = book_type.id_book_type', 'inner');
        $this->db->group_by('buku.id_buku');
        $this->db->order_by('id_buku', 'desc');

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

    function count($where)
    {
        return $this->db->get_where($this->table, $where);
    }
}

/* End of file Model_buku.php */