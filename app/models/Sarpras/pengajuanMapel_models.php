<?php

use Ramsey\Uuid\Uuid;

class pengajuanMapel_models
{
    private $table = 'pengajuan_mapel';
    private $db;
    private $user;

    public function __construct()
    {
        $this->db = new Database(DB_SARPRAS);
        $this->user = Cookie::get_jwt()->name;
    }

    public function getALLDataPengajuanMapel()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }
    function getAllExistData()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE `status` = 1');
        return $this->db->fetchAll();
    }

    public function getDataPengajuanMapelById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahDataPengajuanMapel()
    {
        $query = "INSERT INTO pengajuan_mapel
                    VALUES
                  (null, :uuid, :mapel, :barang, :spesifikasi, :bulan, :jumlah, :satuan, :harga_satuan, :harga_total, :digunakan_untuk, 0, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('mapel', $_POST['mapel']);
        $this->db->bind('barang', $_POST['barang']);
        $this->db->bind('spesifikasi', $_POST['spesifikasi']);
        $this->db->bind('bulan', $_POST['bulan']);
        $this->db->bind('jumlah', $_POST['jumlah']);
        $this->db->bind('satuan', $_POST['satuan']);
        $this->db->bind('harga_satuan', $_POST['harga_satuan']);
        $this->db->bind('harga_total', $_POST['harga_total']);
        $this->db->bind('digunakan_untuk', $_POST['digunakan_untuk']);
        $this->db->bind('created_by', $this->user);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPengajuanMapel($id)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET
                deleted_at = CURRENT_TIMESTAMP,
                deleted_by = :deleted_by,
                is_deleted = 1,
                is_restored = 0
              WHERE id = :id"
        );

        $this->db->bind('deleted_by', $this->user);
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function ubahDataPengajuanMapel($data)
    {
        $query = "UPDATE pengajuan_mapel SET
                    mapel = :mapel,
                    barang = :barang,
                    spesifikasi = :spesifikasi,
                    bulan = :bulan,
                    jumlah = :jumlah,
                    satuan = :satuan,
                    harga_satuan = :harga_satuan,
                    harga_total = :harga_total,
                    digunakan_untuk = :digunakan_untuk,
                    modified_at = CURRENT_TIMESTAMP,
                    modified_by = :modified_by
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('mapel', $data['mapel']);
        $this->db->bind('barang', $data['barang']);
        $this->db->bind('spesifikasi', $data['spesifikasi']);
        $this->db->bind('bulan', $data['bulan']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('satuan', $data['satuan']);
        $this->db->bind('harga_satuan', $data['harga_satuan']);
        $this->db->bind('harga_total', $data['harga_total']);
        $this->db->bind('digunakan_untuk', $data['digunakan_untuk']);
        $this->db->bind('modified_by', $this->user);

        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataPengajuanMapel()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM pengajuan_mapel WHERE mapel LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }
}
