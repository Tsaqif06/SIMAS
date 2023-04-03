<?php

class Suratmasuk_model
{
    private $table = 'surat_masuk';
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
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :nomor_berkas, :alamat_pengirim, :tanggal, :tanggal_surat,
            :nomor_surat, :perihal, :nomor_petunjuk)"
        );

        $this->db->bind('nomor_berkas', $data['nomor_berkas']);
        $this->db->bind('alamat_pengirim', $data['alamat_pengirim']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('tanggal_surat', $data['tanggal_surat']);
        $this->db->bind('nomor_surat', $data['nomor_surat']);
        $this->db->bind('perihal', $data['perihal']);
        $this->db->bind('nomor_petunjuk', $data['nomor_petunjuk']);

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

        $this->db->bind('nomor_berkas', $data['nomor_berkas']);
        $this->db->bind('alamat_pengirim', $data['alamat_pengirim']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('tanggal_surat', $data['tanggal_surat']);
        $this->db->bind('nomor_surat', $data['nomor_surat']);
        $this->db->bind('perihal', $data['perihal']);
        $this->db->bind('nomor_petunjuk', $data['nomor_petunjuk']);
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
