<?php

class Username extends Controller
{
    private $model_name = "Kurikulum";

    public function index()
    {
        $data['judul'] = 'Username & Password';

        $data['user'] = $this->user;

        $data['tbl_usnpw'] = $this->model("$this->model_name", 'Username_model')->getALLUsername();

        $this->view('templates/header', $data);
        $this->view('kurikulum/Username/index', $data);
        $this->view('templates/footerwm');
    }

    public function tambahData()
    {
        if ($this->model("$this->model_name", 'Username_model')->tambahUsername($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Username');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Username');
            exit;
        }
    }

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", 'Username_model')->hapusUsername($id) > 0) {
            Flasher::setFlash('berhasil', ' dihapus', 'success');
            header('Location: ' . BASEURL . '/Username');
            exit;
        } else {
            Flasher::setFlash('gagal', ' dihapus', 'danger');
            header('Location: ' . BASEURL . '/Username');
            exit;
        }
    }

    public function getubahData()
    {
        echo json_encode($this->model("$this->model_name", 'Username_model')->getUsernameById($_POST['id']));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", 'Username_model')->ubahUsername($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/Username');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/Username');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = ' Cari Daftar Username';
        $data['Username'] = $this->model("$this->model_name", 'Username_model')->cariDataUsername();
        $this->view('templates/header', $data);
        $this->view('organisasi/index', $data);
        $this->view('templates/footerwm');
    }
}