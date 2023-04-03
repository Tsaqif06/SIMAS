<?php

class Suratmasuk extends Controller
{
    public $model_name = "TU";

    // Main Routing //

    public function index()
    {
        $data['judul'] = 'SIMAS - Surat Masuk';

        $data['suratmasuk'] = $this->model("$this->model_name", 'Suratmasuk_model')->getAllData();

        $this->view('templates/header', $data);
        $this->view('tu/suratmasuk/index', $data);
        $this->view('tu/suratmasuk/tambah', $data);
        $this->view('tu/suratmasuk/edit', $data);
        $this->view('templates/footer');
    }

    // Tambah Data //

    public function tambahData()
    {

        if ($this->model("$this->model_name", "Suratmasuk_model")->tambahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
        }
        header("Location: " . BASEURL . "suratmasuk");
        exit;
    }

    // Hapus Data //

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", "Suratmasuk_model")->hapusData($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
        }
        header("Location: " . BASEURL . "suratmasuk");
        exit;
    }

    // Edit Data //

    public function getUbahData($model)
    {
        echo json_encode($this->model("$this->model_name", "Suratmasuk_model")->getDataById($_POST["id_suratmasuk"]));
    }

    public function ubahData($model)
    {
        if ($this->model("$this->model_name", "Suratmasuk_model")->ubahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
        }
        header("Location: " . BASEURL . "suratmasuk");
        exit;
    }
}
