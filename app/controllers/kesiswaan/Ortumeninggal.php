<?php

class Ortumeninggal extends Controller
{
    public $model_name = "Kesiswaan";

    public function index()
    {
        $data['judul'] = 'SIMAS - Asuransi Ortu Meninggal';

        $data['user'] = $this->user;

        $data['ortumeninggal'] = $this->model("$this->model_name", 'Ortumeninggal_model')->getAllExistData();

        $akses = ['all', 'kesiswaan'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('kesiswaan/ortumeninggal/index', $data);
            $this->view('kesiswaan/ortumeninggal/form', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambahData()
    {
        if ($this->model("$this->model_name", 'Ortumeninggal_model')->tambahDataOrtumeninggal($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambah', 'success');
            header('Location: ' . BASEURL . '/ortumeninggal');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Ditambah', 'danger');
            header('Location: ' . BASEURL . '/ortumeninggal');
            exit;
        }
    }

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", 'Ortumeninggal_model')->hapusDataOrtumeninggal($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/ortumeninggal');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/ortumeninggal');
            exit;
        }
    }

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", 'Ortumeninggal_model')->getOrtumeninggalById($_POST['id']));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", 'Ortumeninggal_model')->ubahDataOrtumeninggal($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/ortumeninggal');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/ortumeninggal');
            exit;
        }
    }

    public function importData()
    {
        if ($this->model("$this->model_name", "Ortumeninggal_model")->importData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/ortumeninggal");
        exit;
    }
}
