<?php

class Login_model
{
    private $table = 'login';
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_USERS);
    }

    // Method untuk lupa sandi //

    public function login($data)
    {
        $this->db->query(
            "SELECT * FROM {$this->table} 
                WHERE 
            `username` = :username AND
            `email` = :email AND
            `password` = :password_field
        ");

        $this->db->bind("username", $data['username']);
        $this->db->bind("email", $data['email']);
        $this->db->bind("password_field", $data['password']);

        return $this->db->fetch();
    }

    // Method untuk otentikasi jwt //
    
    public function authentication($data)
    {
        $query = "";

        $lastKey = key(array_slice($data, -1, 1, true));
        foreach ($data as $key => $val) {
            $query .= $key . " = :" . $key;
            if ($lastKey == $key && $data[$lastKey] == $val) {
                break;
            }
            $query .= " AND ";
        }

        $this->db->query("SELECT * FROM {$this->table} WHERE {$query}");

        foreach ($data as $key => $val) {
            $this->db->bind($key, $val);
        }

        return $this->db->fetch();
    }

    // Method untuk lupa sandi //

    public function checkUser($username, $email)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE `username` = :username AND `email` = :email");
        $this->db->bind("username", $username);
        $this->db->bind("email", $email);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function changePassword($username, $email, $password)
    {
        $this->db->query("UPDATE {$this->table} SET `password` = :password_field WHERE `username` = :username AND `email` = :email");
        $this->db->bind("username", $username);
        $this->db->bind("email", $email);
        $this->db->bind("password_field", $password);
        $this->db->execute();
        return $this->db->rowCount();
    }

}
