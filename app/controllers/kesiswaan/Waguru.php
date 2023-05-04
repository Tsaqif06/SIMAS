<?php

class Waguru extends Controller
{
    public $model_name = "Kesiswaan";

    public function index()
    {
        $data['judul'] = 'SIMAS - Daftar Whatsapp Guru';
        
        $data['user'] = $this->user;

        $data['waguru'] = $this->model("$this->model_name", 'Waguru_model')->getAllExistData();
        
        $this->view('templates/header', $data);
        $this->view('kesiswaan/waguru/index', $data);
        $this->view('kesiswaan/waguru/form', $data);
        $this->view('templates/footer');
    }

    public function tambahData()
    {
        if ($this->model("$this->model_name", 'Waguru_model')->tambahDataWaguru($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambah', 'success');
            header('Location: ' . BASEURL . '/waguru');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Ditambah', 'danger');
            header('Location: ' . BASEURL . '/waguru');
            exit;
        }
    }

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", 'Waguru_model')->hapusDataWaguru($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/waguru');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/waguru');
            exit;
        }
    }

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", 'Waguru_model')->getWaguruById($_POST['id']));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", 'Waguru_model')->ubahDataWaguru($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/waguru');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/waguru');
            exit;
        }
    }
}
