<?php

class Suratpengajuan_model
{
    private $table = 'pengajuan';
    private $user = 'Admin';
    private $fields = [
        'no_surat',
        'alamat_pengirim',
        'tanggal',
        'tanggal_surat',
        'perihal',
        'nomor_petunjuk'
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
        $this->db = new Database(DB_TU);
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
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :no_surat, :alamat_pengirim, :tanggal, :tanggal_surat, 
            :perihal, :nomor_petunjuk, CURRENT_TIMESTAMP, :requested_by, null, null, 0, 0)"
        );

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind("requested_by", $this->user);

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
                no_surat = :no_surat,
                alamat_pengirim = :alamat_pengirim,
                tanggal = :tanggal,
                tanggal_surat = :tanggal_surat,
                perihal = :perihal,
                nomor_petunjuk = :nomor_petunjuk,
                approved_at = CURRENT_TIMESTAMP,
                approved_by = :approved_by
            WHERE id = :id"
        );

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('approved_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function readReqData()
    {
        $this->db->query("UPDATE {$this->table} SET status = 1 WHERE status = 0");
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getDataApprove()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE is_approved = 1");
        $this->db->execute();
        return $this->db->fetchAll();
    }
    
    public function insertDataApprove()
    {
        $this->db->query("SELECT MAX(nomor_berkas) FROM surat_masuk");
        $this->db->execute();
        $noBerkas = $this->db->fetch();
        $from = $this->getDataApprove();
        $this->db->query(
            "INSERT INTO surat_masuk
                VALUES 
            (null, :nomor_berkas, :col1, :col2, :col3)"
            );
        foreach ($from as $row) {
            var_dump($row);
        }
        $this->db->bind('nomor_berkas', $noBerkas++);
        $this->db->execute();
    }

    public function approveData($id)
    {
        $this->db->query("UPDATE {$this->table} 
            SET 
            approved_at = CURRENT_TIMESTAMP,
            approved_by = :approved_by,
            is_approved = 1
        WHERE id = :id
        ");
        $this->db->bind("approved_by", $this->user);
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function declineData($id)
    {
        $this->db->query("UPDATE {$this->table} SET is_approved = 0 WHERE id = :id");
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
