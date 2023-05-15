<?php

class Notif
{
  private static $host = DB_HOST;
  private static $user = DB_USER;
  private static $pass = DB_PASS;
  private static $db_name = DB_TU;
  private static $table = 'pengajuan';

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

  public static function count()
  {
    $table = self::$table;

    $dbh = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$user, self::$pass);
    $stmt = $dbh->prepare("SELECT `status` FROM {$table} WHERE `status` = 0");
    $stmt->execute();

    return $stmt->rowCount();
  }

  public static function readAll()
  {
    $table = self::$table;

    $dbh = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$user, self::$pass);
    $stmt = $dbh->prepare("UPDATE {$table} SET `status` = 1");
    $stmt->execute();

    return $stmt->rowCount();
  }
}
