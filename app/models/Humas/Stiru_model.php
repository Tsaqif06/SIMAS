<?php

use Ramsey\Uuid\Uuid;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class Stiru_model
{
    private $table = "studitiru";
    private $user;
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_HUMAS);
        $this->user = Cookie::get_jwt()->name;
    }
    public function getAllStiru()
    {
        $this->db->query('SELECT * FROM ' . $this->table .  ' WHERE `status` = ' . 1  . ' ORDER BY instansi ASC');
        return $this->db->fetchAll();
    }
    public function getStiruById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }
    public function tambahDataStiru($data)
    {
        $query = 'INSERT INTO ' . $this->table . "
            VALUES 
            (null, :uuid, :instansi, :peserta, :tanggal, :tujuan, :tempat, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('instansi', $data['instansi']);
        $this->db->bind('peserta', $data['peserta']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('tujuan', $data['tujuan']);
        $this->db->bind('tempat', $data['tempat']);
        $this->db->bind('created_by', $this->user);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function hapusDataStiru($id)
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
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function ubahDataStiru($data)
    {
        $query = 'UPDATE ' . $this->table . ' SET 
                  instansi = :instansi, 
                  peserta = :peserta, 
                  tanggal = :tanggal, 
                  tujuan = :tujuan, 
                  tempat = :tempat,
                  modified_at = CURRENT_TIMESTAMP,
                  modified_by = :modified_by
                  WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('instansi', $data['instansi']);
        $this->db->bind('peserta', $data['peserta']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('tujuan', $data['tujuan']);
        $this->db->bind('tempat', $data['tempat']);
        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function importData()
    {
        $fields = [
            'instansi',
            'peserta',
            'tanggal',
            'tujuan',
            'tempat'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/stiru/laporanstiru'); // genakno duu iki ne header location, nggak ngerti ngarah nandi aku
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
        $columns = $fields;

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
            $response = $this->tambahDataSTiru($data);
        }
        return $response;
    }
}