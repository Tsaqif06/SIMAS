<?php

class Username_model
{
    private $table = 'tbl_usnpw';
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KURIKULUM);
    }

    public function getALLUsername()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    public function getUsernameById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_usnpw=:id_usnpw');
        $this->db->bind('id_usnpw', $id);
        return $this->db->fetch();
    }

    public function tambahUsername($data)
    {
        $query = "INSERT INTO tbl_usnpw
                    VALUES
                  (null, :Kodeguru, :NamaGuru, :Username,  :Password_, :mapel)";

        $this->db->query($query);
        $this->db->bind('Kodeguru', $data['Kodeguru']);
        $this->db->bind('NamaGuru', $data['NamaGuru']);
        $this->db->bind('Username', $data['Username']);
        $this->db->bind('Password_', $data['Password_']);
        $this->db->bind('mapel', $data['mapel']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusUsername($id)
    {
        $query = "DELETE FROM tbl_usnpw WHERE id_usnpw = :id_usnpw";

        $this->db->query($query);
        $this->db->bind('id_usnpw', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahUsername($data)
    {
        $query = "UPDATE tbl_usnpw SET
                    Kodeguru = :Kodeguru,
                    NamaGuru = :NamaGuru,
                    Username = :Username,
                    Password_= :Password_,
                    mapel    = :mapel
                  WHERE id_usnpw = :id_usnpw";

        $this->db->query($query);
        $this->db->bind('Kodeguru', $data['Kodeguru']);
        $this->db->bind('NamaGuru', $data['NamaGuru']);
        $this->db->bind('Username', $data['Username']);
        $this->db->bind('Password_', $data['Password_']);
        $this->db->bind('mapel', $data['mapel']);
        $this->db->bind('id_usnpw', $data['id_usnpw']);

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
