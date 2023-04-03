<?php

class Walikelas_model
{
    private $table = 'masterwalikelas';
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_MASTER);
    }

    public function getAllData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->fetchAll();
    }

    public function getDataById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_walikelas = :id");
        $this->db->bind("id", $id);
        return $this->db->fetch();
    }

    public function tambahData($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :nama_walikelas, :nama_kelas)"
        );

        $this->db->bind('nama_walikelas', $data['nama_walikelas']);
        $this->db->bind('nama_kelas', $data['nama_kelas']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id_walikelas = :id");
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                nama_walikelas = :nama_walikelas,
                nama_kelas = :nama_kelas
            WHERE id_walikelas = :id"
        );

        $this->db->bind('nama_walikelas', $data['nama_walikelas']);
        $this->db->bind('nama_kelas', $data['nama_kelas']);
        $this->db->bind('id', $data['id_walikelas']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariData()
    {
        $keyword = $_POST['keyword'];

        $this->db->query("SELECT * FROM {$this->table} WHERE tingkat LIKE :keyword");
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->fetchAll();
    }
}
