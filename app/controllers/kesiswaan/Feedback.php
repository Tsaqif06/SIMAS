<?php

class Feedback extends Controller
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
        $data['judul'] = 'SIMAS - Daftar Feedback';
        $data['feedback'] = $this->model("$this->model_name", 'Feedback_model')->getAllFeedback();
        $this->view('templates/header', $data);
        $this->view('kesiswaan/feedback/index', $data);
        $this->view('kesiswaan/feedback/form', $data);
        $this->view('templates/footer');
    }

    public function tambahData()
    {
        if ($this->model("$this->model_name", 'Feedback_model')->tambahDataFeedback($_POST) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/feedback');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/feedback');
            exit;
        }
    }

    public function hapusData($id)
    {
        if ($this->model("$this->model_name", 'Feedback_model')->hapusDataFeedback($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/feedback');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
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
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/feedback');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/feedback');
            exit;
        }
    }
}
