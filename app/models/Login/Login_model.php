<?php

class Login_model
{
    private $table = 'login';
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_USERS);
    }

    // Method untuk login //

    public function loginAdmin($data)
    {
        $this->db->query(
            "SELECT * FROM {$this->table} 
                WHERE 
            `username` = :username AND
            `password` = :password_field
        "
        );

        $this->db->bind("username", $data['username']);
        $this->db->bind("password_field", $data['password']);

        return $this->db->fetch();
    }

    public function loginSiswa($data)
    {
        $this->db->query(
            "SELECT * FROM masterdata.mastersiswa
                WHERE 
            `nama_siswa` = :username AND
            `nis` = :password_field
        "
        );

        $this->db->bind("username", $data['username']);
        $this->db->bind("password_field", $data['password']);

        return $this->db->fetch();
    }

    public function loginSiswaNisn($data)
    {
        $this->db->query(
            "SELECT `imei` FROM masterdata.mastersiswa
                WHERE 
            `nama_siswa` = :username AND
            `nisn` = :password_field"
        );

        $this->db->bind("username", $data['username']);
        $this->db->bind("password_field", $data['password']);

        $imei = $this->db->fetch(PDO::FETCH_COLUMN);

        if (empty($imei) && is_bool($imei)) {
            return $imei;
        } else {
            if (empty($imei) && is_string($imei)) {
                $this->db->query(
                    "UPDATE masterdata.mastersiswa SET `imei` = :imei
                        WHERE
                    `nama_siswa` = :username AND
                    `nisn` = :password_field"
                );

                $this->db->bind("username", $data['username']);
                $this->db->bind("password_field", $data['password']);
                $this->db->bind("imei", $data['imei']);

                $this->db->execute();
            }

            $this->db->query(
                "SELECT * FROM masterdata.mastersiswa
                    WHERE 
                `nama_siswa` = :username AND
                `nisn` = :password_field AND
                `imei` = :imei"
            );

            $this->db->bind("username", $data['username']);
            $this->db->bind("password_field", $data['password']);
            $this->db->bind("imei", $data['imei']);

            return $this->db->fetch();
        }
    }


    public function loginGuru($data)
    {
        $this->db->query(
            "SELECT * FROM masterdata.masterguru
                WHERE
            `nama_lengkap` = :username AND
            `nip` = :password_field
        "
        );

        $this->db->bind("username", $data['username']);
        $this->db->bind("password_field", $data['password']);

        return $this->db->fetch();
    }


    public function log($id)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                last_login_at = CURRENT_TIMESTAMP,
                status_login = 1
            WHERE id = :id"
        );

        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function logout($id)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                status_login = 0
            WHERE id = :id"
        );

        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    // Method untuk otentikasi jwt //

    public function authentication($jwt)
    {
        switch ($jwt->role) {
            case 'admin':
                $this->db->query(
                    "SELECT `username`, `password`, `email` FROM {$this->table}
                        WHERE
                    `id` = :id AND
                    `username` = :username"
                );
                break;
            case 'siswa':
                $this->db->query(
                    "SELECT `nama_siswa`, `nis` FROM masterdata.mastersiswa
                        WHERE
                    `id` = :id AND
                    `nama_siswa` = :username"
                );
                break;
            case 'guru':
                $this->db->query(
                    "SELECT `nama_lengkap`, `nip` FROM masterdata.masterguru
                        WHERE
                    `id` = :id AND
                    `nama_lengkap` = :username"
                );
                break;
            default:
                $this->db->query(
                    "SELECT * FROM {$this->table}
                        WHERE
                    `id` = :id AND
                    `username` = :username"
                );
        }

        $this->db->bind('id', $jwt->sub);
        $this->db->bind('username', $jwt->name);

        $result = $this->db->fetch(PDO::FETCH_NUM);

        return [
            'username' => $result[0],
            'password' => $result[1],
            'email' => isset($result[2]) ? $result[2] : '-',
            'role' => $jwt->role,
            'hak_akses' => $jwt->akses
        ];
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
