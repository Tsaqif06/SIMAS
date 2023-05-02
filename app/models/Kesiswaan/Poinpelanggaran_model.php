<?php
require_once dirname(dirname(__DIR__)) . '/controllers/login/Login.php';

class Poinpelanggaran_model extends Database
{

    private $table = 'poinpelanggaran';
    private $user;
    private $fields = [
        'namaPelanggaran',
        'poinPelanggaran'
    ];
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KESISWAAN);
        $this->user = Login::getCurrentSession()->username;
    }

    public function getAllData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->fetchAll();
    }

    public function getAllExistData()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE `status` = 1");
        return $this->db->fetchAll();
    }

    public function getAllDeletedData()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE `status` = 0");
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
        $query = "INSERT INTO poinpelanggaran VALUES(
            null, :uuid, :namaPelanggaran, :poinPelanggaran, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', '8');
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }

        $this->db->bind('created_by', $this->user);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPoinpelanggaran($id)
    {
        $this->db->query(
            "UPDATE {$this->table}  
                SET 
                deleted_at = CURRENT_TIMESTAMP,
                deleted_by = :deleted_by,
                is_deleted = 1
            WHERE id = :id"
        );

        $this->db->bind('deleted_by', $this->user);
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataPermanen($id)
    {
        $this->db->query(
            "DELETE FROM {$this->table} WHERE id = :id"
        );

        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataPoinpelanggaran($data)
    {                     //nama tabel
        $query = "UPDATE poinpelanggaran SET
                    namaPelanggaran = :namaPelanggaran,
                    poinPelanggaran = :poinPelanggaran,
                    modified_at = CURRENT_TIMESTAMP,
                    modified_by = :modified_by
                    WHERE id = :id";

        $this->db->query($query);
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}