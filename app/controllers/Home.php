<?php

class Home extends Controller
{
    public function index()
    {
        $session = $this->checkSession();
        $data['judul'] = 'SIMAS - Home';
        $this->view('templates/header', $data);
        $this->view('home/index');
        $this->view('templates/footerwm');
    }
}