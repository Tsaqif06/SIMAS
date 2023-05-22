<?php
class stokBarang extends Controller

{
    public $model_name = "Sarpras";

    public function index()
    {
        $data['judul'] = 'Data Stok Barang';
        $data['user'] = $this->user;
        $akses = ['all', 'sarpras'];
        $data['stok'] = $this->model("$this->model_name", 'stokBarang_models')->getAllExistData();

        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
                $this->view('sarpras/stokBarang/index', $data);
                $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    
    public function tambah()
    {
        if ($this->model("$this->model_name", 'stokBarang_models')->tambahDataStokBarang($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/stokBarang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/stokBarang');
            exit;
        }
    }
    public function importData()
    {
        if ($this->model("$this->model_name", "stokBarang_models")->importData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/stokBarang");
        exit;
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'stokBarang_models')->hapusDataStokBarang($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/stokBarang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/stokBarang');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'stokBarang_models')->getDataStokBarangById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'stokBarang_models')->ubahDataStokBarang($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/stokBarang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/stokBarang');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Cari Daftar Stok Barang';
        $data['stokBarang'] = $this->model("$this->model_name", 'stokBarang_models')->cariDataStokBarang();
        $this->view('templates/header', $data);
        $this->view('stokBarang/index', $data);
        $this->view('templates/footerwm');
    }
}
