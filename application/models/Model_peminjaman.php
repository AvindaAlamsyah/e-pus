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

    function select_join2_where($select, $bulan)
    {
        $this->db->select($select);
        $this->db->from($this->table);
        $this->db->join('buku', 'peminjaman.buku_id_buku = buku.id_buku');
        $this->db->join('user', 'peminjaman.user_nisn = user.nisn');
        $this->db->where('peminjaman.tanggal_kembali IS NOT NULL');
        $this->db->like('peminjaman.tanggal_pinjam', $bulan, 'after');        
        
        return $this->db->get();
    }

    function select_join3_where($select, $where)
    {
        $this->db->select($select);
        $this->db->from($this->table);
        $this->db->join('user', 'peminjaman.user_nisn = user.nisn');
        $this->db->join('buku', 'peminjaman.buku_id_buku = buku.id_buku');
        $this->db->where($where);
        $this->db->group_by('peminjaman.user_nisn');
        
        return $this->db->get();
    }

    function select_join4_where($select, $where)
    {
        $this->db->select($select);
        $this->db->from($this->table);
        $this->db->join('user', 'peminjaman.user_nisn = user.nisn');
        $this->db->join('buku', 'peminjaman.buku_id_buku = buku.id_buku');
        $this->db->where($where);
        
        return $this->db->get();
    }


}

/* End of file Model_peminjaman.php */

?>