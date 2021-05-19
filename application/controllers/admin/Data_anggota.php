<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_anggota extends CI_Controller
{
    private $response = array(
        "pesan" => "",
        "status" => 0
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_user');
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
        $this->load->view('admin/data_anggota');
    }

    public function tambah_anggota()
    {
        $data_user = array(
            "nisn" => $this->input->post('tambah_nisn'),
            "password" => password_hash($this->input->post('tambah_password'), PASSWORD_ARGON2I),
            "level" => $this->input->post('tambah_level'),
            "nama_lengkap" => $this->input->post('tambah_nama'),
            "kelas" => $this->input->post('tambah_kelas'),
            "jurusan" => $this->input->post('tambah_jurusan'),
            "status" => 1
        );

        if ($this->model_user->insert($data_user)) {
            $this->response['status'] = 1;
            $this->response['pesan'] = "data anggota berhasil disimpan.";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "NISN sudah ada, harap periksa lagi data yang anda masukkan.";
        }

        echo json_encode($this->response);
    }

    public function ambil_semua_anggota()
    {
        echo json_encode(array("data" => $this->model_user->select_all()));
    }

    public function tampil_edit()
    {
        echo json_encode($this->model_user->select_where(array("nisn" => $this->input->post('edit_nisn'))));
    }

    public function simpan_edit()
    {
        $data_user = array(
            "nisn" => $this->input->post('edit_nisn'),
            "level" => $this->input->post('edit_level'),
            "nama_lengkap" => $this->input->post('edit_nama'),
            "kelas" => $this->input->post('edit_kelas'),
            "jurusan" => $this->input->post('edit_jurusan'),
            "status" => $this->input->post('edit_status'),
            "ttd" => ""
        );
        if ($this->input->post('ttd_status') == null) {

            if ($this->model_user->update($data_user, array("nisn" => $data_user['nisn']))) {
                $this->response['status'] = 1;
                $this->response['pesan'] = "Data anggota berhasil disimpan.";
            } else {
                $this->response['status'] = 0;
                $this->response['pesan'] = "NISN sudah ada, harap periksa lagi data yang anda masukkan.";
            }
        } else {
            $query = $this->model_user->select_where(array('nisn' => $data_user['nisn']));

            if ($query->ttd != null) {
                $path = './asset/admin/ttd/' . $query->ttd;
                chmod($path, 0777);
                unlink($path);
            }

            $config['upload_path'] = './asset/admin/ttd/';
            $config['allowed_types'] = 'png';
            $config['max_size']  = '400';
            $config['file_name'] = $data_user['nisn'];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('edit_ttd')) {
                $this->response['pesan'] = $this->upload->display_errors();
                $this->response['status'] = 0;
            } else {
                $data_user['ttd'] = $config['file_name'] . ".png";
                if ($this->model_user->update($data_user, array("nisn" => $data_user['nisn']))) {
                    $this->response['status'] = 1;
                    $this->response['pesan'] = "Data anggota berhasil disimpan.";
                } else {
                    $this->response['status'] = 0;
                    $this->response['pesan'] = "NISN sudah ada, harap periksa lagi data yang anda masukkan.";
                }
            }
        }

        echo json_encode($this->response);
    }

    public function hapus_anggota()
    {
        $where = array(
            "nisn" => $this->input->post('hapus_nisn')
        );

        $query = $this->model_user->select_where($where);

        if ($query->ttd !== null) {
            $path = './asset/admin/ttd/' . $query->ttd;
            chmod($path, 0777);
            unlink($path);
        }

        if ($this->model_user->delete($where)) {
            $this->response['status'] = 1;
            $this->response['pesan'] = "Berhasil menghapus data anggota";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Gagal menghapus data anggota";
        }


        echo json_encode($this->response);
    }

    public function reset_password()
    {
        $where = array(
            "nisn" => $this->input->post('reset_id')
        );

        $query = $this->model_user->select_where($where);

        if ($this->model_user->update(array('password' => password_hash($query->nisn, PASSWORD_ARGON2I)), $where)) {
            $this->response['status'] = 1;
            $this->response['pesan'] = "Berhasil reset password anggota.";
        } else {
            $this->response['status'] = 0;
            $this->response['pesan'] = "Gagal reset password anggota.";
        }

        echo json_encode($this->response);
    }

    public function detail_anggota($nisn)
    {
        $detail = $this->model_user->select_where(array('nisn' => $nisn));
        if ($detail !== null) {
            $this->load->view('admin/detail_anggota', $detail);
        } else {
            echo "ERROR";
        }
    }

    public function import() 
    {
        $this->load->library('upload');
        $this->load->library('MySimpleXLSX');
        $upload_data = $this->upload('import_file', 'xlsx', 'Import');
        $NAMA = 0;
        $NISN = 1;
        $KELAS = 2;
        $JURUSAN = 3;
        $cols = array('nama','nisn','kelas','jurusan');
        if ( $xlsx = SimpleXLSX::parse('./asset/admin/temp/file-import.xlsx') ) {
            $data = $xlsx->rows();
            for ($i=0; $i < count($data[0]); $i++) { 
                if ($data[0][$i] == $cols[0]) {
                    $NAMA = $i;
                }
                else if ($data[0][$i] == $cols[1]) {
                    $NISN = $i;
                }
                else if ($data[0][$i] == $cols[2]) {
                    $KELAS = $i;
                }
                else if ($data[0][$i] == $cols[3]) {
                    $JURUSAN = $i;
                } 
            }
            $data_insert=array();
            for ($i=1; $i < count($data); $i++) { 
                $data_insert[$i-1]['nama_lengkap'] = $data[$i][$NAMA];
                $data_insert[$i-1]['password'] = password_hash($data[$i][$NISN], PASSWORD_ARGON2I);
                $data_insert[$i-1]['status'] = 1;
                $data_insert[$i-1][$cols[1]] = $data[$i][$NISN];
                $data_insert[$i-1][$cols[2]] = $data[$i][$KELAS];
                $data_insert[$i-1][$cols[3]] = $data[$i][$JURUSAN];
                if ($data[$i][$KELAS] == 'X'){
                    $data_insert[$i-1]['level'] = 1;  
                } else if ($data[$i][$KELAS] == 'XI'){
                    $data_insert[$i-1]['level'] = 2;  
                } else if ($data[$i][$KELAS] == 'XII'){
                    $data_insert[$i-1]['level'] = 3;  
                }
            }
            
            $this->load->helper('MyDB');
            $sql = insert_batch_string('user', $data_insert, true);
            $this->load->database();
            if($this->db->query($sql)){
                $this->response = array('status'=>1,'pesan'=>'Berhasil Import Data Anggota');
                echo json_encode($this->response);
            } else {
                $this->response = array('status'=>0,'pesan'=>'Gagal Import Data Anggota');
                echo json_encode($this->response);
            }

        } else {
            $this->response = array('status'=>0,'pesan'=>SimpleXLSX::parseError());
            echo json_encode($this->response);
        }
    }

    private function upload($name, $type, $msg)
    {
        $config['upload_path'] = './asset/admin/temp/';
        $config['allowed_types'] = $type;
        $config['max_size']  = '0';
        $config['file_name'] = 'file-import';
        $config['overwrite'] = TRUE;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($name)) {
            $this->response['pesan'] = "Gagal upload $msg." . $this->upload->display_errors();
            $this->response['status'] = 0;
            die(json_encode($this->response));
        } else {
            $this->response['status'] = 1;
            $this->response['pesan'] = $this->response['pesan'] . ", Berhasil upload $msg";
        }
        return $this->upload->data();
    }
}


/* End of file Data_anggota.php */
