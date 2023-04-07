<?php

class Siswa_model
{
    private $table = 'mastersiswa';
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
        $this->db->query("SELECT * FROM {$this->table} WHERE id_siswa = :id");
        $this->db->bind("id", $id);
        return $this->db->fetch();
    }

    public function tambahData($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :nisn, :nama_siswa, :jalur, :jurusan, :alamat, :nomor_hp_siswa, :ayah, :ibu,
            :nomor_hp_orangtua, :wali, :nomor_hp_wali, :tahun_diterima, :agama, :jenis_kelamin,
            :tempat_lahir, :kelas, :tanggal_lahir, :usia_sekarang)"
        );

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id_siswa = :id");
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
                usia_sekarang = :usia_sekarang
            WHERE id_siswa = :id"
        );

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('id', $data['id_siswa']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariData()
    {
        $keyword = $_POST['keyword'];

        $this->db->query("SELECT * FROM {$this->table} WHERE nama_siswa LIKE :keyword");
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->fetchAll();
    }
}
