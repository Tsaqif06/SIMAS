<?php

class Karyawan_model
{

    private $table = 'karyawan', $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultSet();
    }

    public function getDataById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = :id"); // : = menghindari sql injection
        $this->db->bind("id", $id);
        return $this->db->single();
    }

    public function tambahData($data)
    {
        $query = "INSERT INTO {$this->table}
                    VALUES 
                    (null, :nip, :nama, :telepon, :jenisKelamin, :alamat, :jabatan)";
        $this->db->query($query);
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
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $query = "UPDATE {$this->table}
                    SET 
                    nip = :nip,
                    nama = :nama,
                    telepon = :telepon,
                    jenisKelamin = :jenisKelamin,
                    alamat = :alamat,
                    jabatan = :jabatan
                    WHERE id = :id";

        $this->db->query($query);
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
        $query = "SELECT * FROM {$this->table} WHERE nama LIKE :keyword";

        $this->db->query($query);
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->resultSet();
    }
}
