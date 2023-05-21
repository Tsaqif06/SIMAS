<?php

use Ramsey\Uuid\Uuid;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class Suratpengajuan_model
{
    private $table = 'pengajuan';

    private $fields = [
        'no_surat',
        'alamat_pengirim',
        'tanggal',
        'tanggal_surat',
        'perihal',
        'nomor_petunjuk'
    ];

    private $user;
    private $db;


    public function __construct()
    {
        $this->db = new Database(DB_TU);
        $this->user = Cookie::get_jwt()->name;
    }

    public function getAllData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->fetchAll();
    }

    public function getQueuedData()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE is_approved = 0 AND NOT is_declined = 1");
        return $this->db->fetchAll();
    }

    public function getDataById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = :id");
        $this->db->bind("id", $id);
        return $this->db->fetch();
    }

    public function tambahData($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :uuid, :no_surat, :alamat_pengirim, :tanggal, :tanggal_surat, 
            :perihal, :nomor_petunjuk, CURRENT_TIMESTAMP, :requested_by, null, null, null, null, 0, 0, 0)"
        );

        $this->db->bind('uuid', Uuid::uuid4()->toString());
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind("requested_by", $this->user);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id = :id");
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
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

    public function getDataApprove($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE is_approved = 1 AND id = :id");

        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->fetchAll();
    }

    public function insertDataApprove($id)
    {
        $this->db->query("SELECT MAX(nomor_berkas) FROM surat_masuk");
        $this->db->execute();
        $noBerkas = $this->db->fetch();
        $noBerkas = $noBerkas['MAX(nomor_berkas)'];

        $from = $this->getDataApprove($id);
        $this->db->query(
            "INSERT INTO `surat_masuk`(`id`, `uuid`, `nomor_berkas`, `alamat_pengirim`, `tanggal`, `tanggal_surat`, `nomor_surat`, `perihal`, `nomor_petunjuk`, `created_at`, `created_by`) VALUES
            (null, :uuid, :nomor_berkas, :alamat_pengirim, :tanggal, :tanggal_surat, :no_surat, :perihal, :nomor_petunjuk, :created_at, :created_by)
            "
        );

        foreach ($from as $data) {
            foreach ($this->fields as $field) {
                $this->db->bind($field, $data[$field]);
            }
            $this->db->bind('uuid', $data['uuid']);
            $this->db->bind("created_at", $data["requested_at"]);
            $this->db->bind("created_by", $data["requested_by"]);
        }
        $noBerkas += 1;
        $this->db->bind('nomor_berkas', $noBerkas);
        $this->db->execute();
    }

    public function approveData($id)
    {
        $this->db->query("UPDATE {$this->table} 
            SET 
            approved_at = CURRENT_TIMESTAMP,
            approved_by = :approved_by,
            is_approved = 1,
            is_declined = 0
        WHERE id = :id
        ");
        $this->db->bind("approved_by", $this->user);
        $this->db->bind("id", $id);
        $this->db->execute();

        $this->insertDataApprove($id);

        return $this->db->rowCount();
    }

    public function declineData($id)
    {
        $this->db->query("UPDATE {$this->table}
            SET
            declined_at = CURRENT_TIMESTAMP,
            declined_by = :declined_by,
            is_approved = 0,
            is_declined = 1
        WHERE id = :id
        ");

        $this->db->bind("declined_by", $this->user);
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function importData()
    {
        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/suratpengajuan');
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
