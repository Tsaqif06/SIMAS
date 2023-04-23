<?php

class Pelanggaran extends Controller
{
    public $model_name = "Kesiswaan";
    private $akses;

    public function index()
    {
        $this->checkSession();
        $data['username'] = Login::getCurrentSession()->username;
        $data['role'] = Login::getCurrentSession()->role;
        $data['akses'] = Login::getCurrentSession()->akses;
        $this->akses = Login::getCurrentSession()->akses;
        $data['judul'] = 'SIMAS - Pelanggaran';
        $data['pelanggaran'] = $this->model("$this->model_name", 'Pelanggaran_model')->getAllPelanggaran();
        $this->view('templates/header', $data);
        $this->view('kesiswaan/pelanggaran/index', $data);
        $this->view('kesiswaan/pelanggaran/form', $data);
        $this->view('templates/footer');
    }

    public function tambahData()
    {
        if ($this->model("$this->model_name", 'Pelanggaran_model')->tambahDataPelanggaran($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pelanggaran');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pelanggaran');
            exit;
        }
    }

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", 'Pelanggaran_model')->hapusDataPelanggaran($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pelanggaran');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
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
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pelanggaran');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pelanggaran');
            exit;
        }
    }
}
