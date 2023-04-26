<?php

class Infokesiswaan extends Controller
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
        $data['judul'] = 'SIMAS - Daftar Informasi';
        $data['infokesiswaan'] = $this->model("$this->model_name", 'Infokesiswaan_model')->getAllInfokesiswaan();
        $this->view('templates/header', $data);
        $this->view('kesiswaan/infokesiswaan/index', $data);
        $this->view('kesiswaan/infokesiswaan/form', $data);
        $this->view('templates/footer');
    }

    public function tambahData()
    {
        if ($this->model("$this->model_name", 'Infokesiswaan_model')->tambahDataInfokesiswaan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambah', 'success');
            header('Location: ' . BASEURL . '/infokesiswaan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambah', 'danger');
            header('Location: ' . BASEURL . '/infokesiswaan');
            exit;
        }
    }

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", 'Infokesiswaan_model')->hapusDataInfokesiswaan($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/infokesiswaan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/infokesiswaan');
            exit;
        }
    }

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", 'Infokesiswaan_model')->getInfokesiswaanById($_POST['id']));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", 'Infokesiswaan_model')->ubahDataInfokesiswaan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/infokesiswaan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/infokesiswaan');
            exit;
        }
    }
}
