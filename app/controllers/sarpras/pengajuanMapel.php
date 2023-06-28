<?php

class pengajuanMapel extends Controller
{
    public $model_name = "Sarpras";

    public function index()
    {
        $data['judul'] = 'Pengajuan Barang Mapel';
        $data['user'] = $this->user;
        $akses = ['all', 'sarpras'];
        
        if (in_array($data['user']['hak_akses'], $akses)) {
            $data['pengajuan_mapel'] = $this->model("$this->model_name", 'pengajuanMapel_models')->getAllExistData();
            $this->view('templates/header', $data);
            $this->view('sarpras/pengajuanBarang/mapel', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '' || $data['user']['role'] == 'kabeng' || $data['user']['role'] == 'guru') {
            $this->view('templates/header', $data);
            $this->view('sarpras/pengajuanBarang/form/formmapel', $data);
            $this->view('templates/footerwm');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function tambah()
    {
        if ($this->model("$this->model_name", 'pengajuanMapel_models')->tambahDataPengajuanMapel($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pengajuanMapel');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pengajuanMapel');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'pengajuanMapel_models')->hapusDataPengajuanMapel($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pengajuanMapel');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pengajuanMapel');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'pengajuanMapel_models')->getDataPengajuanMapelById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'pengajuanMapel_models')->ubahDataPengajuanMapel($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pengajuanMapel');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pengajuanMapel');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Cari Daftar Pengajuan Mapel';
        $data['pengajuanMapel'] = $this->model("$this->model_name", 'pengajuanMapel_models')->cariDataPengajuanBidang();
        $this->view('templates/header', $data);
        $this->view('pengajuanBidang/index', $data);
        $this->view('templates/footer');
    }
}
