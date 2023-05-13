<?php

class LMS_model
{
    private $table = 'tbl_inbis';
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KURIKULUM);
    }

    public function getAllLMS()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    public function getLMSById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_usnpw =:id_usnpw");
        $this->db->bind('id_usnpw', $id);
        return $this->db->fetch();
    }

    public function tambahLMS($data)
    {
        $query = "INSERT INTO {$this->table}
                    VALUES
                  ('', :Kodeguru, :NamaGuru, :Username, :Password_, :mapel)";

        $this->db->query($query);
        $this->db->bind('Kodeguru', $data['Kodeguru']);
        $this->db->bind('NamaGuru', $data['NamaGuru']);
        $this->db->bind('Username', $data['Username']);
        $this->db->bind('Password_', $data['Password_']);
        $this->db->bind('mapel', $data['mapel']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusLMS($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id_usnpw = :id_usnpw";

        $this->db->query($query);
        $this->db->bind('id_usnpw', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahLMS($data)
    {
        $query = "UPDATE {$this->table} SET
                    Kodeguru = :Kodeguru,
                    NamaGuru = :NamaGuru,
                    Username = :Username,
                    Password_ = :Password_,
                    mapel = :mapel
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

        // $query = "UPDATE {$this->table} SET
        //             Kodeguru = :Kodeguru,
        //             NamaGuru = :NamaGuru,
        //             Username = :Username,
        //             Password_ = :Password_,
        //             mapel = :mapel
        //           WHERE id_usnpw = :id_usnpw";

        // $this->db->query($query);
        // $this->db->bind('Kodeguru', $data['Kodeguru']);
        // $this->db->bind('NamaGuru', $data['NamaGuru']);
        // $this->db->bind('Username', $data['Username']);
        // $this->db->bind('Password_', $data['Password_']);
        // $this->db->bind('mapel', $data['mapel']);
        // $this->db->bind('id_usnpw', $data['id_usnpw']);

        // $this->db->execute();

        // return $this->db->rowCount();
    }


    public function cariDataLMS()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM LMS WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }
}
