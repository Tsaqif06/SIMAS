<?php

class KonsideranAturan extends Controller
{
    private $model_name = "Kurikulum";

    public function index()
    {
        $data['judul'] = 'Konsideran Aturan';

        $data['user'] = $this->user;

        $data['tbl_bksiswa'] = $this->model("$this->model_name", 'Konsideran_Aturan_model')->getAllAturan();

        $akses = ['all', 'kurikulum'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('kurikulum/KonsideranAturan/index', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'GKP_model')->tambahDataAturan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/KonsideranAturan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/KonsideranAturan');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'GKP_model')->hapusDataAturan($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/KonsideranAturan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/KonsideranAturan');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'GKP_model')->getAturanById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'GKP_model')->ubahDataAturan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/KonsideranAturan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/KonsideranAturan');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Aturan';
        $data['mhs'] = $this->model("$this->model_name", 'GKP_model')->cariDataAturan();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footerwm');
    }
}
