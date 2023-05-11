<?php
class prestasiGuru extends Controller
{
    private $model_name = "PSDM";

    public function index()
    {
        $data['judul'] = 'Prestasi Guru';
        $data['user'] = $this->user;
        $akses = ['all', 'psdm'];
        $data['prestasi_guru'] = $this->model("$this->model_name", 'prestasiGuru_model')->getAllExistData();

        if (in_array($data['user']['hak_akses'], $akses)) {
            if (isset($_POST["contentOnly"])) {
                $this->view('psdm/prestasiGuru/index', $data);
            } else {
                $this->view('templates/header', $data);
                $this->view('psdm/prestasiGuru/index', $data);
                $this->view('templates/footer');
            }
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'prestasiGuru_model')->tambahDataPrestasiGuru($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/prestasiGuru');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/prestasiGuru');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'prestasiGuru_model')->hapusDataPrestasiGuru($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/prestasiGuru');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/prestasiGuru');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'prestasiGuru_model')->getPrestasiGuruById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'prestasiGuru_model')->ubahDataPrestasiGuru($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/prestasiGuru');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/prestasiGuru');
            exit;
        }
    }

    public function importData()
    {
        if ($this->model("$this->model_name", "prestasiGuru_model")->importData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/prestasiGuru");
        exit;
    }
}
