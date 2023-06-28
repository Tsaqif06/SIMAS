<?php
class barangAset extends Controller
{
    public $model_name = "Sarpras";

    public function index()
    {
        $data['judul'] = 'Stok Barang Aset';
        $data['user'] = $this->user;
        $akses = ['all', 'sarpras'];
        $data['barang_aset'] = $this->model("$this->model_name", 'stokBarangAset_models')->getAllExistData();
        if (in_array($data['user']['hak_akses'], $akses)) {
            if (isset($_POST["contentOnly"])) {
                $this->view('sarpras/barangAset/index', $data);
            } else {
                $this->view('templates/header', $data);
                $this->view('sarpras/barangAset/index', $data);
                $this->view('templates/footerwm');
            }
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    // public function detail($id){
    //     $data['judul'] = 'Detail Barang Masuk';
    //     $data['kegiatan'] = $this->model("$this->model_name",'galeriKegiatan_models')->getKegiatanById($id);
    //     $this->view('templates/header', $data);
    //     // $this->view('kegiatan/detail', $data);
    //     // $this->view('templates/footer');
    // }
    public function importData()
    {
        if ($this->model("$this->model_name", "stokbarangAsett_models")->importData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/barangAset");
        exit;
    }
    public function tambah()
    {
        if ($this->model("$this->model_name", 'stokBarangAset_models')->tambahDataStokBarangAset($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/barangAset');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/barangAset');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'stokBarangAset_models')->hapusDataStokBarangAset($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/barangAset');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/barangAset');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'stokBarangAset_models')->getDataStokBarangAsetById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'stokBarangAset_models')->ubahDataStokBarangAset($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/barangAset');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/barangAset');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Cari Daftar Stok Barang';
        $data['stokBarangAset'] = $this->model("$this->model_name", 'stokBarangAset_models')->cariDataStokBarangAset();
        $this->view('templates/header', $data);
        $this->view('barangAset/index', $data);
        $this->view('templates/footer');
    }
}
