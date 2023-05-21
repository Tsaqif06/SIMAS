<?php
class ICT extends Controller
{
    public $model_name = "Humas";

    public function index()
    {
        $data['judul'] = 'ICT Center';
        $data['user'] = $this->user;
        $this->view('templates/humas/header', $data);
        $this->view('humas/ict/ict', $data);
        $this->view('templates/humas/footer');
    }
}
