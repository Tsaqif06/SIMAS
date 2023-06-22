<?php

class Nopetunjuk extends Controller
{
    public function index()
    {
        $data['judul'] = 'SIMAS - Nomor Petunjuk Surat';
        $data['user'] = $this->user;
        $this->view('templates/header', $data);
        $this->view('tu/nopetunjuk/index', $data);
        $this->view('templates/footerwm');
    }
}
