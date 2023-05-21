<?php

class GKP extends Controller
{
    private $model_name = "Kurikulum";

    public function index()
    {
        $data['judul'] = 'Gelar Karya Pembelajaran';

        $data['user'] = $this->user;

        $data['tbl_gkpsatu'] = $this->model("$this->model_name", 'GKP_model')->getAllGKP();

        $akses = ['all', 'kurikulum'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('kurikulum/GKP/index', $data);
            $this->view('templates/footerwm');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'GKP_model')->tambahDataGKP($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/GKP');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/GKP');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'GKP_model')->hapusDataGKP($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/GKP');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/GKP');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'GKP_model')->getGKPById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'GKP_model')->ubahDataGKP($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/GKP');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/GKP');
            exit;
        }
    }
}
