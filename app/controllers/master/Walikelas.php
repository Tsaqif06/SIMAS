<?php

class Walikelas extends Controller
{
    public $model_name = "Master";
    private $akses;

    // Main Routing //

    public function index()
    {
        $this->checkSession();
        $data['username'] = Login::getCurrentSession()->username;
        $data['role'] = Login::getCurrentSession()->role;
        $data['akses'] = Login::getCurrentSession()->akses;
        $data['judul'] = 'SIMAS - Walikelas';
        $data['walikelas'] = $this->model("$this->model_name", 'Walikelas_model')->getAllExistData();
        $data['user'] = $this->model('Login', 'Login_model')->getDataByName($data['username']);
        $this->akses = Login::getCurrentSession()->akses;

        if ($this->akses == 'all' || $this->akses == 'mastertu') {
            $this->view('templates/header', $data);
            $this->view('master/walikelas/index', $data);
            $this->view('master/walikelas/form', $data);
            $this->view('templates/footer');
        } else if ($this->akses == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        } else {
            $this->view('templates/header', $data);
            $this->view('master/walikelas/detail', $data);
            $this->view('templates/footer');
        }
    }

    // Tambah Data //

    public function tambahData()
    {

        if ($this->model("$this->model_name", "Walikelas_model")->tambahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
        }
        header("Location: " . BASEURL . "/walikelas");
        exit;
    }

    // Hapus Data //

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", "Walikelas_model")->hapusData($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
        }
        header("Location: " . BASEURL . "/walikelas");
        exit;
    }

    // Edit Data //

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", "Walikelas_model")->getDataById($_POST["id"]));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", "Walikelas_model")->ubahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
        }
        header("Location: " . BASEURL . "/walikelas");
        exit;
    }
}
