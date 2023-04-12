<?php
class Verifikasi extends Controller
{
    public function index()
    {
        $data['judul'] = 'SIMAS - Verifikasi';
        $this->view('login/head', $data);
        $this->view('login/verifikasi');
        $this->view('login/foot');
    }
}
