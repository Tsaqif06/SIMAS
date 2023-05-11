<?php
class profilPegawai extends Controller
{
    public function index()
    {
        $data['judul'] = 'Profil Pegawai';
        $data['user'] = $this->user;
        $akses = ['all', 'psdm'];
        $data['karyawan'] = $this->model("Master", 'Karyawan_model')->getAllExistData();
        if (in_array($data['user']['hak_akses'], $akses)) {
            if (isset($_POST["contentOnly"])) {
                $this->view('master/karyawan/detail', $data);
            } else {
                $this->view('templates/header', $data);
                $this->view('master/karyawan/detail', $data);
                $this->view('templates/footer');
            }
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
}
