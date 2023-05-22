<?php

class Kegiatanosis extends Controller
{
    public $model_name = "Kesiswaan";

    public function index()
    {
        $data['judul'] = 'SIMAS - Daftar Kegiatan Osis';

        $data['user'] = $this->user;

        $data['kegiatanosis'] =  $this->model("$this->model_name", 'Kegiatanosis_model')->getAllExistData();

        $akses = ['all', 'kesiswaan'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('kesiswaan/kegiatanosis/index', $data);
            $this->view('kesiswaan/kegiatanosis/form', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambahData()
    {
        if ($this->model("$this->model_name", 'Kegiatanosis_model')->tambahDataKegiatanosis($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambah', 'success');
            header('Location: ' . BASEURL . '/kegiatanosis');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Ditambah', 'danger');
            header('Location: ' . BASEURL . '/kegiatanosis');
            exit;
        }
    }

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", 'Kegiatanosis_model')->hapusDataKegiatanosis($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/kegiatanosis');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/kegiatanosis');
            exit;
        }
    }

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", 'Kegiatanosis_model')->getKegiatanosisById($_POST['id']));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", 'Kegiatanosis_model')->ubahDataKegiatanosis($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/kegiatanosis');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/kegiatanosis');
            exit;
        }
    }

    public function importData()
    {
        if ($this->model("$this->model_name", "Kegiatanosis_model")->importData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/kegiatanosis");
        exit;
    }
}
