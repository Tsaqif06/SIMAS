<?php

class Suratpengajuan extends Controller
{
    public $model_name = "TU";

    // Main Routing //

    public function index()
    {
        $data['judul'] = 'SIMAS - Surat Pengajuan';

        $data['user'] = $this->user;

        $data['suratpengajuan'] = $this->model("$this->model_name", 'Suratpengajuan_model')->getQueuedData();

        if ($data['user']['role'] == 'admin') {
            $this->view('templates/header', $data);
            $this->view('tu/suratpengajuan/detail', $data);
            $this->view('templates/footerwm');
            $this->model("$this->model_name", 'Suratpengajuan_model')->readReqData();
        } else {
            $this->view('templates/header', $data);
            $this->view('tu/suratpengajuan/index', $data);
            $this->view('templates/footerwm');
        }
    }

    // Tambah Data //

    public function tambahData()
    {

        if ($this->model("$this->model_name", "Suratpengajuan_model")->tambahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
        }
        header("Location: " . BASEURL . "/suratpengajuan");
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
        header("Location: " . BASEURL . "/suratpengajuan");
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
        header("Location: " . BASEURL . "/suratpengajuan");
        exit;
    }

    public function approveData($id)
    {
        if ($this->model("$this->model_name", "Suratpengajuan_model")->approveData($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Disetujui', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Disetujui', 'danger');
        }
        header("Location: " . BASEURL . "/suratpengajuan");
        exit;
    }

    public function declineData($id)
    {
        if ($this->model("$this->model_name", "Suratpengajuan_model")->declineData($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditolak', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditolak', 'danger');
        }
        header("Location: " . BASEURL . "/suratpengajuan");
        exit;
    }

    public function importData()
    {
        if ($this->model("$this->model_name", "Suratpengajuan_model")->importData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/suratpengajuan");
        exit;
    }
}
