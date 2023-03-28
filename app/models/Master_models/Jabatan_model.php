<?php

class Jabatan_model
{
    private $table = 'masterjabatan';
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
        $this->db->query("SELECT * FROM {$this->table} WHERE id_jabatan = :id");
        $this->db->bind("id", $id);
        return $this->db->fetch();
    }

    public function tambahData($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :jabatan, :nama_yang_menjabat)"
        );

        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('nama_yang_menjabat', $data['nama_yang_menjabat']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id_jabatan = :id");
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                jabatan = :jabatan,
                nama_yang_menjabat = :nama_yang_menjabat
            WHERE id_jabatan = :id"
        );

        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('nama_yang_menjabat', $data['nama_yang_menjabat']);
        $this->db->bind('id', $data['id_jabatan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariData()
    {
        $keyword = $_POST['keyword'];

        $this->db->query("SELECT * FROM {$this->table} WHERE jabatan LIKE :keyword");
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->fetchAll();
    }
}
