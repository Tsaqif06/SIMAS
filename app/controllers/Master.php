<?php

class Master extends Controller
{

    // routing
    public function index()
    {
        header('Location:' . BASEURL . 'master/guru');
    }

    public function siswa()
    {
        $data['judul'] = 'SIMAS - Siswa';

        $data['siswa'] = $this->model('Master_models','Siswa_model')->getAllData();

        $this->view('templates/header2', $data);
        $this->view('master/siswa', $data);
        $this->view('templates/footer2');
    }

    public function guru()
    {
        $data['judul'] = 'SIMAS - Guru';

        $data['guru'] = $this->model('Master_models','Guru_model')->getAllData();

        $this->view('templates/header2', $data);
        $this->view('master/guru', $data);
        $this->view('templates/footer2');
    }

    public function karyawan()
    {
        $data['judul'] = 'SIMAS - Karyawan';

        $data['karyawan'] = $this->model('Master_models','Karyawan_model')->getAllData();

        $this->view('templates/header2', $data);
        $this->view('master/karyawan', $data);
        $this->view('templates/footer2');
    }

    // tambah data

    public function tambahData($model)
    {
        $model = ucfirst($model);
        if ($this->model('Master_models',"{$model}_model")->tambahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
        }
        header("Location: " . BASEURL . "master/{$model}");
        exit;
    }

    // hapus data

    public function hapusData($model, $id)
    {
        $model = ucfirst($model);
        if ($this->model('Master_models',"{$model}_model")->hapusData($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
        }
        header("Location: " . BASEURL . "master/{$model}");
        exit;
    }

    // edit data
    public function getUbahData($model)
    {
        $model = ucfirst($model);
        $id = strtolower($model);
        echo json_encode($this->model('Master_models',"{$model}_model")->getDataById($_POST["id_{$id}"]));
    }

    public function ubahData($model)
    {
        if ($this->model('Master_models',"{$model}_model")->ubahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
        }
        header("Location: " . BASEURL . "master/{$model}");
        exit;
    }
}
