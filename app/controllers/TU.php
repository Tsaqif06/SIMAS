<?php

class TU extends Controller
{
    public function index()
    {
        $data['judul'] = 'SIMAS - Tata Usaha';
        $data['siswa'] = $this->model('TU_model')->getAllData();
        $this->view('templates/header', $data);
        $this->view('tu/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = "Detail Siswa";
        $data['siswa'] = $this->model('TU_model')->getDataById($id);
        $this->view('templates/header', $data);
        $this->view('tu/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('TU_model')->tambahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
            header('Location:  ../app/controllers/siswa');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
            header('Location: ../app/controllers/siswa');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('TU_model')->hapusData($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
            header('Location: ../app/controllers/siswa');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
            header('Location: ../app/controllers/siswa');
            exit;
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('TU_model')->getDataById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('TU_model')->ubahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
            header('Location: ' . BASEURL . 'siswa');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
            header('Location: ' . BASEURL . 'siswa');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Siswa';
        $data['siswa'] = $this->model('TU_model')->cariData();
        $this->view('templates/header', $data);
        $this->view('tu/index', $data);
        $this->view('templates/footer');
    }
}
