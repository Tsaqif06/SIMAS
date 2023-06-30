<?php 

class Notification extends Controller {

  public function index() {
    $data['user'] = $this->user;
    
    if (isset($_POST['get_notification'])) {
      if ($data['user']['role'] == 'admin') {
        $surat = $this->model('TU', 'Suratpengajuan_model')->getReqData();
        $barang = $this->model("Sarpras", 'peminjamanBarang_models')->getReqData();
        echo json_encode([
          [
            $surat,
            "Pengajuan Surat Baru",
            "{$surat} surat sedang diajukan", 
            "http://localhost/SIMAS/public/suratpengajuan",
            ["bg-info", "ti-email"]],
          [
            $barang,
            "Pengajuan Barang Baru",
            "{$barang} barang sedang diajukan",
            "http://localhost/SIMAS/public/peminjamanBarang",
            ["bg-warning", "ti-archive"]
          ]
        ]);
      } else {
        echo json_encode(false);
      }
    } else {
      header("Location: " . BASEURL . "/Notfound");
    }
  }

}