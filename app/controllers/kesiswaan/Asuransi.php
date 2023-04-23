<?php

class Asuransi extends Controller
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
        $data['judul'] = 'SIMAS - Asuransi';
        $data['asuransi'] = $this->model("$this->model_name", 'Asuransi_model')->getAllAsuransi();
        $this->view('templates/header', $data);
        $this->view('kesiswaan/asuransi/index', $data);
        $this->view('kesiswaan/asuransi/form', $data);
        $this->view('templates/footer');
    }

    public function tambahData()
    {
        if ($this->model("$this->model_name", 'Asuransi_model')->tambahDataAsuransi($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/asuransi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/asuransi');
            exit;
        }
    }

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", 'Asuransi_model')->hapusDataAsuransi($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/asuransi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/asuransi');
            exit;
        }
    }

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", 'Asuransi_model')->getAsuransiById($_POST['id']));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", 'Asuransi_model')->ubahDataAsuransi($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/asuransi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/asuransi');
            exit;
        }
    }
}
