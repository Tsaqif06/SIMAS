<?php

class profilGuru_model
{
    private $table = 'masterguru';
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_MASTER);
    }

    public function getAllProfilGuru()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }
    public function getAllExistData()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE `status` = 1');
        return $this->db->fetchAll();
    }

    public function getProfilGuruById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahDataProfilGuru($data)
    {
        $query = "INSERT INTO masterguru
                    VALUES
                  (null, :nama_lengkap, :jenis_kelamin, :tempat_lahir, :tanggal_lahir, :alamat_lengkap, :pendidikan_terakhir, :jurusan_pendidikan_terakhir, :nomor_hp, :kategori, :mapel_yg_diampu, :kategori_mapel, :nip, :status_sertifikasi, :keahlian_ganda, :status_pernikahan, :foto, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('alamat_lengkap', $data['alamat_lengkap']);
        $this->db->bind('pendidikan_terakhir', $data['pendidikan_terakhir']);
        $this->db->bind('jurusan_pendidikan_terakhir', $data['jurusan_pendidikan_terakhir']);
        $this->db->bind('nomor_hp', $data['nomor_hp']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('mapel_yg_diampu', $data['mapel_yg_diampu']);
        $this->db->bind('kategori_mapel', $data['kategori_mapel']);
        $this->db->bind('nip', $data['nip']);
        $this->db->bind('status_sertifikasi', $data['status_sertifikasi']);
        $this->db->bind('keahlian_ganda', $data['keahlian_ganda']);
        $this->db->bind('status_pernikahan', $data['status_pernikahan']);
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('created_by', "Super Admin");

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataProfilGuru($id)
    {
        $query = "DELETE FROM masterguru WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataProfilGuru($data)
    {
        $query = "UPDATE masterguru SET
                    nama_lengkap = :nama_lengkap,
                    jenis_kelamin = :jenis_kelamin,
                    tempat_lahir = :tempat_lahir,
                    tanggal_lahir = :tanggal_lahir,
                    alamat_lengkap = :alamat_lengkap,
                    pendidikan_terakhir = :pendidikan_terakhir,
                    jurusan_pendidikan_terakhir = :jurusan_pendidikan_terakhir,
                    nomor_hp = :nomor_hp,
                    kategori = :kategori,
                    mapel_yg_diampu = :mapel_yg_diampu,
                    kategori_mapel = :kategori_mapel,
                    nip = :nip,
                    status_sertifikasi = :status_sertifikasi,
                    keahlian_ganda = :keahlian_ganda,
                    status_pernikahan = :status_pernikahan,
                    foto = :foto
                    modified_at = CURRENT_TIMESTAMP,
                    modified_by = :modified_by
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir ']);
        $this->db->bind('alamat_lengkap', $data['alamat_lengkap']);
        $this->db->bind('pendidikan_terakhir', $data['pendidikan_terakhir']);
        $this->db->bind('jurusan_pendidikan_terakhir', $data['jurusan_pendidikan_terakhir']);
        $this->db->bind('nomor_hp', $data['nomor_hp']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('mapel_yg_diampu', $data['mapel_yg_diampu']);
        $this->db->bind('kategori_mapel', $data['kategori_mapel']);
        $this->db->bind('nip', $data['nip']);
        $this->db->bind('status_sertifikasi', $data['status_sertifikasi']);
        $this->db->bind('keahlian_ganda', $data['keahlian_ganda']);
        $this->db->bind('status_pernikahan', $data['status_pernikahan']);
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('created_by', "Super Admin");
        $this->db->bind('id', $data['id']);

        return $this->db->rowCount();
    }


    public function cariDataProfilGuru()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM masterguru WHERE nama_lengkap LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }
}
