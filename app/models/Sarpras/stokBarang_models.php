<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Ramsey\Uuid\Uuid;

class stokBarang_models
{
    // private $host = DB_HOST;
    // private $user = DB_USER;
    // private $pass = DB_PASS;
    // private $db_name = DB_NAME;

    // const $con = mysqli_connect($host, $user, $pass, $db); 

    private $table = 'stok_barang';
    private $db;
    private $fields = [
        'kode',
        'barang',
        'stok',
        'harga',
        'kategori',
        'upc'
    ];
    private $host;
    private $user;
    private $pass;
    // private $db = "sarpras";
    // $conn = mysqli_connect($host, $user, $pass, $db);

    public function __construct()
    {
        $this->db = new Database(DB_SARPRAS);
    }

    public function getALLDataStokBarang()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }
    function getAllExistData()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE `status` = 1');
        return $this->db->fetchAll();
    }

    public function getDataStokBarangById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function importData()
    {
        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/stokBarang');
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
            $response = $this->tambahDataStokBarang($data);
        }
        return $response;
    }

    public function tambahDataStokBarang($data)
    {
        $query = "INSERT INTO stok_barang
                    VALUES
                  (null, :uuid, :kode, :barang, :stok, :harga, :kategori, :upc, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('created_by', "Super Admin");


        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataStokBarang($id)
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

        $this->db->bind('deleted_by', "Super Admin");
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function ubahDataStokBarang($data)
    {
        $query = "UPDATE stok_barang SET
                    kode = :kode,
                    barang = :barang,
                    stok = :stok,
                    harga = :harga,
                    kategori = :kategori,
                    upc = :upc,
                    modified_at = CURRENT_TIMESTAMP,
                    modified_by = :modified_by
                WHERE id = :id";

        $this->db->query($query);
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('modified_by', "Super Admin");
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataStok()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM stok_barang WHERE namabarang_stok LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }
}
