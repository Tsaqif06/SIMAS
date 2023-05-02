<?php

class Riwayat extends Controller
{
    public $model_name = "Riwayat";
    private $akses;

    // Main Routing //

    public function index()
    {
        $this->checkSession();
        $data['username'] = Login::getCurrentSession()->username;
        $data['role'] = Login::getCurrentSession()->role;
        $data['akses'] = Login::getCurrentSession()->akses;
        $data['judul'] = 'SIMAS - Riwayat';
        $data['user'] = $this->model('Login', 'Login_model')->getDataByName($data['username']);
        $this->akses = Login::getCurrentSession()->akses;
        $data['riwayat'] = $this->model("$this->model_name", "Riwayat_model")->getDeletedData();

        if ($this->akses == 'all' || $this->akses == 'mastertu' || $this->akses == 'kurikulum') {
            $this->view('templates/header', $data);
            $this->view('riwayat/index', $data);
            $this->view('riwayat/info', $data);
            $this->view('templates/footer');
        } else if ($this->akses == '') {
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

    public function restoreData()
    {

        if ($this->model("$this->model_name", "Riwayat_model")->restoreData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
        }
        header("Location: " . BASEURL . "/riwayat");
        exit;
    }

    // Hapus Data //

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", "Riwayat_model")->hapusData($id) > 0) {
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
