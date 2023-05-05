<?php 

class Notification extends Controller {

  public function index() {
    $data['user'] = $this->user;
    
    if ($_POST['method'] == 'get_pengajuan') {
      if ($data['user']['role'] == 'admin') {
        echo json_encode($this->model('TU', 'Suratpengajuan_model')->getReqData());
      } else {
        header("Location: " . BASEURL . "/Notfound");
      }
    } else {
      header("Location: " . BASEURL . "/Notfound");
    }
  }

}