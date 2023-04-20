<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require dirname(dirname(dirname(__DIR__))) . '\\vendor\\autoload.php';

class Lupasandi extends Controller
{
    private $model_name = 'login';
    public function index()
    {
        $data['judul'] = 'SIMAS - Lupa Sandi';
        $this->view('login/head', $data);
        $this->view('login/lupasandi');
        $this->view('login/foot');
    }
    public function sendEmail()
    {
        if (!empty($_POST)) {
            $mail = new PHPMailer(true);

            $username = $_POST["username"];
            $email = $_POST["email"];

            if ($this->model("$this->model_name", "Login_model")->checkUser($username, $email) <= 0) {
                echo
                '<script>
                const emailNotFound = confirm("Email Tidak Ditemukan!");
                    if (emailNotFound == true || emailNotFound == false) {
                        history.back();
                    }
                </script>';
            } else {
                // generate token by binaryhexa 
                // $token = bin2hex(random_bytes(50));
                $otp = rand(100000, 999999);

                //session_start ();

                // $_SESSION['token'] = $token;

                // Set waktu kadaluarsa dalam detik (300 detik = 5 menit)
                // $expiration_time = 300; 

                // Hitung waktu kadaluarsa dalam waktu UNIX timestamp
                // $expiration_timestamp = time() + $expiration_time; 

                // Set waktu kadaluarsa di PHPMailer
                // $mail->setExpiration($expiration_timestamp);


                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';

                // h-hotel account
                $mail->Username = 'icediamond55339@gmail.com';
                $mail->Password = 'usimegcoqbkjlqdo';

                // send by h-hotel email
                $mail->setFrom('email', 'Password Reset');
                // get email from input
                $mail->addAddress($_POST["email"]);
                //$mail->addReplyTo('lamkaizhe16@gmail.com');

                // HTML body
                $mail->isHTML(true);
                $mail->Subject = "Recover your password";
                $mail->Body = "<p>Hai Pengguna, </p> <h3>Kode verifikasi kamu adalah $otp <br></h3>
                <br></br>
                <b>SIMAS</b>";

                if (!$mail->send()) {
                    echo
                    '<script>
                    const emailNotSend = confirm("Email Gagal Terkirim, Cek Lagi Email Anda Atau Tunggu Sebentar Lagi!");
                        if (emailNotSend == true || emailNotSend == false) {
                            history.back();
                        }
                    </script>';
                } else {
                    $_SESSION['otp'] = $otp;
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                    echo
                    '<script>
                    const sendEmailSuccess = confirm("Email Berhasil Terkirim!");
                        if (sendEmailSuccess == true || sendEmailSuccess == false) {
                            location.href = "' . BASEURL . '/verifikasi";
                        }
                    </script>';
                    exit;
                }
            }
        }
    }
}
