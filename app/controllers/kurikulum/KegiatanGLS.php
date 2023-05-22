<?php

class KegiatanGLS extends Controller
{
    private $model_name = "Kurikulum";

    public function index()
    {
        $data['judul'] = 'KEGIATAN GLS';

        $data['user'] = $this->user;

        $data['tbl_glsunggul'] = $this->model("$this->model_name", 'Kegiatan_GLS_model')->getALLGLS();

        $akses = ['all', 'kurikulum'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('kurikulum/Literasi/index', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'Kegiatan_GLS_model')->tambahGLS($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/KegiatanGLS');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/KegiatanGLS');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'Kegiatan_GLS_model')->hapusGLS($id) > 0) {
            Flasher::setFlash('berhasil', ' dihapus', 'success');
            header('Location: ' . BASEURL . '/KegiatanGLS');
            exit;
        } else {
            Flasher::setFlash('gagal', ' dihapus', 'danger');
            header('Location: ' . BASEURL . '/KegiatanGLS');
            exit;
        }
    }

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", 'Kegiatan_GLS_model')->getGLSById($_POST['id']));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", 'Kegiatan_GLS_model')->ubahGLS($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/KegiatanGLS');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/KegiatanGLS');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = ' Cari Daftar Struktur Organisasi';
        $data['organisasi'] = $this->model("$this->model_name", 'strukturOrganisasi_model')->cariDataOrganisasi();
        $this->view('templates/header', $data);
        $this->view('organisasi/index', $data);
        $this->view('templates/footer');
    }
}
