<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Ramsey\Uuid\Uuid;

class dataperbaikanPrasarana_models
{
    private $table = 'data_perbaikan';
    private $user;
    private $db;
    private $fields = [
        'kode',
        'barang',
        'pengajuan',
        'tindakan',
        'kondisi_awal',
        'kondisi_akhir',
        // 'statusperbaikan',
        'teknisi'
    ];

    public function __construct()
    {
        $this->db = new Database(DB_SARPRAS);
        $this->user = Cookie::get_jwt()->name;
    }

    public function getALLPerbaikanPrasarana()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    function getAllExistData()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE `status` = 1');
        return $this->db->fetchAll();
    }

    public function getPerbaikanPrasaranaById($id)
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
            header('location: ' . BASEURL . '/perbaikan');
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
            $response = $this->tambahDataPerbaikanPrasarana($data);
        }
        return $response;
    }


    public function tambahDataPerbaikanPrasarana($data)
    {
        $query = "INSERT INTO data_perbaikan
                    VALUES
                  (null, :uuid, :kode, :barang, :pengajuan, :tindakan, :kondisi_awal, :kondisi_akhir, NULL, :teknisi, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('created_by', $this->user);


        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPerbaikanPrasarana($id)
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



    public function ubahDataPerbaikanPrasarana($data)
    {
        $query = "UPDATE data_perbaikan SET
            kode = :kode,
            barang = :barang,
            pengajuan = :pengajuan,
            tindakan = :tindakan,
            kondisi_awal = :kondisi_awal,
            kondisi_akhir = :kondisi_akhir,
            statusperbaikan = :statusperbaikan,
            teknisi = :teknisi,
            modified_at = CURRENT_TIMESTAMP,
            modified_by = :modified_by
        WHERE id = :id";

        $this->db->query($query);
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();

        // salah
        // $query = "UPDATE data_perbaikan SET
        //             kode = :kode,
        //             barang = :barang,
        //             pengajuan = :pengajuan,
        //             tindakan = :tindakan,
        //             kondisi_awal = :kondisi_awal,
        //             kondisi_akhir = :kondisi_akhir,
        //             statusperbaikan = :statusperbaikan,
        //             teknisi = :teknisi
        //           WHERE id = :id";

        // $this->db->query($query);
        // $this->db->bind('kode', $data['kode']);
        // $this->db->bind('barang', $data['barang']);
        // $this->db->bind('pengajuan', $data['pengajuan']);
        // $this->db->bind('tindakan', $data['tindakan']);
        // $this->db->bind('kondisi_awal', $data['kondisi_awal']);
        // $this->db->bind('kondisi_akhir', $data['kondisi_akhir']);
        // $this->db->bind('statusperbaikan', $data['statusperbaikan']);
        // $this->db->bind('teknisi', $data['teknisi']);
        // $this->db->bind('id', $data['id']);

        // return $this->db->rowCount();
    }


    public function cariDataPerbaikan()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM data_perbaikan WHERE nama_perbaikan LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }
}
