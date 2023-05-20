<?php

class DaftarHadir extends Controller
{
    private $model_name = "Kurikulum";

    public function index()
    {
        $data['judul'] = 'Daftar Hadir';

        $data['user'] = $this->user;

        $this->view('templates/header', $data);
        $this->view('kurikulum/Daftar Hadir/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'Daftar_Hadir_Siswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/DaftarHadir');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/DaftarHadir');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'Daftar_Hadir_Siswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/DaftarHadir');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/DaftarHadir');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'Daftar_Hadir_Siswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'Daftar_Hadir_Siswa_model')->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/DaftarHadir');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/DaftarHadir');
            exit;
        }
    }
}
