<?php

class Kecelakaan extends Controller
{
    public $model_name = "Kesiswaan";

    public function index()
    {
        $data['judul'] = 'SIMAS - Asuransi Kecelakaan';

        $data['user'] = $this->user;

        $data['kecelakaan'] = $this->model("$this->model_name", 'Kecelakaan_model')->getAllExistData();

        $akses = ['all', 'kesiswaan'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('kesiswaan/kecelakaan/index', $data);
            $this->view('kesiswaan/kecelakaan/form', $data);
            $this->view('templates/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }


    public function tambahData()
    {
        if ($this->model("$this->model_name", 'Kecelakaan_model')->tambahDataKecelakaan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambah', 'success');
            header('Location: ' . BASEURL . '/kecelakaan');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Ditambah', 'danger');
            header('Location: ' . BASEURL . '/Kecelakaan');
            exit;
        }
    }

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", 'Kecelakaan_model')->hapusDataKecelakaan($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/kecelakaan');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/kecelakaan');
            exit;
        }
    }

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", 'Kecelakaan_model')->getKecelakaanById($_POST['id']));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", 'Kecelakaan_model')->ubahDataKecelakaan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/kecelakaan');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/kecelakaan');
            exit;
        }
    }

    public function importData()
    {
        if ($this->model("$this->model_name", "Kecelakaan_model")->importData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/kecelakaan");
        exit;
    }
}
