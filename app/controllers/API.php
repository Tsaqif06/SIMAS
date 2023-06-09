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
        if (isset($_POST['nama']) && isset($_POST['nisn'])) {
            $data['username'] = $_POST['nama'];
            $data['password'] = $_POST['nisn'];
            $data['imei'] = $_POST['imei'];
            $user = $this->model("Login", "Login_model")->loginSiswaNisn($data);
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
        foreach ($data as $item) {
            $response[$item['nisn']] = $item;
        }
        ($data) ?
            $success = true :
            $success = false;
        echo json_encode(['success' => $success, 'data' => $response]);
    }

    public function tambahDataKehadiran()
    {
        header('Content-Type: application/json');
        if ($this->model("Kesiswaan", "Kehadiran_model")->check($_POST['nisn']) > 0) {
            echo json_encode(["success" => false, "message" => "Data sudah mengisi kehadiran hari ini!"]);
        } else {
            if ($this->model("Kesiswaan", "Kehadiran_model")->tambahData($_POST) > 0) {
                echo json_encode(["success" => true, "message" => "Data Kehadiran berhasil ditambahkan"]);
            } else {
                echo json_encode(["success" => false, "message" => "Data Kehadiran gagal dihapus"]);
            }
        }
    }

    public function getHistoryKehadiran()
    {
        header('Content-Type: application/json');
        $data = $this->model("Kesiswaan", "Kehadiran_model")->getHistory($_POST['nisn']);
        if ($data > 0) {
            echo json_encode(["success" => true, "data" => $data]);
        } else {
            echo json_encode(["success" => false, "data" => $data]);
        }
    }

    // IZIN //

    public function izin($id = null)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        ($id == null) ?
            $data = $this->model("Kesiswaan", 'Izin_model')->getAllExistData() :
            $data = $this->model("Kesiswaan", 'Izin_model')->getDataById($id);
        ($data) ?
            $response = true :
            $response = false;
        echo json_encode(["success" => $response, "data" => $data]);
    }

    public function tambahDataIzin()
    {
        header('Content-Type: application/json');
        if ($this->model("Kesiswaan", "Izin_model")->check($_POST['ID_KEHADIRAN']) > 0) {
            echo json_encode(["success" => false, "message" => "Data izin sudah ditambahkan hari ini!"]);
        } else {
            if ($this->model("Kesiswaan", "Izin_model")->tambahDataIzin($_POST) > 0) {
                echo json_encode(["success" => true, "message" => "Data Izin berhasil ditambahkan"]);
            } else {
                echo json_encode(["success" => false, "message" => "Data Izin gagal dihapus"]);
            }
        }
    }

    public function getHistoryIzin()
    {
        header('Content-Type: application/json');
        $data = $this->model("Kesiswaan", "Izin_model")->getHistory($_POST['ID_KEHADIRAN']);
        if ($data > 0) {
            echo json_encode(["success" => true, "data" => $data]);
        } else {
            echo json_encode(["success" => false, "data" => $data]);
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
