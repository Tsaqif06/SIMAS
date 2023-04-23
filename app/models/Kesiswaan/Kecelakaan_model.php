<?php
require_once dirname(dirname(__DIR__)) . '/controllers/login/Login.php';

class Kecelakaan_model extends Database
{


    private $table = 'asuransikecelakaan';
    private $user;

    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KESISWAAN);
        $this->user = Login::getCurrentSession()->username;
    }

    public function getAllKecelakaan()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }


    public function getKecelakaanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahDataKecelakaan($data)
    {                     //nama tabel
        $query = "INSERT INTO " . $this->table . " VALUES(null, :uuid, :NIS, :tanggalKecelakaan, :jenisKlaimAsuransi)";

        $this->db->query($query);
        $this->db->bind('NIS', $data['NIS']);
        $this->db->bind('uuid', 0);
        $this->db->bind('tanggalKecelakaan', $data['tanggalKecelakaan']);
        $this->db->bind('jenisKlaimAsuransi', $data['jenisKlaimAsuransi']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataKecelakaan($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataKecelakaan($data)
    {                     //nama tabel
        $query = "UPDATE asuransikecelakaan SET
                    NIS = :NIS,
                    tanggalKecelakaan = :tanggalKecelakaan,
                    jenisKlaimAsuransi = :jenisKlaimAsuransi
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('NIS', $data['NIS']);
        $this->db->bind('tanggalKecelakaan', $data['tanggalKecelakaan']);
        $this->db->bind('jenisKlaimAsuransi', $data['jenisKlaimAsuransi']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
