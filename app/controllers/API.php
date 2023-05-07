<?php

class API extends Controller
{
    public function index()
    {
        echo "Page not found!";
    }

    // KEHADIRAN //

    public function kehadiran($id = null)
    {
        header('Content-Type: application/json');
        ($id == null) ?
            $data = $this->model("Kesiswaan", 'Kehadiran_model')->getAllExistData() :
            $data = $this->model("Kesiswaan", 'Kehadiran_model')->getDataById($id);

        echo json_encode($data);
    }

    public function tambahDataKehadiran()
    {
        if ($this->model("Kesiswaan", "Kehadiran_model")->tambahData($_POST) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Kehadiran berhasil ditambahkan"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Kehadiran gagal dihapus"]);
        }
    }

    public function hapusDataKehadiran($id)
    {
        if ($this->model("Kesiswaan", "Kehadiran_model")->hapusData($id) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Kehadiran berhasil dihapus"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Kehadiran gagal dihapus"]);
        }
    }

    public function ubahDataKehadiran($id)
    {
        if ($this->model("Kesiswaan", "Kehadiran_model")->ubahDataAPI($id, $_POST) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Kehadiran berhasil diubah"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Kehadiran gagal ditambahkan"]);
        }
    }

    // PELANGGARAN //


    public function pelanggaran($id = null)
    {
        header('Content-Type: application/json');
        ($id == null) ?
            $data = $this->model("Kesiswaan", 'Pelanggaran_model')->getAllExistData() :
            $data = $this->model("Kesiswaan", 'Pelanggaran_model')->getDataById($id);

        echo json_encode($data);
    }

    public function tambahDataPelanggaran()
    {
        if ($this->model("Kesiswaan", "Pelanggaran_model")->tambahData($_POST) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Pelanggaran berhasil ditambahkan"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Pelanggaran gagal dihapus"]);
        }
    }

    public function hapusDataPelanggaran($id)
    {
        if ($this->model("Kesiswaan", "Pelanggaran_model")->hapusData($id) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Pelanggaran berhasil dihapus"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Pelanggaran gagal dihapus"]);
        }
    }

    public function ubahDataPelanggaran($id)
    {
        if ($this->model("Kesiswaan", "Pelanggaran_model")->ubahDataAPI($id, $_POST) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Pelanggaran berhasil diubah"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Pelanggaran gagal ditambahkan"]);
        }
    }



    // POIN PELANGGARAN //



    public function poinpelanggaran($id = null)
    {
        header('Content-Type: application/json');
        ($id == null) ?
            $data = $this->model("Kesiswaan", 'Poinpelanggaran_model')->getAllExistData() :
            $data = $this->model("Kesiswaan", 'Poinpelanggaran_model')->getDataById($id);

        echo json_encode($data);
    }

    public function tambahDataPoinpelanggaran()
    {
        if ($this->model("Kesiswaan", "Poinpelanggaran_model")->tambahData($_POST) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Poin Pelanggaran berhasil ditambahkan"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Poin Pelanggaran gagal dihapus"]);
        }
    }

    public function hapusDataPoinpelanggaran($id)
    {
        if ($this->model("Kesiswaan", "Poinpelanggaran_model")->hapusData($id) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Poin Pelanggaran berhasil dihapus"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Poin Pelanggaran gagal dihapus"]);
        }
    }

    public function ubahDataPoinpelanggaran($id)
    {
        if ($this->model("Kesiswaan", "Pelanggaran_model")->ubahDataAPI($id, $_POST) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Poin Pelanggaran berhasil diubah"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Poin Pelanggaran gagal ditambahkan"]);
        }
    }
}
