<?php

use Ramsey\Uuid\Uuid;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class Siswa_model
{
    private $table = 'mastersiswa';
    private $fields = [
        'nisn',
        'nama_siswa',
        'jalur',
        'jurusan',
        'alamat',
        'nomor_hp_siswa',
        'ayah',
        'ibu',
        'nomor_hp_orangtua',
        'wali',
        'nomor_hp_wali',
        'tahun_diterima',
        'agama',
        'jenis_kelamin',
        'tempat_lahir',
        'kelas',
        'tanggal_lahir',
        'usia_sekarang'
    ];

    private $user;
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_MASTER);
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

    public function getDataById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = :id"); // : = menghindari sql injection
        $this->db->bind("id", $id);
        return $this->db->fetch();
    }

    public function getUmur($birthdate)
    {
        $birthdate = date('Y-m-d', strtotime($birthdate));
        $birthdateObj = new DateTime($birthdate);
        $currentDate = new DateTime();

        // mengambil tanggal dan bulan saat ini
        $currentDayMonth = $currentDate->format('d-m');

        // mengambil tanggal dan bulan tanggal lahir
        $birthDayMonth = $birthdateObj->format('d-m');

        // menghitung umur
        $age = $currentDate->diff($birthdateObj)->y;

        // jika tanggal dan bulan saat ini sama dengan tanggal dan bulan tanggal lahir
        // artinya seseorang sudah berulang tahun, maka tambahkan 1 tahun ke umur
        if ($currentDayMonth == $birthDayMonth) {
            $age++;
        }

        return $age;
    }

    public function tambahData($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :uuid, :nisn, :nama_siswa, :jalur, :jurusan, :alamat, :nomor_hp_siswa, :ayah, :ibu,
            :nomor_hp_orangtua, :wali, :nomor_hp_wali, :tahun_diterima, :agama, :jenis_kelamin,
            :tempat_lahir, :kelas, :tanggal_lahir, :usia_sekarang, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)"
        );

        $this->db->bind('uuid', Uuid::uuid4()->toString());
        foreach ($this->fields as $field) {
            if ($field == 'usia_sekarang') {
                continue;
            }
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('usia_sekarang', $this->getUmur($data['tanggal_lahir']));
        $this->db->bind('created_by', $this->user);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
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

    public function ubahData($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                nisn = :nisn,
                nama_siswa = :nama_siswa,
                jalur = :jalur,
                jurusan = :jurusan,
                alamat = :alamat,
                nomor_hp_siswa = :nomor_hp_siswa,
                ayah = :ayah,
                ibu = :ibu,
                nomor_hp_orangtua = :nomor_hp_orangtua,
                wali = :wali,
                nomor_hp_wali = :nomor_hp_wali,
                tahun_diterima = :tahun_diterima,
                agama = :agama,
                jenis_kelamin = :jenis_kelamin,
                tempat_lahir = :tempat_lahir,
                kelas = :kelas,
                tanggal_lahir = :tanggal_lahir,
                usia_sekarang = :usia_sekarang,
                modified_at = CURRENT_TIMESTAMP,
                modified_by = :modified_by
            WHERE id = :id"
        );

        foreach ($this->fields as $field) {
            if ($field == 'usia_sekarang') {
                continue;
            }
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('usia_sekarang', $this->getUmur($data['tanggal_lahir']));
        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getJmlData()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM {$this->table} WHERE `status` = 1");
        return $this->db->fetch();
    }

    public function importData()
    {
        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/siswa');
            exit;
        }

        // Baca file Excel menggunakan PhpSpreadsheet
        $inputFileName = $_FILES['file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileName);

        // Ambil data dari sheet pertama
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $maxColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        // Daftar kolom yang akan diambil dari file Excel dan disimpan ke database
        $columns = $this->fields;

        // Looping untuk membaca setiap baris data
        for ($row = 2; $row <= $highestRow; $row++) {
            $data = [];

            // Looping untuk membaca setiap kolom data
            for ($col = 2; $col <= count($columns) + 1; $col++) {
                $columnLetter = Coordinate::stringFromColumnIndex($col);
                $cellValue = $worksheet->getCell($columnLetter . $row)->getValue();
                $data[$columns[$col - 2]] = $cellValue;
            }

            // Simpan data ke database
            $response = $this->tambahData($data);
        }
        return $response;
    }
}
