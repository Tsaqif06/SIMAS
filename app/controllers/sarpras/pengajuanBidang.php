<?php
class pengajuanBidang extends Controller
{
    public $model_name = "Sarpras";

    public function index()
    {
        $data['judul'] = 'Pengajuan Barang Bidang';
        $data['user'] = $this->user;
        $akses = ['all', 'sarpras'];
        
        if (in_array($data['user']['hak_akses'], $akses)) {
            $data['pengajuan_bidang'] = $this->model("$this->model_name", 'pengajuanBidang_models')->getAllExistData();
            $this->view('templates/header', $data);
            $this->view('sarpras/pengajuanBarang/bidang', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '' || $data['user']['hak_akses'] == 'kabeng' || $data['user']['role'] == 'guru') {
            $this->view('templates/header', $data);
            $this->view('sarpras/pengajuanBarang/form/formbidang', $data);
            $this->view('templates/footerwm');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function tambah()
    {
        if ($this->model("$this->model_name", 'pengajuanBidang_models')->tambahDataPengajuanBidang($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pengajuanBidang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pengajuanBidang');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'pengajuanBidang_models')->hapusDataPengajuanBidang($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pengajuanBidang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pengajuanBidang');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'pengajuanBidang_models')->getDataPengajuanBidangById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'pengajuanBidang_models')->ubahDataPengajuanBidang($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pengajuanBidang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pengajuanBidang');
            exit;
        }
    }

    public function ubahStatus()
    {
        if ($this->model("$this->model_name", 'pengajuanBidang_models')->ubahStatus($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pengajuanBidang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pengajuanBidang');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Cari Daftar Pengajuan Bidang';
        $data['pengajuanBidang'] = $this->model("$this->model_name", 'pengajuanBidang_models')->cariDataPengajuanBidang();
        $this->view('templates/header', $data);
        $this->view('pengajuanBidang/index', $data);
        $this->view('templates/footer');
    }
}
