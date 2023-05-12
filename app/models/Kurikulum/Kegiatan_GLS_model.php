<?php

class Kegiatan_GLS_model
{
    private $table = 'tbl_glsunggul';
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KURIKULUM);
    }

    public function getALLGLS()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    public function getGLSById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahGLS($data)
    {
        $query = "INSERT INTO tbl_glsunggul
                    VALUES
                  (null, :jeniskegiatan, :Tujuan, :Strategi, :Indikator, :Pelaksanaan, :Waktu, :Target_)";

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

    public function hapusGLS($id)
    {
        $query = "DELETE FROM tbl_glsunggul WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahGLS($data)
    {
        $query = "UPDATE tbl_glsunggul SET
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


    public function cariDataStruktur()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM struktur WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }
}
