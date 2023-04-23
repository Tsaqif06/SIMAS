<?php
require_once dirname(dirname(__DIR__)) . '/controllers/login/Login.php';

class Kehadiran_model extends Database
{


    private $table = 'kehadirans';
    private $user;

    private $fields = [
        'nisn',
        'nama',
        'lokasi',
        'keterangan'
    ];
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KESISWAAN);
        $this->user = Login::getCurrentSession()->username;
    }

    public function getAllKehadiran()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }


    public function getKehadiranById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahDataKehadiran($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :uuid, :nama, :nisn, :keterangan, :lokasi, CURRENT_TIMESTAMP, :attend_by, NULL, NULL, DEFAULT)"
        );
        $this->db->bind('uuid', '49f20563-b288-4561-8b9c-64b8a825893d');
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('attend_by', $this->user);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataKehadiran($id)
    {
        $this->db->query(
            "DELETE FROM {$this->table} WHERE id = :id"
        );

        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataKehadiran($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                nisn = :nisn,
                nama = :nama,
                lokasi = :lokasi,
                keterangan = :keterangan,
                modified_at = CURRENT_TIMESTAMP,
                modified_by = :modified_by
            WHERE id = :id"
        );

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
