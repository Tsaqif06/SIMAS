<?php

class Penilaian extends Controller
{
    private $model_name = "Kurikulum";

    public function index()
    {
        $data['judul'] = 'Penilaian';

        $data['user'] = $this->user;

        $data['mhs'] = $this->model("$this->model_name", 'Penilaian_model')->getAllMahasiswa();


        $akses = ['all', 'kurikulum'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('kurikulum/Penilaian/index', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'Penilaian_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Penilaian');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Penilaian');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'Penilaian_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/Penilaian');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/Penilaian');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'Penilaian_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'Penilaian_model')->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/Penilaian');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/Penilaian');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model("$this->model_name", 'Penilaian_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}
