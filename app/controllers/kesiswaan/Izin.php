<?php

class Izin extends Controller
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
        $data['judul'] = 'SIMAS - Daftar Izin';
        $data['izin'] = $this->model("$this->model_name", 'Izin_model')->getAllIzin();
        $this->view('templates/header', $data);
        $this->view('kesiswaan/izin/index', $data);
        $this->view('kesiswaan/izin/form', $data);
        $this->view('templates/footer');
    }

    public function tambahData()
    {
        if ($this->model("$this->model_name", 'Izin_model')->tambahDataIzin($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambah', 'success');
            header('Location: ' . BASEURL . '/izin');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambah', 'danger');
            header('Location: ' . BASEURL . '/izin');
            exit;
        }
    }

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", 'Izin_model')->hapusDataIzin($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/izin');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
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
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/izin');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/izin');
            exit;
        }
    }

}