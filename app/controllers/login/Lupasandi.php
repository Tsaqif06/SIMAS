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

            $email = $_POST["email"];

            $search = $this->model("$this->model_name", "Login_model")->verifikasi($email);

            if ($search['rowCount'] <= 0) {
                echo "Sorry, no emails exists ";
            } else if ($search['fetch']["status"] == 0) {
                echo '<script>
                    alert("Sorry, your account must verify first, before you recover your password !");
                </script>';
            } else {
                // generate token by binaryhexa 
                $token = bin2hex(random_bytes(50));
                $otp = rand(100000,999999);
                

                //session_start ();
                $_SESSION['otp'] = $otp;
                $_SESSION['token'] = $token;
                $_SESSION['email'] = $email;

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
                    echo '<script>
                        alert("<?php echo " Invalid Email " ?>");
                    </script>';
                } else {
                    header("Location: " . BASEURL . "Verifikasi");
                }
            }
        }
    }
}
