<?php

class Riwayat extends Controller
{
    public $model_name = "Riwayat";

    // Main Routing //

    public function index()
    {
        $data['judul'] = 'SIMAS - Riwayat';

        $data['user'] = $this->user;
        $akses = ['all', 'mastertu', 'kurikulum'];

        $data['riwayat'] = $this->model("$this->model_name", "Riwayat_model")->getDeletedData();

        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('riwayat/index', $data);
            $this->view('riwayat/info', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        } else {
            $this->view('templates/header', $data);
            $this->view('riwayat/detail', $data);
            $this->view('riwayat/info', $data);
            $this->view('templates/footer');
        }
    }

    // Restore Data //

    public function restoreData($uuid, $db)
    {

        if ($this->model("$this->model_name", "Riwayat_model")->restoreData($uuid, $db) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
        }
        header("Location: " . BASEURL . "/riwayat");
        exit;
    }

    // Hapus Data //

    public function deletePermanentData($uuid, $db)
    {
        if ($this->model("$this->model_name", "Riwayat_model")->deletePermanentData($uuid, $db) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
        }
        header("Location: " . BASEURL . "/riwayat");
        exit;
    }

    public function getDataByIndex()
    {
        echo json_encode($this->model("$this->model_name", "Riwayat_model")->getDeletedDataByIndex($_POST['index']));
    }
}
