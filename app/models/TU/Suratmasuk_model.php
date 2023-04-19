<?php

class Suratmasuk_model
{
    private $table = 'surat_masuk';
    private $user = 'Admin';

    private $fields = [
        'alamat_pengirim',
        'tanggal',
        'tanggal_surat',
        'nomor_surat',
        'perihal',
        'nomor_petunjuk'
    ];

    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_TU);
    }

    public function getAllData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
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
        $this->db->query("SELECT MAX(nomor_berkas) FROM surat_masuk");
        $this->db->execute();
        $noBerkas = $this->db->fetch();
        $noBerkas = $noBerkas['MAX(nomor_berkas)'];

        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :nomor_berkas, :alamat_pengirim, :tanggal, :tanggal_surat,
            :nomor_surat, :perihal, :nomor_petunjuk, CURRENT_TIMESTAMP, :created_by)"
        );

        $noBerkas += 1;
        $this->db->bind('nomor_berkas', $noBerkas);
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind("created_by", $this->user);

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

    public function ubahData($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                nomor_berkas = :nomor_berkas,
                alamat_pengirim = :alamat_pengirim,
                tanggal = :tanggal,
                tanggal_surat = :tanggal_surat,
                nomor_surat = :nomor_surat,
                perihal = :perihal,
                nomor_petunjuk = :nomor_petunjuk
            WHERE id = :id"
        );

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariData()
    {
        $keyword = $_POST['keyword'];

        $this->db->query("SELECT * FROM {$this->table} WHERE nomor_berkas LIKE :keyword");
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->fetchAll();
    }
}
