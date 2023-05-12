<?php

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;
use Ramsey\Uuid\Uuid;

class galeriKegiatan_model
{
    private $table = 'galeri';
    private $user;
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_PSDM);
        $this->user = Cookie::get_jwt()->name;
    }

    public function getAllGaleri()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    public function getKegiatanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function getAllExistData()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE `status` = 1');
        return $this->db->fetchAll();
    }
    public function uploadImage()
    {
        $targetDir = 'images/datafoto/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['fotokegiatan']['name'];
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
        if ($_FILES["fotokegiatan"]["error"] === 4) {
            echo
            '
            <script>
                alert("Silahkan Upload Gambar")
            </script>
        ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["fotokegiatan"]["size"] > 1000000) {
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
            move_uploaded_file($_FILES['fotokegiatan']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }

    public function tambahDataKegiatan($data)
    {
        $foto = $this->uploadImage();
        if (!$foto) {
            return false;
        };

        $query = "INSERT INTO galeri
                    VALUES
                  (NULL, :uuid, :nama, :fotokegiatan, :deskripsi, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)";

        // var_dump($foto); die;

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('fotokegiatan', $foto);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('created_by', $this->user);


        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataKegiatan($id)
    {
        $this->db->query(
            "UPDATE {$this->table}
             SET
             deleted_at = CURRENT_TIMESTAMP,
             deleted_by = :deleted_by,
             is_deleted = 1,
             is_restored = 0
           WHERE id = :id"
        );

        $this->db->bind('deleted_by', $this->user);
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataKegiatan($data)
    {
        $query = "UPDATE galeri SET
                    nama = :nama,
                    fotokegiatan = :fotokegiatan,
                    deskripsi = :deskripsi,
                    modified_at = CURRENT_TIMESTAMP,
                        modified_by = :modified_by
                  WHERE id = :id";


        if ($_FILES["fotokegiatan"]["error"] === 4) {
            $foto = $data['fotoLama'];
        } else {
            $foto = $this->uploadImage();
        }

        // $this->db->bind('foto', $foto);
        // foreach ($this->fields as $field) {
        //     $this->db->bind($field, $data[$field]);
        // }

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('fotokegiatan', $foto);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function cariDataGaleri()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM galeri WHERE deskripsi LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }
}
