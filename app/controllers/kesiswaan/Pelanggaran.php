<?php

class Pelanggaran extends Controller
{
    public $model_name = "Kesiswaan";

    public function index()
    {
        $data['judul'] = 'SIMAS - Pelanggaran';

        $data['user'] = $this->user;

        $data['pelanggaran'] = $this->model("$this->model_name", 'Pelanggaran_model')->getAllExistData();

        $this->view('templates/header', $data);
        $this->view('kesiswaan/pelanggaran/index', $data);
        $this->view('kesiswaan/pelanggaran/form', $data);
        $this->view('templates/footer');
    }

    public function tambahData()
    {
        if ($this->model("$this->model_name", 'Pelanggaran_model')->tambahDataPelanggaran($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambah', 'success');
            header('Location: ' . BASEURL . '/pelanggaran');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Ditambah', 'danger');
            header('Location: ' . BASEURL . '/pelanggaran');
            exit;
        }
    }

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", 'Pelanggaran_model')->hapusDataPelanggaran($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/pelanggaran');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/pelanggaran');
            exit;
        }
    }

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", 'Pelanggaran_model')->getPelanggaranById($_POST['id']));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", 'Pelanggaran_model')->ubahDataPelanggaran($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/pelanggaran');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/pelanggaran');
            exit;
        }
    }
}