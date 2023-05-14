<?php

use Ramsey\Uuid\Uuid;

class Kalender_model
{
    private $table = 'schedule_list';
    private $db;
    private $user;

    public function __construct()
    {
        $this->db = new Database(DB_KURIKULUM);
        $this->user = Cookie::get_jwt()->name;
    }

    public function getAllKalender()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    public function hapusDataKalender($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id = :id");
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function saveDataKalender($data)
    {
        // Check if id field is empty string or not. if empty then add data, else if not empty then edit the data.
        if ($data['id'] == '') {
            $this->db->query(
                "INSERT INTO {$this->table}
                    VALUES
                (null, :uuid, :title, :description, :start_datetime, :end_datetime, 
                '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)"
            );

            $this->db->bind('uuid', Uuid::uuid4()->toString());
            $this->db->bind('created_by', $this->user);
        } else {
            $this->db->query(
                "UPDATE {$this->table} 
                    SET 
                    `title` = :title,
                    `description` = :description,
                    `start_datetime` = :start_datetime,
                    `end_datetime` = :end_datetime,
                    `modified_at` = CURRENT_TIMESTAMP,
                    `modified_by` = :modified_by
                WHERE id = :id"
            );
            
            $this->db->bind('id', $data['id']);
            $this->db->bind('modified_by', $this->user);
        }

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
