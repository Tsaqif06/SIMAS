<?php

class Notfound extends Controller
{
    public function index()
    {
        $data['judul'] = 'SIMAS - Error 404!';

        $data['user'] = $this->user;

        $this->view('templates/header', $data);
        $this->view('notfound/index', $data);
        $this->view('templates/footer');
    }
}
