<?php

class Suratmasuk extends Controller
{
    public $model_name = "TU";

    // Main Routing //

    public function index()
    {
        $data['judul'] = 'SIMAS - Surat Masuk';

        $data['user'] = $this->user;
        $akses = ['all', 'mastertu'];

        $data['suratmasuk'] = $this->model("$this->model_name", 'Suratmasuk_model')->getAllData();

        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('tu/suratmasuk/index', $data);
            $this->view('tu/suratmasuk/form', $data);
            $this->view('templates/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    // Tambah Data //

    public function tambahData()
    {
        if ($this->model("$this->model_name", "Suratmasuk_model")->tambahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
        }
        header("Location: " . BASEURL . "/suratmasuk");
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
        header("Location: " . BASEURL . "/suratmasuk");
        exit;
    }

    // Edit Data //

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", "Suratmasuk_model")->getDataById($_POST["id"]));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", "Suratmasuk_model")->ubahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
        }
        header("Location: " . BASEURL . "/suratmasuk");
        exit;
    }
}
