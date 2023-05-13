<?php

class KalenderKegiatan extends Controller
{
    private $model_name = "Kurikulum";

    public function index()
    {
        $data['judul'] = 'Kalender Kegiatan';

        $data['user'] = $this->user;

        $data['schedule_list'] = $this->model("$this->model_name", 'Kalender_Kegiatan_model')->getAllKalender();

        $this->view('templates/header', $data);
        $this->view('kurikulum/Kalender Kegiatan/index', $data);
        $this->view('templates/footerwm');
    }

    public function saveDataKalender($data)
    {
        if ($this->model("$this->model_name", 'Kalender_Kegiatan_model')->saveDataKalender($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/KalenderKegiatan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/KalenderKegiatan');
            exit;
        }
    }

    public function hapusDataKalender($id)
    {
        if ($this->model("$this->model_name", 'Kalender_Kegiatan_model')->hapusDataKalender($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/KalenderKegiatan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/KalenderKegiatan');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'Kalender_Kegiatan_model')->getkalenderById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'Kalender_Kegiatan_model')->ubahDatakalender($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/KalenderKegiatan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/KalenderKegiatan');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar kalender';
        $data['schedule_list'] = $this->model("$this->model_name", 'Kalender_Kegiatan_model')->cariDataKalender();
        $this->view('templates/header', $data);
        $this->view('kalender/index', $data);
        $this->view('templates/footerwm');
    }
}