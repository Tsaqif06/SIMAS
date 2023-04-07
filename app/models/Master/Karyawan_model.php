<?php

class Karyawan_model
{
    private $table = 'masterkaryawan';
    private $fields = [
        'foto',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_lengkap',
        'pendidikan_terakhir',
        'jurusan_pendidikan_terakhir',
        'nomor_hp',
        'kategori',
        'status_pernikahan'
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

    public function getDataById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_karyawan = :id");
        $this->db->bind("id", $id);
        return $this->db->fetch();
    }

    public function tambahData($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :nama_lengkap, :jenis_kelamin, :tempat_lahir, :tanggal_lahir, :alamat_lengkap, :pendidikan_terakhir, :jurusan_pendidikan_terakhir,
            :nomor_hp, :kategori, :status_pernikahan, :foto)"
        );

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id_karyawan = :id");
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                nama_lengkap = :nama_lengkap,
                jenis_kelamin = :jenis_kelamin,
                tempat_lahir = :tempat_lahir,
                tanggal_lahir = :tanggal_lahir,
                alamat_lengkap = :alamat_lengkap,
                pendidikan_terakhir = :pendidikan_terakhir,
                jurusan_pendidikan_terakhir = :jurusan_pendidikan_terakhir,
                nomor_hp = :nomor_hp, 
                kategori = :kategori,
                status_pernikahan = :status_pernikahan,
                foto = :foto
            WHERE id_karyawan = :id"
        );

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('id', $data['id_karyawan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariData()
    {
        $keyword = $_POST['keyword'];

        $this->db->query("SELECT * FROM {$this->table} WHERE nama_lengkap LIKE :keyword");
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->fetchAll();
    }
}
