<?php

require_once dirname(dirname(__DIR__)) . '/controllers/login/Login.php';

use Ramsey\Uuid\Uuid;

class Suratkeluar_model
{
    private $table = 'surat_keluar';
    private $user;

    private $fields = [
        'alamat_penerima',
        'tanggal',
        'perihal',
        'no_petunjuk'
    ];
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_TU);
        $this->user = Login::getCurrentSession()->username;
    }

    public function getAllData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->fetchAll();
    }

    public function getDataById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = :id");
        $this->db->bind("id", $id);
        return $this->db->fetch();
    }

    public function tambahData($data)
    {
        $this->db->query("SELECT MAX(nomor_berkas) FROM surat_keluar");
        $this->db->execute();
        $noBerkas = $this->db->fetch();
        $noBerkas = $noBerkas['MAX(nomor_berkas)'];

        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :nomor_berkas, :alamat_penerima, 
            :tanggal, :perihal, :no_petunjuk, CURRENT_TIMESTAMP, :created_by)"
        );

        $noBerkas += 1;
        $this->db->bind("nomor_berkas", $noBerkas);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind("created_by", $this->user);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id = :id");
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                nomor_berkas = :nomor_berkas,
                alamat_penerima = :alamat_penerima,
                tanggal = :tanggal,
                perihal = :perihal,
                no_petunjuk = :no_petunjuk
            WHERE id = :id"
        );

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
