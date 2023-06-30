<?php

use Ramsey\Uuid\Uuid;

class Username_model
{
    private $table = 'tbl_usnpw';
    private $db;
    private $user;

    public function __construct()
    {
        $this->db = new Database(DB_KURIKULUM);
        $this->user = Cookie::get_jwt()->name;
    }

    public function getALLUsername()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    public function getUsernameById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_usnpw=:id_usnpw");
        $this->db->bind('id_usnpw', $id);
        return $this->db->fetch();
    }

    public function tambahUsername($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES
            (null, :uuid, :Kodeguru, :NamaGuru, :Username,  :Password_, :mapel,
            '', CURRENT_IMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)"
        );

        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('Kodeguru', $data['Kodeguru']);
        $this->db->bind('NamaGuru', $data['NamaGuru']);
        $this->db->bind('Username', $data['Username']);
        $this->db->bind('Password_', $data['Password_']);
        $this->db->bind('mapel', $data['mapel']);
        $this->db->bind('created_by', $this->user);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusUsername($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id_usnpw = :id_usnpw");
        $this->db->bind('id_usnpw', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahUsername($data)
    {
        $this->db->query(
            "UPDATE {$this->table} SET
                Kodeguru = :Kodeguru,
                NamaGuru = :NamaGuru,
                Username = :Username,
                Password_= :Password_,
                mapel    = :mapel,
                modified_at = CURRENT_TIMESTAMP,
                modified_by = :modified_by
            WHERE id_usnpw = :id_usnpw"
        );

        $this->db->bind('Kodeguru', $data['Kodeguru']);
        $this->db->bind('NamaGuru', $data['NamaGuru']);
        $this->db->bind('Username', $data['Username']);
        $this->db->bind('Password_', $data['Password_']);
        $this->db->bind('mapel', $data['mapel']);
        $this->db->bind('modified_by', $this->user);
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
