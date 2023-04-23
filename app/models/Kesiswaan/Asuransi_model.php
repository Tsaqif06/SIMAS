<?php
require_once dirname(dirname(__DIR__)) . '/controllers/login/Login.php';

class Asuransi_model extends Database
{


    private $table_main = 'klaimasuransi';
    private $user;

    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_KESISWAAN);
        $this->user = Login::getCurrentSession()->username;
    }

    public function getAllAsuransi()
    {
        $this->db->query('SELECT * FROM ' . $this->table_main);
        return $this->db->fetchAll();
    }


    public function getAsuransiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table_main . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahDataAsuransi($data)
    {                     //nama tabel
        $query = "INSERT INTO " . $this->table_main . " VALUES(null, :uuid, :email, :jenisKlaimAsuransi, :nama, :NIS, :programKeahlian, :kelas, :jurusan, :kodeKelas, :noHP)";

        $this->db->query($query);
        $this->db->bind('uuid', 0);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jenisKlaimAsuransi', $data['jenisKlaimAsuransi']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('NIS', $data['NIS']);
        $this->db->bind('programKeahlian', $data['programKeahlian']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('kodeKelas', $data['kodeKelas']);
        $this->db->bind('noHP', $data['noHP']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataAsuransi($id)
    {
        $query = "DELETE FROM " . $this->table_main . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataAsuransi($data)
    {                     //nama tabel
        $query = "UPDATE klaimasuransi SET
                    email = :email,
                    jenisKlaimAsuransi = :jenisKlaimAsuransi,
                    nama = :nama,
                    NIS = :NIS,
                    programKeahlian = :programKeahlian,
                    kelas = :kelas,
                    jurusan = :jurusan,
                    kodeKelas = :kodeKelas,
                    noHP = :noHP
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jenisKlaimAsuransi', $data['jenisKlaimAsuransi']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('NIS', $data['NIS']);
        $this->db->bind('programKeahlian', $data['programKeahlian']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('kodeKelas', $data['kodeKelas']);
        $this->db->bind('noHP', $data['noHP']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
