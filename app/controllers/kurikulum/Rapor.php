<?php

class Rapor extends Controller
{
    private $model_name = "Kurikulum";

    public function index()
    {
        $data['judul'] = 'Rapor';
        
        $data['user'] = $this->user;

        $data['mhs'] = $this->model("$this->model_name", 'Rapor_model')->getAllMahasiswa();

        $this->view('templates/header', $data);
        $this->view('kurikulum/Rapor/index', $data);
        $this->view('templates/footerwm');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model("$this->model_name", 'Rapor_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('kurikulum/mahasiswa/detail', $data);
        $this->view('templates/footerwm');
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'Rapor_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Rapor');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Rapor');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'Rapor_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/Rapor');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/Rapor');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'Rapor_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'Rapor_model')->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/Rapor');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/Rapor');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model("$this->model_name", 'Rapor_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footerwm');
    }
}