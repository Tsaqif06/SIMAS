<?php
require_once dirname(dirname(__DIR__)) . '/controllers/login/Login.php';

class Izin_model extends Database{
           

    private $table = 'keterangan__izins';
    private $user;

    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KESISWAAN);
        $this->user = Login::getCurrentSession()->username;
    }

    public function getAllIzin()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }
    

    public function getIzinById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }   

    public function tambahDataIzin($data)
    {                     //nama tabel
        $query = "INSERT INTO keterangan__izins VALUES(null, :ID_KEHADIRAN, :KETERANGAN, :STATUSS, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
        
        $this->db->query($query);
        $this->db->bind('ID_KEHADIRAN', $data['ID_KEHADIRAN']);
        $this->db->bind('KETERANGAN', $data['KETERANGAN']);
        $this->db->bind('STATUSS', $data['STATUSS']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataIzin($id)
    {
        $query = "DELETE FROM keterangan__izins WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }  

    public function ubahDataIzin($data)
    {                     //nama tabel
        $query = "UPDATE keterangan__izins SET
                    ID_KEHADIRAN = :ID_KEHADIRAN,
                    KETERANGAN = :KETERANGAN,
                    STATUSS = :STATUSS
                    WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('ID_KEHADIRAN', $data['ID_KEHADIRAN']);
        $this->db->bind('KETERANGAN', $data['KETERANGAN']);
        $this->db->bind('STATUSS', $data['STATUSS']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}