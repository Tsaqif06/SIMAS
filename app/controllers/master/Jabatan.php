<?php

class Jabatan extends Controller
{
    public $model_name = "Master";

    // Main Routing //

    public function index()
    {
        $data['judul'] = 'SIMAS - Jabatan';

        $data['user'] = $this->user;
        $akses = ['all', 'mastertu'];

        $data['jabatan'] = $this->model("$this->model_name", 'Jabatan_model')->getAllExistData();

        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('master/jabatan/index', $data);
            $this->view('master/jabatan/form', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        } else {
            $this->view('templates/header', $data);
            $this->view('master/jabatan/detail', $data);
            $this->view('templates/footer');
        }
    }

    // Tambah Data //

    public function tambahData()
    {

        if ($this->model("$this->model_name", "Jabatan_model")->tambahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
        }
        header("Location: " . BASEURL . "/jabatan");
        exit;
    }

    // Hapus Data //

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", "Jabatan_model")->hapusData($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
        }
        header("Location: " . BASEURL . "/jabatan");
        exit;
    }

    // Edit Data //

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", "Jabatan_model")->getDataById($_POST["id"]));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", "Jabatan_model")->ubahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
        }
        header("Location: " . BASEURL . "/jabatan");
        exit;
    }

    public function importData()
    {
        if ($this->model("$this->model_name", "Jabatan_model")->importData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/jabatan");
        exit;
    }
}
