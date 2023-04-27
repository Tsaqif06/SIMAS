<?php

require_once dirname(dirname(__DIR__)) . '/controllers/login/Login.php';
class Pelanggaran_model extends Database{
    private $table = 'datapelanggaran';
    private $user;

    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KESISWAAN);
        $this->user = Login::getCurrentSession()->username;
    }

    public function getAllPelanggaran()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }
    

    public function getPelanggaranById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }   

    public function tambahDataPelanggaran($data)
    {                     //nama tabel
        $query = "INSERT INTO ". $this->table ." VALUES(null, :NIS, :namaPelanggar, :namaDataPelanggaran, :poinDataPelanggaran, 100, DEFAULT)";
        
        $this->db->query($query);
        $this->db->bind('NIS', $data['NIS']);
        $this->db->bind('namaPelanggar', $data['namaPelanggar']);
        $this->db->bind('namaDataPelanggaran', $data['namaDataPelanggaran']);
        $this->db->bind('poinDataPelanggaran', $data['poinDataPelanggaran']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPelanggaran($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }  

    public function ubahDataPelanggaran($data)
    {                     //nama tabel
        $query = "UPDATE datapelanggaran SET
                    NIS = :NIS,
                    namaPelanggar = :namaPelanggar,
                    namaDataPelanggaran = :namaDataPelanggaran,
                    poinDataPelanggaran = :poinDataPelanggaran
                    WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('NIS', $data['NIS']);
        $this->db->bind('namaPelanggar', $data['namaPelanggar']);
        $this->db->bind('namaDataPelanggaran', $data['namaDataPelanggaran']);
        $this->db->bind('poinDataPelanggaran', $data['poinDataPelanggaran']);;
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}