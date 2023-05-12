<?php
class profilGuru extends Controller
{
    public function index()
    {
        $data['judul'] = 'Profil Guru';
        $data['user'] = $this->user;
        $akses = ['all', 'psdm'];
        $data['guru'] = $this->model("Master", 'Guru_model')->getAllExistData();
        if (in_array($data['user']['hak_akses'], $akses)) {
            if (isset($_POST["contentOnly"])) {
                $this->view('master/guru/detail', $data);
            } else {
                $this->view('templates/header', $data);
                $this->view('master/guru/detail', $data);
                $this->view('templates/footerwm');
            }
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
}
