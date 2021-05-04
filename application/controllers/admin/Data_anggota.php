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
}


/* End of file Data_anggota.php */
