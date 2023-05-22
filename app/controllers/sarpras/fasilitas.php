<?php
class fasilitas extends Controller
{
    public $model_name = "Sarpras";

    public function index()
    {
        $data['judul'] = 'Fasilitas Sekolah';
        $data['user'] = $this->user;
        $akses = ['all', 'sarpras'];
        $data['fasilitas'] = $this->model("$this->model_name", 'fasilitasSekolah_models')->getAllExistData();

        if (in_array($data['user']['hak_akses'], $akses)) {
            if (isset($_POST["contentOnly"])) {
                $this->view('sarpras/fasilitas/index', $data);
            } else {
                $this->view('templates/header', $data);
                $this->view('sarpras/fasilitas/index', $data);
                $this->view('templates/footer');
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

    public function tambah()
    {
        if ($this->model("$this->model_name", 'fasilitasSekolah_models')->tambahDataFasilitasSekolah($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/fasilitas');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/fasilitas');
            exit;
        }
    }
    public function importData()
    {
        if ($this->model("$this->model_name", "fasilitasSekolah_models")->importData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/fasilitas");
        exit;
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'fasilitasSekolah_models')->hapusDataFasilitasSekolah($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/fasilitas');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/fasilitas');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'fasilitasSekolah_models')->getDataFasilitasSekolahById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'fasilitasSekolah_models')->ubahDataFasilitasSekolah($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/fasilitas');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/fasilitas');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Cari Daftar Fasilitas Sekolah';
        $data['fasiitasSekolah'] = $this->model("$this->model_name", 'fasilitasSekolah_models')->cariDataFasilitasSekolah();
        $this->view('templates/header', $data);
        $this->view('fasilitas/index', $data);
        $this->view('templates/footer');
    }
}
