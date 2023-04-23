<?php
require_once dirname(dirname(__DIR__)) . '/controllers/login/Login.php';

class Feedback_model extends Database
{


    private $table = 'feedback';
    private $user;

    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KESISWAAN);
        $this->user = Login::getCurrentSession()->username;
    }

    public function getAllFeedback()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }


    public function getFeedbackById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahDataFeedback($data)
    {                     //nama tabel
        $query = "INSERT INTO feedback VALUES(null, :NIS, :EMAIL, :FEEDBACK, CURRENT_TIMESTAMP, null)";

        $this->db->query($query);
        $this->db->bind('NIS', $data['NIS']);
        $this->db->bind('EMAIL', $data['EMAIL']);
        $this->db->bind('FEEDBACK', $data['FEEDBACK']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataFeedback($id)
    {
        $query = "DELETE FROM feedback WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataFeedback($data)
    {                     //nama tabel
        $query = "UPDATE feedback SET
                    NIS = :NIS,
                    EMAIL = :EMAIL,
                    FEEDBACK = :FEEDBACK,
                    updated_at = CURRENT_TIMESTAMP
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('NIS', $data['NIS']);
        $this->db->bind('EMAIL', $data['EMAIL']);
        $this->db->bind('FEEDBACK', $data['FEEDBACK']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
