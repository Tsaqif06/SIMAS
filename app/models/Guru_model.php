<?php

class Guru_model
{

    private $table = 'guru', $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->fetchAll();
    }

    public function getDataById($nip)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE nip = :nip"); // : = menghindari sql injection
        $this->db->bind("nip", $nip);
        return $this->db->fetch();
    }

    public function tambahData($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (:nip, :nama, :kelamin, :alamat, :mapel)"
        );

        $this->db->bind('nip', $data['nip']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kelamin', $data['kelamin']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('mapel', $data['mapel']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($nip)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE nip = :nip");
        $this->db->bind("nip", $nip);

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
                kelamin = :kelamin,
                alamat = :alamat,
                mapel = :mapel
            WHERE nip = :nip"
        );

        $this->db->bind('nip', $data['nip']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kelamin', $data['kelamin']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('mapel', $data['mapel']);

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
