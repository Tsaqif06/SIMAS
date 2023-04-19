<?php
class Verifikasi extends Controller
{
    public function index()
    {
        $data['judul'] = 'SIMAS - Verifikasi';
        $this->view('login/head', $data);
        $this->view('login/verifikasi');
        $this->view('login/foot');
    }

    public function verifikasi()
    {
        if(isset($_POST["verify"])){
            $otp = $_SESSION['otp'];
            $email = $_SESSION['mail'];
            $otp_code = $_POST['otp_code'];
    
            if($otp != $otp_code){
                ?>
               <script>
                   alert("Invalid OTP code");
               </script>
               <?php
            }else{
                mysqli_query($connect, "UPDATE login SET status = 1 WHERE email = '$email'");
                echo 
                 '<script>
                     alert("Verfiy account done, you may sign in now");
                       window.location.replace("index.php");
                 </script>';
                 
            }
    
        }
    
    }

}