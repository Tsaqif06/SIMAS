<?php

use Ramsey\Uuid\Uuid;

class Inbis_model
{
    private $table = 'tbl_inbisunggul';
    private $db;
    private $user;

    public function __construct()
    {
        $this->db = new Database(DB_KURIKULUM);
        $this->user = Cookie::get_jwt()->name;
    }

    public function getAllInbis()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    public function getInbisById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahInbis($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES
            (NULL, :uuid, :jeniskegiatan, :Tujuan, :Strategi, :Indikator, :Pelaksanaan, :Waktu, :Target_,
            '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)"
        );

        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('jeniskegiatan', $data['jeniskegiatan']);
        $this->db->bind('Tujuan', $data['Tujuan']);
        $this->db->bind('Strategi', $data['Strategi']);
        $this->db->bind('Indikator', $data['Indikator']);
        $this->db->bind('Pelaksanaan', $data['Pelaksanaan']);
        $this->db->bind('Waktu', $data['Waktu']);
        $this->db->bind('Target_', $data['Target_']);
        $this->db->bind('created_by', $this->user);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusInbis($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahInbis($data)
    {
        $this->db->query(
            "UPDATE {$this->table} SET
                jeniskegiatan = :jeniskegiatan,
                Tujuan = :Tujuan,
                Strategi = :Strategi,
                Indikator = :Indikator,
                Pelaksanaan = :Pelaksanaan,
                Waktu = :Waktu,
                Target_ = :Target_,
                modified_at = CURRENT_TIMESTAMP,
                modified_by = :modified_by
            WHERE id = :id"
        );

        $this->db->bind('jeniskegiatan', $data['jeniskegiatan']);
        $this->db->bind('Tujuan', $data['Tujuan']);
        $this->db->bind('Strategi', $data['Strategi']);
        $this->db->bind('Indikator', $data['Indikator']);
        $this->db->bind('Pelaksanaan', $data['Pelaksanaan']);
        $this->db->bind('Waktu', $data['Waktu']);
        $this->db->bind('Target_', $data['Target_']);
        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);


        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataInbis()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM Inbis WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }
}
