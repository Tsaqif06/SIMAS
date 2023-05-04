<?php

class Kehadiran extends Controller
{
    public $model_name = "Kesiswaan";

    public function index()
    {
        $data['judul'] = 'SIMAS - Kehadiran';

        $data['user'] = $this->user;

        $data['kehadiran'] = $this->model("$this->model_name", 'Kehadiran_model')->getAllExistData();

        $this->view('templates/header', $data);
        $this->view('kesiswaan/kehadiran/index', $data);
        $this->view('kesiswaan/kehadiran/form', $data);
        $this->view('templates/footer');
    }

    public function tambahData()
    {
        if ($this->model("$this->model_name", 'Kehadiran_model')->tambahDataKehadiran($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambah', 'success');
            header('Location: ' . BASEURL . '/kehadiran');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Ditambah', 'danger');
            header('Location: ' . BASEURL . '/Kehadiran');
            exit;
        }
    }

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", 'Kehadiran_model')->hapusDataKehadiran($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/Kehadiran');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/kehadiran');
            exit;
        }
    }

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", 'Kehadiran_model')->getKehadiranById($_POST['id']));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", 'Kehadiran_model')->ubahDataKehadiran($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/kehadiran');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/kehadiran');
            exit;
        }
    }
}
