<?php

class Inbis extends Controller
{
    private $model_name = "Kurikulum";

    public function index()
    {
        $data['judul'] = 'Inkubator Bisnis';

        $data['user'] = $this->user;

        $data['tbl_inbisunggul'] = $this->model("$this->model_name", 'Inbis_model')->getAllInbis();

        $akses = ['all', 'kurikulum'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('kurikulum/Inbis/index', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'Inbis_model')->tambahInbis($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Inbis');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Inbis');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'Inbis_model')->hapusInbis($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/Inbis');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/Inbis');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'Inbis_model')->getInbisById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'Inbis_model')->ubahInbis($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/Inbis');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/Inbis');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Inbis';
        $data['mhs'] = $this->model("$this->model_name", 'Inbis_model')->cariDataInbis();
        $this->view('templates/header', $data);
        $this->view('kurikulum/Inbis/index', $data);
        $this->view('templates/footerwm');
    }
}
