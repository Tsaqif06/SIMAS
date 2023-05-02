<?php
require_once dirname(dirname(__DIR__)) . '/controllers/login/Login.php';

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;

class Infokesiswaan_model extends Database
{


    private $table = 'infokesiswaan';
    private $user;

    private $fields = [
        'kegiatan_infoKesiswaan',
        'deskripsi_infoKesiswaan',
        'dokumentasi_infoKesiswaan',
        'tanggal_kegiatanOsis'
    ];
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KESISWAAN);
        $this->user = Login::getCurrentSession()->username;
    }

    public function getAllData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->fetchAll();
    }

    public function getAllExistData()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE `status` = 1");
        return $this->db->fetchAll();
    }

    public function getAllDeletedData()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE `status` = 0");
        return $this->db->fetchAll();
    }


    public function getInfokesiswaanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function uploadImage()
    {
        $targetDir = 'images/datafoto/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['dokumentasi_infoKesiswaan']['name'];
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
        if ($_FILES["dokumentasi_infoKesiswaan"]["error"] === 4) {
            echo
            '
            <script>
                alert("Silahkan Upload Gambar")
            </script>
        ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["dokumentasi_infoKesiswaan"]["size"] > 1000000) {
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
            move_uploaded_file($_FILES['dokumentasi_infoKesiswaan']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }

    public function tambahDataInfokesiswaan($data)
    {                     //nama tabel
        $query = "INSERT INTO infokesiswaan VALUES(
            null, :uuid, :kegiatan_infoKesiswaan, :deskripsi_infoKesiswaan, :dokumentasi_infoKesiswaan, :tanggal_kegiatanOsis, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)";

        $this->db->query($query);
        $foto = $this->uploadImage();
        if (!$foto) {
            return false;
        }
        $this->db->bind('uuid', '8');
        $this->db->bind('dokumentasi_infoKesiswaan', $foto);
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }

        $this->db->bind('created_by', $this->user);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataInfoKesiswaan($id)
    {
        $this->db->query(
            "UPDATE {$this->table}  
                SET 
                deleted_at = CURRENT_TIMESTAMP,
                deleted_by = :deleted_by,
                is_deleted = 1
            WHERE id = :id"
        );

        $this->db->bind('deleted_by', $this->user);
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataPermanen($id)
    {
        $this->db->query(
            "DELETE FROM {$this->table} WHERE id = :id"
        );

        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataInfokesiswaan($data)
    {                     //nama tabel
        $query = "UPDATE infokesiswaan SET
                    kegiatan_infoKesiswaan = :kegiatan_infoKesiswaan,
                    deskripsi_infoKesiswaan = :deskripsi_infoKesiswaan,
                    dokumentasi_infoKesiswaan = :dokumentasi_infoKesiswaan,
                    tanggal_kegiatanOsis = :tanggal_kegiatanOsis,
                    modified_at = CURRENT_TIMESTAMP,
                    modified_by = :modified_by
                    WHERE id = :id";

        $this->db->query($query);
        if ($_FILES["dokumentasi_infoKesiswaan"]["error"] === 4) {
            $foto = $data['dokumentasi_infoKesiswaan'];
        } else {
            $foto = $this->uploadImage();
        }

        $this->db->bind('dokumentasi_infoKesiswaan', $foto);
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
