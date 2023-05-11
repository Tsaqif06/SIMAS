<?php

class PKL extends Controller
{
    public $model_name = "Humas";

    public function index()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/home/pkl', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function rekap()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/home/pklrekapitulasi');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function penempatan()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/home/pkldatapenempatan');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatanania()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/animasi/pkldpania');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatananib()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/animasi/pkldpanib');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatananic()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/animasi/pkldpanic');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatandkva()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/dkv/pkldpdkva');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatandkvb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/dkv/pkldpdkvb');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatandkvc()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/dkv/pkldpdkvc');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatanloga()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/logistik/pkldptla');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatanlogb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/logistik/pkldptlb');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatanmekaa()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/mekatronika/pkldptma');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatanmekab()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/mekatronika/pkldptmb');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatanpha()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/perhotelan/pkldppha');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatanphb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/perhotelan/pkldpphb');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatanrpla()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/rpl/pkldprpla');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatanrplb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/rpl/pkldprplb');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatanrplc()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/rpl/pkldprplc');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatandga()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tg/pkldatapenempatantg');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatandgb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tg/pkldpdgb');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatandgc()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tg/pkldpdgc');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatandgd()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tg/pkldpdgd');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatanpda()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tg/pkldppda');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatanpdb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tg/pkldppdb');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatanpdc()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tg/pkldppdc');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatanpdd()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tg/pkldppdd');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatantkja()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tkj/pkldptkja');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function penempatantkjb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tkj/pkldptkjb');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilai()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/home/pklnilai', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaidga()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/tg/pklnillaitga', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaidgb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/tg/pklnilaidgb');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaidgc()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/tg/pklnilaidgc');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaidgd()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/tg/pklnilaidgd');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaipda()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/tg/pklnilaipda');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaipdb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/tg/pklnilaipdb');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaipdc()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/tg/pklnilaipdc');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaipdd()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/tg/pklnilaipdd');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaiania()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/animasi/pklnilaiania');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaianib()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/animasi/pklnilaianib');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaianic()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/animasi/pklnilaianic');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaidkva()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/dkv/pklnilaidkva');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaidkvb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/dkv/pklnilaidkvb');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaidkvc()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/dkv/pklnilaidkvc');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilailoga()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/logistik/pklnilaitla');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilailogb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/logistik/pklnilaitlb');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaimekaa()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/mekatronika/pklnilaitma');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaimekab()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/mekatronika/pklnilaitmb');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaipha()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/perhotelan/pklnilaipha');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaiphb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/perhotelan/pklnilaiphb');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilairpla()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/rpl/pklnilairpla');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilairplb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/rpl/pklnilairplb');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilairplc()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/rpl/pklnilairplc');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaitkja()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/tkj/pklnilaitkja');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaitkjb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/nilai/tkj/pklnilaitkjb');
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function pemberkasan()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $data['siswa'] = $this->model("$this->model_name", 'PKL_model')->getExistSiswaPS();
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/pemberkasan/pklpemberkasanlaporan', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambahpemberkasan()
    {
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
        if ($this->model("$this->model_name", 'PKL_model')->ubahDataPS($_POST) > 0) {
            Flasher::setFlash('berhasil ', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal ', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/pkl/pemberkasan');
        exit;
    }

    public function getUbahPemberkasan()
    {
        // echo json_encode($this->model("$this->model_name", 'PKL_model')->getDetailPS($_POST['id']));
        echo json_encode($this->model("$this->model_name", 'PKL_model')->getDetailPS($_POST['id']));
    }
    public function prakerin()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/prakerin/pklprakerin', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
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
            $this->view('templates/header', $data);
            $this->view('humas/pkl/prakerin/pemberangkatan/pklpemberangkatan', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
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
            $this->view('templates/header', $data);
            $this->view('humas/pkl/prakerin/penjemputan/pklpenjemputan', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    //     // siswapegawai
    public function pengangkatan()
    {

        $data['judul'] = 'Siswa Pegawai';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $data['pg'] = $this->model("$this->model_name", 'pkl_model')->getSiswaPegawai();
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/magang/pklpengangkatansiswa', $data);
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
        $this->view('templates/footerwm');
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




    // dataindustri
    public function dataindustri()
    {

        $data['judul'] = 'Data industri Siswa';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        $data['dta'] = $this->model("$this->model_name", 'pkl_model')->getSiswaind();
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/dataindustri/pkldataindustri', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
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
        $data['mp'] = $this->model("$this->model_name", 'pkl_model')->getSiswaMON();
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/prakerin/monitoring/pklmonitoring', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
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




    // pembekalanpkl
    public function pembekalan()
    {

        $data['judul'] = 'Data Tempat';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        $data['pbb'] = $this->model("$this->model_name", 'pkl_model')->getSiswaPB();
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/pembekalan/pklpembekalan', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
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
        $akses = ['all', 'humas'];
        $data['pd'] = $this->model("$this->model_name", 'pkl_model')->getSiswaDP();
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/dayatampung/pkldayatampung', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function TambahDTAPD()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDataDP($_POST) > 0) {
            Flasher::setFlash('Berhasil ', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/dayatampung');
            exit;
        } else {

            Flasher::setFlash('gagal ', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/dayatampung');
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
        $data['pp'] = $this->model("$this->model_name", 'pkl_model')->getSiswaPP();
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/perpanjang/pklperpanjangmasa', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
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
        $data['iz'] = $this->model("$this->model_name", 'pkl_model')->getSiswaIZ();
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/perizinanpkl/pklperizinan', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
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


    // Siswa Bermasalah

    public function siswabermasalah()
    {

        $data['judul'] = 'Data industri Siswa';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        $data['bm'] = $this->model("$this->model_name", 'pkl_model')->getSiswaBM();
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/header', $data);
            $this->view('humas/pkl/rekap/siswabermasalah/pklsiswabermasalah', $data);
            $this->view('templates/footerwm');
        } else if ($data['user']['hak_akses'] == '') {
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

    public function importDatasiswa()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDatasiswa($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pengangkatan");
        exit;
    }

    public function importDataind()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDataind($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/dataindustri");
        exit;
    }


    public function importDatatp()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDatatp($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pengangkatan");
        exit;
    }


    public function importDatamon()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDatamon($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/monitoring");
        exit;
    }

    public function importDatapb()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDatapb($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pklpembekalan");
        exit;
    }

    public function importDatapemberkasan()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDatapemberkasan($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/pemberkasan");
        exit;
    }


    public function importDatadp()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDatadp($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/penempatan");
        exit;
    }


    public function importDatapp()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDatapp($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/dataindustri");
        exit;
    }


    public function importDataiz()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDataiz($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/perizinan");
        exit;
    }

    public function importDatabm()
    {
        if ($this->model("$this->model_name", "BKK_model")->importDatabm($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diimport', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diimport', 'danger');
        }
        header("Location: " . BASEURL . "/pkl/siswabermasalah");
        exit;
    }
}