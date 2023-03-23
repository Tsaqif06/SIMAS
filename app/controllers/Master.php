<?php

class Master extends Controller
{

    // routing
    public function index()
    {
        header('Location:' . BASEURL . 'tu/siswa');
    }

    public function siswa()
    {
        $data['judul'] = 'SIMAS - Siswa';

        $data['siswa'] = $this->model('Siswa_model')->getAllData();
        
        $this->view('templates/header2', $data);
        $this->view('tu/siswa', $data);
        $this->view('templates/footer2');
    }

    public function guru()
    {
        $data['judul'] = 'SIMAS - Guru';

        $data['guru'] = $this->model('Guru_model')->getAllData();
        
        $this->view('templates/header2', $data);
        $this->view('tu/guru', $data);
        $this->view('templates/footer2');
    }

    public function karyawan()
    {
        $data['judul'] = 'SIMAS - Karyawan';

        $data['karyawan'] = $this->model('Karyawan_model')->getAllData();

        $this->view('templates/header2', $data);
        $this->view('tu/karyawan', $data);
        $this->view('templates/footer2');
    }

    // tambah data

    public function tambahDataGuru()
    {
        if ($this->model('Guru_model')->tambahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
        }
        header('Location: ' . BASEURL . 'tu/guru');
        exit;
    }

    public function tambahDataSiswa()
    {
        if ($this->model('Siswa_model')->tambahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
        }
        header('Location: ' . BASEURL . 'tu/siswa');
        exit;
    }

    public function tambahDataKaryawan()
    {
        if ($this->model('Karyawan_model')->tambahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');            
        }
        header('Location: ' . BASEURL . 'tu/karyawan');
        exit;
    }

    // hapus data

    public function hapusDataGuru($nip)
    {
        if ($this->model('Guru_model')->hapusData($nip) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
        }
        header('Location: ' . BASEURL . 'tu/guru');
        exit;
    }

    public function hapusDataSiswa($nisn)
    {
        if ($this->model('Siswa_model')->hapusData($nisn) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
        }
        header('Location: ' . BASEURL . 'tu/siswa');
        exit;
    }

    public function hapusDataKaryawan($nip)
    {
        if ($this->model('Karyawan_model')->hapusData($nip) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
        }
        header('Location: ' . BASEURL . 'tu/karyawan');
        exit;
    }

    // edit data
    public function getUbahDataGuru()
    {
        echo json_encode($this->model('Guru_model')->getDataById($_POST['nip']));
    }

    public function ubahDataGuru()
    {
        if ($this->model('Guru_model')->ubahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
        }
        header('Location: ' . BASEURL . 'tu/guru');
        exit;
    }

    public function getUbahDataSiswa()
    {
        echo json_encode($this->model('Siswa_model')->getDataById($_POST['nisn']));
    }

    public function ubahDataSiswa()
    {
        if ($this->model('Siswa_model')->ubahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
        }
        header('Location: ' . BASEURL . 'tu/siswa');
        exit;
    }

    public function getUbahDataKaryawan()
    {
        echo json_encode($this->model('Karyawan_model')->getDataById($_POST['id']));
    }

    public function ubahDataKaryawan()
    {
        if ($this->model('Karyawan_model')->ubahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
        }
        header('Location: ' . BASEURL . 'tu/karyawan');
        exit;
    }
}
