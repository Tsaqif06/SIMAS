<?php

use Ramsey\Uuid\Uuid;

class Asuransi_model
{
    private $table_main = 'klaimasuransi';
    private $fields = [
        'email',
        'jenisKlaimAsuransi',
        'nama',
        'NIS',
        'programKeahlian',
        'kelas',
        'jurusan',
        'kodeKelas',
        'noHP'
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
        $this->db->query("SELECT * FROM {$this->table_main}");
        return $this->db->fetchAll();
    }

    public function getAllExistData()
    {
        $this->db->query("SELECT * FROM {$this->table_main} WHERE `status` = 1");
        return $this->db->fetchAll();
    }

    public function getAllDeletedData()
    {
        $this->db->query("SELECT * FROM {$this->table_main} WHERE `status` = 0");
        return $this->db->fetchAll();
    }


    public function getAsuransiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table_main . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahDataAsuransi($data)
    {                     //nama tabel
        $query = "INSERT INTO " . $this->table_main . " VALUES(
            null, :uuid, :email, :jenisKlaimAsuransi, :nama, :NIS, :programKeahlian, :kelas, :jurusan, :kodeKelas, :noHP, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('created_by', $this->user);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataAsuransi($id)
    {
        $this->db->query(
            "UPDATE {$this->table_main}  
                SET 
                deleted_at = CURRENT_TIMESTAMP,
                deleted_by = :deleted_by,
                is_deleted = 1,
                is_restored = 0
            WHERE id = :id"
        );

        $this->db->bind('deleted_by', $this->user);
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataAsuransi($data)
    {                     //nama tabel
        $query = "UPDATE klaimasuransi SET
                    email = :email,
                    jenisKlaimAsuransi = :jenisKlaimAsuransi,
                    nama = :nama,
                    NIS = :NIS,
                    programKeahlian = :programKeahlian,
                    kelas = :kelas,
                    jurusan = :jurusan,
                    kodeKelas = :kodeKelas,
                    noHP = :noHP,
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
