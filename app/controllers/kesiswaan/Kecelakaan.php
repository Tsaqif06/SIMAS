<?php

class Kecelakaan extends Controller{
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
        $data['kecelakaan'] = $this->model("$this->model_name",'Kecelakaan_model')->getAllKecelakaan();
        $this->view('templates/header',$data);
        $this->view('kesiswaan/kecelakaan/index',$data);
        $this->view('kesiswaan/kecelakaan/form',$data);
        $this->view('templates/footer');
    }


    public function tambahData()
    {
        if($this->model("$this->model_name",'Kecelakaan_model')->tambahDataKecelakaan($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/kecelakaan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Kecelakaan');
            exit;
        }   
    }

    public function hapusData($id)
    {
        if($this->model("$this->model_name",'Kecelakaan_model')->hapusDataKecelakaan($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/kecelakaan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/kecelakaan');
            exit;
        }   
    }

    public function getUbahData()
    {
            echo json_encode ($this->model("$this->model_name",'Kecelakaan_model')->getKecelakaanById($_POST['id']));
    }

    public function ubahData()
    {
        if($this->model("$this->model_name",'Kecelakaan_model')->ubahDataKecelakaan($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/kecelakaan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/kecelakaan');
            exit;
        }   
    }
}