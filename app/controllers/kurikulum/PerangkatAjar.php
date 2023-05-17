<?php

class PerangkatAjar extends Controller
{
    private $model_name = "Kurikulum";

    public function index()
    {
        $data['judul'] = 'Perangkat Ajar';

        $data['user'] = $this->user;

        $data['tbl_prngktajr'] = $this->model("$this->model_name", 'Perangkat_Ajar_model')->getAllPerangkatAjar();

        $this->view('templates/header', $data);
        $this->view('kurikulum/Perangkat Ajar/index', $data);
        $this->view('templates/footerwm');
    }

    public function tambahPerangkatAjar()
    {
        if ($this->model("$this->model_name", 'Perangkat_Ajar_model')->tambahPerangkatAjar($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/PerangkatAjar');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/PerangkatAjar');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'Perangkat_Ajar_model')->hapusperangkatajar($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/PerangkatAjar');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/PerangkatAjar');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'Perangkat_Ajar_model')->getperangkatajarById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'Perangkat_Ajar_model')->ubahperangkatajar($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/PerangkatAjar');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/PerangkatAjar');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar perangkatajar';
        $data['mhs'] = $this->model("$this->model_name", 'Perangkat_Ajar_model')->cariperangkatajar();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footerwm');
    }
}