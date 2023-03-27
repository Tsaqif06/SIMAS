<?php

class Master extends Controller
{
    public $model_name = "Master_models";

    // main routing

    public function index()
    {
        header('Location:' . BASEURL . 'master/guru');
    }

    public function siswa()
    {
        $data['judul'] = 'SIMAS - Siswa';

        $data['siswa'] = $this->model("$this->model_name", 'Siswa_model')->getAllData();

        $this->view('templates/header2', $data);
        $this->view('master/siswa', $data);
        $this->view('templates/footer2');
    }

    public function guru()
    {
        $data['judul'] = 'SIMAS - Guru';

        $data['guru'] = $this->model("$this->model_name", 'Guru_model')->getAllData();

        $this->view('templates/header2', $data);
        $this->view('master/guru', $data);
        $this->view('templates/footer2');
    }

    public function karyawan()
    {
        $data['judul'] = 'SIMAS - Karyawan';

        $data['karyawan'] = $this->model("$this->model_name", 'Karyawan_model')->getAllData();

        $this->view('templates/header2', $data);
        $this->view('master/karyawan', $data);
        $this->view('templates/footer2');
    }

    public function kompkeahlian()
    {
        $data['judul'] = 'SIMAS - Kompetensi Keahlian';

        $data['kompkeahlian'] = $this->model("$this->model_name", 'Kompkeahlian_model')->getAllData();

        $this->view('templates/header2', $data);
        $this->view('master/kompkeahlian', $data);
        $this->view('templates/footer2');
    }

    // tambah data

    public function tambahData($model)
    {
        $model = ucfirst($model);
        if ($this->model("$this->model_name", "{$model}_model")->tambahData($_POST) > 0) {
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
        if ($this->model("$this->model_name", "{$model}_model")->hapusData($id) > 0) {
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
        echo json_encode($this->model("$this->model_name", "{$model}_model")->getDataById($_POST["id_{$id}"]));
    }

    public function ubahData($model)
    {
        if ($this->model("$this->model_name", "{$model}_model")->ubahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diubah', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
        }
        header("Location: " . BASEURL . "master/{$model}");
        exit;
    }
}
