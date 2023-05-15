<?php

class API extends Controller
{
    public function index()
    {
        echo "Page not found!";
    }

    // LOGIN //

    public function login()
    {
        header('Content-Type: application/json');
        if (isset($_POST['nisn'])) {
            $data['nisn'] = $_POST['nisn'];
            $user = $this->model("Kesiswaan", "Kehadiran_model")->login($data);
            if (!$user) {
                $response = false;
                $message = "Gagal Login";
                echo json_encode(["success" => $response, "message" => $message, "data" => $user]);
            } else {
                $response = true;
                $message = "Berhasil Login";
                echo json_encode(["success" => $response, "message" => $message, "data" => $user]);
            }
        }
    }

    // KEHADIRAN //

    public function kehadiran($id = null)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        ($id == null) ?
            $data = $this->model("Kesiswaan", 'Kehadiran_model')->getAllExistData() :
            $data = $this->model("Kesiswaan", 'Kehadiran_model')->getDataById($id);
        ($data) ?
            $response = true :
            $response = false;
        echo json_encode(["status" => $response, "data" => $data]);
    }

    public function tambahDataKehadiran()
    {
        header('Content-Type: application/json');
        if ($this->model("Kesiswaan", "Kehadiran_model")->tambahData($_POST) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Kehadiran berhasil ditambahkan"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Data Kehadiran gagal dihapus"]);
        }
    }

    // PELANGGARAN //

    public function pelanggaran($id = null)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        ($id == null) ?
            $data = $this->model("Kesiswaan", 'Pelanggaran_model')->getAllExistData() :
            $data = $this->model("Kesiswaan", 'Pelanggaran_model')->getDataById($id);

        ($data) ?
            $response = true :
            $response = false;
        echo json_encode(["status" => $response, "data" => $data]);
    }


    // POIN PELANGGARAN //
    public function poinpelanggaran($id = null)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        ($id == null) ?
            $data = $this->model("Kesiswaan", 'Poinpelanggaran_model')->getAllExistData() :
            $data = $this->model("Kesiswaan", 'Poinpelanggaran_model')->getDataById($id);

        ($data) ?
            $response = true :
            $response = false;
        echo json_encode(["status" => $response, "data" => $data]);
    }

    //  SISWA  //

    public function siswa($id = null)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        ($id == null) ?
            $data = $this->model("Master", 'Siswa_model')->getAllExistData() :
            $data = $this->model("Master", 'Siswa_model')->getDataById($id);

        ($data) ?
            $response = true :
            $response = false;
        echo json_encode(["status" => $response, "data" => $data]);
    }
}
