<?php

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;

class Karyawan_model
{
    private $table = 'masterkaryawan';
    private $fields = [
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_lengkap',
        'pendidikan_terakhir',
        'jurusan_pendidikan_terakhir',
        'nomor_hp',
        'kategori',
        'status_pernikahan'
    ];
    private $logs = [
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
        'restored_at',
        'restored_by'
    ];
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_MASTER);
    }

    public function getAllData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->fetchAll();
    }

    public function getDataById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_karyawan = :id");
        $this->db->bind("id", $id);
        return $this->db->fetch();
    }

    public function uploadImage()
    {
        $targetDir = 'images/datafoto/'; // direktori tempat menyimpan file upload
        $targetFile = $targetDir . basename($_FILES['foto']['name']); // nama file upload

        // validasi ekstensi file
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }

        try {
            // simpan file upload ke direktori
            move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile);
            echo "The file " . basename($_FILES['foto']['name']) . " has been uploaded.";
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return basename($_FILES['foto']['name']);
    }

    public function tambahData($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :uuid, :foto :nama_lengkap, :jenis_kelamin, :tempat_lahir, :tanggal_lahir, :alamat_lengkap, :pendidikan_terakhir, :jurusan_pendidikan_terakhir,
            :nomor_hp, :kategori, :status_pernikahan, CURRENT_TIMESTAMP, '', CURRENT_TIMESTAMP, '', CURRENT_TIMESTAMP, '', 
            CURRENT_TIMESTAMP, '', CURRENT_TIMESTAMP, '')"
        );

        $this->db->bind('uuid', '49f20563-b288-4561-8b9c-64b8a825893d');
        $this->db->bind('foto', $this->uploadImage());
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id_karyawan = :id");
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                foto = :foto,
                nama_lengkap = :nama_lengkap,
                jenis_kelamin = :jenis_kelamin,
                tempat_lahir = :tempat_lahir,
                tanggal_lahir = :tanggal_lahir,
                alamat_lengkap = :alamat_lengkap,
                pendidikan_terakhir = :pendidikan_terakhir,
                jurusan_pendidikan_terakhir = :jurusan_pendidikan_terakhir,
                nomor_hp = :nomor_hp, 
                kategori = :kategori,
                status_pernikahan = :status_pernikahan
            WHERE id_karyawan = :id"
        );

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('id', $data['id_karyawan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariData()
    {
        $keyword = $_POST['keyword'];

        $this->db->query("SELECT * FROM {$this->table} WHERE nama_lengkap LIKE :keyword");
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->fetchAll();
    }
}
