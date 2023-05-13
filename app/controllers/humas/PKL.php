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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/home/pkl', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
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
        $data['jmldp'] = $this->model('Humas', 'PKL_model')->getJmlDatadp()['count'];
        $data['jmltable'] = $this->model('Humas', 'PKL_model')->getJmlDatatable()['count'];
        $data['jmlbm'] = $this->model('Humas', 'PKL_model')->getJmlDatabm()['count'];
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/home/pklrekapitulasi', $data);
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/home/pkldatapenempatan');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/animasi/pkldpania');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/animasi/pkldpanib');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/animasi/pkldpanic');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/dkv/pkldpdkva');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/dkv/pkldpdkvb');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/dkv/pkldpdkvc');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/logistik/pkldptla');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/logistik/pkldptlb');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/mekatronika/pkldptma');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/mekatronika/pkldptmb');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/perhotelan/pkldppha');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/perhotelan/pkldpphb');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/rpl/pkldprpla');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/rpl/pkldprplb');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/rpl/pkldprplc');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tg/pkldatapenempatantg');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tg/pkldpdgb');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tg/pkldpdgc');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tg/pkldpdgd');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tg/pkldppda');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tg/pkldppdb');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tg/pkldppdc');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tg/pkldppdd');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tkj/pkldptkja');
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/penempatan/tkj/pkldptkjb');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilai()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/home/pklnilai', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaidga()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/tg/pklnillaitga', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaidgb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/tg/pklnilaidgb');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaidgc()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/tg/pklnilaidgc');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaidgd()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/tg/pklnilaidgd');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaipda()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/tg/pklnilaipda');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaipdb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/tg/pklnilaipdb');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaipdc()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/tg/pklnilaipdc');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaipdd()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/tg/pklnilaipdd');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaiania()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/animasi/pklnilaiania');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaianib()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/animasi/pklnilaianib');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaianic()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/animasi/pklnilaianic');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaidkva()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/dkv/pklnilaidkva');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaidkvb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/dkv/pklnilaidkvb');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaidkvc()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/dkv/pklnilaidkvc');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilailoga()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/logistik/pklnilaitla');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilailogb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/logistik/pklnilaitlb');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaimekaa()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/mekatronika/pklnilaitma');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaimekab()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/mekatronika/pklnilaitmb');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaipha()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/perhotelan/pklnilaipha');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaiphb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/perhotelan/pklnilaiphb');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilairpla()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/rpl/pklnilairpla');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilairplb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/rpl/pklnilairplb');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilairplc()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/rpl/pklnilairplc');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaitkja()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/tkj/pklnilaitkja');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
    public function nilaitkjb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $akses = ['all', 'humas', 'industri'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/nilai/tkj/pklnilaitkjb');
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }

    public function tambahDataPenempatanania()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanania');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanania');
            exit;
        }
    }

    public function getUbahPenempatanania()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatanania()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanania');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanania');
            exit;
        }
    }

    public function hapusDataPenempatanania($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanania');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanania');
            exit;
        }
    }


    public function tambahDataPenempatananib()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatananib');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatananib');
            exit;
        }
    }

    public function getUbahPenempatananib()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatananib()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatananib');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatananib');
            exit;
        }
    }

    public function hapusDataPenempatananib($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatananib');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatananib');
            exit;
        }
    }


    public function tambahDataPenempatananic()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatananic');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatananic');
            exit;
        }
    }

    public function getUbahPenempatananic()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatananic()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatananic');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatananic');
            exit;
        }
    }

    public function hapusDataPenempatananic($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatananic');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatananic');
            exit;
        }
    }

    public function tambahDataPenempatandkva()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandkva');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandkva');
            exit;
        }
    }

    public function getUbahPenempatandkva()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatandkva()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandkva');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandkva');
            exit;
        }
    }

    public function hapusDataPenempatandkva($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandkva');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandkva');
            exit;
        }
    }

    public function tambahDataPenempatandkvb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandkvb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandkvb');
            exit;
        }
    }

    public function getUbahPenempatandkvb()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatandkvb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandkvb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandkvb');
            exit;
        }
    }

    public function hapusDataPenempatandkvb($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandkvb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandkvb');
            exit;
        }
    }

    public function tambahDataPenempatandkvc()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandkvc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandkvc');
            exit;
        }
    }

    public function getUbahPenempatandkvc()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatandkvc()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandkvc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandkvc');
            exit;
        }
    }

    public function hapusDataPenempatandkvc($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandkvc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandkvc');
            exit;
        }
    }

    public function tambahDataPenempatantla()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatantla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatantla');
            exit;
        }
    }

    public function getUbahPenempatantla()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatantla()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatantla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatantla');
            exit;
        }
    }

    public function hapusDataPenempatantla($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatantla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatantla');
            exit;
        }
    }


    public function tambahDataPenempatantlb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatantlb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatantlb');
            exit;
        }
    }

    public function getUbahPenempatantlb()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatantlb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatantlb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatantlb');
            exit;
        }
    }

    public function hapusDataPenempatantlb($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatantlb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatantlb');
            exit;
        }
    }

    public function tambahDataPenempatanmekaa()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanmekaa');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanmekaa');
            exit;
        }
    }

    public function getUbahPenempatanmekaa()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatanmekaa()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanmekaa');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanmekaa');
            exit;
        }
    }

    public function tambahDataPenempatanmekab()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanmekab');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanmekab');
            exit;
        }
    }

    public function getUbahPenempatanmekab()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatanmekab()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanmekab');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanmekab');
            exit;
        }
    }

    public function hapusDataPenempatanmekab($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanmekab');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanmekab');
            exit;
        }
    }

    public function tambahDataPenempatanpha()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanpha');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanpha');
            exit;
        }
    }

    public function getUbahPenempatanpha()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatanpha()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanpha');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanpha');
            exit;
        }
    }

    public function hapusDataPenempatanpha($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanpha');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanpha');
            exit;
        }
    }

    public function tambahDataPenempatanphb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanphb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanphb');
            exit;
        }
    }

    public function getUbahPenempatanphb()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatanphb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanphb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanphb');
            exit;
        }
    }

    public function hapusDataPenempatanphb($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanphb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanphb');
            exit;
        }
    }

    public function tambahDataPenempatanrpla()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanrpla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanrpla');
            exit;
        }
    }

    public function getUbahPenempatanrpla()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatanrpla()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanrpla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanrpla');
            exit;
        }
    }

    public function hapusDataPenempatanrpla($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanrpla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanrpla');
            exit;
        }
    }

    public function tambahDataPenempatanrplb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanrplb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanrplb');
            exit;
        }
    }

    public function getUbahPenempatanrplb()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatanrplb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanrplb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanrplb');
            exit;
        }
    }

    public function hapusDataPenempatanrplb($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanrplb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanrplb');
            exit;
        }
    }

    public function tambahDataPenempatanrplc()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanrplc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanrplc');
            exit;
        }
    }

    public function getUbahPenempatanrplc()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatanrplc()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanrplc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanrplc');
            exit;
        }
    }

    public function hapusDataPenempatanrplc($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanrplc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanrplc');
            exit;
        }
    }

    public function tambahDataPenempatanDGA()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandga');
            exit;
        }
    }

    public function getUbahPenempatanDGA()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatanDGA()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandga');
            exit;
        }
    }

    public function hapusDataPenempatanDGA($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandga');
            exit;
        }
    }

    public function tambahDataPenempatanDGB()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandgb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandgb');
            exit;
        }
    }

    public function getUbahPenempatanDGB()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatanDGB()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandgb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandgb');
            exit;
        }
    }

    public function hapusDataPenempatanDGB($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandgb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandgb');
            exit;
        }
    }

    public function tambahDataPenempatanDGC()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandgc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandgc');
            exit;
        }
    }

    public function getUbahPenempatanDGC()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDatapenempatandgc()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandgc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandgc');
            exit;
        }
    }

    public function hapusDatapenempatandgc($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandgc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandgc');
            exit;
        }
    }

    public function tambahDataPenempatanDGD()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandgd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandgd');
            exit;
        }
    }

    public function getUbahPenempatanDGD()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDatapenempatandgd()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandgd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandgd');
            exit;
        }
    }

    public function hapusDatapenempatandgd($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatandgd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatandgd');
            exit;
        }
    }

    public function tambahDataPenempatanpda()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanpda');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanpda');
            exit;
        }
    }

    public function getUbahPenempatanpda()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDatapenempatanpda()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanpda');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanpda');
            exit;
        }
    }

    public function hapusDatapenempatanpda($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanpda');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanpda');
            exit;
        }
    }

    public function tambahDataPenempatanpdb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanpdb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanpdb');
            exit;
        }
    }

    public function getUbahPenempatanpdb()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDatapenempatanpdb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanpdb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanpdb');
            exit;
        }
    }

    public function hapusDatapenempatanpdb($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanpdb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanpdb');
            exit;
        }
    }

    public function tambahDataPenempatanpdc()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanpdc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanpdc');
            exit;
        }
    }

    public function getUbahPenempatanpdc()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDatapenempatanpdc()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanpdc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanpdc');
            exit;
        }
    }

    public function hapusDatapenempatanpdc($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanpdc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanpdc');
            exit;
        }
    }

    public function tambahDataPenempatanpdd()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanpdd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanpdd');
            exit;
        }
    }

    public function getUbahPenempatanpdd()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDatapenempatanpdd()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanpdd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanpdd');
            exit;
        }
    }

    public function hapusDatapenempatanpdd($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatanpdd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatanpdd');
            exit;
        }
    }

    public function tambahDataPenempatantkja()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatantkja');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatantkja');
            exit;
        }
    }

    public function getUbahPenempatantkja()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatantkja()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatantkja');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatantkja');
            exit;
        }
    }

    public function hapusDataPenempatantkja($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatantkja');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatantkja');
            exit;
        }
    }

    public function tambahDataPenempatantkjb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->TambahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatantkjb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatantkjb');
            exit;
        }
    }

    public function getUbahPenempatantkjb()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getDetailtp($_POST['id']));
    }

    public function ubahDataPenempatantkjb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDatatp($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatantkjb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatantkjb');
            exit;
        }
    }

    public function hapusDataPenempatantkjb($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->HapusDatatp($id) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/penempatantkjb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/penempatantkjb');
            exit;
        }
    }

    public function tambahDatanilaidga()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidga');
            exit;
        }
    }

    public function getUbahnilaidga()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaidga()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidga');
            exit;
        }
    }

    public function hapusDatanilaidga($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidga');
            exit;
        }
    }

    public function tambahDatanilaidgb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidgb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidgb');
            exit;
        }
    }

    public function getUbahnilaidgb()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaidgb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidgb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidgb');
            exit;
        }
    }

    public function hapusDatanilaidgb($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidgb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidgb');
            exit;
        }
    }

    public function tambahDatanilaidgc()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidgc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidgc');
            exit;
        }
    }

    public function getUbahnilaidgc()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaidgc()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidgc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidgc');
            exit;
        }
    }

    public function hapusDatanilaidgc($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidgc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidgc');
            exit;
        }
    }

    public function tambahDatanilaidgd()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidgd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidgd');
            exit;
        }
    }

    public function getUbahnilaidgd()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaidgd()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidgd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidgd');
            exit;
        }
    }

    public function hapusDatanilaidgd($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidgd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidgd');
            exit;
        }
    }

    public function tambahDatanilaipda()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaipda');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaipda');
            exit;
        }
    }

    public function getUbahnilaipda()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaipda()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaipda');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaipda');
            exit;
        }
    }

    public function hapusDatanilaipda($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaipda');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaipda');
            exit;
        }
    }

    public function tambahDatanilaipdb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaipdb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaipdb');
            exit;
        }
    }

    public function getUbahnilaipdb()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaipdb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaipdb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaipdb');
            exit;
        }
    }

    public function hapusDatanilaipdb($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaipdb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaipdb');
            exit;
        }
    }

    public function tambahDatanilaipdc()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaipdc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaipdc');
            exit;
        }
    }

    public function getUbahnilaipdc()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaipdc()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaipdc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaipdc');
            exit;
        }
    }

    public function hapusDatanilaipdc($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaipdc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaipdc');
            exit;
        }
    }

    public function tambahDatanilaipdd()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaipdd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaipdd');
            exit;
        }
    }

    public function getUbahnilaipdd()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaipdd()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaipdd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaipdd');
            exit;
        }
    }

    public function hapusDatanilaipdd($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaipdd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaipdd');
            exit;
        }
    }

    public function tambahDatanilaiania()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaiania');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaiania');
            exit;
        }
    }

    public function getUbahnilaiania()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaiania()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaiania');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaiania');
            exit;
        }
    }

    public function hapusDatanilaiania($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaiania');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaiania');
            exit;
        }
    }

    public function tambahDatanilaianib()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaianib');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaianib');
            exit;
        }
    }

    public function getUbahnilaianib()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaianib()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaianib');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaianib');
            exit;
        }
    }

    public function hapusDatanilaianib($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaianib');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaianib');
            exit;
        }
    }

    public function tambahDatanilaianic()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaianic');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaianic');
            exit;
        }
    }

    public function getUbahnilaianic()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaianic()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaianic');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaianic');
            exit;
        }
    }

    public function hapusDatanilaianic($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaianic');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaianic');
            exit;
        }
    }
    public function tambahDatanilaidkva()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidkva');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidkva');
            exit;
        }
    }

    public function getUbahnilaidkva()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaidkva()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidkva');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidkva');
            exit;
        }
    }

    public function hapusDatanilaidkva($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidkva');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidkva');
            exit;
        }
    }
    public function tambahDatanilaidkvb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidkvb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidkvb');
            exit;
        }
    }

    public function getUbahnilaidkvb()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaidkvb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidkvb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidkvb');
            exit;
        }
    }

    public function hapusDatanilaidkvb($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidkvb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidkvb');
            exit;
        }
    }

    public function tambahDatanilaidkvc()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidkvc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidkvc');
            exit;
        }
    }

    public function getUbahnilaidkvc()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaidkvc()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidkvc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidkvc');
            exit;
        }
    }

    public function hapusDatanilaidkvc($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaidkvc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaidkvc');
            exit;
        }
    }

    public function tambahDatanilaitla()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilailoga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilailoga');
            exit;
        }
    }

    public function getUbahnilaitla()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaitla()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilailoga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilailoga');
            exit;
        }
    }

    public function hapusDatanilaitla($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilailoga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilailoga');
            exit;
        }
    }

    public function tambahDatanilaitlb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilailogb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilailogb');
            exit;
        }
    }

    public function getUbahnilaitlb()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaitlb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilailogb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilailogb');
            exit;
        }
    }

    public function hapusDatanilaitlb($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilailogb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilailogb');
            exit;
        }
    }

    public function tambahDatanilaitma()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaimekaa');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaimekaa');
            exit;
        }
    }

    public function getUbahnilaitma()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaitma()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaimekaa');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaimekaa');
            exit;
        }
    }

    public function hapusDatanilaitma($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaimekaa');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaimekaa');
            exit;
        }
    }

    public function tambahDatanilaitmb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaimekab');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaimekab');
            exit;
        }
    }

    public function getUbahnilaitmb()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaitmb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaimekab');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaimekab');
            exit;
        }
    }

    public function hapusDatanilaitmb($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaimekab');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaimekab');
            exit;
        }
    }

    public function tambahDatanilaipha()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaipha');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaipha');
            exit;
        }
    }

    public function getUbahnilaipha()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaipha()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaipha');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaipha');
            exit;
        }
    }

    public function hapusDatanilaipha($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaipha');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaipha');
            exit;
        }
    }

    public function tambahDatanilaiphb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaiphb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaiphb');
            exit;
        }
    }

    public function getUbahnilaiphb()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaiphb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaiphb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaiphb');
            exit;
        }
    }

    public function hapusDatanilaiphb($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaiphb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaiphb');
            exit;
        }
    }
    public function tambahDatanilairpla()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilairpla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilairpla');
            exit;
        }
    }

    public function getUbahnilairpla()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilairpla()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilairpla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilairpla');
            exit;
        }
    }

    public function hapusDatanilairpla($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilairpla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilairpla');
            exit;
        }
    }

    public function tambahDatanilairplb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilairplb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilairplb');
            exit;
        }
    }

    public function getUbahnilairplb()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilairplb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilairplb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilairplb');
            exit;
        }
    }

    public function hapusDatanilairplb($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilairplb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilairplb');
            exit;
        }
    }

    public function tambahDatanilairplc()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilairplc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilairplc');
            exit;
        }
    }

    public function getUbahnilairplc()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilairplc()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilairplc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilairplc');
            exit;
        }
    }

    public function hapusDatanilairplc($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilairplc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilairplc');
            exit;
        }
    }


    public function tambahDatanilaitkja()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaitkja');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaitkja');
            exit;
        }
    }

    public function getUbahnilaitkja()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaitkja()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaitkja');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaitkja');
            exit;
        }
    }

    public function hapusDatanilaitkja($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaitkja');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaitkja');
            exit;
        }
    }

    public function tambahDatanilaitkjb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->tambahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaitkjb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaitkjb');
            exit;
        }
    }

    public function getUbahnilaitkjb()
    {
        echo json_encode($this->model("$this->model_name", 'pkl_model')->getNilaiById($_POST['id']));
    }

    public function ubahDatanilaitkjb()
    {
        if ($this->model("$this->model_name", 'pkl_model')->ubahDataNilai($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaitkjb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaitkjb');
            exit;
        }
    }

    public function hapusDatanilaitkjb($id)
    {
        if ($this->model("$this->model_name", 'pkl_model')->hapusDataNilai($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pkl/nilaitkjb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pkl/nilaitkjb');
            exit;
        }
    }

    public function pemberkasan()
    {
        $data['judul'] = 'Admin - PKL';
        $data['user'] = $this->user;
        $data['siswa'] = $this->model("$this->model_name", 'PKL_model')->getExistSiswaPS();
        $akses = ['all', 'humas', 'kabeng'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/pemberkasan/pklpemberkasanlaporan', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/pemberkasan/form', $data);
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/prakerin/pklprakerin', $data);
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/prakerin/pemberangkatan/pklpemberangkatan', $data);
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/prakerin/penjemputan/pklpenjemputan', $data);
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/magang/pklpengangkatansiswa', $data);
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
        $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/dataindustri/pkldataindustri', $data);
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/prakerin/monitoring/pklmonitoring', $data);
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/pembekalan/pklpembekalan', $data);
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/dayatampung/pkldayatampung', $data);
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/perpanjang/pklperpanjangmasa', $data);
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/perizinanpkl/pklperizinan', $data);
            $this->view('templates/humas/footer');
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
            $this->view('templates/humas/header', $data);
            $this->view('humas/pkl/rekap/siswabermasalah/pklsiswabermasalah', $data);
            $this->view('templates/humas/footer');
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
