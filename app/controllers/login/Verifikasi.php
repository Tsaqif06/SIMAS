<?php
class Verifikasi extends Controller
{

    private $model_name = 'login';

    public function index()
    {
        $data['judul'] = 'SIMAS - Verifikasi';
        $this->view('login/head', $data);
        $this->view('login/verifikasi');
        $this->view('login/foot');
    }

    public function confirm()
    {
        if (isset($_POST)) {
            $inputkode = $_POST['otp'];
            $otp = $_SESSION['otp'];

            if ($inputkode != $otp) {
                echo
                '<script>
                    alert("Invalid OTP code");
                </script>';
            } else {
                $username = $_SESSION['username'];
                $email = $_SESSION['email'];
                $password = $_POST['password'];
                $this->model("$this->model_name", "Login_model")->changePassword($username, $email, $password);
                echo
                '<script>
                    alert("Kata sandi telah dirubah");
                </script>';
                session_destroy();
                // header("Location : " . BASEURL . "/Login");
                // exit;
            }
        }
    }
}
