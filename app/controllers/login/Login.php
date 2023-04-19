<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Login extends Controller
{
    public static string $SECRET_KEY = "'ZHxTsCPhncHnBWhsRUatdumctOidOum9";
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
        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
            $data['username'] = $_POST['username'];
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];
            $user = $this->model("$this->model_name", "Login_model")->auth($data);
            if (!$user) {
                Flasher::setFlash('GAGAL', 'Login', 'danger');
                sleep(1);
                header("Location: " . BASEURL . "/login");
            } else {
                Flasher::setFlash('BERHASIL', 'Login', 'success');
                // Jika validasi berhasil, buat token JWT
                $userId = $user['id'];
                $userName = $user['username'];
                $role = $user['role'];
                $hakAkses = $user['hak_akses'];
                $payload = [
                    'sub' => $userId,
                    'name' => $userName,
                    'role' => $role,
                    'akses' => $hakAkses,
                    'iat' => time(),
                    'exp' =>  time() + (7 * 24 * 60 * 60) // Token berlaku selama 1 hari
                ];
                $jwt = JWT::encode($payload, Login::$SECRET_KEY, 'HS256');
                setcookie("SIMAS-SESSION", $jwt,  time() + (7 * 24 * 60 * 60), "/");

                // Kirim token JWT sebagai respons
                sleep(1);
                header("Location: " . BASEURL);
            }
        }
    }

    public static function getCurrentSession()
    {

        if ($_COOKIE['SIMAS-SESSION']) {
            $jwt = $_COOKIE['SIMAS-SESSION'];
            try {
                $payload = JWT::decode($jwt, new Key(Login::$SECRET_KEY, 'HS256'));
                return new Session(username: $payload->name, role: $payload->role, akses: $payload->akses);
            } catch (Exception $exception) {
                header("Location: " . BASEURL . "/login");
                exit;
            }
        } else {
            header("Location: " . BASEURL . "/login");
            exit;
        }
    }
}
