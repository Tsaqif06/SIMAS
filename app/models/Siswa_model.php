<?php

class Siswa_model
{

    private $table = 'siswa', $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->fetchAll();
    }

    public function getDataById($nisn)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE nisn=:nisn");
        $this->db->bind("nisn", $nisn);
        return $this->db->fetch();
    }

    public function tambahData($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (:nisn, :nama, :kelamin, :alamat, :ibu, :ayah, :jurusan, :kelas)"
        );

        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kelamin', $data['kelamin']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('ibu', $data['ibu']);
        $this->db->bind('ayah', $data['ayah']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('kelas', $data['kelas']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($nisn)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE nisn = :nisn");
        $this->db->bind("nisn", $nisn);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                nisn = :nisn,
                nama = :nama, 
                kelamin = :kelamin, 
                alamat = :alamat, 
                ibu = :ibu, 
                ayah = :ayah, 
                jurusan = :jurusan, 
                kelas = :kelas
            WHERE nisn = :nisn"
        );

        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kelamin', $data['kelamin']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('ibu', $data['ibu']);
        $this->db->bind('ayah', $data['ayah']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('kelas', $data['kelas']);

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
