<?php

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Ramsey\Uuid\Uuid;

class pkl_model extends Database
{
    private $table = 'daftarsiswapegawai';
    private $tableind = 'dataindustripkl';
    private $tabletp = 'datatempatpkl';
    private $tableMON = 'monitoringpkl';
    private $tablepb = 'pembekalanpkl';
    private $tableps = 'pemberkasanpkl';
    private $tabledp = 'dayatampungpkl';
    private $tablepp = 'perpanjangmasapkl';
    private $tablenilai = 'nilaipkl';
    private $tableiz = 'perizinanpkl';
    private $tablebm = 'siswabermasalah';
    private $user;
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_HUMAS);
        $this->user = Cookie::get_jwt()->name;
    }


    public function getJmlDatapp()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM {$this->tablepp} WHERE `status` = 1");
        return $this->db->fetch();
    }

    public function getJmlDataiz()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM {$this->tableiz} WHERE `status` = 1");
        return $this->db->fetch();
    }

    public function getJmlDataind()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM {$this->tableind} WHERE `status` = 1");
        return $this->db->fetch();
    }

    public function getJmlDatadp()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM {$this->tabledp} WHERE `status` = 1");
        return $this->db->fetch();
    }

    public function getJmlDatatable()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM {$this->table} WHERE `status` = 1");
        return $this->db->fetch();
    }

    public function getJmlDatabm()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM {$this->tablebm} WHERE `status` = 1");
        return $this->db->fetch();
    }
    public function getSiswaPegawai()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    public function getExistSiswaPegawai()
    {
        $this->db->query('SELECT * FROM ' . $this->table . 'WHERE `status` = ' . 1);
        return $this->db->fetchAll();
    }

    public function getDetailSiswa($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }
    public function TambahDataSiswa($data)
    {
        $query  = "INSERT INTO daftarsiswapegawai
                              VALUES 
                         (null, :uuid, :nisn, :namasiswa, :kelas, :jurusan, :namaperusahaan, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('namasiswa', $data['namasiswa']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('created_by', $this->user);



        $this->db->execute();

        return $this->db->rowCount();
    }

    public function HapusDataSiswa($id)
    {
        $this->db->query(
            "UPDATE daftarsiswapegawai
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


    public function ubahDataSiswa($data)
    {
        $query = "UPDATE daftarsiswapegawai SET 
                         nisn = :nisn, 
                         namasiswa = :namasiswa, 
                         kelas = :kelas,
                         jurusan = :jurusan, 
                         namaperusahaan = :namaperusahaan, 
                      modified_at = CURRENT_TIMESTAMP, 
                      modified_by = :modified_by 
                       WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('namasiswa', $data['namasiswa']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('modified_by', $this->user);

        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function caridataPegawai()
    {
        $keyword = $_POST['keyword'];
        $query  =   "SELECT * FROM daftarsiswapegawai WHERE namasiswa LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }


    // dataindustri
    public function getSiswaind()
    {
        $this->db->query('SELECT * FROM ' . $this->tableind);
        return $this->db->fetchAll();
    }
    public function getExistSiswaind()
    {
        $this->db->query('SELECT * FROM ' . $this->tableind . 'WHERE `status` = ' . 1);
        return $this->db->fetchAll();
    }

    public function getDetailind($id)
    {
        $this->db->query('SELECT * FROM ' . $this->tableind . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }
    public function TambahDataind($data)
    {
        $query  = "INSERT INTO dataindustripkl
                              VALUES 
                         (null, :uuid, :kompetensikeahlian, :namaperusahaan, :alamat, :kota, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('kompetensikeahlian', $data['kompetensikeahlian']);
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('kota', $data['kota']);
        $this->db->bind('created_by', $this->user);



        $this->db->execute();

        return $this->db->rowCount();
    }

    public function HapusDataind($id)
    {
        $this->db->query(
            "UPDATE dataindustripkl
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


    public function ubahDataind($data)
    {
        $query = "UPDATE dataindustripkl SET 
                         kompetensikeahlian = :kompetensikeahlian, 
                         namaperusahaan = :namaperusahaan, 
                         alamat = :alamat,
                         kota = :kota, 
                      modified_at = CURRENT_TIMESTAMP, 
                      modified_by = :modified_by 
                       WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('kompetensikeahlian', $data['kompetensikeahlian']);
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('kota', $data['kota']);
        $this->db->bind('modified_by', $this->user);

        $this->db->bind('id', $data['id']);


        $this->db->execute();
        return $this->db->rowCount();
    }


    public function caridataind()
    {
        $keyword = $_POST['keyword'];
        $query  =   "SELECT * FROM dataindustripkl WHERE kota LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }






    //    data tempat pkl

    public function getSiswatp()
    {
        $this->db->query('SELECT * FROM ' . $this->tabletp);
        return $this->db->fetchAll();
    }

    public function getExistSiswatp()
    {
        $this->db->query('SELECT * FROM ' . $this->tabletp . 'WHERE `status` = ' . 1);
        return $this->db->fetchAll();
    }

    public function getDetailtp($id)
    {
        $this->db->query('SELECT * FROM ' . $this->tabletp . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }
    public function TambahDatatp($data)
    {
        $query  = "INSERT INTO datatempatpkl
                           VALUES 
                      (null, :uuid, :nisn, :namasiswa, :kelassiswa, :namaperusahaan, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('namasiswa', $data['namasiswa']);
        $this->db->bind('kelassiswa', $data['kelassiswa']);
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('created_by', $this->user);



        $this->db->execute();

        return $this->db->rowCount();
    }

    public function HapusDatatp($id)
    {
        $this->db->query(
            "UPDATE datatempatpkl
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


    public function ubahDatatp($data)
    {
        $query = "UPDATE datatempatpkl SET 
                      nisn = :nisn, 
                      namasiswa = :namasiswa, 
                      kelassiswa = :kelassiswa,
                      namaperusahaan = :namaperusahaan, 
                      modified_at = CURRENT_TIMESTAMP, 
                      modified_by = :modified_by 
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('namasiswa', $data['namasiswa']);
        $this->db->bind('kelassiswa', $data['kelassiswa']);
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('modified_by', $this->user);

        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function caridatatp()
    {
        $keyword = $_POST['keyword'];
        $query  =   "SELECT * FROM datatempatpkl WHERE kelassiswa LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }

    //    data monitoring pkl

    public function getSiswaMON()
    {
        $this->db->query('SELECT * FROM ' . $this->tableMON);
        return $this->db->fetchAll();
    }
    public function getExistSiswaMON()
    {
        $this->db->query('SELECT * FROM ' . $this->tableMON . 'WHERE `status` = ' . 1);
        return $this->db->fetchAll();
    }

    public function getDetailMON($id)
    {
        $this->db->query('SELECT * FROM ' . $this->tableMON . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }
    public function TambahDataMON($data)
    {
        $query  = "INSERT INTO monitoringpkl
                             VALUES 
                        (null, :uuid, :namaperusahaan_monitoringpkl, :namaguru_monitoringpkl, :tanggal_monitoringpkl, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('namaperusahaan_monitoringpkl', $data['namaperusahaan_monitoringpkl']);
        $this->db->bind('namaguru_monitoringpkl', $data['namaguru_monitoringpkl']);
        $this->db->bind('tanggal_monitoringpkl', $data['tanggal_monitoringpkl']);
        $this->db->bind('created_by', $this->user);



        $this->db->execute();

        return $this->db->rowCount();
    }

    public function HapusDataMON($id)
    {
        $this->db->query(
            "UPDATE monitoringpkl
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


    public function ubahDataMON($data)
    {
        $query = "UPDATE monitoringpkl SET 
                        namaperusahaan_monitoringpkl = :namaperusahaan_monitoringpkl, 
                        namaguru_monitoringpkl = :namaguru_monitoringpkl, 
                        tanggal_monitoringpkl = :tanggal_monitoringpkl, 
                      modified_at = CURRENT_TIMESTAMP, 
                      modified_by = :modified_by
                      WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('namaperusahaan_monitoringpkl', $data['namaperusahaan_monitoringpkl']);
        $this->db->bind('namaguru_monitoringpkl', $data['namaguru_monitoringpkl']);
        $this->db->bind('tanggal_monitoringpkl', $data['tanggal_monitoringpkl']);
        $this->db->bind('modified_by', $this->user);

        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function caridataMON()
    {
        $keyword = $_POST['keyword'];
        $query  =   "SELECT * FROM monitoringpkl WHERE namaperusahaan_monitoringpkl LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }

    //   pembekalannpkl
    public function getSiswaPB()
    {
        $this->db->query('SELECT * FROM ' . $this->tablepb);
        return $this->db->fetchAll();
    }
    public function getExistSiswaPB()
    {
        $this->db->query('SELECT * FROM ' . $this->tablepb . 'WHERE `status` = ' . 1);
        return $this->db->fetchAll();
    }

    public function getDetailPB($id)
    {
        $this->db->query('SELECT * FROM ' . $this->tablepb . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }
    public function TambahDataPB($data)
    {
        $query  = "INSERT INTO pembekalanpkl
                           VALUES 
                      (null, :uuid, :dilakukanoleh, :tanggalpersiapan, :jadwal, :peserta, :tempat, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('dilakukanoleh', $data['dilakukanoleh']);
        $this->db->bind('tanggalpersiapan', $data['tanggalpersiapan']);
        $this->db->bind('jadwal', $data['jadwal']);
        $this->db->bind('peserta', $data['peserta']);
        $this->db->bind('tempat', $data['tempat']);
        $this->db->bind('created_by', $this->user);



        $this->db->execute();

        return $this->db->rowCount();
    }

    public function HapusDataPB($id)
    {
        $this->db->query(
            "UPDATE pembekalanpkl
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


    public function ubahDataPB($data)
    {
        $query = "UPDATE pembekalanpkl SET  
                      dilakukanoleh = :dilakukanoleh, 
                      tanggalpersiapan = :tanggalpersiapan,
                      jadwal = :jadwal,
                      peserta = :peserta,
                      tempat = :tempat, 
                      modified_at = CURRENT_TIMESTAMP, 
                      modified_by = :modified_by
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('dilakukanoleh', $data['dilakukanoleh']);
        $this->db->bind('tanggalpersiapan', $data['tanggalpersiapan']);
        $this->db->bind('jadwal', $data['jadwal']);
        $this->db->bind('peserta', $data['peserta']);
        $this->db->bind('tempat', $data['tempat']);
        $this->db->bind('modified_by', $this->user);

        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function caridataPB()
    {
        $keyword = $_POST['keyword'];
        $query  =   "SELECT * FROM pembekalanpkl WHERE peserta LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }

    // DATA NILAI

    public function getNilaiDGA()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DG A'");
        return $this->db->fetchAll();
    }

    public function getNilaiExistDGA()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DG A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiDGB()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DG B'");
        return $this->db->fetchAll();
    }

    public function getNilaiExistDGB()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DG B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiDGC()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DG C'");
        return $this->db->fetchAll();
    }

    public function getNilaiExistDGC()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DG C' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiDGD()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DG D'");
        return $this->db->fetchAll();
    }

    public function getNilaiExistDGD()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DG D' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiPDA()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PD A'");
        return $this->db->fetchAll();
    }

    public function getNilaiExistPDA()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PD A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiPDB()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PD B'");
        return $this->db->fetchAll();
    }

    public function getNilaiExistPDB()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PD B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiPDC()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PD C'");
        return $this->db->fetchAll();
    }

    public function getNilaiExistPDC()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PD C' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiPDD()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PD D'");
        return $this->db->fetchAll();
    }

    public function getNilaiExistPDD()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PD D' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistTLA()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI TL A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistTLB()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI TL B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistTMA()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI TM A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistTMB()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI TM B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistRPLA()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI RPL A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistRPLB()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI RPL B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistRPLC()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI RPL C' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistTKJA()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI TKJ A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistTKJB()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI TKJ B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistDKVA()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DKV A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistDKVB()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DKV B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistDKVC()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DKV C' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistPHA()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PH A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistPHB()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PH B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistANIA()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI ANI A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistANIB()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI ANI B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiExistANIC()
    {
        $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI ANI C' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getNilaiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->tablenilai . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahDataNilai($data)
    {
        $query = "INSERT INTO nilaipkl
                VALUES 
                (null, :uuid, :nisn, :namasiswa, :kelas, :jeniskelamin, :namaindustri, :nilaisiswa, :keterangannilai, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('namasiswa', $data['namasiswa']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('jeniskelamin', $data['jeniskelamin']);
        $this->db->bind('namaindustri', $data['namaindustri']);
        $this->db->bind('nilaisiswa', $data['nilaisiswa']);
        $this->db->bind('keterangannilai', $data['keterangannilai']);
        $this->db->bind('created_by', "Super Admin");

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataNilai($id)
    {
        $this->db->query(
            "UPDATE {$this->tablenilai}
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

    public function ubahDataNilai($data)
    {
        $query = "UPDATE nilaipkl SET 
                nisn = :nisn, 
                namasiswa = :namasiswa, 
                kelas = :kelas,
                jeniskelamin = :jeniskelamin,
                namaindustri = :namaindustri,
                nilaisiswa = :nilaisiswa,
                keterangannilai = :keterangannilai,
                modified_at = CURRENT_TIMESTAMP,
                modified_by = :modified_by
              WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('namasiswa', $data['namasiswa']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('jeniskelamin', $data['jeniskelamin']);
        $this->db->bind('namaindustri', $data['namaindustri']);
        $this->db->bind('nilaisiswa', $data['nilaisiswa']);
        $this->db->bind('keterangannilai', $data['keterangannilai']);
        $this->db->bind('modified_by', "Super Admin");
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }


    //    data tempat pkl

    public function getSiswaDGA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DG A'");
        return $this->db->fetchAll();
    }

    public function getExistDGA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DG A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaDGB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DG B'");
        return $this->db->fetchAll();
    }

    public function getExistDGB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DG B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaDGC()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DG C'");
        return $this->db->fetchAll();
    }

    public function getExistDGC()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DG C' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaDGD()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DG D'");
        return $this->db->fetchAll();
    }

    public function getExistDGD()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DG D' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaPDA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PD A'");
        return $this->db->fetchAll();
    }

    public function getExistPDA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PD A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaPDB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PD B'");
        return $this->db->fetchAll();
    }

    public function getExistPDB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PD B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaPDC()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PD C'");
        return $this->db->fetchAll();
    }

    public function getExistPDC()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PD C' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaPDD()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PD D'");
        return $this->db->fetchAll();
    }

    public function getExistPDD()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PD D' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaTLA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI TL A'");
        return $this->db->fetchAll();
    }

    public function getExistTLA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI TL A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaTLB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI TL B'");
        return $this->db->fetchAll();
    }

    public function getExistTLB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI TL B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaTMA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI Mekatronika A'");
        return $this->db->fetchAll();
    }

    public function getExistTMA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI Mekatronika A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaTMB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI Mekatronika B'");
        return $this->db->fetchAll();
    }

    public function getExistTMB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI Mekatronika B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaRPLA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI RPL A'");
        return $this->db->fetchAll();
    }

    public function getExistRPLA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI RPL A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaRPLB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI RPL B'");
        return $this->db->fetchAll();
    }

    public function getExistRPLB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI RPL B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaRPLC()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI RPL C'");
        return $this->db->fetchAll();
    }

    public function getExistRPLC()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI RPL C' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaTKJA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI TKJ A'");
        return $this->db->fetchAll();
    }

    public function getExistTKJA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI TKJ A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaTKJB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI TKJ B'");
        return $this->db->fetchAll();
    }

    public function getExistTKJB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI TKJ B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaDKVA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DKV A'");
        return $this->db->fetchAll();
    }

    public function getExistDKVA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DKV A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaDKVB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DKV B'");
        return $this->db->fetchAll();
    }

    public function getExistDKVB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DKV B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaDKVC()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DKV C'");
        return $this->db->fetchAll();
    }

    public function getExistDKVC()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DKV C' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaPHA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PH A'");
        return $this->db->fetchAll();
    }

    public function getExistPHA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PH A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaPHB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PH B'");
        return $this->db->fetchAll();
    }

    public function getExistPHB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PH B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaANIA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI ANIMASI A'");
        return $this->db->fetchAll();
    }

    public function getExistANIA()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI ANIMASI A' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaANIB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI ANIMASI B'");
        return $this->db->fetchAll();
    }

    public function getExistANIB()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI ANIMASI B' AND status = 1");
        return $this->db->fetchAll();
    }

    public function getSiswaANIC()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI ANIMASI C'");
        return $this->db->fetchAll();
    }

    public function getExistANIC()
    {
        $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI ANIMASI C' AND status = 1");
        return $this->db->fetchAll();
    }

    // pemberkasanpkl

    public function getSiswaPS()
    {
        $this->db->query('SELECT * FROM ' . $this->tableps);
        return $this->db->fetchAll();
    }
    public function getExistSiswaPS()
    {
        $this->db->query('SELECT * FROM ' . $this->tableps . ' WHERE `status` = 1');
        return $this->db->fetchAll();
    }

    public function getDetailPS($id)
    {
        $this->db->query('SELECT * FROM ' . $this->tableps . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function uploadFotoPemberkasan()
    {
        $targetDir = 'images/humas/pkl/pemberkasan/foto/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadfoto_pemberkasan']['name'];
        $imageFileType = explode('.', $temp);
        $imageFileType = strtolower(end($imageFileType));

        // validasi ekstensi file
        // $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }

        $fileName = uniqid();
        $fileName .= '.';
        $fileName .= $imageFileType;
        $targetFile = $targetDir . $fileName; // nama file upload

        // cek gambar diupload atau tidak
        if ($_FILES["uploadfoto_pemberkasan"]["error"] === 4) {
            echo
            '
              <script>
                  alert("Silahkan Upload Gambar")
              </script>
          ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["uploadfoto_pemberkasan"]["size"] > 1000000) {
            echo
            '
                  <script>
                      alert("Ukuran File Terlalu Besar")
                  </script>
              ';
            return false;
        }

        try {
            // simpan file upload ke direktori
            move_uploaded_file($_FILES['uploadfoto_pemberkasan']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }
    public function uploadRaportPemberkasan()
    {
        $targetDir = 'images/humas/pkl/pemberkasan/raport/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadebookraport_pemberkasan']['name'];
        $imageFileType = explode('.', $temp);
        $imageFileType = strtolower(end($imageFileType));

        // validasi ekstensi file
        // $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }

        $fileName = uniqid();
        $fileName .= '.';
        $fileName .= $imageFileType;
        $targetFile = $targetDir . $fileName; // nama file upload

        // cek gambar diupload atau tidak
        if ($_FILES["uploadebookraport_pemberkasan"]["error"] === 4) {
            echo
            '
              <script>
                  alert("Silahkan Upload Gambar")
              </script>
          ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["uploadebookraport_pemberkasan"]["size"] > 1000000) {
            echo
            '
                  <script>
                      alert("Ukuran File Terlalu Besar")
                  </script>
              ';
            return false;
        }

        try {
            // simpan file upload ke direktori
            move_uploaded_file($_FILES['uploadebookraport_pemberkasan']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }
    public function uploadBuktiLunasPemberkasan()
    {
        $targetDir = 'images/humas/pkl/pemberkasan/buktilunas/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadbuktilunas_pemberkasan']['name'];
        $imageFileType = explode('.', $temp);
        $imageFileType = strtolower(end($imageFileType));

        // validasi ekstensi file
        // $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }

        $fileName = uniqid();
        $fileName .= '.';
        $fileName .= $imageFileType;
        $targetFile = $targetDir . $fileName; // nama file upload

        // cek gambar diupload atau tidak
        if ($_FILES["uploadbuktilunas_pemberkasan"]["error"] === 4) {
            echo
            '
              <script>
                  alert("Silahkan Upload Gambar")
              </script>
          ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["uploadbuktilunas_pemberkasan"]["size"] > 1000000) {
            echo
            '
                  <script>
                      alert("Ukuran File Terlalu Besar")
                  </script>
              ';
            return false;
        }

        try {
            // simpan file upload ke direktori
            move_uploaded_file($_FILES['uploadbuktilunas_pemberkasan']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }

    public function tambahDataPemberkasan($data)
    {
        $query  = "INSERT INTO pemberkasanpkl
                           VALUES 
                      (null, :uuid, :nisn_pemberkasan, 
                      :namasiswa_pemberkasan, 
                      :tanggallahir_pemberkasan, 
                      :jurusan_pemberkasan, 
                      :jeniskelamin_pemberkasan, 
                      :domisili_pemberkasann, 
                      :uploadfoto_pemberkasan, 
                      :uploadebookraport_pemberkasan, 
                      :uploadbuktilunas_pemberkasan, 
                      '', 
                      CURRENT_TIMESTAMP, 
                      :created_by, 
                      null, 
                      '', 
                      null, 
                      '', 
                      null, 
                      '', 
                      0, 
                      0, 
                      DEFAULT
                      )";

        $this->db->query($query);
        $foto = $this->uploadFotoPemberkasan();
        if (!$foto) {
            return false;
        }
        $raport = $this->uploadRaportPemberkasan();
        if (!$raport) {
            return false;
        }
        $bukti = $this->uploadBuktiLunasPemberkasan();
        if (!$bukti) {
            return false;
        }
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('nisn_pemberkasan', $data['nisn_pemberkasan']);
        $this->db->bind('namasiswa_pemberkasan', $data['namasiswa_pemberkasan']);
        $this->db->bind('tanggallahir_pemberkasan', $data['tanggallahir_pemberkasan']);
        $this->db->bind('jurusan_pemberkasan', $data['jurusan_pemberkasan']);
        $this->db->bind('jeniskelamin_pemberkasan', $data['jeniskelamin_pemberkasan']);
        $this->db->bind('domisili_pemberkasann', $data['domisili_pemberkasann']);
        $this->db->bind('uploadfoto_pemberkasan', $foto);
        $this->db->bind('uploadebookraport_pemberkasan', $raport);
        $this->db->bind('uploadbuktilunas_pemberkasan', $bukti);
        $this->db->bind('created_by', $this->user);


        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataPemberkasan($id)
    {
        $this->db->query(
            "UPDATE {$this->tableps}
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


    public function ubahDataPS($data)
    {
        $query = "UPDATE pemberkasanpkl SET  
                      nisn_pemberkasan = :nisn_pemberkasan, 
                      namasiswa_pemberkasan = :namasiswa_pemberkasan,
                      tanggallahir_pemberkasan = :tanggallahir_pemberkasan,
                      jurusan_pemberkasan = :jurusan_pemberkasan,
                      jeniskelamin_pemberkasan = :jeniskelamin_pemberkasan,
                      domisili_pemberkasann = :domisili_pemberkasann,
                      uploadfoto_pemberkasan = :uploadfoto_pemberkasan,
                      uploadebookraport_pemberkasan = :uploadebookraport_pemberkasan,
                      uploadbuktilunas_pemberkasan = :uploadbuktilunas_pemberkasan, 
                      modified_at = CURRENT_TIMESTAMP, 
                      modified_by = :modified_by 
                    WHERE id = :id";

        $this->db->query($query);
        if ($_FILES["uploadfoto_pemberkasan"]["error"] === 4) {
            $foto = $data['fotoLama'];
        } else {
            $foto = $this->uploadFotoPemberkasan();
        }
        if ($_FILES["uploadebookraport_pemberkasan"]["error"] === 4) {
            $raport = $data['raportLama'];
        } else {
            $raport = $this->uploadRaportPemberkasan();
        }
        if ($_FILES["uploadbuktilunas_pemberkasan"]["error"] === 4) {
            $bukti = $data['buktiLama'];
        } else {
            $bukti = $this->uploadBuktiLunasPemberkasan();
        }
        $this->db->bind('nisn_pemberkasan', $data['nisn_pemberkasan']);
        $this->db->bind('namasiswa_pemberkasan', $data['namasiswa_pemberkasan']);
        $this->db->bind('tanggallahir_pemberkasan', $data['tanggallahir_pemberkasan']);
        $this->db->bind('jurusan_pemberkasan', $data['jurusan_pemberkasan']);
        $this->db->bind('jeniskelamin_pemberkasan', $data['jeniskelamin_pemberkasan']);
        $this->db->bind('domisili_pemberkasann', $data['domisili_pemberkasann']);
        $this->db->bind('uploadfoto_pemberkasan', $foto);
        $this->db->bind('uploadebookraport_pemberkasan', $raport);
        $this->db->bind('uploadbuktilunas_pemberkasan', $bukti);
        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }





    //    DAYA TAMPUNG



    public function getSiswaDP()
    {
        $this->db->query('SELECT * FROM ' . $this->tabledp);
        return $this->db->fetchAll();
    }
    public function getExistSiswaDP()
    {
        $this->db->query('SELECT * FROM ' . $this->tabledp . 'WHERE `status` = ' . 1);
        return $this->db->fetchAll();
    }

    public function getDetailDP($id)
    {
        $this->db->query('SELECT * FROM ' . $this->tabledp . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }
    public function TambahDataDP($data)
    {
        $query  = "INSERT INTO dayatampungpkl
                              VALUES 
                         (null, :uuid, :namaperusahaan, :jurusan, :jeniskelamin, :jumlah, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('jeniskelamin', $data['jeniskelamin']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('created_by', $this->user);



        $this->db->execute();

        return $this->db->rowCount();
    }

    public function HapusDataDP($id)
    {
        $this->db->query(
            "UPDATE dayatampungpkl
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


    public function ubahDataDP($data)
    {
        $query = "UPDATE dayatampungpkl SET 
                         namaperusahaan = :namaperusahaan, 
                         jurusan = :jurusan, 
                         jeniskelamin = :jeniskelamin,
                         jumlah = :jumlah, 
                      modified_at = CURRENT_TIMESTAMP, 
                      modified_by = :modified_by 
                       WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('jeniskelamin', $data['jeniskelamin']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('modified_by', $this->user);

        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function caridataDP()
    {
        $keyword = $_POST['keyword'];
        $query  =   "SELECT * FROM dayatampungpkl WHERE jurusan LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }


    //    perpanjangpkl

    public function getSiswaPP()
    {
        $this->db->query('SELECT * FROM ' . $this->tablepp);
        return $this->db->fetchAll();
    }
    public function getExistSiswaPP()
    {
        $this->db->query('SELECT * FROM ' . $this->tablepp . 'WHERE `status` = ' . 1);
        return $this->db->fetchAll();
    }

    public function getDetailPP($id)
    {
        $this->db->query('SELECT * FROM ' . $this->tablepp . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }
    public function TambahDataPP($data)
    {
        $query  = "INSERT INTO perpanjangmasapkl
                              VALUES 
                         (null, :uuid, :ppnama, :ppkelas, :nisn, :namaperusahaan, :tanggalperpanjangpkl, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('ppnama', $data['ppnama']);
        $this->db->bind('ppkelas', $data['ppkelas']);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('tanggalperpanjangpkl', $data['tanggalperpanjangpkl']);
        $this->db->bind('created_by', $this->user);



        $this->db->execute();

        return $this->db->rowCount();
    }

    public function HapusDataPP($id)
    {
        $this->db->query(
            "UPDATE perpanjangmasapkl
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


    public function ubahDataPP($data)
    {
        $query = "UPDATE perpanjangmasapkl SET 
                         ppnama = :ppnama, 
                         ppkelas = :ppkelas, 
                         nisn = :nisn,
                         namaperusahaan = :namaperusahaan,
                         tanggalperpanjangpkl = :tanggalperpanjangpkl, 
                      modified_at = CURRENT_TIMESTAMP, 
                      modified_by = :modified_by 
                       WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('ppnama', $data['ppnama']);
        $this->db->bind('ppkelas', $data['ppkelas']);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('tanggalperpanjangpkl', $data['tanggalperpanjangpkl']);
        $this->db->bind('modified_by', $this->user);

        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function caridataPP()
    {
        $keyword = $_POST['keyword'];
        $query  =   "SELECT * FROM perpanjangmasapkl WHERE ppkelas LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }





    //  izinpkl

    public function getSiswaIZ()
    {
        $this->db->query('SELECT * FROM ' . $this->tableiz);
        return $this->db->fetchAll();
    }

    public function getExistSiswaIZ()
    {
        $this->db->query('SELECT * FROM ' . $this->tableiz . 'WHERE `status` = ' . 1);
        return $this->db->fetchAll();
    }

    public function getDetailIZ($id)
    {
        $this->db->query('SELECT * FROM ' . $this->tableiz . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }
    public function TambahDataIZ($data)
    {
        $query  = "INSERT INTO perizinanpkl
                              VALUES 
                         (null, :uuid, :nisn, :nama, :kelas, :namaperusahaan, :halizin, :drtanggal, :hgtanggal, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('halizin', $data['halizin']);
        $this->db->bind('drtanggal', $data['drtanggal']);
        $this->db->bind('hgtanggal', $data['hgtanggal']);
        $this->db->bind('created_by', $this->user);



        $this->db->execute();

        return $this->db->rowCount();
    }

    public function HapusDataIZ($id)
    {
        $this->db->query(
            "UPDATE perizinanpkl
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


    public function ubahDataIZ($data)
    {
        $query = "UPDATE perizinanpkl SET 
                         nisn = :nisn, 
                         nama = :nama, 
                         kelas = :kelas,
                         namaperusahaan = :namaperusahaan,
                         halizin = :halizin,
                         drtanggal = :drtanggal,
                         hgtanggal = :hgtanggal, 
                      modified_at = CURRENT_TIMESTAMP, 
                      modified_by = :modified_by

                       WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('halizin', $data['halizin']);
        $this->db->bind('drtanggal', $data['drtanggal']);
        $this->db->bind('hgtanggal', $data['hgtanggal']);
        $this->db->bind('modified_by', $this->user);

        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function caridataIZ()
    {
        $keyword = $_POST['keyword'];
        $query  =   "SELECT * FROM perizinanpkl WHERE kelas LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }





    //    Siswa Bermasalah

    public function getSiswaBM()
    {
        $this->db->query('SELECT * FROM ' . $this->tablebm);
        return $this->db->fetchAll();
    }

    public function getDetailBM($id)
    {
        $this->db->query('SELECT * FROM ' . $this->tablebm . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }
    public function TambahDataBM($data)
    {
        $query  = "INSERT INTO siswabermasalah
                           VALUES 
                      (null, :uuid, :nisn, :nama, :kelas, :namaperusahaan, :jenismasalah, :solusi, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('jenismasalah', $data['jenismasalah']);
        $this->db->bind('solusi', $data['solusi']);
        $this->db->bind('created_by', $this->user);



        $this->db->execute();

        return $this->db->rowCount();
    }

    public function HapusDataBM($id)
    {
        $this->db->query(
            "UPDATE siswabermasalah
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


    public function ubahDataBM($data)
    {
        $query = "UPDATE siswabermasalah SET 
                      nisn = :nisn, 
                      nama = :nama, 
                      kelas = :kelas,
                      namaperusahaan = :namaperusahaan,
                      jenismasalah = :jenismasalah,
                      solusi = :solusi, 
                      modified_at = CURRENT_TIMESTAMP, 
                      modified_by = :modified_by
              

                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('jenismasalah', $data['jenismasalah']);
        $this->db->bind('solusi', $data['solusi']);
        $this->db->bind('modified_by', $this->user);


        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    //IMPORT
    public function importDatasiswa()
    {
        $fields = [
            'nisn',
            'namasiswa',
            'kelas',
            'jurusan',
            'namaperusahaan'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/pkl/pengangkatan');
            exit;
        }

        // Baca file Excel menggunakan PhpSpreadsheet
        $inputFileName = $_FILES['file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileName);

        // Ambil data dari sheet pertama
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $maxColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        // Daftar kolom yang akan diambil dari file Excel dan disimpan ke database
        $columns = $fields;

        // Looping untuk membaca setiap baris data
        for ($row = 2; $row <= $highestRow; $row++) {
            $data = [];

            // Looping untuk membaca setiap kolom data
            for ($col = 2; $col <= count($columns) + 1; $col++) {
                $columnLetter = Coordinate::stringFromColumnIndex($col);
                $cellValue = $worksheet->getCell($columnLetter . $row)->getValue();
                $data[$columns[$col - 2]] = $cellValue;
            }

            // Simpan data ke database
            $response = $this->tambahDatasiswa($data);
        }
        return $response;
    }

    public function importDataind()
    {
        $fields = [
            'kompetensikeahlian',
            'namaperusahaan',
            'alamat',
            'kota'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/pkl/dataindustri');
            exit;
        }

        // Baca file Excel menggunakan PhpSpreadsheet
        $inputFileName = $_FILES['file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileName);

        // Ambil data dari sheet pertama
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $maxColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        // Daftar kolom yang akan diambil dari file Excel dan disimpan ke database
        $columns = $fields;

        // Looping untuk membaca setiap baris data
        for ($row = 2; $row <= $highestRow; $row++) {
            $data = [];

            // Looping untuk membaca setiap kolom data
            for ($col = 2; $col <= count($columns) + 1; $col++) {
                $columnLetter = Coordinate::stringFromColumnIndex($col);
                $cellValue = $worksheet->getCell($columnLetter . $row)->getValue();
                $data[$columns[$col - 2]] = $cellValue;
            }

            // Simpan data ke database
            $response = $this->tambahDataind($data);
        }
        return $response;
    }

    public function importDatatp()
    {
        $fields = [
            'nisn',
            'namasiswa',
            'kelassiswa',
            'namaperusahaan'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/pkl/pengangkatan'); // genakno duu iki ne header location, nggak ngerti ngarah nandi aku
            exit;
        }

        // Baca file Excel menggunakan PhpSpreadsheet
        $inputFileName = $_FILES['file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileName);

        // Ambil data dari sheet pertama
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $maxColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        // Daftar kolom yang akan diambil dari file Excel dan disimpan ke database
        $columns = $fields;

        // Looping untuk membaca setiap baris data
        for ($row = 2; $row <= $highestRow; $row++) {
            $data = [];

            // Looping untuk membaca setiap kolom data
            for ($col = 2; $col <= count($columns) + 1; $col++) {
                $columnLetter = Coordinate::stringFromColumnIndex($col);
                $cellValue = $worksheet->getCell($columnLetter . $row)->getValue();
                $data[$columns[$col - 2]] = $cellValue;
            }

            // Simpan data ke database
            $response = $this->tambahDatatp($data);
        }
        return $response;
    }

    public function importDatamon()
    {
        $fields = [
            'namaperusahaan_monitoringpkl',
            'namaguru_monitoringpkl',
            'tanggalmonitoringpkl'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/pkl/monitoring'); // genakno duu iki ne header location, nggak ngerti ngarah nandi aku
            exit;
        }

        // Baca file Excel menggunakan PhpSpreadsheet
        $inputFileName = $_FILES['file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileName);

        // Ambil data dari sheet pertama
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $maxColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        // Daftar kolom yang akan diambil dari file Excel dan disimpan ke database
        $columns = $fields;

        // Looping untuk membaca setiap baris data
        for ($row = 2; $row <= $highestRow; $row++) {
            $data = [];

            // Looping untuk membaca setiap kolom data
            for ($col = 2; $col <= count($columns) + 1; $col++) {
                $columnLetter = Coordinate::stringFromColumnIndex($col);
                $cellValue = $worksheet->getCell($columnLetter . $row)->getValue();
                $data[$columns[$col - 2]] = $cellValue;
            }

            // Simpan data ke database
            $response = $this->tambahDataMON($data);
        }
        return $response;
    }

    public function importDatapb()
    {
        $fields = [
            'dilakukanoleh',
            'tanggalpersiapan',
            'jadwal',
            'peserta',
            'tempat'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/pkl/pklpembekalan'); // genakno duu iki ne header location, nggak ngerti ngarah nandi aku
            exit;
        }

        // Baca file Excel menggunakan PhpSpreadsheet
        $inputFileName = $_FILES['file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileName);

        // Ambil data dari sheet pertama
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $maxColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        // Daftar kolom yang akan diambil dari file Excel dan disimpan ke database
        $columns = $fields;

        // Looping untuk membaca setiap baris data
        for ($row = 2; $row <= $highestRow; $row++) {
            $data = [];

            // Looping untuk membaca setiap kolom data
            for ($col = 2; $col <= count($columns) + 1; $col++) {
                $columnLetter = Coordinate::stringFromColumnIndex($col);
                $cellValue = $worksheet->getCell($columnLetter . $row)->getValue();
                $data[$columns[$col - 2]] = $cellValue;
            }

            // Simpan data ke database
            $response = $this->tambahDataPB($data);
        }
        return $response;
    }

    public function importDatapemberkasan()
    {
        $fields = [
            'nisn_pemberkasan',
            'namasiswa_pemberkasan',
            'tanggallahir_pemberkasan',
            'jurusan_pemberkasan',
            'jeniskelamin_pemberkasan',
            'domisili_pemberkasan'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/pkl/pemberkasan'); // genakno duu iki ne header location, nggak ngerti ngarah nandi aku
            exit;
        }

        // Baca file Excel menggunakan PhpSpreadsheet
        $inputFileName = $_FILES['file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileName);

        // Ambil data dari sheet pertama
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $maxColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        // Daftar kolom yang akan diambil dari file Excel dan disimpan ke database
        $columns = $fields;

        // Looping untuk membaca setiap baris data
        for ($row = 2; $row <= $highestRow; $row++) {
            $data = [];

            // Looping untuk membaca setiap kolom data
            for ($col = 2; $col <= count($columns) + 1; $col++) {
                $columnLetter = Coordinate::stringFromColumnIndex($col);
                $cellValue = $worksheet->getCell($columnLetter . $row)->getValue();
                $data[$columns[$col - 2]] = $cellValue;
            }

            // Simpan data ke database
            $response = $this->tambahDataPemberkasan($data);
        }
        return $response;
    }

    public function importDatadp()
    {
        $fields = [
            'namaperusahaan',
            'jurusan',
            'jeniskelamin',
            'jumlah'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/pkl/penempatan'); // genakno duu iki ne header location, nggak ngerti ngarah nandi aku
            exit;
        }

        // Baca file Excel menggunakan PhpSpreadsheet
        $inputFileName = $_FILES['file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileName);

        // Ambil data dari sheet pertama
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $maxColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        // Daftar kolom yang akan diambil dari file Excel dan disimpan ke database
        $columns = $fields;

        // Looping untuk membaca setiap baris data
        for ($row = 2; $row <= $highestRow; $row++) {
            $data = [];

            // Looping untuk membaca setiap kolom data
            for ($col = 2; $col <= count($columns) + 1; $col++) {
                $columnLetter = Coordinate::stringFromColumnIndex($col);
                $cellValue = $worksheet->getCell($columnLetter . $row)->getValue();
                $data[$columns[$col - 2]] = $cellValue;
            }

            // Simpan data ke database
            $response = $this->tambahDataDP($data);
        }
        return $response;
    }

    public function importDatapp()
    {
        $fields = [
            'ppnama',
            'ppkelas',
            'nisn',
            'namaperusahaan',
            'tanggalperpanjangpkl'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/pkl/dataindustri'); // genakno duu iki ne header location, nggak ngerti ngarah nandi aku
            exit;
        }

        // Baca file Excel menggunakan PhpSpreadsheet
        $inputFileName = $_FILES['file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileName);

        // Ambil data dari sheet pertama
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $maxColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        // Daftar kolom yang akan diambil dari file Excel dan disimpan ke database
        $columns = $fields;

        // Looping untuk membaca setiap baris data
        for ($row = 2; $row <= $highestRow; $row++) {
            $data = [];

            // Looping untuk membaca setiap kolom data
            for ($col = 2; $col <= count($columns) + 1; $col++) {
                $columnLetter = Coordinate::stringFromColumnIndex($col);
                $cellValue = $worksheet->getCell($columnLetter . $row)->getValue();
                $data[$columns[$col - 2]] = $cellValue;
            }

            // Simpan data ke database
            $response = $this->tambahDataPP($data);
        }
        return $response;
    }

    public function importDataiz()
    {
        $fields = [
            'nisn',
            'nama',
            'kelas',
            'namaperusahaan',
            'halizin',
            'drtanggal',
            'hgtanggal'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/pkl/perizinan'); // genakno duu iki ne header location, nggak ngerti ngarah nandi aku
            exit;
        }

        // Baca file Excel menggunakan PhpSpreadsheet
        $inputFileName = $_FILES['file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileName);

        // Ambil data dari sheet pertama
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $maxColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        // Daftar kolom yang akan diambil dari file Excel dan disimpan ke database
        $columns = $fields;

        // Looping untuk membaca setiap baris data
        for ($row = 2; $row <= $highestRow; $row++) {
            $data = [];

            // Looping untuk membaca setiap kolom data
            for ($col = 2; $col <= count($columns) + 1; $col++) {
                $columnLetter = Coordinate::stringFromColumnIndex($col);
                $cellValue = $worksheet->getCell($columnLetter . $row)->getValue();
                $data[$columns[$col - 2]] = $cellValue;
            }

            // Simpan data ke database
            $response = $this->tambahDataIZ($data);
        }
        return $response;
    }

    public function importDatabm()
    {
        $fields = [
            'nisn',
            'nama',
            'kelas',
            'namaperusahaan',
            'jenismasalah',
            'solusi'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/pkl/siswabermasalah'); // genakno duu iki ne header location, nggak ngerti ngarah nandi aku
            exit;
        }

        // Baca file Excel menggunakan PhpSpreadsheet
        $inputFileName = $_FILES['file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileName);

        // Ambil data dari sheet pertama
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $maxColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        // Daftar kolom yang akan diambil dari file Excel dan disimpan ke database
        $columns = $fields;

        // Looping untuk membaca setiap baris data
        for ($row = 2; $row <= $highestRow; $row++) {
            $data = [];

            // Looping untuk membaca setiap kolom data
            for ($col = 2; $col <= count($columns) + 1; $col++) {
                $columnLetter = Coordinate::stringFromColumnIndex($col);
                $cellValue = $worksheet->getCell($columnLetter . $row)->getValue();
                $data[$columns[$col - 2]] = $cellValue;
            }

            // Simpan data ke database
            $response = $this->tambahDataBM($data);
        }
        return $response;
    }
}