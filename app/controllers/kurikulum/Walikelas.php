<?php

class Walikelas extends Controller
{
    private $model_name = "Master";

    public function index()
    {
        $data['judul'] = 'Wali Kelas';

        $data['user'] = $this->user;

        $data['tbl_walikelasx'] = $this->model("$this->model_name", 'Walikelas_model')->getAllExistData();

        $this->view('templates/header', $data);
        $this->view('kurikulum/walikelas/index', $data);
        $this->view('templates/footerwm');
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'WaliKelas_model')->tambahData($_POST) > 0) {
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
        if ($this->model("$this->model_name", 'WaliKelas_model')->hapusData($id) > 0) {
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
        echo json_encode($this->model("$this->model_name", 'WaliKelas_model')->getDataById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'Walikelas_model')->ubahData($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}
