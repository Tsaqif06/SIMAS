<?php
class pengajuanBarang extends Controller
{
    public $model_name = "Sarpras";

    public function index()
    {
        $data['judul'] = 'Data Pengajuan Barang';
        $data['user'] = $this->user;
        $akses = ['all', 'sarpras'];
        $data['pengajuan_barang'] = $this->model("$this->model_name", 'pengajuanJurusan_models')->getALLDataPengajuanJurusan();
        $data['pengajuan_barang'] = $this->model("$this->model_name", 'pengajuanMapel_models')->getALLDataPengajuanMapel();
        $data['pengajuan_barang'] = $this->model("$this->model_name", 'pengajuanBidang_models')->getALLDataPengajuanBidang();
        $data['pengajuan_barang'] = $this->model("$this->model_name", 'pengajuanWaka_models')->getALLDataPengajuanWaka();

        // if (in_array($data['user']['hak_akses'], $akses)) {
        //     if (isset($_POST["contentOnly"])) {
        //         $this->view('sarpras/pengajuanBarang/index', $data);
        //     } else {
        //         $this->view('templates/header', $data);
        //         $this->view('sarpras/pengajuanBarang/index', $data);
        //         $this->view('templates/footer');
        //     }
        // } else if ($data['user']['hak_akses'] == '') {
        //     if (isset($_POST["contentOnly"])) {
        //         $this->view('sarpras/pengajuanBarang/form', $data);
        //     } else {
        //         $this->view('templates/header', $data);
        //         $this->view('sarpras/pengajuanBarang/form', $data);
        //         $this->view('templates/footer');
        //     }
        // }


        if (isset($_POST["contentOnly"])) {
            $this->view('sarpras/pengajuanBarang/index', $data);
        } else {
            $this->view('templates/header', $data);
            $this->view('sarpras/pengajuanBarang/index', $data);
            $this->view('templates/footer');
        }
    }

    public function jurusan($id)
    {
        $data['judul'] = 'Pengajuan Barang Jurusan';
        $data['pengajuan_barang'] = $this->model("$this->model_name", 'pengajuanBidang_models')->getKegiatanById($id);
        $this->view('templates/header', $data);
        $this->view('pengajuanBarang/jurusan', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model("$this->model_name", 'pengajuanBidang_models')->tambahDataPengajuanBidang($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pengajuanBidang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pengajuanBidang');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("$this->model_name", 'pengajuanBidang_models')->hapusDataPengajuanBidang($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pengajuanBidang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pengajuanBidang');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model("$this->model_name", 'pengajuanBidang_models')->getDataPengajuanBidangById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("$this->model_name", 'pengajuanBidang_models')->ubahDataPengajuanBidang($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pengajuanBidang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pengajuanBidang');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Cari Daftar Pengajuan Bidang';
        $data['pengajuanBidang'] = $this->model("$this->model_name", 'pengajuanBidang_models')->cariDataPengajuanBidang();
        $this->view('templates/header', $data);
        $this->view('pengajuanBidang/index', $data);
        $this->view('templates/footer');
    }

    //controller pengajuan jurusan
    public function tambahJurusan()
    {
        if ($this->model("$this->model_name", 'pengajuanJurusan_models')->tambahDataPengajuanJurusan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pengajuanJurusan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pengajuanJurusan');
            exit;
        }
    }

    public function hapusJurusan($id)
    {
        if ($this->model("$this->model_name", 'pengajuanJurusan_models')->hapusDataPengajuanJurusan($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pengajuanJurusan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pengajuanJurusan');
            exit;
        }
    }

    public function getubahJurusan()
    {
        echo json_encode($this->model("$this->model_name", 'pengajuanJurusan_models')->getDataPengajuanJurusanById($_POST['id']));
    }

    public function ubahJurusan()
    {
        if ($this->model("$this->model_name", 'pengajuanJurusan_models')->ubahDataPengajuanJurusan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pengajuanJurusan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pengajuanJurusan');
            exit;
        }
    }

    public function cariJurusan()
    {
        $data['judul'] = 'Cari Daftar Pengajuan Jurusan';
        $data['pengajuanJurusan'] = $this->model("$this->model_name", 'pengajuanJurusan_models')->cariDataPengajuanJurusan();
        $this->view('templates/header', $data);
        $this->view('pengajuanJurusan/index', $data);
        $this->view('templates/footer');
    }

    //controller pengajuan mapel
    public function tambahMapel()
    {
        if ($this->model("$this->model_name", 'pengajuanMapel_models')->tambahDataPengajuanMapel($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pengajuanMapel');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pengajuanMapel');
            exit;
        }
    }

    public function hapusMapel($id)
    {
        if ($this->model("$this->model_name", 'pengajuanMapel_models')->hapusDataPengajuanMapel($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pengajuanMapel');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pengajuanMapel');
            exit;
        }
    }

    public function getubahMapel()
    {
        echo json_encode($this->model("$this->model_name", 'pengajuanMapel_models')->getDataPengajuanMapelById($_POST['id']));
    }

    public function ubahMapel()
    {
        if ($this->model("$this->model_name", 'pengajuanMapel_models')->ubahDataPengajuanMapel($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pengajuanMapel');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pengajuanMapel');
            exit;
        }
    }

    public function cariMapel()
    {
        $data['judul'] = 'Cari Daftar Pengajuan Mapel';
        $data['pengajuanMapel'] = $this->model("$this->model_name", 'pengajuanMapel_models')->cariDataPengajuanMapel();
        $this->view('templates/header', $data);
        $this->view('pengajuanMapel/index', $data);
        $this->view('templates/footer');
    }

    //controllers pengajuan waka
    public function tambahWaka()
    {
        if ($this->model("$this->model_name", 'pengajuanWaka_models')->tambahDataPengajuanWaka($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pengajuanWaka');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pengajuanWaka');
            exit;
        }
    }

    public function hapusWaka($id)
    {
        if ($this->model("$this->model_name", 'pengajuanWaka_models')->hapusDataPengajuanWaka($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pengajuanWaka');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pengajuanWaka');
            exit;
        }
    }

    public function getubaWaka()
    {
        echo json_encode($this->model("$this->model_name", 'pengajuanWaka_models')->getDataPengajuanWakaById($_POST['id']));
    }

    public function ubahWaka()
    {
        if ($this->model("$this->model_name", 'pengajuanWaka_models')->ubahDataPengajuanWaka($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pengajuanWaka');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pengajuanWaka');
            exit;
        }
    }

    public function cariWaka()
    {
        $data['judul'] = 'Cari Daftar Pengajuan Waka';
        $data['pengajuanWaka'] = $this->model("$this->model_name", 'pengajuanWaka_models')->cariDataPengajuanWaka();
        $this->view('templates/header', $data);
        $this->view('pengajuanWaka/index', $data);
        $this->view('templates/footer');
    }
}
