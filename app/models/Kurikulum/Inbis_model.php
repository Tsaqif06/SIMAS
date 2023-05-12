<?php

class Inbis_model
{
    private $table = 'tbl_inbisunggul';
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KURIKULUM);
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
        $query = "INSERT INTO tbl_inbisunggul
                    VALUES
                  (NULL, :jeniskegiatan, :Tujuan, :Strategi, :Indikator, :Pelaksanaan, :Waktu, :Target_)";

        $this->db->query($query);
        $this->db->bind('jeniskegiatan', $data['jeniskegiatan']);
        $this->db->bind('Tujuan', $data['Tujuan']);
        $this->db->bind('Strategi', $data['Strategi']);
        $this->db->bind('Indikator', $data['Indikator']);
        $this->db->bind('Pelaksanaan', $data['Pelaksanaan']);
        $this->db->bind('Waktu', $data['Waktu']);
        $this->db->bind('Target_', $data['Target_']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusInbis($id)
    {
        $query = "DELETE FROM tbl_inbisunggul WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahInbis($data)
    {
        $query = "UPDATE tbl_inbisunggul SET
                    jeniskegiatan = :jeniskegiatan,
                    Tujuan = :Tujuan,
                    Strategi = :Strategi,
                    Indikator = :Indikator,
                    Pelaksanaan = :Pelaksanaan,
                    Waktu = :Waktu,
                    Target_ = :Target_
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('jeniskegiatan', $data['jeniskegiatan']);
        $this->db->bind('Tujuan', $data['Tujuan']);
        $this->db->bind('Strategi', $data['Strategi']);
        $this->db->bind('Indikator', $data['Indikator']);
        $this->db->bind('Pelaksanaan', $data['Pelaksanaan']);
        $this->db->bind('Waktu', $data['Waktu']);
        $this->db->bind('Target_', $data['Target_']);
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
