<?php

class TU_model
{

    private $table = 'siswa', $db;

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
        $this->db->query("SELECT * FROM {$this->table} WHERE id=:id"); // : = menghindari sql injection
        $this->db->bind("id", $id);
        return $this->db->single();
    }

    public function tambahData($data)
    {
        $query = "INSERT INTO {$this->table}
                    VALUES 
                    (null, :nama, :email, :jurusan)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

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
                    nama = :nama,
                    email = :email,
                    jurusan = :jurusan
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
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
