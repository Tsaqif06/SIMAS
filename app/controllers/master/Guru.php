<?php

class Guru extends Controller
{
    public $model_name = "Master";

    // Main Routing //

    public function index()
    {
        $data['judul'] = 'SIMAS - Guru';

        $data['guru'] = $this->model("$this->model_name", 'Guru_model')->getAllData();

        $this->view('templates/header', $data);
        $this->view('master/guru/index', $data);
        $this->view('master/guru/tambah', $data);
        $this->view('master/guru/edit', $data);
        $this->view('templates/footer');
    }

    // Tambah Data //

    public function tambahData()
    {

        if ($this->model("$this->model_name", "Guru_model")->tambahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
        }
        header("Location: " . BASEURL . "guru");
        exit;
    }

    // Hapus Data //

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", "Guru_model")->hapusData($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
        }
        header("Location: " . BASEURL . "guru");
        exit;
    }

    // Edit Data //

    public function getUbahData($model)
    {
        echo json_encode($this->model("$this->model_name", "Guru_model")->getDataById($_POST["id_guru"]));
    }

    public function ubahData($model)
    {
        if ($this->model("$this->model_name", "Guru}_model")->ubahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
        }
        header("Location: " . BASEURL . "guru");
        exit;
    }
}
