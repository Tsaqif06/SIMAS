<?php

class Mapel_model
{
    private $table = 'mastermapel';
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
        $this->db->query("SELECT * FROM {$this->table} WHERE id_mapel = :id");
        $this->db->bind("id", $id);
        return $this->db->fetch();
    }

    public function tambahData($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :kode_mapel, :nama_mapel, :kurikulum)"
        );

        $this->db->bind('kode_mapel', $data['kode_mapel']);
        $this->db->bind('nama_mapel', $data['nama_mapel']);
        $this->db->bind('kurikulum', $data['kurikulum']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id_mapel = :id");
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                kode_mapel = :kode_mapel,
                nama_mapel = :nama_mapel,
                kurikulum = :kurikulum
                WHERE id_mapel = :id"
        );

        $this->db->bind('kode_mapel', $data['kode_mapel']);
        $this->db->bind('nama_mapel', $data['nama_mapel']);
        $this->db->bind('kurikulum', $data['kurikulum']);
        $this->db->bind('id', $data['id_mapel']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariData()
    {
        $keyword = $_POST['keyword'];

        $this->db->query("SELECT * FROM {$this->table} WHERE nama_mapel LIKE :keyword");
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->fetchAll();
    }
}
