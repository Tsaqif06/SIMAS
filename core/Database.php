<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh, $stmt; // dbh = database handler, stmt = statement/buat nympan query

    public function __construct()
    {
        // PDO = PHP Data Object
        // data source name / identitas server
        $dsn = "mysql:host={$this->host};dbname={$this->db_name}";
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($params, $value, $type = null) // binding data // terhindar dari sqlinjection
    {
        if (is_null($type)) {
            switch(true) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($params, $value, $type);
    }

    public function execute() // eksekusi query
    {
        $this->stmt->execute();
    }

    public function resultSet() // mengambil banyak data/result
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single() // mengambil satu data/result
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount(); 
    }
}
