<?php
class About extends Controller
{
    public function index($nama = 'Tsaqif', $profesi = 'Pelajar', $umur = 16)
    {
        $data['nama'] = $nama;
        $data['profesi'] = $profesi;
        $data['umur'] = $umur;
        $data['judul'] = 'About Me';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page($nama = 'Ovang', $profesi = 'Pelajar', $umur = 11, $judul = 'My Pages')
    {
        $data['nama'] = $nama;
        $data['profesi'] = $profesi;
        $data['umur'] = $umur;
        $data['judul'] = 'My Pages';
        $this->view('templates/header', $data);
        $this->view('about/page', $data);
        $this->view('templates/footer');
    }
}
