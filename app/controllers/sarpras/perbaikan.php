<?php
class perbaikan extends Controller
{

    public $model_name = "Sarpras";

    public function index()
    {
        $data['judul'] = 'Data Perbaikan Prasarana';
        $data['user'] = $this->user;
        $akses = ['all', 'sarpras'];
        $data['perbaikan'] = $this->model("$this->model_name", 'dataperbaikanPrasarana_models')->getAllExistData();

        if (in_array($data['user']['hak_akses'], $akses)) {
            if (isset($_POST["contentOnly"])) {
                $this->view('sarpras/perbaikan/index', $data);
            } else {
                $this->view('templates/header', $data);
                $this->view('sarpras/perbaikan/index', $data);
                $this->view('templates/footerwm');
            }
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function importData()
    {
        if ($this->model("$this->model_name", "dataperbaikanPrasarana_models")->importData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/perbaikan");
        exit;
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'dataperbaikanPrasarana_models')->tambahDataPerbaikanPrasarana($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/perbaikan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/perbaikan');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'dataperbaikanPrasarana_models')->hapusDataPerbaikanPrasarana($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/perbaikan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/perbaikan');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'dataperbaikanPrasarana_models')->getPerbaikanPrasaranaById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'dataperbaikanPrasarana_models')->ubahDataPerbaikanPrasarana($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/perbaikan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/perbaikan');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Cari Daftar Perbaikan Prasarana';
        $data['perbaikanPrasarana'] = $this->model("$this->model_name", 'dataperbaikanPrasarana_models')->cariDataPerbaikanPrasarana();
        $this->view('templates/header', $data);
        $this->view('perbaikan/index', $data);
        $this->view('templates/footer');
    }
}
