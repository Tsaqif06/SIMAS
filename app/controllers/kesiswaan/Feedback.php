<?php

class Feedback extends Controller
{
    public $model_name = "Kesiswaan";

    public function index()
    {
        $data['judul'] = 'SIMAS - Daftar Feedback';

        $data['user'] = $this->user;

        $data['feedback'] = $this->model("$this->model_name", 'Feedback_model')->getAllExistData();
        $akses = ['all', 'kesiswaan'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('kesiswaan/feedback/index', $data);
            $this->view('kesiswaan/feedback/form', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambahData()
    {
        if ($this->model("$this->model_name", 'Feedback_model')->tambahDataFeedback($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambah', 'success');
            header('Location: ' . BASEURL . '/feedback');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Ditambah', 'danger');
            header('Location: ' . BASEURL . '/feedback');
            exit;
        }
    }

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", 'Feedback_model')->hapusDataFeedback($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/feedback');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/feedback');
            exit;
        }
    }

    public function getUbahData()
    {
        echo json_encode($this->model("$this->model_name", 'Feedback_model')->getFeedbackById($_POST['id']));
    }

    public function ubahData()
    {
        if ($this->model("$this->model_name", 'Feedback_model')->ubahDataFeedback($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/feedback');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/feedback');
            exit;
        }
    }

    public function importData()
    {
        if ($this->model("$this->model_name", "Feedback_model")->importData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/feedback");
        exit;
    }
}
