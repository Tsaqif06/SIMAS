<?php

class Ortumeninggal extends Controller{
    public $model_name = "Kesiswaan";
    private $akses;
    public function index()
    {
        $this->checkSession();
        $data['username'] = Login::getCurrentSession()->username;
        $data['role'] = Login::getCurrentSession()->role;
        $data['akses'] = Login::getCurrentSession()->akses;
        $this->akses = Login::getCurrentSession()->akses;
        $data['judul'] = 'SIMAS - Asuransi Ortu Meninggal';
        $data['ortumeninggal'] = $this->model("$this->model_name", 'Ortumeninggal_model')->getAllOrtumeninggal();
        $this->view('templates/header',$data);
        $this->view('kesiswaan/ortumeninggal/index',$data);
        $this->view('kesiswaan/ortumeninggal/form',$data);
        $this->view('templates/footer');
    }

    public function tambahData()
    {
        if( $this->model("$this->model_name", 'Ortumeninggal_model')->tambahDataOrtumeninggal($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/ortumeninggal');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/ortumeninggal');
            exit;
        }   
    }

    public function hapusData($id)
    {
        if( $this->model("$this->model_name", 'Ortumeninggal_model')->hapusDataOrtumeninggal($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/ortumeninggal');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/ortumeninggal');
            exit;
        }   
    }

    public function getUbahData()
    {
            echo json_encode ($this->model("$this->model_name", 'Ortumeninggal_model')->getOrtumeninggalById($_POST['id']));
    }

    public function ubahData()
    {
        if( $this->model("$this->model_name", 'Ortumeninggal_model')->ubahDataOrtumeninggal($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/ortumeninggal');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/ortumeninggal');
            exit;
        }   
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Ortumeninggal';
        $data['mhs'] = $this->model("$this->model_name", 'Ortumeninggal_model')->cariDataOrtumeninggal();
        $this->view('templates/header',$data);
        $this->view('ortumeninggal/index',$data);
        $this->view('templates/footer');
    }
}