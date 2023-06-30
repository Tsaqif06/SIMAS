<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Ramsey\Uuid\Uuid;

class peminjamanBarang_models
{
    private $table = 'peminjaman';
    private $user;
    private $db;
    private $fields = [
        'tanggal',
        'nama',
        'kelas',
        'namabarang',
        'jumlahbarang',
        'tglpengembalian',
        'keterangan'
    ];

    public function __construct()
    {
        $this->db = new Database(DB_SARPRAS);
        $this->user = Cookie::get_jwt()->name;
    }

    public function getALLDataPeminjamanBarang()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    function getAllExistData()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE `status` = 1');
        return $this->db->fetchAll();
    }
    
    public function getReqData()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE `read_status` = 0");
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function readReqData()
    {
        $this->db->query("UPDATE {$this->table} SET `read_status` = 1 WHERE `read_status` = 0");
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getDataPeminjamanBarangById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahDataPeminjamanBarang($data)
    {
        $this->db->query(
            "INSERT INTO `peminjaman`
                VALUES
            (null, :uuid, :tanggal, :nama, :kelas, :namabarang, :jumlahbarang, :tglpengembalian, :keterangan, 0,
            '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT, 0)"
        );

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }

        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('created_by', $this->user);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPeminjamanBarang($id)
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

    public function ubahStatusPinjam($status, $id)
    {
        $this->db->query(
            "UPDATE `peminjaman` SET
                statuspinjam = :statuspinjam,
                modified_at = CURRENT_TIMESTAMP,
                modified_by = :modified_by
            WHERE id = :id"
        );

        $this->db->bind('id', $id);
        $this->db->bind('statuspinjam', $status);
        $this->db->bind('modified_by', $this->user);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataPeminjamanBarang($data)
    {
        $this->db->query(
            "UPDATE `peminjaman` SET
                nama = :nama,
                kelas = :kelas,
                namabarang = :namabarang,
                tanggal = :tanggal,
                jangkawaktu = :jangkawaktu,
                tglpengembalian = :tglpengembalian,
                keterangan = :keterangan,
                modified_at = CURRENT_TIMESTAMP,
                modified_by = :modified_by
            WHERE id = :id"
        );

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }

        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function importData()
    {
        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/peminjamanBarang');
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
            $response = $this->tambahDataPeminjamanBarang($data);
        }
        return $response;
    }
}
