<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Login extends Controller
{
    private $secretKey = 'secret';
    private $model_name = "Login";

    public function index()
    {
        $data['judul'] = 'SIMAS - Login';
        $this->view('login/head', $data);
        $this->view('login/index');
        $this->view('login/foot');
    }

    public function logProccess()
    {
    // Validasi username dan password
    if (isset($_POST['username']) && $_POST['email'] && $_POST['password']) {
        $data['username'] = $_POST['username'];
        $data['email'] = $_POST['email'];
        $data['password'] = $_POST['password'];
        $user = $this->model("$this->model_name", "Login_model")->auth($data);
        if (!$user) {
            Flasher::setFlash('GAGAL', 'Login', 'danger');
            sleep(1);
            header("Location: " . BASEURL . "login");
        } else {
            Flasher::setFlash('BERHASIL', 'Login', 'success');
            header("Location: " . BASEURL);
        }
    }

    // // Jika validasi berhasil, buat token JWT
    // $userId = $user['id'];
    // $payload = [
    //     'sub' => $userId,
    //     'iat' => time(),
    //     'exp' => time() + 60 * 60 * 24 // Token berlaku selama 1 hari
    // ];
    // $jwt = JWT::encode($payload, $this->secretKey, 'HS256');

    // // Kirim token JWT sebagai respons
    // header('Content-Type: application/json');
    // echo json_encode(['token' => $jwt]);
    }
}