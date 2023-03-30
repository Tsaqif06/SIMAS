<?php

class TU extends Controller
{
    private $model_name = "TU_models";

    // Main Routing //

    public function index()
    {
        header('Location:' . BASEURL . 'tu/suratmasuk');
    }

    public function suratmasuk()
    {
        $data['judul'] = 'SIMAS - Surat Masuk';

        $data['suratmasuk'] = $this->model("$this->model_name", 'Suratmasuk_model')->getAllData();

        $this->view('templates/header2', $data);
        $this->view('tu/suratmasuk', $data);
        $this->view('templates/footer2');
    }

    public function suratkeluar()
    {
        $data['judul'] = 'SIMAS - Surat Keluar';

        $data['suratkeluar'] = $this->model("$this->model_name", 'Suratkeluar_model')->getAllData();

        $this->view('templates/header2', $data);
        $this->view('tu/suratkeluar', $data);
        $this->view('templates/footer2');
    }

    public function suratpengajuan()
    {
        $data['judul'] = 'SIMAS - Surat Pengajuan';

        $data['suratpengajuan'] = $this->model("$this->model_name", 'Suratpengajuan_model')->getAllData();

        $this->view('templates/header2', $data);
        $this->view('tu/suratpengajuan', $data);
        $this->view('templates/footer2');
    }

    // Tambah Data //

    public function tambahData($model)
    {
        $model = ucfirst($model);
        if ($this->model("$this->model_name", "{$model}_model")->tambahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Ditambahkan', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
        }
        header("Location: " . BASEURL . "tu/{$model}");
        exit;
    }

    // Hapus Data //

    public function hapusData($model, $id)
    {
        $model = ucfirst($model);
        if ($this->model("$this->model_name", "{$model}_model")->hapusData($id) > 0) {
            Flasher::setFlash('BERHASIL', 'Dihapus', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
        }
        header("Location: " . BASEURL . "tu/{$model}");
        exit;
    }

    // Edit Data //

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
        header("Location: " . BASEURL . "tu/{$model}");
        exit;
    }

    public function ajukanSurat()
    {
        if ($this->model("$this->model_name", "Suratpengajuan_model")->tambahData($_POST) > 0) {
            Flasher::setFlash('BERHASIL', 'Diajukan, tunggu hingga diterima oleh Admin', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'Diajukan, tunggu hingga diterima oleh Admin', 'danger');
        }
        header("Location: " . BASEURL . "tu/suratpengajuan");
        exit;
    }
}
