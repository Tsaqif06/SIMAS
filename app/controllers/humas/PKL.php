<?php

class PKL extends Controller
{
    public $model_name = "Humas";

    public function index()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $data['jmlmon'] = $this->model('Humas', 'PKL_model')->getJmlDatamon()['count'];
        $data['jmlps'] = $this->model('Humas', 'PKL_model')->getJmlDataps()['count'];
        $data['jmlpb'] = $this->model('Humas', 'PKL_model')->getJmlDatapb()['count'];
        $data['jmlnilai'] = $this->model('Humas', 'PKL_model')->getJmlDatanilai()['count'];
        $data['jmldp'] = $this->model('Humas', 'PKL_model')->getJmlDatadp()['count'];
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/home/pkl', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru' || $data['user']['hak_akses'] == 'kabeng') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/guru/pkl/home/pkl', $data);
            $this->view('templates/humas/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function rekap()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $data['jmlpp'] = $this->model('Humas', 'PKL_model')->getJmlDatapp()['count'];
        $data['jmliz'] = $this->model('Humas', 'PKL_model')->getJmlDataiz()['count'];
        $data['jmlind'] = $this->model('Humas', 'PKL_model')->getJmlDataind()['count'];
        $data['jmltable'] = $this->model('Humas', 'PKL_model')->getJmlDatatable()['count'];
        $data['jmlbm'] = $this->model('Humas', 'PKL_model')->getJmlDatabm()['count'];
        $data['jmltp'] = $this->model('Humas', 'PKL_model')->getJmlDatatp()['count'];
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/home/pklrekapitulasi', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru' || $data['user']['hak_akses'] == 'kabeng') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/guru/pkl/rekap/home/pklrekapitulasi', $data);
            $this->view('templates/humas/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }


    //  PENEMPATAN

    public function penempatan()
    {
        $data['judul'] = 'Admin - PKL';

        $data['user'] = $this->user;

        $akses = ['all', 'humas'];

        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);

            if (isset($_GET['kelas'])) {
                $data['kelas'] = str_replace("_", " ", strtoupper($_GET['kelas']));
                $data['siswa'] = $this->model("$this->model_name", 'pkl_model')->getAllPenempatan($data['kelas']);
                $this->view('humas/pkl/rekap/penempatan/detail', $data);
            } else {
                $this->view('humas/pkl/rekap/penempatan/index', $data);
            }

            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru' || $data['user']['hak_akses'] == 'kabeng') {
            $this->view('templates/humas/header', $data);
            if (isset($_GET['kelas'])) {
                $data['kelas'] = str_replace("_", " ", strtoupper($_GET['kelas']));
                $data['siswa'] = $this->model("$this->model_name", 'pkl_model')->getAllPenempatan($data['kelas']);
                $this->view('humas/guru/pkl/rekap/penempatan/detail', $data);
            } else {
                $this->view('humas/guru/pkl/rekap/penempatan/index', $data);
            }
            $this->view('templates/humas/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function hapusDataPenempatan($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataPenempatan($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatan&kelas=" . $_GET['kelas']);
        exit;
    }

    public function tambahDataPenempatan()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataPenempatan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatan&kelas=" . $_GET['kelas']);
        exit;
    }

    public function getUbahPenempatan()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getPenempatanById($_POST['id']));
    }

    public function ubahDataPenempatan()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataPenempatan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatan&kelas=" . $_GET['kelas']);
        exit;
    }

    public function importDataPenempatan()
    {
        if (!empty($_FILES['file']['name'])) {
            if ($this->model("$this->model_name", "pkl_model")->importDataPenempatan() > 0) {
                Flasher::setFlash('BERHASIL', 'Diimport', 'success');
            } else {
                Flasher::setFlash('GAGAL', 'Diimport', 'danger');
            }
        } else {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatan&kelas=" . $_GET['kelas']);
        exit;
    }


    //  NILAI

    public function nilai()
    {
        $data['judul'] = 'Admin - PKL';

        $data['user'] = $this->user;

        $akses = ['all', 'humas', 'industri'];

        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);

            if (isset($_GET['kelas'])) {
                $data['kelas'] = str_replace("_", " ", strtoupper($_GET['kelas']));
                $data['siswa'] = $this->model("$this->model_name", 'pkl_model')->getAllNilai($data['kelas']);
                $this->view('humas/pkl/nilai/detail', $data);
            } else {
                $this->view('humas/pkl/nilai/index', $data);
            }

            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru' || $data['user']['hak_akses'] == 'kabeng') {
            $this->view('templates/humas/header', $data);

            if (isset($_GET['kelas'])) {
                $data['kelas'] = str_replace("_", " ", strtoupper($_GET['kelas']));
                $data['siswa'] = $this->model("$this->model_name", 'pkl_model')->getAllNilai($data['kelas']);
                $this->view('humas/guru/pkl/nilai/detail', $data);
            } else {
                $this->view('humas/guru/pkl/nilai/index', $data);
            }

            $this->view('templates/humas/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function hapusDataNilai($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
        }
        header('Location: ' . BASEURL . '/pkl/nilai&kelas=' . $_GET['kelas']);
        exit;
    }

    public function tambahDataNilai()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
        }
        header('Location: ' . BASEURL . '/pkl/nilai&kelas=' . $_GET['kelas']);
        exit;
    }

    public function getUbahNilai()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDataNilai()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/pkl/nilai&kelas=' . $_GET['kelas']);
        exit;
    }

    public function importDataNilai()
    {
        if (!empty($_FILES['file']['name'])) {
            if ($this->model("$this->model_name", "PKL_model")->importDataNilai() > 0) {
                Flasher::setFlash('BERHASIL', 'Diimport', 'success');
            } else {
                Flasher::setFlash('GAGAL', 'Diimport', 'danger');
            }
        } else {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/nilai&kelas=" . $_GET['kelas']);
        exit;
    }


    // PEMBERKASAN

    public function pemberkasan()
    {
        $data['judul'] = 'Admin - PKL';

        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'kabeng'];

        $data['jurusan'] = "";
        switch ($data['user']['username']) {
            case 'Kabeng TG':
                $data['jurusan'] = 'TEKNIK GRAFIKA';
                break;
            case 'Kabeng TL':
                $data['jurusan'] = 'LOGISTIK';
                break;
            case 'Kabeng MEKA':
                $data['jurusan'] = 'MEKATRONIKA';
                break;
            case 'Kabeng PH':
                $data['jurusan'] = 'PERHOTELAN';
                break;
            case 'Kabeng ANI':
                $data['jurusan'] = 'ANIMASI';
                break;
            case 'Kabeng DKV':
                $data['jurusan'] = 'DESAIN KOMUNIKASI VISUAL';
                break;
            case 'Kabeng TKJ':
                $data['jurusan'] = 'TEKNIK KOMPUTER DAN JARINGAN';
                break;
            case 'Kabeng RPL':
                $data['jurusan'] = 'REKAYASA PERANGKAT LUNAK';
        }
        $data['siswa'] = $this->model("$this->model_name", 'PKL_model')->getExistSiswaPS();

        // echo '<pre>';
        // print_r($data['user']); die;

        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/pemberkasan/pklpemberkasanlaporan', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/guru/pkl/pemberkasan/pklpemberkasanlaporan', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'siswa') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/pemberkasan/pklpemberkasan', $data);
            $this->view('templates/humas/footer');
        }
    }

    public function raportpemberkasan($id)
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $data['siswa'] = $this->model("$this->model_name", 'PKL_model')->getPemberkasanById($id);
        $akses = ['all', 'humas', 'kabeng'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/pemberkasan/raporpemberkasan', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru' || $data['user']['hak_akses'] == 'kabeng') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/guru/pkl/pemberkasan/raporpemberkasan', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambahpemberkasan()
    {
        // $this->model("$this->model_name", 'PKL_model')->tambahDataPemberkasan($_POST);

        if ($this->model("$this->model_name", 'PKL_model')->tambahDataPemberkasan($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/pemberkasan');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/pemberkasan');
            exit;
        }
    }

    public function hapuspemberkasan($id)
    {
        if ($this->model("$this->model_name", 'PKL_model')->hapusDataPemberkasan($id) > 0) {
            Flasher::setFlash('berhasil ', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/pemberkasan');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/pemberkasan');
            exit;
        }
    }
    public function ubahpemberkasan()
    {
        if ($this->model("$this->model_name", 'PKL_model')->ubahDataPemberkasan($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal ', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/pkl/pemberkasan');
        exit;
    }

    public function getUbahPemberkasan()
    {
        echo json_encode($this->model("$this->model_name", 'PKL_model')->getDetailPS($_POST['id']));
    }

    public function importDatapemberkasan()
    {
        if (!empty($_FILES['file']['name'])) {
            if ($this->model("$this->model_name", "PKL_model")->importDatapemberkasan() > 0) {
                Flasher::setFlash('BERHASIL', 'Diimport', 'success');
            } else {
                Flasher::setFlash('GAGAL', 'Diimport', 'danger');
            }
        } else {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pemberkasan");
        exit;
    }


    // PRAKERIN

    public function prakerin()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/prakerin/pklprakerin', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru' || $data['user']['hak_akses'] == 'kabeng') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/guru/pkl/prakerin/pklprakerin', $data);
            $this->view('templates/humas/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function pemberangkatan()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/prakerin/pemberangkatan/pklpemberangkatan', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru' || $data['user']['hak_akses'] == 'kabeng') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/guru/bkk/loker/bkklokerlaporan', $data);
            $this->view('templates/humas/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function penjemputan()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/prakerin/penjemputan/pklpenjemputan', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru' || $data['user']['hak_akses'] == 'kabeng') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/guru/pkl/prakerin/penjemputan/pklpenjemputan', $data);
            $this->view('templates/humas/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function pengangkatan()
    {
        $data['judul'] = 'Siswa Pegawai';
        $data['user'] = $this->user;
        $data['kompkeahlian'] = $this->model("Master", 'Kompkeahlian_model')->getAllExistData();
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $data['pg'] = $this->model("$this->model_name", 'pkl_model')->getExistSiswaPegawai();
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/magang/pklpengangkatansiswa', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru' || $data['user']['hak_akses'] == 'kabeng') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/guru/pkl/rekap/magang/pklpengangkatansiswa', $data);
            $this->view('templates/humas/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambahdata()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDataSiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil ', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/pengangkatan');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/pengangkatan');
            exit;
        }
    }


    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDataSiswa($id) > 0) {
            Flasher::setFlash('Berhasil ', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/pengangkatan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/pengangkatan');
            exit;
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailSiswa($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataSiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil ', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/pengangkatan');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/pengangkatan');
            exit;
        }
    }


    // DATA INDUSTRI

    public function dataindustri()
    {

        $data['judul'] = 'Data industri Siswa';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        $data['dta'] = $this->model("$this->model_name", 'pkl_model')->getExistSiswaind();
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/dataindustri/pkldataindustri', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru' || $data['user']['hak_akses'] == 'kabeng') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/guru/pkl/rekap/dataindustri/pkldataindustri', $data);
            $this->view('templates/humas/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambahdataiind()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDataind($_POST) > 0) {
            Flasher::setFlash('Berhasil ', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/dataindustri');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/dataindustri');
            exit;
        }
    }

    public function hapusind($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDataind($id) > 0) {
            Flasher::setFlash('Berhasil ', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/dataindustri');
            exit;
        } else {

            Flasher::setFlash('gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/dataindustri');
            exit;
        }
    }

    public function getUbahind()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailind($_POST['id']));
    }

    public function ubahind()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataind($_POST) > 0) {
            Flasher::setFlash('Berhasil ', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/dataindustri');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/dataindustri');
            exit;
        }
    }

    public function monitoring()
    {

        $data['judul'] = 'Data Tempat';
        $data['user'] = $this->user;
        $data['mp'] = $this->model("$this->model_name", 'pkl_model')->getExistSiswaMON();
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/prakerin/monitoring/pklmonitoring', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru' || $data['user']['hak_akses'] == 'kabeng') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/guru/pkl/prakerin/monitoring/pklmonitoring', $data);
            $this->view('templates/humas/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambahdataMonitoring()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDataMON($_POST) > 0) {
            Flasher::setFlash('Berhasil ', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/monitoring');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/monitoring');
            exit;
        }
    }


    public function hapusdatamonitoring($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDataMON($id) > 0) {
            Flasher::setFlash('Berhasil ', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/monitoring');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/monitoring');
            exit;
        }
    }


    public function getUbahmonitoring()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailMON($_POST['id']));
    }

    public function ubahDTAMonitoring()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataMON($_POST) > 0) {
            Flasher::setFlash('Berhasil ', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/monitoring');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/monitoring');
            exit;
        }
    }


    // PEMBEKALAN PKL

    public function pembekalan()
    {

        $data['judul'] = 'Data Pembekalan';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        $data['pbb'] = $this->model("$this->model_name", 'pkl_model')->getExistSiswaPB();
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/pembekalan/pklpembekalan', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru' || $data['user']['hak_akses'] == 'kabeng') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/guru/pkl/pembekalan/pklpembekalan', $data);
            $this->view('templates/humas/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambahdataPB()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDataPB($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/pklpembekalan');
            exit;
        } else {

            Flasher::setFlash('gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/pklpembekalan');
            exit;
        }
    }


    public function hapusdataPB($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDataPB($id) > 0) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/pklpembekalan');
            exit;
        } else {

            Flasher::setFlash('gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/pklpembekalan');
            exit;
        }
    }


    public function getUbahPB()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailPB($_POST['id']));
    }

    public function ubahDTAPB()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataPB($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/pklpembekalan');
            exit;
        } else {

            Flasher::setFlash('gagal', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/pklpembekalan');
            exit;
        }
    }


    public function dtampung()
    {

        $data['judul'] = 'Data Tampung';
        $data['user'] = $this->user;
        $data['kompkeahlian'] = $this->model("Master", 'Kompkeahlian_model')->getAllExistData();
        $akses = ['all', 'humas'];
        $data['pd'] = $this->model("$this->model_name", 'pkl_model')->getExistSiswaDP();
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/dayatampung/pkldayatampung', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru' || $data['user']['hak_akses'] == 'kabeng') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/guru/pkl/dayatampung/pkldayatampung', $data);
            $this->view('templates/humas/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function TambahDTAPD()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDataDP($_POST) > 0) {
            Flasher::setFlash('Berhasil ', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/dtampung');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/dtampung');
            exit;
        }
    }


    public function HapusDataPD($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDataDP($id) > 0) {
            Flasher::setFlash('Berhasil ', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/dayatampung');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/dayatampung');
            exit;
        }
    }

    public function getUbahPD()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailDP($_POST['id']));
    }

    public function ubahDTAPD()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataDP($_POST) > 0) {
            Flasher::setFlash('Berhasil ', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/dayatampung');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/dayatampung');
            exit;
        }
    }

    public function perpanjang()
    {

        $data['judul'] = 'Data industri Siswa';
        $data['user'] = $this->user;
        $data['pp'] = $this->model("$this->model_name", 'pkl_model')->getExistSiswaPP();
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/perpanjang/pklperpanjangmasa', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru' || $data['user']['hak_akses'] == 'kabeng') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/guru/pkl/rekap/perpanjang/pklperpanjangmasa', $data);
            $this->view('templates/humas/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function TambahDTAPP()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDataPP($_POST) > 0) {
            Flasher::setFlash('Berhasil ', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/perpanjang/pklperpanjangmasa');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/perpanjang/pklperpanjangmasa');
            exit;
        }
    }


    public function HapusDataPP($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDataPP($id) > 0) {
            Flasher::setFlash('Berhasil ', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/perpanjang/pklperpanjangmasa');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/perpanjang/pklperpanjangmasa');
            exit;
        }
    }


    public function getUbahPP()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailPP($_POST['id']));
    }

    public function ubahDTAPP()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataPP($_POST) > 0) {
            Flasher::setFlash('Berhasil ', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/perpanjang/pklperpanjangmasa');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/perpanjang/pklperpanjangmasa');
            exit;
        }
    }



    // perizinanpkl

    public function perizinan()
    {

        $data['judul'] = 'Izin PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        $data['iz'] = $this->model("$this->model_name", 'pkl_model')->getExistSiswaIZ();
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/perizinanpkl/pklperizinan', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru' || $data['user']['hak_akses'] == 'kabeng') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/guru/pkl/rekap/perizinanpkl/pklperizinan', $data);
            $this->view('templates/humas/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function TambahDTAIZ()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDataIZ($_POST) > 0) {
            Flasher::setFlash('Berhasil ', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/perizinan');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/perizinan');
            exit;
        }
    }

    public function HapusDTIZ($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDataIZ($id) > 0) {
            Flasher::setFlash('Berhasil ', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/perizinan');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/perizinan');
            exit;
        }
    }

    public function getUbahIZ()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailIZ($_POST['id']));
    }

    public function ubahDTAIZ()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataIZ($_POST) > 0) {
            Flasher::setFlash('Berhasil ', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/perizinan');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/perizinan');
            exit;
        }
    }


    // SISWA BERMASALAH

    public function siswabermasalah()
    {

        $data['judul'] = 'Data industri Siswa';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        $data['bm'] = $this->model("$this->model_name", 'pkl_model')->getExistSiswaBM();
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/siswabermasalah/pklsiswabermasalah', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['role'] == 'guru' || $data['user']['hak_akses'] == 'kabeng') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/guru/pkl/rekap/siswabermasalah/pklsiswabermasalah', $data);
            $this->view('templates/humas/footer');
        } else {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambahdatabm()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDataBM($_POST) > 0) {
            Flasher::setFlash('Berhasil ', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/siswabermasalah');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/siswabermasalah');
            exit;
        }
    }


    public function hapusbm($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDataBM($id) > 0) {
            Flasher::setFlash('Berhasil ', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/siswabermasalah');
            exit;
        } else {

            Flasher::setFlash('gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/siswabermasalah');
            exit;
        }
    }


    public function getUbahbm()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailBM($_POST['id']));
    }

    public function ubahbm()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataBM($_POST) > 0) {
            Flasher::setFlash('Berhasil ', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/siswabermasalah');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/siswabermasalah');
            exit;
        }
    }


    // IMPORT DATA

    public function importDatasiswa()
    {
        if (!empty($_FILES['file']['name'])) {
            if ($this->model("$this->model_name", "BKK_model")->importDatasiswa($_POST) > 0) {
                Flasher::setFlash('BERHASIL', 'Diimport', 'success');
            } else {
                Flasher::setFlash('GAGAL', 'Diimport', 'danger');
            }
        } else {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pengangkatan");
        exit;
    }

    public function importDataind()
    {
        if (!empty($_FILES['file']['name'])) {
            if ($this->model("$this->model_name", "BKK_model")->importDataind($_POST) > 0) {
                Flasher::setFlash('BERHASIL', 'Diimport', 'success');
            } else {
                Flasher::setFlash('GAGAL', 'Diimport', 'danger');
            }
        } else {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/dataindustri");
        exit;
    }


    public function importDatatp()
    {
        if (!empty($_FILES['file']['name'])) {
            if ($this->model("$this->model_name", "BKK_model")->importDatatp($_POST) > 0) {
                Flasher::setFlash('BERHASIL', 'Diimport', 'success');
            } else {
                Flasher::setFlash('GAGAL', 'Diimport', 'danger');
            }
        } else {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pengangkatan");
        exit;
    }


    public function importDatamon()
    {
        if (!empty($_FILES['file']['name'])) {
            if ($this->model("$this->model_name", "BKK_model")->importDatamon($_POST) > 0) {
                Flasher::setFlash('BERHASIL', 'Diimport', 'success');
            } else {
                Flasher::setFlash('GAGAL', 'Diimport', 'danger');
            }
        } else {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/monitoring");
        exit;
    }

    public function importDatapb()
    {
        if (!empty($_FILES['file']['name'])) {
            if ($this->model("$this->model_name", "BKK_model")->importDatapb($_POST) > 0) {
                Flasher::setFlash('BERHASIL', 'Diimport', 'success');
            } else {
                Flasher::setFlash('GAGAL', 'Diimport', 'danger');
            }
        } else {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklpembekalan");
        exit;
    }

    public function importDatadp()
    {
        if (!empty($_FILES['file']['name'])) {
            if ($this->model("$this->model_name", "BKK_model")->importDatadp($_POST) > 0) {
                Flasher::setFlash('BERHASIL', 'Diimport', 'success');
            } else {
                Flasher::setFlash('GAGAL', 'Diimport', 'danger');
            }
        } else {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatan");
        exit;
    }


    public function importDatapp()
    {
        if (!empty($_FILES['file']['name'])) {
            if ($this->model("$this->model_name", "BKK_model")->importDatapp($_POST) > 0) {
                Flasher::setFlash('BERHASIL', 'Diimport', 'success');
            } else {
                Flasher::setFlash('GAGAL', 'Diimport', 'danger');
            }
        } else {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/dataindustri");
        exit;
    }


    public function importDataiz()
    {
        if (!empty($_FILES['file']['name'])) {
            if ($this->model("$this->model_name", "BKK_model")->importDataiz($_POST) > 0) {
                Flasher::setFlash('BERHASIL', 'Diimport', 'success');
            } else {
                Flasher::setFlash('GAGAL', 'Diimport', 'danger');
            }
        } else {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/perizinan");
        exit;
    }

    public function importDatabm()
    {
        if (!empty($_FILES['file']['name'])) {
            if ($this->model("$this->model_name", "BKK_model")->importDatabm($_POST) > 0) {
                Flasher::setFlash('BERHASIL', 'Diimport', 'success');
            } else {
                Flasher::setFlash('GAGAL', 'Diimport', 'danger');
            }
        } else {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/siswabermasalah");
        exit;
    }

    public function importDataania()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataania($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaiania");
        exit;
    }
    public function importDataanib()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataanib($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaianib");
        exit;
    }
    public function importDataanic()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataanic($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaianic");
        exit;
    }
    public function importDatadkva()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatadkva($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/nilai/pklnilaidkva");
        exit;
    }
    public function importDatadkvb()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatadkvb($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaidkvb");
        exit;
    }
    public function importDatadkvc()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatadkvc($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaidkvc");
        exit;
    }
    public function importDatatla()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatatla($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaitla");
        exit;
    }
    public function importDatatlb()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatatlb($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaitlb");
        exit;
    }
    public function importDatatma()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatatma($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaitma");
        exit;
    }
    public function importDatatmb()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatatmb($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaitmb");
        exit;
    }
    public function importDatarpla()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatarpla($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilairpla");
        exit;
    }
    public function importDatarplb()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatarplb($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilairplb");
        exit;
    }
    public function importDatarplc()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatarplc($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilairplc");
        exit;
    }
    public function importDatadgb()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatadgb($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaidgb");
        exit;
    }
    public function importDatadgc()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatadgc($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaidgc");
        exit;
    }
    public function importDatadgd()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatadgd($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaidgd");
        exit;
    }
    public function importDatapda()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatapda($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaipda");
        exit;
    }
    public function importDatapdb()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatapdb($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaipdb");
        exit;
    }
    public function importDatapdc()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatapdc($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaipdc");
        exit;
    }
    public function importDatapdd()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatapdd($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaipdd");
        exit;
    }
    public function importDatatga()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatatga($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaitga");
        exit;
    }
    public function importDatatkja()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatatkjb($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaitkja");
        exit;
    }
    public function importDatatkjb()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatatkjb($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaitkjb");
        exit;
    }
    public function importDatapha()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDatapha($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaipha");
        exit;
    }
    public function importDataphb()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataphb($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklnilaiphb");
        exit;
    }

    public function importDataPNDGA()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatandga");
        exit;
    }
    public function importDataPNDGB()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatadgb");
        exit;
    }
    public function importDataPNDGC()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatandgc");
        exit;
    }
    public function importDataPNDGD()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatandgd");
        exit;
    }
    public function importDataPNPDA()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatanpda");
        exit;
    }
    public function importDataPNPDB()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatanpdb");
        exit;
    }
    public function importDataPNPDC()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatanpdc");
        exit;
    }
    public function importDataPNPDD()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatanpdd");
        exit;
    }
    public function importDataPNTKJA()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatantkja");
        exit;
    }
    public function importDataPNTKJB()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatantkjb");
        exit;
    }
    public function importDataPNANIA()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatanania");
        exit;
    }
    public function importDataPNANIB()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatananib");
        exit;
    }
    public function importDataPNANIC()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatananic");
        exit;
    }
    public function importDataPNDKVA()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatandkva");
        exit;
    }
    public function importDataPNDKVB()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatandkvb");
        exit;
    }
    public function importDataPNDKVC()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatandkvc");
        exit;
    }
    public function importDataPNTLA()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatantla");
        exit;
    }
    public function importDataPNTLB()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatantlb");
        exit;
    }
    public function importDataPNMEKAA()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatantma");
        exit;
    }
    public function importDataPNMEKAB()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatanptmb");
        exit;
    }
    public function importDataPNPHA()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatanpha");
        exit;
    }
    public function importDataPNPHB()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatanphb");
        exit;
    }
    public function importDataPNRPLA()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatanrpla");
        exit;
    }
    public function importDataPNRPLB()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatanprplb");
        exit;
    }
    public function importDataPNRPLC()
    {
        if ($this->model("$this->model_name", "PKL_model")->importDataPenempatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatanrplc");
        exit;
    }
}
