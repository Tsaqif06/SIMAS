<?php

class Siswa extends Controller
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
        $data['judul'] = 'SIMAS - Siswa';
        $data['siswa'] = $this->model("$this->model_name", 'Siswa_model')->getAllExistData();
        $data['kompkeahlian'] = $this->model("$this->model_name", 'Kompkeahlian_model')->getAllData();
        $this->akses = Login::getCurrentSession()->akses;

        if ($this->akses == 'all' || $this->akses == 'mastertu' || $this->akses == 'humas' || $this->akses == 'kesiswaan') {
            $this->view('templates/header', $data);
            $this->view('master/siswa/index', $data);
            $this->view('master/siswa/form', $data);
            $this->view('templates/footer');
        } else if ($this->akses == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        } else {
            $this->view('templates/header', $data);
            $this->view('master/siswa/detail', $data);
            $this->view('templates/footer');
        }
    }

    // Tambah Data //

    public function tambahData()
    {

        if ($this->model("$this->model_name", "Siswa_model")->tambahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
        }
        header("Location: " . BASEURL . "/siswa");
        exit;
    }

    // Hapus Data //

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", "Siswa_model")->hapusData($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
        }
        header("Location: " . BASEURL . "/siswa");
        exit;
    }

    // Edit Data //

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", "Siswa_model")->getDataById($_POST["id"]));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", "Siswa_model")->ubahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
        }
        header("Location: " . BASEURL . "/siswa");
        exit;
    }
}
