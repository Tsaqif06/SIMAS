<?php

class Suratpengajuan extends Controller
{
    public $model_name = "TU";

    // Main Routing //

    public function index()
    {
        $data['judul'] = 'SIMAS - Surat Pengajuan';

        $data['suratpengajuan'] = $this->model("$this->model_name", 'Suratpengajuan_model')->getAllData();

        $this->view('templates/header', $data);
        $this->view('suratpengajuan/index', $data);
        $this->view('templates/footer');
    }

    // Tambah Data //

    public function tambahData()
    {

        if ($this->model("$this->model_name", "Suratpengajuan_model")->tambahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
        }
        header("Location: " . BASEURL . "suratpengajuan");
        exit;
    }

    // Hapus Data //

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", "Suratpengajuan_model")->hapusData($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
        }
        header("Location: " . BASEURL . "suratpengajuan");
        exit;
    }

    // Edit Data //

    public function getUbahData($model)
    {
        echo json_encode($this->model("$this->model_name", "Suratpengajuan_model")->getDataById($_POST["id_suratpengajuan"]));
    }

    public function ubahData($model)
    {
        if ($this->model("$this->model_name", "Suratpengajuan_model")->ubahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
        }
        header("Location: " . BASEURL . "suratpengajuan");
        exit;
    }
}
