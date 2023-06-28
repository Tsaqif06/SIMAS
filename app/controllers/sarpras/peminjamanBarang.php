<?php

class peminjamanBarang extends Controller
{
    public $model_name = "Sarpras";

    public function index()
    {
        $data['judul'] = 'Peminjaman Barang';
        $data['user'] = $this->user;
        $akses = ['all', 'sarpras', ''];
        $data['peminjaman'] = $this->model("$this->model_name", 'peminjamanBarang_models')->getAllExistData();
        $data['stokBarang'] = $this->model("$this->model_name", 'stokBarang_models')->getAllExistData();

        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->model("$this->model_name", 'peminjamanBarang_models')->readReqData();
            $this->view('templates/header', $data);
            $this->view('sarpras/peminjamanBarang/index', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['role'] == 'guru' || $data['user']['role'] == 'kabeng') {
            $this->view('templates/header', $data);
            $this->view('sarpras/peminjamanBarang/form', $data);
            $this->view('templates/footerwm');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'peminjamanBarang_models')->tambahDataPeminjamanBarang($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
        }
        header('Location: ' . BASEURL . '/peminjamanBarang');
        exit;
    }
    public function importData()
    {
        if ($this->model("$this->model_name", "peminjamanBarang_models")->importData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/peminjamanBarang");
        exit;
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'peminjamanBarang_models')->hapusDataPeminjamanBarang($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
        }
        header('Location: ' . BASEURL . '/peminjamanBarang');
        exit;
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'peminjamanBarang_models')->getDataPeminjamanBarangById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'peminjamanBarang_models')->ubahDataPeminjamanBarang($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/peminjamanBarang');
        exit;
    }

    public function ubahStatusPinjam($ubahKe, $id)
    {
        if ($this->model("$this->model_name", 'peminjamanBarang_models')->ubahStatusPinjam($ubahKe, $id) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/peminjamanBarang');
        exit;
    }
}
