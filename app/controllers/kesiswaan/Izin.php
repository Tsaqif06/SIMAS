<?php

class Izin extends Controller
{
    public $model_name = "Kesiswaan";

    public function index()
    {
        $data['judul'] = 'SIMAS - Daftar Izin';

        $data['user'] = $this->user;

        $data['izin'] = $this->model("$this->model_name", 'Izin_model')->getAllExistData();

        $this->view('templates/header', $data);
        $this->view('kesiswaan/izin/index', $data);
        $this->view('kesiswaan/izin/form', $data);
        $this->view('templates/footer');
    }

    public function tambahData()
    {
        if ($this->model("$this->model_name", 'Izin_model')->tambahDataIzin($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambah', 'success');
            header('Location: ' . BASEURL . '/izin');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Ditambah', 'danger');
            header('Location: ' . BASEURL . '/izin');
            exit;
        }
    }

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", 'Izin_model')->hapusDataIzin($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/izin');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/izin');
            exit;
        }
    }

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", 'Izin_model')->getIzinById($_POST['id']));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", 'Izin_model')->ubahDataIzin($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/izin');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/izin');
            exit;
        }
    }
}
