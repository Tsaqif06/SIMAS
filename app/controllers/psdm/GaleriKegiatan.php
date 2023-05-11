<?php
class galeriKegiatan extends Controller
{

    private $model_name = "PSDM";
    public function index()
    {
        $data['judul'] = 'Galeri Kegiatan';
        $data['user'] = $this->user;
        $akses = ['all', 'psdm'];
        $data['galeri'] = $this->model("$this->model_name", 'galeriKegiatan_model')->getAllExistData();

        if (in_array($data['user']['hak_akses'], $akses)) {
            if (isset($_POST["contentOnly"])) {
                $this->view('psdm/galeriKegiatan/index', $data);
            } else {
                $this->view('templates/header', $data);
                $this->view('psdm/galeriKegiatan/index', $data);
                $this->view('templates/footer');
            }
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Kegiatan';
        $data['kegiatan'] = $this->model("$this->model_name", 'galeriKegiatan_model')->getKegiatanById($id);
        $this->view('templates/header', $data);
        $this->view('kegiatan/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'galeriKegiatan_model')->tambahDataKegiatan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/galeriKegiatan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/galeriKegiatan');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'galeriKegiatan_model')->hapusDataKegiatan($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/galeriKegiatan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/galeriKegiatan');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'galeriKegiatan_model')->getKegiatanById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'galeriKegiatan_model')->ubahDataKegiatan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/galeriKegiatan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/galeriKegiatan');
            exit;
        }
    }
}
