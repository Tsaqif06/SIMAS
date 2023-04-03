<?php

class Kompkeahlian_model
{
    private $table = 'masterkompetensikeahlian';
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
        $this->db->query("SELECT * FROM {$this->table} WHERE id_kompkeahlian = :id");
        $this->db->bind("id", $id);
        return $this->db->fetch();
    }

    public function tambahData($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :kode_kompkeahlian, :nama_kompkeahlian)"
        );

        $this->db->bind('kode_kompkeahlian', $data['kode_kompkeahlian']);
        $this->db->bind('nama_kompkeahlian', $data['nama_kompkeahlian']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id_kompkeahlian = :id");
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                kode_kompkeahlian = :kode_kompkeahlian,
                nama_kompkeahlian = :nama_kompkeahlian
            WHERE id_kompkeahlian = :id"
        );

        $this->db->bind('kode_kompkeahlian', $data['kode_kompkeahlian']);
        $this->db->bind('nama_kompkeahlian', $data['nama_kompkeahlian']);
        $this->db->bind('id', $data['id_kompkeahlian']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariData()
    {
        $keyword = $_POST['keyword'];

        $this->db->query("SELECT * FROM {$this->table} WHERE nama_kompkeahlian LIKE :keyword");
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->fetchAll();
    }
}
