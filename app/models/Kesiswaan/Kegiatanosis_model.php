<?php
require_once dirname(dirname(__DIR__)) . '/controllers/login/Login.php';

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;

class Kegiatanosis_model extends Database
{


    private $table = 'kegiatanosis';
    private $user;

    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KESISWAAN);
        $this->user = Login::getCurrentSession()->username;
    }

    public function getAllKegiatanosis()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }


    public function getKegiatanosisById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function uploadImage()
    {
        $targetDir = 'images/datafoto/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['foto']['name'];
        $imageFileType = explode('.', $temp);
        $imageFileType = strtolower(end($imageFileType));


        // validasi ekstensi file
        // $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }

        $fileName = uniqid();
        $fileName .= '.';
        $fileName .= $imageFileType;
        $targetFile = $targetDir . $fileName; // nama file upload

        // cek gambar diupload atau tidak
        if ($_FILES["foto"]["error"] === 4) {
            echo
            '
            <script>
                alert("Silahkan Upload Gambar")
            </script>
        ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["foto"]["size"] > 1000000) {
            echo
            '
                <script>
                    alert("Ukuran File Terlalu Besar")
                </script>
            ';
            return false;
        }

        try {
            // simpan file upload ke direktori
            move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }
    public function tambahDataKegiatanosis($data)
    {                     //nama tabel
        $query = "INSERT INTO kegiatanosis VALUES(null, :kegiatan_kegiatanOsis, :deskripsi_kegiatanOsis, :foto, :tanggal_kegiatanOsis)";

        $this->db->query($query);
        $foto = $this->uploadImage();
        if (!$foto) {
            return false;
        }
        $this->db->bind('kegiatan_kegiatanOsis', $data['kegiatan_kegiatanOsis']);
        $this->db->bind('deskripsi_kegiatanOsis', $data['deskripsi_kegiatanOsis']);
        $this->db->bind('foto', $foto);
        $this->db->bind('tanggal_kegiatanOsis', $data['tanggal_kegiatanOsis']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDatakegiatanosis($id)
    {
        $query = "DELETE FROM kegiatanosis WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDatakegiatanosis($data)
    {                     //nama tabel
        $query = "UPDATE kegiatanosis SET
                    kegiatan_kegiatanOsis = :kegiatan_kegiatanOsis,
                    deskripsi_kegiatanOsis = :deskripsi_kegiatanOsis,
                    dokumentasi_kegiatanOsis = :dokumentasi_kegiatanOsis,
                    tanggal_kegiatanOsis = :tanggal_kegiatanOsis
                    WHERE id = :id";

        $this->db->query($query);

        if ($_FILES["foto"]["error"] === 4) {
            $foto = $data['fotoLama'];
        } else {
            $foto = $this->uploadImage();
        }

        $this->db->bind('foto', $foto);
        $this->db->bind('kegiatan_kegiatanOsis', $data['kegiatan_kegiatanOsis']);
        $this->db->bind('deskripsi_kegiatanOsis', $data['deskripsi_kegiatanOsis']);
        $this->db->bind('tanggal_kegiatanOsis', $data['tanggal_kegiatanOsis']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
