<?php

class StrukturKurikulum extends Controller
{
    private $model_name = "Kurikulum";

    public function index()
    {
        $data['judul'] = 'Struktur Kurikulum';

        $data['user'] = $this->user;

        $data['tbl_struktur_kurkul'] = $this->model("$this->model_name", 'Struktur_Kurikulum_model')->getAllStruktur();

        $this->view('templates/header', $data);
        $this->view('kurikulum/Struktur Kurikulum/index', $data);
        $this->view('templates/footerwm');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Struktur';
        $data['mhs'] = $this->model("$this->model_name", 'Struktur_Kurikulum_model')->getStrukturById($id);
        $this->view('templates/header', $data);
        $this->view('kurikulum/Struktur/detail', $data);
        $this->view('templates/footerwm');
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'Struktur_Kurikulum_model')->tambahDataStruktur($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/StrukturKurikulum');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/StrukturKurikulum');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'Struktur_Kurikulum_model')->hapusDataStruktur($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/StrukturKurikulum');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/StrukturKurikulum');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'Struktur_Kurikulum_model')->getStrukturById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'Struktur_Kurikulum_model')->ubahDataStruktur($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/StrukturKurikulum');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/StrukturKurikulum');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Struktur';
        $data['mhs'] = $this->model("$this->model_name", 'Struktur_Kurikulum_model')->cariDataStruktur();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footerwm');
    }
}