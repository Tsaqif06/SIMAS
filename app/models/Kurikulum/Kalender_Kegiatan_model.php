<?php

class Kalender_Kegiatan_model
{
    private $table = 'schedule_list';
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KURIKULUM);
    }

    public function getAllKalender()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    public function hapusDataKalender($id)
    {
        require_once('../views/kalender/db-connect.php');
        $query = "DELETE FROM schedule_list WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function saveDataKalender()
    {
        require_once('../views/kalender/db-connect.php');
        $query = "INSERT INTO schedule_list
                        VALUES
                        (null, :title, :description, :start_datetime, :end_datetime)";
        $this->db->query($query);

        //binding
        $this->db->bind('title', $data['title']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('start_datetime', $data['start_datetime']);
        $this->db->bind('end_datetime', $data['end_datetime']);
        //eksekusi binding
        $this->db->execute();

        //mengembalikan nilai angka
        return $this->db->rowCount();
    }
}
