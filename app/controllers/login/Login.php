<?php
class Login extends Controller
{
    public function index()
    {
        $data['judul'] = 'SIMAS - Login';
        $this->view('login/head', $data);
        $this->view('login/index');
        $this->view('login/foot');
    }
}