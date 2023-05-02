<?php

class Notfound extends Controller
{
    public function index()
    {
        $this->checkSession();
        $data['judul'] = 'SIMAS - Error 404!';
        $data['username'] = Login::getCurrentSession()->username;
        $data['role'] = Login::getCurrentSession()->role;
        $data['akses'] = Login::getCurrentSession()->akses;
        $data['user'] = $this->model('Login', 'Login_model')->getDataByName($data['username']);
        $this->view('templates/header', $data);
        $this->view('notfound/index', $data);
        $this->view('templates/footerwm');
    }
}
