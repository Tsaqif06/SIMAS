<?php
require_once dirname(dirname(__DIR__)) . '/controllers/login/Login.php';

class Poinpelanggaran_model extends Database{

    private $table = 'poinpelanggaran';
    private $user;

    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KESISWAAN);
        $this->user = Login::getCurrentSession()->username;
    }

    public function getAllPoinpelanggaran()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }
    

    public function getPoinpelanggaranById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }   

    public function tambahDataPoinpelanggaran($data)
    {                     //nama tabel
        $query = "INSERT INTO poinpelanggaran VALUES(null, :namaPelanggaran, :poinPelanggaran)";
        
        $this->db->query($query);
        $this->db->bind('namaPelanggaran', $data['namaPelanggaran']);
        $this->db->bind('poinPelanggaran', $data['poinPelanggaran']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPoinpelanggaran($id)
    {
        $query = "DELETE FROM poinpelanggaran WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }  

    public function ubahDataPoinpelanggaran($data)
    {                     //nama tabel
        $query = "UPDATE poinpelanggaran SET
                    namaPelanggaran = :namaPelanggaran,
                    poinPelanggaran = :poinPelanggaran
                    WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('namaPelanggaran', $data['namaPelanggaran']);
        $this->db->bind('poinPelanggaran', $data['poinPelanggaran']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}