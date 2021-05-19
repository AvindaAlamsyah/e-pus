<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    private $response = array(
        "status" => 0,
        "pesan" => "",
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_peminjaman');
        if (!$this->session->userdata('status_login')) {
            //session kosong
            redirect('admin/login', 'refresh');
        } else if (!$this->session->userdata('tipe') == 'adm') {
            //akses bukan admin
            redirect("login", "refresh");
        }
    }

    public function index()
    {
        $this->load->view('admin/dashboard');
    }

    public function stats_anggota() {
        $this->load->database();
        $result = $this->db->query('SELECT kelas, count(nisn) as jumlah FROM user GROUP BY kelas ORDER BY kelas ASC')->result_array();
        
        $data = array();
        for ($i=0; $i < count($result); $i++) { 
            $data['kelas'][$i] = $result[$i]['kelas'];
            $data['jumlah'][$i] = (int)$result[$i]['jumlah'];
        }

        $this->response['status'] = true;
        $this->response['pesan'] = "Ok!";
        $this->response['data'] = $data;
        $this->response['total'] = array_sum($data['jumlah']);
        echo json_encode($this->response);
    }

    public function stats_buku() {
        $this->load->database();
        $sql ='
            SELECT a.*, COUNT(*) as jumlah 
            FROM (
                SELECT r.resource_id_buku, r.resource_id_tipe, GROUP_CONCAT(r.resource_id_tipe ORDER BY r.resource_id_tipe ASC) as tipe, GROUP_CONCAT(t.book_type_name ORDER BY t.id_book_type ASC SEPARATOR \'&\') as tipe_name
                FROM resource r 
                JOIN book_type t ON r.resource_id_tipe = t.id_book_type 
                JOIN buku b ON r.resource_id_buku = b.id_buku
                WHERE b.deleted_at IS NULL
                GROUP BY r.resource_id_buku 
            ) a 
            GROUP BY a.tipe 
            ORDER BY tipe_name ASC
        ';
        $result = $this->db->query($sql)->result_array();
        for ($i=0; $i < count($result); $i++) { 
            $data['tipe_name'][$i] = $result[$i]['tipe_name'];
            $data['jumlah'][$i] = (int)$result[$i]['jumlah'];
        }
        
        $this->response['status'] = true;
        $this->response['pesan'] = "Ok!";
        $this->response['data'] = $data;
        $this->response['total'] = array_sum($data['jumlah']);
        echo json_encode($this->response);
    }

    public function stats_peminjaman_aktif() {
        $this->load->database();
        $sql = '
            SELECT a.*, COUNT(*) as jumlah 
            FROM (
                SELECT r.resource_id_buku, r.resource_id_tipe, GROUP_CONCAT(r.resource_id_tipe ORDER BY r.resource_id_tipe ASC) as tipe, GROUP_CONCAT(t.book_type_name ORDER BY t.id_book_type ASC SEPARATOR \'&\') as tipe_name
                FROM resource r 
                JOIN book_type t ON r.resource_id_tipe = t.id_book_type 
                JOIN buku b ON r.resource_id_buku = b.id_buku
                JOIN peminjaman p on b.id_buku = p.buku_id_buku
                WHERE p.tanggal_kembali IS NULL
                GROUP BY p.id_peminjaman
            ) a 
            GROUP BY a.tipe 
            ORDER BY tipe_name ASC
        ';
        $result = $this->db->query($sql)->result_array();
        $data = array();
        for ($i=0; $i < count($result); $i++) { 
            $data['tipe_name'][$i] = $result[$i]['tipe_name'];
            $data['jumlah'][$i] = (int)$result[$i]['jumlah'];
        }
        
        $this->response['status'] = true;
        $this->response['pesan'] = "Ok!";
        $this->response['data'] = $data;
        $this->response['total'] = array_sum($data['jumlah']);
        echo json_encode($this->response);
    }

    public function stats_seluruh_peminjaman() {
        $this->load->database();
        $sql = '
            SELECT
            t1.month,
            t1.md,
            COALESCE(SUM(t1.amount+t2.amount), 0) AS jumlah
            from
            (
                select DATE_FORMAT(a.Date,"%b") as month,
                DATE_FORMAT(a.Date, "%Y-%m") as md,
                \'0\' as  amount
                from (
                    select curdate() - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
                    from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
                    cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
                    cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
            ) a
            where a.Date <= NOW() and a.Date >= Date_add(Now(),interval - 12 month)
            group by month
            )t1
            left join
            (
                SELECT DATE_FORMAT(p.tanggal_pinjam, "%b") AS month, COUNT(*) as amount ,DATE_FORMAT(p.tanggal_pinjam, "%Y-%m") as md
                FROM peminjaman p
                where p.tanggal_pinjam <= NOW() and p.tanggal_pinjam >= Date_add(Now(),interval - 12 month)
                GROUP BY month
            )t2
            on t2.md = t1.md 
            group by t1.month
            order by t1.md ASC
        ';
        $result = $this->db->query($sql)->result_array();
        $data = array();
        for ($i=0; $i < count($result); $i++) { 
            $data['tanggal'][$i] = date('M-y', strtotime($result[$i]['md']));
            $data['jumlah'][$i] = (int)$result[$i]['jumlah'];
        }
        $result2 = $this->db->query('SELECT COUNT(*) as total FROM peminjaman')->row();
        $this->response['status'] = true;
        $this->response['pesan'] = "Ok!";
        $this->response['data'] = $data;
        $this->response['total'] = $result2->total;
        echo json_encode($this->response);
    }

    
}

/* End of file Dashboard.php */
