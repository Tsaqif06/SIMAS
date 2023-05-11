<?php
class barangMasuk extends Controller
{
    public $model_name = "Sarpras";

    public function index()
    {
        $data['judul'] = 'Data Barang Masuk';
        $data['user'] = $this->user;
        $akses = ['all', 'sarpras'];
        $data['barang_masuk'] = $this->model("$this->model_name", 'databarangMasuk_models')->getAllExistData();

        if (in_array($data['user']['hak_akses'], $akses)) {
            if (isset($_POST["contentOnly"])) {
                $this->view('sarpras/barangMasuk/index', $data);
            } else {
                $this->view('templates/header', $data);
                $this->view('sarpras/barangMasuk/index', $data);
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
    //     // $this->view('templates/footerwm');
    // }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'databarangMasuk_models')->tambahDataBarangMasuk($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/barangMasuk');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/barangMasuk');
            exit;
        }
    }
    public function importData()
    {
        if ($this->model("$this->model_name", "databarangMasuk_models")->importData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/barangMasuk");
        exit;
    }
    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'databarangMasuk_models')->hapusDataBarangMasuk($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/barangMasuk');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/barangMasuk');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'databarangMasuk_models')->getBarangMasukById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'databarangMasuk_models')->ubahDataBarangMasuk($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/barangMasuk');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/barangMasuk');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Cari Daftar Barang Masuk';
        $data['barangMasuk'] = $this->model("$this->model_name", 'databarangMasuk_models')->cariDataBarangMasuk();
        $this->view('templates/header', $data);
        $this->view('barangMasuk/index', $data);
        $this->view('templates/footerwm');
    }
}
