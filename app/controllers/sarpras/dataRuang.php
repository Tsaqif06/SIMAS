<?php
class dataRuang extends Controller
{
    public $model_name = "Sarpras";

    public function index()
    {
        $data['judul'] = 'Data Ruang';
        $data['user'] = $this->user;
        $akses = ['all', 'sarpras'];
        $data['ruang'] = $this->model("$this->model_name", 'dataRuang_models')->getAllExistData();

        if (in_array($data['user']['hak_akses'], $akses)) {
            if (isset($_POST["contentOnly"])) {
                $this->view('sarpras/dataRuang/index', $data);
            } else {
                $this->view('templates/header', $data);
                $this->view('sarpras/dataRuang/index', $data);
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
        if ($this->model("$this->model_name", 'dataRuang_models')->tambahDataRuang($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/dataRuang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/dataRuang');
            exit;
        }
    }
    public function importData()
    {
        if ($this->model("$this->model_name", "dataRuang_models")->importData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/dataRuang");
        exit;
    }
    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'dataRuang_models')->hapusDataRuang($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/dataRuang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/dataRuang');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'dataRuang_models')->getDataRuangById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'dataRuang_models')->ubahDataRuang($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/dataRuang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/dataRuang');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Cari Daftar Data Ruang';
        $data['dataRuang'] = $this->model("$this->model_name", 'dataRuang_models')->cariDataRuang();
        $this->view('templates/header', $data);
        $this->view('dataRuang/index', $data);
        $this->view('templates/footer');
    }
}
