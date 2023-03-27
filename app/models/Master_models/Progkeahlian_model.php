<?php

class Progkeahlian_model
{
    private $table = 'masterprogramkeahlian';
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
        $this->db->query("SELECT * FROM {$this->table} WHERE id_programkeahlian = :id");
        $this->db->bind("id", $id);
        return $this->db->fetch();
    }

    public function tambahData($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :nama_jurusan, :program_keahlian)"
        );

        $this->db->bind('nama_jurusan', $data['nama_jurusan']);
        $this->db->bind('program_keahlian', $data['program_keahlian']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id_programkeahlian = :id");
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                nama_jurusan = :nama_jurusan,
                program_keahlian = :program_keahlian
              WHERE id_programkeahlian = :id"
        );

        $this->db->bind('nama_jurusan', $data['nama_jurusan']);
        $this->db->bind('program_keahlian', $data['program_keahlian']);
        $this->db->bind('id', $data['id_programkeahlian']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariData()
    {
        $keyword = $_POST['keyword'];

        $this->db->query("SELECT * FROM {$this->table} WHERE nama_jurusan LIKE :keyword");
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->fetchAll();
    }
}
