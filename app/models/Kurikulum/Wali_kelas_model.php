<?php

class Wali_kelas_model
{
    private $table = 'tbl_walikelasx';
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KURIKULUM);
    }

    public function getAllWalikelas()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    public function getWalikelasById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahwalikelas($data)
    {
        $query = "INSERT INTO tbl_walikelasx
                    VALUES
                  ('', :Nama, :NIP, :Gol, :Pangkat, :Jabatan, :Telepon)";

        $this->db->query($query);
        $this->db->bind('Nama', $data['Nama']);
        $this->db->bind('NIP', $data['NIP']);
        $this->db->bind('Gol', $data['Gol']);
        $this->db->bind('Pangkat', $data['Pangkat']);
        $this->db->bind('Jabatan', $data['Jabatan']);
        $this->db->bind('Telepon', $data['Telepon']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusWalikelas($id)
    {
        $query = "DELETE FROM tbl_walikelasx WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahWalikelas($data)
    {
        $query = "UPDATE tbl_walikelasx SET
                    Nama = :Nama,
                    NIP = :NIP,
                    Gol = :Gol,
                    Pangkat = :Pangkat,
                    Jabatan = :Jabatan,
                    Telepon = :Telepon
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('Nama', $data['Nama']);
        $this->db->bind('NIP', $data['NIP']);
        $this->db->bind('Gol', $data['Gol']);
        $this->db->bind('Pangkat', $data['Pangkat']);
        $this->db->bind('Jabatan', $data['Jabatan']);
        $this->db->bind('Telepon', $data['Telepon']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }
}
