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
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $data['username'] = $_POST['username'];
            $data['password'] = $_POST['password'];
            $admin = $this->model("$this->model_name", "Login_model")->loginAdmin($data);
            $siswa = $this->model("$this->model_name", "Login_model")->loginSiswa($data);
            $guru = $this->model("$this->model_name", "Login_model")->loginGuru($data);
            if ($admin) {
                if ($this->model("$this->model_name", "Login_model")->log($admin['id']) > 0) {
                    // Jika validasi berhasil, buat token JWT
                    $payload = [
                        'sub' => $admin['id'],
                        'name' => $admin['username'],
                        'role' => $admin['role'],
                        'akses' => $admin['hak_akses'],
                        'iat' => time(),
                        'exp' =>  time() + (7 * 24 * 60 * 60) // Token berlaku selama 1 hari
                    ];
                    Cookie::create_jwt($payload, $payload['exp']);
                    // Kirim token JWT sebagai respons
                    Flasher::setFlash('BERHASIL', 'Login', 'success');
                    header("Location: " . BASEURL);
                }
            } else if ($siswa) {
                // Jika validasi berhasil, buat token JWT
                $payload = [
                    'sub' => $siswa['id'],
                    'name' => $siswa['nama_siswa'],
                    'role' => 'siswa',
                    'akses' => '',
                    'iat' => time(),
                    'exp' =>  time() + (7 * 24 * 60 * 60) // Token berlaku selama 1 hari
                ];
                Cookie::create_jwt($payload, $payload['exp']);
                // Kirim token JWT sebagai respons
                Flasher::setFlash('BERHASIL', 'Login', 'success');
                header("Location: " . BASEURL);
            } else if ($guru) {
                // Jika validasi berhasil, buat token JWT
                $payload = [
                    'sub' => $guru['id'],
                    'name' => $guru['nama_lengkap'],
                    'role' => 'guru',
                    'akses' => '',
                    'iat' => time(),
                    'exp' =>  time() + (7 * 24 * 60 * 60) // Token berlaku selama 1 hari
                ];
                Cookie::create_jwt($payload, $payload['exp']);
                // Kirim token JWT sebagai respons
                Flasher::setFlash('BERHASIL', 'Login', 'success');
                header("Location: " . BASEURL);
                
            } else {
                Flasher::setFlash('GAGAL', 'Login', 'danger');
                header("Location: " . BASEURL . "/login");
            }
        }
    }
}
