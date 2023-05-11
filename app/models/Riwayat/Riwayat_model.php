<?php

class Riwayat_model
{
    private $user;
    private $databases = [
        'masterdata',
        'tu',
        'kesiswaan'
    ];
    private $db;
    private $rows = [];

    public function __construct()
    {
        $this->db = new Database(DB_MASTER);
        $this->user = Cookie::get_jwt()->name;
    }

    public function getAllTable()
    {
        $tables = [];
        // Query untuk mendapatkan nama semua tabel dari semua database
        foreach ($this->databases as $database) {
            $this->db->query("SHOW TABLES FROM `{$database}`");
            $result = $this->db->fetchAll();
            foreach ($result as $row) {
                // Tambahkan nama tabel ke dalam array $tables jika belum ada
                if (!in_array($row['Tables_in_' . $database], $tables)) {
                    $tables[] = $row['Tables_in_' . $database];
                }
            }
        }
        return $tables;
    }

    public function getDeletedData()
    {
        $tables = $this->getAllTable();
        $deletedRows = [];

        // Iterasi melalui setiap tabel dan tambahkan semua baris yang dihapus ke dalam array $deletedRows
        foreach ($tables as $table) {
            $database = '';
            foreach ($this->databases as $db) {
                $this->db->query("SELECT COUNT(*) AS count FROM information_schema.tables WHERE table_schema = '$db' AND table_name = '$table'");
                $result = $this->db->fetch();
                if ($result['count'] > 0) {
                    $database = $db;
                    break;
                }
            }
            if (empty($database)) {
                continue; // Skip tabel jika tidak ada pada database
            }

            // Cek jika kolom status ada atau tidak
            $this->db->query("SHOW COLUMNS FROM `$database`.`$table`");
            $columns = $this->db->fetchAll();
            $statusColumnExists = false;
            foreach ($columns as $column) {
                if ($column['Field'] == 'status') {
                    $statusColumnExists = true;
                    break;
                }
            }

            // jika status tidak ada, skip tabel
            if (!$statusColumnExists) {
                continue;
            }

            $query = "SELECT * FROM `$database`.`$table` WHERE status = 0";
            $this->db->query($query);
            $rows = $this->db->fetchAll();
            foreach ($rows as $row) {
                $deletedRows[] = [
                    'database' => $database,
                    'table' => $table,
                    'row' => $row
                ];
            }
        }

        return $deletedRows;
    }

    public function getDeletedDataByIndex($index)
    {
        return $this->getDeletedData()[$index];
    }

    public function restoreData($uuid, $db)
    {
        $this->db->query(
            "UPDATE {$db}
                SET 
                restored_at = CURRENT_TIMESTAMP,
                restored_by = :restored_by,
                is_restored = 1,
                is_deleted = 0
            WHERE uuid = :uuid"
        );

        $this->db->bind('restored_by', $this->user);
        $this->db->bind("uuid", $uuid);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deletePermanentData($uuid, $db)
    {
        $this->db->query(
            "DELETE FROM {$db} WHERE uuid = :uuid"
        );

        $this->db->bind("uuid", $uuid);

        $this->db->execute();
        return $this->db->rowCount();
    }
}