<?php

class Kehadiran extends Controller
{
    public $model_name = "Kesiswaan";
    private $akses;
    public function index()
    {        
        $this->checkSession();
        $data['username'] = Login::getCurrentSession()->username;
        $data['role'] = Login::getCurrentSession()->role;
        $data['akses'] = Login::getCurrentSession()->akses;
        $this->akses = Login::getCurrentSession()->akses;
        $data['judul'] = 'SIMAS - Kehadiran';
        $data['kehadiran'] = $this->model("$this->model_name", 'Kehadiran_model')->getAllKehadiran();
        $this->view('templates/header', $data);
        $this->view('kesiswaan/kehadiran/index', $data);
        $this->view('kesiswaan/kehadiran/form', $data);
        $this->view('templates/footer');
    }

    public function tambahData()
    {
        if ($this->model("$this->model_name", 'Kehadiran_model')->tambahDataKehadiran($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/kehadiran');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Kehadiran');
            exit;
        }
    }

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", 'Kehadiran_model')->hapusDataKehadiran($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/Kehadiran');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
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
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/kehadiran');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/kehadiran');
            exit;
        }
    }
}
