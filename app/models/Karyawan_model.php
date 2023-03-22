<?php

class Karyawan_model
{
    private $table = 'karyawan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
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
            (null, :nip, :nama, :telepon, :jenisKelamin, :alamat, :jabatan)"
        );

        $this->db->bind('nip', $data['nip']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('telepon', $data['telepon']);
        $this->db->bind('jenisKelamin', $data['jenisKelamin']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('jabatan', $data['jabatan']);

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
                nip = :nip,
                nama = :nama,
                telepon = :telepon,
                jenisKelamin = :jenisKelamin,
                alamat = :alamat,
                jabatan = :jabatan
            WHERE id = :id"
        );

        $this->db->bind('nip', $data['nip']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('telepon', $data['telepon']);
        $this->db->bind('jenisKelamin', $data['jenisKelamin']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariData()
    {
        $keyword = $_POST['keyword'];

        $this->db->query("SELECT * FROM {$this->table} WHERE nama LIKE :keyword");
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->fetchAll();
    }
}
