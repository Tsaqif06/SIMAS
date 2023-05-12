<?php

class Perangkat_Ajar_model
{
    private $table = 'tbl_prngktajr';
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KURIKULUM);
    }

    public function getAllPerangkatAjar()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    public function getPerangkatAjarById($id_prngktajr)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_prngktajr=:id_prngktajr');
        $this->db->bind('id_prngktajr', $id_prngktajr);
        return $this->db->fetch();
    }

    public function tambahPerangkatAjar($data)
    {
        $query = "INSERT INTO tbl_prngktajr
                    VALUES
                  ('', :Nama_guru, :perangkat_ajar )";

        $this->db->query($query);
        $this->db->bind('Nama_guru', $data['Nama_guru']);
        $this->db->bind('perangkat_ajar', $data['nrp']);


        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusPerangkatAjar($id)
    {
        $query = "DELETE FROM tbl_prngktajr WHERE  id_prngktajr = : id_prngktajr ";

        $this->db->query($query);
        $this->db->bind(' id_prngktajr ', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahPerangkatAjar($data)
    {
        $query = "UPDATE tbl_prngktajr SET
                    Nama_guru = :Nama_guru,
                    perangkat_ajar = :perangkat_ajar,
                  WHERE id_prngktajr = :id_prngktajr";

        $this->db->query($query);
        $this->db->bind('Nama_guru', $data['Nama_guru']);
        $this->db->bind('perangkat_ajar', $data['perangkat_ajar']);
        $this->db->bind('id_prngktajr', $data['id_prngktajr']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariperangkatajar()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM tbl_prngktajr WHERE Nama_guru LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }
}
