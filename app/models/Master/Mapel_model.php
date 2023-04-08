<?php

class Mapel_model
{
    private $table = 'mastermapel';
    private $fields = [
        'kode_mapel',
        'nama_mapel',
        'kurikulum'
    ];
    private $logs = [
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
        'restored_at',
        'restored_by'
    ];
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_MASTER);
    }

    public function getAllData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->fetchAll();
    }

    public function getDataById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_mapel = :id");
        $this->db->bind("id", $id);
        return $this->db->fetch();
    }

    public function tambahData($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :uuid, :kode_mapel, :nama_mapel, :kurikulum, CURRENT_TIMESTAMP, '', CURRENT_TIMESTAMP, '', CURRENT_TIMESTAMP, '', 
            CURRENT_TIMESTAMP, '', CURRENT_TIMESTAMP, '')"
        );

        $this->db->bind('uuid', '49f20563-b288-4561-8b9c-64b8a825893d');
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id_mapel = :id");
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                kode_mapel = :kode_mapel,
                nama_mapel = :nama_mapel,
                kurikulum = :kurikulum
                WHERE id_mapel = :id"
        );

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('id', $data['id_mapel']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariData()
    {
        $keyword = $_POST['keyword'];

        $this->db->query("SELECT * FROM {$this->table} WHERE nama_mapel LIKE :keyword");
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->fetchAll();
    }
}
