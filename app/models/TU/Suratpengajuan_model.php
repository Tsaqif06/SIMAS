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

    public function getQueuedData()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE is_approved = 0");
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

    public function getDataApprove($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE is_approved = 1 AND id = :id");

        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->fetchAll();
    }
    
    public function insertDataApprove($id)
    {
        $this->db->query("SELECT MAX(nomor_berkas) FROM surat_masuk");
        $this->db->execute();
        $noBerkas = $this->db->fetch();
        $noBerkas = $noBerkas['MAX(nomor_berkas)'];

        $from = $this->getDataApprove($id);
        $this->db->query(
            "INSERT INTO `surat_masuk`(`id`, `nomor_berkas`, `alamat_pengirim`, `tanggal`, `tanggal_surat`, `nomor_surat`, `perihal`, `nomor_petunjuk`, `created_at`, `created_by`) VALUES
            (null, :nomor_berkas, :alamat_pengirim, :tanggal, :tanggal_surat, :no_surat, :perihal, :nomor_petunjuk, :created_at, :created_by)
            ");
        foreach ($from as $data) {
            foreach ($this->fields as $field) {
                $this->db->bind($field, $data[$field]);
            }
            $this->db->bind("created_at", $data["requested_at"]);
            $this->db->bind("created_by", $data["requested_by"]);
        }
        $noBerkas += 1;
        $this->db->bind('nomor_berkas', $noBerkas);
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
        
        $this->insertDataApprove($id);

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
