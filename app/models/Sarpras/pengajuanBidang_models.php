<?php

use Ramsey\Uuid\Uuid;

class pengajuanBidang_models
{
    private $table = 'pengajuan_bidang';
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_SARPRAS);
    }

    public function getALLDataPengajuanBidang()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    function getAllExistData()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE `status` = 1');
        return $this->db->fetchAll();
    }

    public function getDataPengajuanBidangById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahDataPengajuanBidang()
    {
        $query = "INSERT INTO pengajuan_Bidang
                    VALUES
                  (null, :uuid, :bidang, :barang, :spesifikasi, :bulan, :jumlah, :satuan, :harga_satuan, :harga_total, :digunakan_untuk, :keterangan, :statuspengajuan, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('bidang', $_POST['bidang']);
        $this->db->bind('barang', $_POST['barang']);
        $this->db->bind('spesifikasi', $_POST['spesifikasi']);
        $this->db->bind('bulan', $_POST['bulan']);
        $this->db->bind('jumlah', $_POST['jumlah']);
        $this->db->bind('satuan', $_POST['satuan']);
        $this->db->bind('harga_satuan', $_POST['harga_satuan']);
        $this->db->bind('harga_total', $_POST['harga_total']);
        $this->db->bind('digunakan_untuk', $_POST['digunakan_untuk']);
        $this->db->bind('keterangan', $_POST['keterangan']);
        $this->db->bind('statuspengajuan', $_POST['statuspengajuan']);
        $this->db->bind('created_by', "Super Admin");


        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPengajuanBidang($id)
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

        $this->db->bind('deleted_by', "Super Admin");
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function ubahDataPengajuanBidang($data)
    {
        $query = "UPDATE pengajuan_Bidang SET
                    bidang = :bidang,
                    barang = :barang,
                    spesifikasi = :spesifikasi,
                    bulan = :bulan,
                    jumlah = :jumlah,
                    satuan = :satuan,
                    harga_satuan = :harga_satuan,
                    harga_total = :harga_total,
                    digunakan_untuk = :digunakan_untuk,
                    keterangan = :keterangan,
                    modified_at = CURRENT_TIMESTAMP,
                    modified_by = :modified_by
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('bidang', $data['bidang']);
        $this->db->bind('barang', $data['barang']);
        $this->db->bind('spesifikasi', $data['spesifikasi']);
        $this->db->bind('bulan', $data['bulan']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('satuan', $data['satuan']);
        $this->db->bind('harga_satuan', $data['harga_satuan']);
        $this->db->bind('harga_total', $data['harga_total']);
        $this->db->bind('digunakan_untuk', $data['digunakan_untuk']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('modified_by', "Super Admin");
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahStatus($data)
    {
        $id = $data['id'];
        $status = $data['statuspengajuan'];

        $query = "UPDATE pengajuan_bidang SET statuspengajuan=$status WHERE id=$id";

        $this->db->query($query);
        $this->db->bind('statuspengajuan', $status);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataPengajuanBidang()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM pengajuan_bidang WHERE bidang LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }
}
