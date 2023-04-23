<?php
require_once dirname(dirname(__DIR__)) . '/controllers/login/Login.php';

class Ortumeninggal_model extends Database{
    private $table = 'asuransiortumeninggal';
    private $user;

    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KESISWAAN);
        $this->user = Login::getCurrentSession()->username;
    }

    public function getAllOrtumeninggal()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }
    

    public function getOrtumeninggalById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }   

    public function tambahDataOrtumeninggal($data)
    {                     //nama tabel
        $query = "INSERT INTO ". $this->table ." VALUES(null, :uuid, :NIS, :namaOrtu, :tanggalMeninggal, :jenisKlaimAsuransi)";
        
        $this->db->query($query);
        $this->db->bind('NIS', $data['NIS']);
        $this->db->bind('uuid', 0);
        $this->db->bind('namaOrtu', $data['namaOrtu']);
        $this->db->bind('tanggalMeninggal', $data['tanggalMeninggal']);
        $this->db->bind('jenisKlaimAsuransi', $data['jenisKlaimAsuransi']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataOrtumeninggal($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }  

    public function ubahDataOrtumeninggal($data)
    {                     //nama tabel
        $query = "UPDATE asuransiortumeninggal SET
                    NIS = :NIS,
                    namaOrtu = :namaOrtu,
                    tanggalMeninggal = :tanggalMeninggal,
                    jenisKlaimAsuransi = :jenisKlaimAsuransi
                    WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('NIS', $data['NIS']);
        $this->db->bind('namaOrtu', $data['namaOrtu']);
        $this->db->bind('tanggalMeninggal', $data['tanggalMeninggal']);
        $this->db->bind('jenisKlaimAsuransi', $data['jenisKlaimAsuransi']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}