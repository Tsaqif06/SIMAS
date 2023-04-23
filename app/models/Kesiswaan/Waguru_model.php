<?php

require_once dirname(dirname(__DIR__)) . '/controllers/login/Login.php';

class Waguru_model extends Database
{

    private $table = 'whatsappguru';
    private $user;

    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KESISWAAN);
        $this->user = Login::getCurrentSession()->username;
    }

    public function getAllWaguru()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }


    public function getWaguruById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahDataWaguru($data)
    {                     //nama tabel
        $query = "INSERT INTO whatsappguru VALUES(null, :nama_whatsapp, :noWA_whatsapp)";

        $this->db->query($query);
        $this->db->bind('nama_whatsapp', $data['nama_whatsapp']);
        $this->db->bind('noWA_whatsapp', $data['noWA_whatsapp']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataWaguru($id)
    {
        $query = "DELETE FROM whatsappguru WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataWaguru($data)
    {                     //nama tabel
        $query = "UPDATE whatsappguru SET
                    nama_whatsapp = :nama_whatsapp,
                    noWA_whatsapp = :noWA_whatsapp
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama_whatsapp', $data['nama_whatsapp']);
        $this->db->bind('noWA_whatsapp', $data['noWA_whatsapp']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
