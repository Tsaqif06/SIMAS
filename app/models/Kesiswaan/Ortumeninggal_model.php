<?php

use Ramsey\Uuid\Uuid;

class Ortumeninggal_model
{
    private $table = 'asuransiortumeninggal';
    private $fields = [
        'NIS',
        'namaOrtu',
        'tanggalMeninggal',
        'jenisKlaimAsuransi'
    ];

    private $user;
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KESISWAAN);
        $this->user = Cookie::get_jwt()->name;
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

    public function getOrtumeninggalById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahDataOrtumeninggal($data)
    {                     //nama tabel
        $query = "INSERT INTO " . $this->table . " VALUES(
            null, :uuid, :NIS, :namaOrtu, :tanggalMeninggal, :jenisKlaimAsuransi, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }

        $this->db->bind('created_by', $this->user);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataOrtumeninggal($id)
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

    public function ubahDataOrtumeninggal($data)
    {                     //nama tabel
        $query = "UPDATE asuransiortumeninggal SET
                    NIS = :NIS,
                    namaOrtu = :namaOrtu,
                    tanggalMeninggal = :tanggalMeninggal,
                    jenisKlaimAsuransi = :jenisKlaimAsuransi,
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
