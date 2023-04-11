<?php
class Lupasandi extends Controller
{
    public function index()
    {
        $data['judul'] = 'SIMAS - Lupa Sandi';
        $this->view('login/head', $data);
        $this->view('login/lupasandi');
        $this->view('login/foot');
    }
}