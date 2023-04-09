<?php

class Siswa_model
{
    private $table = 'mastersiswa';
    private $user = 'Admin';
    private $fields = [
        'nisn',
        'nama_siswa',
        'jalur',
        'jurusan',
        'alamat',
        'nomor_hp_siswa',
        'ayah',
        'ibu',
        'nomor_hp_orangtua',
        'wali',
        'nomor_hp_wali',
        'tahun_diterima',
        'agama',
        'jenis_kelamin',
        'tempat_lahir',
        'kelas',
        'tanggal_lahir',
        'usia_sekarang'
    ];
    private $logs = [
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
        'restored_at',
        'restored_by'
    ];
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_MASTER);
    }

    public function getAllData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->fetchAll();
    }

    public function getAllExistData()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE `status` = 1");
        return $this->db->fetchAll();
    }

    public function getAllDeletedData()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE `status` = 0");
        return $this->db->fetchAll();
    }

    public function getDataById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = :id"); // : = menghindari sql injection
        $this->db->bind("id", $id);
        return $this->db->fetch();
    }

    public function tambahData($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :uuid, :nisn, :nama_siswa, :jalur, :jurusan, :alamat, :nomor_hp_siswa, :ayah, :ibu,
            :nomor_hp_orangtua, :wali, :nomor_hp_wali, :tahun_diterima, :agama, :jenis_kelamin,
            :tempat_lahir, :kelas, :tanggal_lahir, :usia_sekarang, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)"
        );

        $this->db->bind('uuid', '49f20563-b288-4561-8b9c-64b8a825893d');
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('created_by', $this->user);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->query(
            "UPDATE {$this->table}  
                SET 
                deleted_at = CURRENT_TIMESTAMP,
                deleted_by = :deleted_by,
                is_deleted = 1
            WHERE id = :id"
        );

        $this->db->bind('deleted_by', $this->user);
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataPermanen($id)
    {
        $this->db->query(
            "DELETE FROM {$this->table} WHERE id = :id"
        );

        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                nisn = :nisn,
                nama_siswa = :nama_siswa,
                jalur = :jalur,
                jurusan = :jurusan,
                alamat = :alamat,
                nomor_hp_siswa = :nomor_hp_siswa,
                ayah = :ayah,
                ibu = :ibu,
                nomor_hp_orangtua = :nomor_hp_orangtua,
                wali = :wali,
                nomor_hp_wali = :nomor_hp_wali,
                tahun_diterima = :tahun_diterima,
                agama = :agama,
                jenis_kelamin = :jenis_kelamin,
                tempat_lahir = :tempat_lahir,
                kelas = :kelas,
                tanggal_lahir = :tanggal_lahir,
                usia_sekarang = :usia_sekarang,
                modified_at = CURRENT_TIMESTAMP,
                modified_by = :modified_by
            WHERE id = :id"
        );

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
