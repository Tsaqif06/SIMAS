<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'SIMAS - Home';

        $data['user'] = $this->user;

        $data['jmlSiswa'] = $this->model('Master', 'Siswa_model')->getJmlData()['count'];
        $data['jmlGuru'] = $this->model('Master', 'Guru_model')->getJmlData()['count'];
        $data['jmlKaryawan'] = $this->model('Master', 'Karyawan_model')->getJmlData()['count'];

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footerwm');
    }
}