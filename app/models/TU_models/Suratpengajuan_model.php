<?php

class Suratpengajuan_model
{
    private $table = 'pengajuan';
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
            (null, :no_surat, :alamat_pengirim, :tanggal, :tanggal_surat, 
            :perihal, :nomor_petunjuk, 0)"
        );

        $this->db->bind('no_surat', $data['no_surat']);
        $this->db->bind('alamat_pengirim', $data['alamat_pengirim']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('tanggal_surat', $data['tanggal_surat']);
        $this->db->bind('perihal', $data['perihal']);
        $this->db->bind('nomor_petunjuk', $data['nomor_petunjuk']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id_pengajuan = :id");
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                no_surat = :no_surat,
                alamat_pengirim = :alamat_pengirim,
                tanggal = :tanggal,
                tanggal_surat = :tanggal_surat,
                perihal = :perihal,
                nomor_petunjuk = :nomor_petunjuk,
            WHERE id_pengajuan = :id"
        );

        $this->db->bind('no_surat', $data['no_surat']);
        $this->db->bind('alamat_pengirim', $data['alamat_pengirim']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('tanggal_surat', $data['tanggal_surat']);
        $this->db->bind('nomor_surat', $data['nomor_surat']);
        $this->db->bind('perihal', $data['perihal']);
        $this->db->bind('nomor_petunjuk', $data['nomor_petunjuk']);
        $this->db->bind('id', $data['id_pengajuan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariData()
    {
        $keyword = $_POST['keyword'];

        $this->db->query("SELECT * FROM {$this->table} WHERE no_surat LIKE :keyword");
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->fetchAll();
    }
}
