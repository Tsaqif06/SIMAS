<?php

class STiru extends Controller
{
    public $model_name = "Humas";

    public function index()
    {
        $data['judul'] = 'Studi Tiru';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/stiru/studitiru');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function laporanstiru()
    {
        $data['judul'] = 'Studi Tiru';
        $data['user'] = $this->user;
        $data['stiru'] = $this->model("$this->model_name", 'Stiru_model')->getAllStiru();
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/stiru/studitirulaporan', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function form()
    {
        $data['judul'] = 'Studi Tiru';
        $data['user'] = $this->user;
        $data['stiru'] = $this->model("$this->model_name", 'Stiru_model')->getAllStiru();
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/stiru/studitiruform', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function tambahstiru()
    {
        if ($this->model("$this->model_name", 'Stiru_model')->tambahDataStiru($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/stiru/laporanstiru');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/stiru/laporanstiru');
            exit;
        }
    }
    public function hapusstiru($id)
    {
        if ($this->model("$this->model_name", 'Stiru_model')->hapusDataStiru($id) > 0) {
            Flasher::setFlash('berhasil ', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/stiru/laporanstiru');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/stiru/laporanstiru');
            exit;
        }
    }
    public function ubahstiru()
    {
        if ($this->model("$this->model_name", 'Stiru_model')->ubahDataStiru($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal ', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/stiru/laporanstiru');
        exit;
    }

    public function getUbahStiru()
    {
        echo json_encode($this->model("$this->model_name", 'Stiru_model')->getStiruById($_POST['id']));
    }

    public function importData()
    {
        if ($this->model("$this->model_name", "BKK_model")->importData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/stiru/laporanstiru");
        exit;
    }
}