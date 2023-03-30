<?php

class Notif
{
    public static function bind($stmt, $param, $value, $type = null) // data binding untuk terhindar dari sql injection
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $stmt->bindValue($param, $value, $type);
    }

    public static function add($message, $target)
    {
        $dbh = new PDO("mysql:host=localhost;dbname=crud-test", "root", "");
        $stmt = $dbh->prepare(
            "INSERT TO `notification`
        VALUES
      (null, :notif_message, :notif_target, null, 0)"
        );

        self::bind($stmt, 'notif_message', $message);
        self::bind($stmt, 'notif_target', $target);

        $stmt->execute();
    }

    public static function count()
    {
        $dbh = new PDO("mysql:host=localhost;dbname=crud-test", "root", "");
        $stmt = $dbh->prepare("SELECT id FROM `notification` WHERE notif_read = 0");
        $stmt->execute();

        return $stmt->rowCount();
    }

    public static function readAll()
    {
        $dbh = new PDO("mysql:host=localhost;dbname=crud-test", "root", "");
        $stmt = $dbh->prepare(
            "SELECT 
        `notif_time` as `time`,
        `notif_message` as `message` 
      FROM `notification`
      WHERE `notif_read` = 0"
        );
        $stmt->execute();
        $result = $stmt->fetchAll();

        $stmt = $dbh->prepare("UPDATE `notification` SET notif_read = 1");
        $stmt->execute();
        return $result;
    }
}
