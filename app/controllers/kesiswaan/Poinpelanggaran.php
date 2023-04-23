<?php

class Poinpelanggaran extends Controller{
    public $model_name = "Kesiswaan";
    private $akses;
    public function index()
    {
        $this->checkSession();
        $data['username'] = Login::getCurrentSession()->username;
        $data['role'] = Login::getCurrentSession()->role;
        $data['akses'] = Login::getCurrentSession()->akses;
        $this->akses = Login::getCurrentSession()->akses;
        $data['judul'] = 'SIMAS - Daftar Poin';
        $data['poinpelanggaran'] = $this->model("$this->model_name", 'Poinpelanggaran_model')->getAllPoinpelanggaran();
        $this->view('templates/header',$data);
        $this->view('kesiswaan/poinpelanggaran/index',$data);
        $this->view('kesiswaan/poinpelanggaran/form',$data);
        $this->view('templates/footer');
    }

    public function tambahData()
    {
        if( $this->model("$this->model_name", 'Poinpelanggaran_model')->tambahDataPoinpelanggaran($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/poinpelanggaran');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/poinpelanggaran');
            exit;
        }   
    }

    public function hapusData($id)
    {
        if( $this->model("$this->model_name", 'Poinpelanggaran_model')->hapusDataPoinpelanggaran($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/poinpelanggaran');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/poinpelanggaran');
            exit;
        }   
    }

    public function getUbahData()
    {
            echo json_encode ($this->model("$this->model_name", 'Poinpelanggaran_model')->getPoinpelanggaranById($_POST['id']));
    }

    public function ubahData()
    {
        if( $this->model("$this->model_name", 'Poinpelanggaran_model')->ubahDataPoinpelanggaran($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/poinpelanggaran');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/poinpelanggaran');
            exit;
        }   
    }
}