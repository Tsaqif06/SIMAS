<?php

class BKK extends Controller
{
    public $model_name = "Humas";

    public function index()
    {
        $data['judul'] = 'Admin BKK';
        $data['subjudul'] = 'BKK';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('humas/bkk/home/index', $data);
            $this->view('templates/footerwm');
            $this->view('templates/header', $data);
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function loker()
    {
        $data['judul'] = 'Admin Lowongan Kerja';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        $data['siswa'] = $this->model("$this->model_name", 'BKK_model')->getExistloker();
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/loker/bkklokerlaporan', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function kebekerjaan()
    {
        $data['judul'] = 'Admin Kebekerjaan';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/kebekerjaan/bkkkebekerjaan');
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function lks()
    {
        $data['judul'] = 'Admin Kebekerjaan';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/kebekerjaan/bkkmodullembarkerja');
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function rundown()
    {
        $data['judul'] = 'Admin Kebekerjaan';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/kebekerjaan/bkkrundownsmkn4malang');
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function latihansoal()
    {
        $data['judul'] = 'Admin Kebekerjaan';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/kebekerjaan/bkkmodulsmkn4malang');
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function soalps()
    {
        $data['judul'] = 'Admin Kebekerjaan';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/kebekerjaan/bkkmodulpapikostick');
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function soalps3()
    {
        $data['judul'] = 'Admin Kebekerjaan';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/kebekerjaan/bkkmodulpapikostick003');
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function gambarskrep()
    {
        $data['judul'] = 'Admin Kebekerjaan';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/kebekerjaan/bkkmodulgambarnskrepline');
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function wawancara()
    {
        $data['judul'] = 'Admin Kebekerjaan';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/kebekerjaan/bkkmodultestwawancara');
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function tesiu()
    {
        $data['judul'] = 'Admin Kebekerjaan';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/kebekerjaan/bkkmodultiu');
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function laporanp5()
    {
        $data['judul'] = 'Admin Kebekerjaan';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/kebekerjaan/bkkmodullaporanp5kebekerjaan');
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function peminatan()
    {
        $data['judul'] = 'Admin Peminatan';
        $data['siswa'] = $this->model("$this->model_name", 'BKK_model')->getExistpeminatan();
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
        } else if ($data['user']['hak_akses'] == '') {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/peminatan/bkkpeminatanlaporan', $data);
            $this->view('templates/footer');
        } else {
        }
    }

    public function lomba()
    {
        $data['judul'] = 'Admin Lomba';
        $data['siswa'] = $this->model("$this->model_name", 'BKK_model')->getExistlomba();
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/lomba/bkklombalaporan', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function spw()
    {
        $data['judul'] = 'Admin SPW';
        $data['siswa'] = $this->model("$this->model_name", 'BKK_model')->getExistspw();
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/spw/bkkspwlaporan', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function mou()
    {
        $data['judul'] = 'Admin MoU';
        $data['siswa'] = $this->model("$this->model_name", 'BKK_model')->getExistmou();
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/mou/bkkmou', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function das()
    {
        $data['judul'] = 'Admin Daftar Alumni Sukses';
        $data['user'] = $this->user;
        $data['siswa'] = $this->model("$this->model_name", 'BKK_model')->getExistdas();
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/das/bkkalumnisukseslaporan', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function workshop()
    {
        $data['judul'] = 'Admin Workshop';
        $data['user'] = $this->user;
        $data['siswa'] = $this->model("$this->model_name", 'BKK_model')->getExistworkshop();
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/workshop/bkkworkshoplaporan', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function rekrutmenIndustri()
    {
        $data['judul'] = 'Admin Rekrutmen Industri';
        $data['user'] = $this->user;
        $data['siswa'] = $this->model("$this->model_name", 'BKK_model')->getExistloker();
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/bkk/loker/rekrutmenIndustri', $data);
            $this->view('templates/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambahdas()
    {
        if ($this->model("$this->model_name", 'BKK_model')->tambahDataBKKdas($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/bkk/das');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/bkk/das');
            exit;
        }
    }

    public function tambahlomba()
    {
        if ($this->model("$this->model_name", 'BKK_model')->tambahDataBKKlomba($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/bkk/lomba');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/bkk/lomba');
            exit;
        }
    }

    public function tambahpeminatan()
    {
        if ($this->model("$this->model_name", 'BKK_model')->tambahDataBKKpeminatan($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/bkk/peminatan');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/bkk/peminatan');
            exit;
        }
    }

    public function tambahworkshop()
    {
        if ($this->model("$this->model_name", 'BKK_model')->tambahDataBKKworkshop($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/bkk/workshop');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/bkk/workshop');
            exit;
        }
    }

    public function tambahspw()
    {
        if ($this->model("$this->model_name", 'BKK_model')->tambahDataBKKspw($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/bkk/spw');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/bkk/spw');
            exit;
        }
    }

    public function tambahrekrut()
    {
        if ($this->model("$this->model_name", 'BKK_model')->tambahDataBKKrekrutindustri($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/bkk/loker/rekrutmenIndustri');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/bkk/loker/rekrutmenIndustri');
            exit;
        }
    }

    public function tambahloker()
    {
        if ($this->model("$this->model_name", 'BKK_model')->tambahDataBKKloker($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/bkk/loker');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/bkk/loker');
            exit;
        }
    }

    public function tambahmou()
    {
        if ($this->model("$this->model_name", 'BKK_model')->tambahDataBKKmou($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/bkk/mou');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/bkk/mou');
            exit;
        }
    }

    public function hapusdas($id)
    {
        if ($this->model("$this->model_name", 'BKK_model')->hapusDataBKKdas($id) > 0) {
            Flasher::setFlash('berhasil ', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/bkk/das');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/bkk/das');
            exit;
        }
    }

    public function hapuspeminatan($id)
    {
        if ($this->model("$this->model_name", 'BKK_model')->hapusDataBKKpeminatan($id) > 0) {
            Flasher::setFlash('berhasil ', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/bkk/peminatan');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/bkk/peminatan');
            exit;
        }
    }

    public function hapusmou($id)
    {
        if ($this->model("$this->model_name", 'BKK_model')->hapusDataBKKmou($id) > 0) {
            Flasher::setFlash('berhasil ', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/bkk/mou');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/bkk/mou');
            exit;
        }
    }

    public function hapusspw($id)
    {
        if ($this->model("$this->model_name", 'BKK_model')->hapusDataBKKspw($id) > 0) {
            Flasher::setFlash('berhasil ', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/bkk/spw');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/bkk/spw');
            exit;
        }
    }

    public function hapusworkshop($id)
    {
        if ($this->model("$this->model_name", 'BKK_model')->hapusDataBKKworkshop($id) > 0) {
            Flasher::setFlash('berhasil ', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/bkk/workshop');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/bkk/workshop');
            exit;
        }
    }

    public function hapusrekrut($id)
    {
        if ($this->model("$this->model_name", 'BKK_model')->hapusDataBKKrekrut($id) > 0) {
            Flasher::setFlash('berhasil ', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/bkk/kebekerjaan');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/bkk/kebekerjaan');
            exit;
        }
    }

    public function hapuslomba($id)
    {
        if ($this->model("$this->model_name", 'BKK_model')->hapusDataBKKlomba($id) > 0) {
            Flasher::setFlash('berhasil ', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/bkk/lomba');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/bkk/lomba');
            exit;
        }
    }

    public function hapusloker($id)
    {
        if ($this->model("$this->model_name", 'BKK_model')->hapusDataBKKloker($id) > 0) {
            Flasher::setFlash('berhasil ', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/bkk/loker');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/bkk/loker');
            exit;
        }
    }

    public function ubahdas()
    {
        if ($this->model("$this->model_name", 'BKK_model')->ubahDataBKKdas($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal ', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/bkk/das');
        exit;
    }

    public function getUbahDas()
    {
        echo json_encode($this->model("$this->model_name", 'BKK_model')->getBKKdasById($_POST['id']));
    }

    public function ubahpeminatan()
    {
        if ($this->model("$this->model_name", 'BKK_model')->ubahDataBKKpeminatan($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal ', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/bkk/peminatan');
        exit;
    }

    public function getUbahPeminatan()
    {
        echo json_encode($this->model("$this->model_name", 'BKK_model')->getBKKpeminatanById($_POST['id']));
    }

    public function ubahspw()
    {
        if ($this->model("$this->model_name", 'BKK_model')->ubahDataBKKspw($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal ', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/bkk/spw');
        exit;
    }

    public function getUbahSpw()
    {
        echo json_encode($this->model("$this->model_name", 'BKK_model')->getBKKspwById($_POST['id']));
    }

    public function ubahrekrut()
    {
        if ($this->model("$this->model_name", 'BKK_model')->ubahDataBKKrekrut($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal ', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/bkk/kebekerjaan');
        exit;
    }

    public function getUbahRekrut()
    {
        echo json_encode($this->model("$this->model_name", 'BKK_model')->getBKKrekrutById($_POST['id']));
    }

    public function ubahworkshop()
    {
        if ($this->model("$this->model_name", 'BKK_model')->ubahDataBKKworkshop($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal ', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/bkk/workshop');
        exit;
    }

    public function getUbahWorkshop()
    {
        echo json_encode($this->model("$this->model_name", 'BKK_model')->getBKKworkshopById($_POST['id']));
    }

    public function ubahmou()
    {
        if ($this->model("$this->model_name", 'BKK_model')->ubahDataBKKmou($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal ', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/bkk/mou');
        exit;
    }

    public function getUbahMou()
    {
        echo json_encode($this->model("$this->model_name", 'BKK_model')->getBKKmouById($_POST['id']));
    }

    public function ubahloker()
    {
        if ($this->model("$this->model_name", 'BKK_model')->ubahDataBKKloker($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal ', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/bkk/loker');
        exit;
    }

    public function getUbahLoker()
    {
        echo json_encode($this->model("$this->model_name", 'BKK_model')->getBKKlokerById($_POST['id']));
    }

    public function ubahlomba()
    {
        if ($this->model("$this->model_name", 'BKK_model')->ubahDataBKKlomba($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal ', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/bkk/lomba');
        exit;
    }

    public function getUbahLomba()
    {
        echo json_encode($this->model("$this->model_name", 'BKK_model')->getBKKlombaById($_POST['id']));
    }


    // IMPORTDATA

    public function importDatadas()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDatadas($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/bkk/das");
        exit;
    }

    public function importDatalomba()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDatalomba($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/bkk/lomba");
        exit;
    }

    public function importDatapeminatan()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDatapeminatan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/bkk/peminatan");
        exit;
    }

    public function importDataloker()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDataloker($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/bkk/loker");
        exit;
    }

    public function importDataspw()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDataspw($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/bkk/spw");
        exit;
    }

    public function importDataworkshop()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDataworkshop($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/bkk/workshop");
        exit;
    }

    public function importDatamou()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDatamou($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/bkk/mou");
        exit;
    }
}
