<?php

class Walikelas extends Controller
{
    private $model_name = "Kurikulum";
    public function index()
    {
        $data['judul'] = ' Wali Kelas';
        $data['tbl_walikelasx'] = $this->model("$this->model_name", 'Wali_kelas_model')->getAllWalikelas();
        $this->view('templates/header', $data);
        $this->view('kurikulum/walikelas/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['tbl_walikelasx'] = $this->model("$this->model_name", 'Wali_Kelas_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('kurikulum/mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'Wali_Kelas_model')->tambahWalikelas($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/walikelas');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/walikelas');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'Wali_Kelas_model')->hapusWalikelas($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/walikelas');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/walikelas');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'Wali_Kelas_model')->getWalikelasById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'Wali_kelas_model')->ubahWalikelas($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['tbl_walikelasx'] = $this->model("$this->model_name", 'Mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}