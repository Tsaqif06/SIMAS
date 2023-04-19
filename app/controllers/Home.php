<?php

class Home extends Controller
{
    public function index()
    {
        $session = $this->checkSession();
        $data['judul'] = 'SIMAS - Home';
        $data['username'] = Login::getCurrentSession()->username;
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footerwm');
    }
}