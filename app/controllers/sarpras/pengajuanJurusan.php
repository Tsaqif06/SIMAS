<?php

class pengajuanJurusan extends Controller
{
    public $model_name = "Sarpras";

    public function index()
    {
        $data['judul'] = 'Pengajuan Barang Jurusan';
        $data['user'] = $this->user;
        $akses = ['all', 'sarpras'];
        
        if (in_array($data['user']['hak_akses'], $akses)) {
            $data['pengajuan_jurusan'] = $this->model("$this->model_name", 'pengajuanJurusan_models')->getAllExistData();
            $this->view('templates/header', $data);
            $this->view('sarpras/pengajuanBarang/jurusan', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '' || $data['user']['role'] == 'kabeng' || $data['user']['role'] == 'guru') {
            $this->view('templates/header', $data);
            $this->view('sarpras/pengajuanBarang/form/formjurusan', $data);
            $this->view('templates/footerwm');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function tambah()
    {
        if ($this->model("$this->model_name", 'pengajuanJurusan_models')->tambahDataPengajuanJurusan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pengajuanJurusan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pengajuanJurusan');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'pengajuanJurusan_models')->hapusDataPengajuanJurusan($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pengajuanJurusan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pengajuanJurusan');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'pengajuanJurusan_models')->getDataPengajuanJurusanById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'pengajuanJurusan_models')->ubahDataPengajuanJurusan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pengajuanJurusan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pengajuanJurusan');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Cari Daftar Pengajuan Bidang';
        $data['pengajuanBidang'] = $this->model("$this->model_name", 'pengajuanBidang_models')->cariDataPengajuanJurusan();
        $this->view('templates/header', $data);
        $this->view('pengajuanBidang/index', $data);
        $this->view('templates/footer');
    }
}
