<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Login extends Controller
{
    public static string $SECRET_KEY = "ZHxTsCPhncHnBWhsRUatdumctOidOum9";
    private $model_name = "Login";

    public function index()
    {
        if (isset($_COOKIE['SIMAS-SESSION'])) {
            header("Location: " . BASEURL);
        }

        $data['judul'] = 'SIMAS - Login';

        $this->view('login/head', $data);
        $this->view('login/index');
        $this->view('login/foot');
    }

    public function logProccess()
    {
        // Validasi username dan password
        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
            $data['username'] = $_POST['username'];
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];
            $user = $this->model("$this->model_name", "Login_model")->login($data);
            if (!$user) {
                Flasher::setFlash('GAGAL', 'Login', 'danger');
                header("Location: " . BASEURL . "/login");
            } else {
                if ($this->model("$this->model_name", "Login_model")->log($user['id']) > 0) {
                    Flasher::setFlash('BERHASIL', 'Login', 'success');
                    // Jika validasi berhasil, buat token JWT
                    $payload = [
                        'sub' => $user['id'],
                        'name' => $user['username'],
                        'role' => $user['role'],
                        'akses' => $user['hak_akses'],
                        'iat' => time(),
                        'exp' =>  time() + (7 * 24 * 60 * 60) // Token berlaku selama 1 hari
                    ];
                    Cookie::create_jwt($payload, $payload['exp']);
                    // Kirim token JWT sebagai respons
                    header("Location: " . BASEURL);
                }
            }
        }
    }
}
