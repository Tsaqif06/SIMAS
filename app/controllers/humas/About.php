<?php
class About extends Controller
{

    public $model_name = "Humas";

    public function index()
    {
        $data['judul'] = 'Tentang Humas';
        $data['user'] = $this->user;
        $akses = ['all', 'humas'];
        if (in_array($data['user']['hak_akses'], $akses)) {
            $this->view('templates/humas/header', $data);
            $this->view('humas/about/index', $data);
            $this->view('templates/humas/footer');
        } else if ($data['user']['hak_akses'] == '') {
            header("Location: " . BASEURL);
            Flasher::setFlash('GAGAL', 'Anda Tidak Mempunyai Akses Untuk Menuju Halaman Tersebut', 'danger');
        }
    }
}