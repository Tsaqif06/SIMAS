<?php

class Struktur_Kurikulum_model
{
    private $table = 'tbl_struktur_kurkul';
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KURIKULUM);
    }

    public function getAllStruktur()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    public function getStrukturById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahDataStruktur($data)
    {
        $query = "INSERT INTO tbl_struktur_kurkul
                    VALUES
                  ('', :struktur)";

        $this->db->query($query);
        $this->db->bind('struktur', $data['struktur']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataStruktur($id)
    {
        $query = "DELETE FROM tbl_struktur_kurkul WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataStruktur($data)
    {
        $query = "UPDATE tbl_struktur_kurkul SET
                    struktur = :struktur
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('struktur', $data['struktur']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataStruktur()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM Struktur WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }
}
