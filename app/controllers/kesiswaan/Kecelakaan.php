<?php

class Kecelakaan extends Controller
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
        $data['judul'] = 'SIMAS - Asuransi Kecelakaan';
        $data['kecelakaan'] = $this->model("$this->model_name", 'Kecelakaan_model')->getAllExistData();
        $data['user'] = $this->model('Login', 'Login_model')->getDataByName($data['username']);
        $this->view('templates/header', $data);
        $this->view('kesiswaan/kecelakaan/index', $data);
        $this->view('kesiswaan/kecelakaan/form', $data);
        $this->view('templates/footer');
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
}