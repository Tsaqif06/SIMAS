<?php

use Firebase\JWT\JWT;

class Login extends Controller
{
    private $secretKey = 'ZHxTsCPhncHnBWhsRUatdumctOidOum9';
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
            if ($user) {
                Flasher::setFlash('BERHASIL', 'Login', 'success');
                // header("Location: " . BASEURL);
                // Jika validasi berhasil, buat token JWT
                $userId = $user['id'];
                $userName = $user['username'];
                $payload = [
                    'sub' => $userId,
                    'name' => $userName,
                    'iat' => time(),
                    'exp' => time() + 60 * 60 * 24 // Token berlaku selama 1 hari
                ];
                $jwt = JWT::encode($payload, $this->secretKey, 'HS256');
                setcookie("SIMAS-SESSION", $jwt);
                
                // Kirim token JWT sebagai respons
                sleep(1);
                header('Content-Type: application/json');
                echo json_encode(['token' => $jwt]);
                var_dump($_COOKIE['SIMAS-SESSION']);
            } else {
                Flasher::setFlash('GAGAL', 'Login', 'danger');
                sleep(1);
                header("Location: " . BASEURL . "login");
            }
        }
    }

    public static function getCurrentSession()
    {
        if($_COOKIE['SIMAS-SESSION']){
            $jwt = $_COOKIE['SIMAS-SESSION'];
            try {
                $payload = \Firebase\JWT\JWT::decode($jwt, SessionManager::$SECRET_KEY, ['HS256']);
                return new Session(username: $payload->username, role: $payload->role);
            }catch (Exception $exception){
                throw new Exception("User is not login");
            }
        }else{
            throw new Exception("User is not login");
        }
    }
}