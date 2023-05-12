<?php
class DataWalkel extends Controller
{
    private $model_name = "Kurikulum";
    public function index()
    {
        $data['judul'] = 'Daftar Walkel';
        $data['tbl_walikelasx'] = $this->model("$this->model_name", 'Data_Walkel_model')->getALLWalkel();
        $this->view('templates/header', $data);
        $this->view('kurikulum/Daftar Walkel/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Struktur Guru';
        $data['Username'] = $this->model("$this->model_name", 'Data_Walkel_model')->getWalkelById($id);
        $this->view('templates/header', $data);
        $this->view('kurikulum/Username/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'Data_Walkel_model')->tambahWalkel($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/DataWalkel');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/DataWalkel');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'Data_Walkel_model')->hapusWalkel($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/DataWalkel');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/DataWalkel');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'Data_Walkel_model')->getWaleklById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'Data_Walkel_model')->ubahWalkel($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/DataWalkel');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/DataWalkel');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = ' Cari Daftar Username';
        $data['Username'] = $this->model("$this->model_name", 'Data_Walkel_model')->cariDataUsername();
        $this->view('templates/header', $data);
        $this->view('kurikulum/organisasi/index', $data);
        $this->view('templates/footer');
    }
}