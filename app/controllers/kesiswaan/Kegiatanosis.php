<?php

class Kegiatanosis extends Controller
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
        $data['judul'] = 'SIMAS - Daftar Kegiatan Osis';
        $data['kegiatanosis'] =  $this->model("$this->model_name", 'Kegiatanosis_model')->getAllKegiatanosis();
        $this->view('templates/header', $data);
        $this->view('kesiswaan/kegiatanosis/index', $data);
        $this->view('kesiswaan/kegiatanosis/form', $data);
        $this->view('templates/footer');
    }

    public function tambahData()
    {
        if ($this->model("$this->model_name", 'Kegiatanosis_model')->tambahDataKegiatanosis($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambah', 'success');
            header('Location: ' . BASEURL . '/kegiatanosis');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambah', 'danger');
            header('Location: ' . BASEURL . '/kegiatanosis');
            exit;
        }
    }

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", 'Kegiatanosis_model')->hapusDataKegiatanosis($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/kegiatanosis');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/kegiatanosis');
            exit;
        }
    }

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", 'Kegiatanosis_model')->getKegiatanosisById($_POST['id']));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", 'Kegiatanosis_model')->ubahDataKegiatanosis($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/kegiatanosis');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/kegiatanosis');
            exit;
        }
    }
}
