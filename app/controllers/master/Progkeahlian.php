<?php

class Progkeahlian extends Controller
{
    public $model_name = "Master";

    // Main Routing //

    public function index()
    {
        $this->checkSession();
        $data['judul'] = 'SIMAS - Progkeahlian';

        $data['progkeahlian'] = $this->model("$this->model_name", 'Progkeahlian_model')->getAllExistData();

        $this->view('templates/header', $data);
        $this->view('master/progkeahlian/index', $data);
        $this->view('master/progkeahlian/form', $data);
        $this->view('templates/footer');
    }

    // Tambah Data //

    public function tambahData()
    {

        if ($this->model("$this->model_name", "Progkeahlian_model")->tambahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
        }
        header("Location: " . BASEURL . "/progkeahlian");
        exit;
    }

    // Hapus Data //

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", "Progkeahlian_model")->hapusData($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
        }
        header("Location: " . BASEURL . "/progkeahlian");
        exit;
    }

    // Edit Data //

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", "Progkeahlian_model")->getDataById($_POST["id"]));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", "Progkeahlian_model")->ubahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
        }
        header("Location: " . BASEURL . "/progkeahlian");
        exit;
    }
}
