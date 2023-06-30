<?php

class Lms extends Controller
{
    private $model_name = "Kurikulum";

    public function index()
    {
        $data['judul'] = 'Learning Management System';

        $data['user'] = $this->user;

        $data['tbl_usnpw'] = $this->model("$this->model_name", 'LMS_model')->getAllLms();

        $akses = ['all', 'kurikulum'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('kurikulum/LMS/index', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'LMS_model')->tambahLMS($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/LMS');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/LMS');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'LMS_model')->hapusLMS($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/LMS');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/LMS');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'LMS_model')->getLMSById($_POST['id']));
    }

    public function ubah()
    {
        // echo '<pre>';
        // print_r($_POST);
        // die;
        if ($this->model("$this->model_name", 'LMS_model')->ubahLMS($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/LMS');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/LMS');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model("$this->model_name", 'LMS_model')->cariDataLMS();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}
