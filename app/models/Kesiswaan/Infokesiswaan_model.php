<?php

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;
use Ramsey\Uuid\Uuid;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
class Infokesiswaan_model
{
    private $table = 'infokesiswaan';
    private $fields = [
        'kegiatan_infoKesiswaan',
        'deskripsi_infoKesiswaan',
        'tanggal_infoKesiswaan'
    ];

    private $user;
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KESISWAAN);
        $this->user = Cookie::get_jwt()->name;
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
        if ($_FILES["foto"]["size"] > 10044070) {
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

    public function tambahDataInfokesiswaan($data)
    {                     //nama tabel
        $query = "INSERT INTO infokesiswaan VALUES(
            null, :uuid, :kegiatan_infoKesiswaan, :deskripsi_infoKesiswaan, :foto, :tanggal_infoKesiswaan, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)";

        $this->db->query($query);
        $foto = $this->uploadImage();
        if (!$foto) {
            return false;
        }
        $this->db->bind('foto', $foto);

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('uuid', Uuid::uuid4()->toString());
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
                is_deleted = 1,
                is_restored = 0
            WHERE id = :id"
        );

        $this->db->bind('deleted_by', $this->user);
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataInfokesiswaan($data)
    {                     //nama tabel
        $query = "UPDATE infokesiswaan SET
                    kegiatan_infoKesiswaan = :kegiatan_infoKesiswaan,
                    deskripsi_infoKesiswaan = :deskripsi_infoKesiswaan,
                    foto = :foto,
                    tanggal_infoKesiswaan = :tanggal_infoKesiswaan,
                    modified_at = CURRENT_TIMESTAMP,
                    modified_by = :modified_by
                    WHERE id = :id";

        $this->db->query($query);
        if ($_FILES["foto"]["error"] === 4) {
            $foto = $data['foto'];
        } else {
            $foto = $this->uploadImage();
        }
        $this->db->bind('foto', $foto);

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    // public function importData()
    // {
    //     // Cek file diupload apa belum
    //     if (!isset($_FILES['file']['name'])) {
    //         Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
    //         header('location: ' . BASEURL . '/siswa');
    //         exit;
    //     }

    //     // Baca file Excel menggunakan PhpSpreadsheet
    //     $inputFileName = $_FILES['file']['tmp_name'];
    //     $spreadsheet = IOFactory::load($inputFileName);

    //     // Ambil data dari sheet pertama
    //     $worksheet = $spreadsheet->getActiveSheet();
    //     $highestRow = $worksheet->getHighestRow();
    //     $highestColumn = $worksheet->getHighestColumn();
    //     $maxColumnIndex = Coordinate::columnIndexFromString($highestColumn);

    //     // Daftar kolom yang akan diambil dari file Excel dan disimpan ke database
    //     $columns = $this->fields;

    //     // Looping untuk membaca setiap baris data
    //     for ($row = 2; $row <= $highestRow; $row++) {
    //         $data = [];

    //         // Looping untuk membaca setiap kolom data
    //         for ($col = 2; $col <= count($columns) + 1; $col++) {
    //             $columnLetter = Coordinate::stringFromColumnIndex($col);
    //             $cellValue = $worksheet->getCell($columnLetter . $row)->getValue();
    //             $data[$columns[$col - 2]] = $cellValue;
    //         }

    //         // Simpan data ke database
    //         $response = $this->tambahDataInfokesiswaan($data);
    //     }
    //     return $response;
    // }
}