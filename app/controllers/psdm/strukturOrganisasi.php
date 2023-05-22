<?php
class strukturOrganisasi extends Controller
{
    private $model_name = "PSDM";

    public function index()
    {
        $data['judul'] = 'Struktur Organisasi';
        $data['user'] = $this->user;
        $akses = ['all', 'psdm'];
        $data['struktur_organisasi'] = $this->model("$this->model_name", 'strukturOrganisasi_model')->getAllExistData();

        if (in_array($data['user']['hak_akses'], $akses)) {
            if (isset($_POST["contentOnly"])) {
                $this->view('psdm/strukturOrganisasi/index', $data);
            } else {
                $this->view('templates/header', $data);
                $this->view('psdm/strukturOrganisasi/index', $data);
                $this->view('templates/footerwm');
            }
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Struktur Guru';
        $data['organisasi'] = $this->model("$this->model_name", 'strukturOrganisasi_model')->getOrganisasiById($id);
        $this->view('templates/header', $data);
        $this->view('organisasi/detail', $data);
        $this->view('templates/footerwm');
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'strukturOrganisasi_model')->tambahDataOrganisasi($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/strukturOrganisasi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/strukturOrganisasi');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'strukturOrganisasi_model')->hapusDataOrganisasi($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/strukturorganisasi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/strukturorganisasi');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'strukturOrganisasi_model')->getOrganisasiById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'strukturOrganisasi_model')->ubahDataOrganisasi($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/strukturOrganisasi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/strukturOrganisasi');
            exit;
        }
    }

    public function importData()
    {
        if ($this->model("$this->model_name", "strukturOrganisasi_model")->importData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/strukturOrganisasi");
        exit;
    }
}
