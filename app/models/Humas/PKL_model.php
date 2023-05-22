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
    private $table_penempatan = 'datatempatpkl';
    private $tableMON = 'monitoringpkl';
    private $tablepb = 'pembekalanpkl';
    private $tableps = 'pemberkasanpkl';
    private $tabledp = 'dayatampungpkl';
    private $tablepp = 'perpanjangmasapkl';
    private $table_nilai = 'nilaipkl';
    private $tableiz = 'perizinanpkl';
    private $tablebm = 'siswabermasalah';
    private $user;
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_HUMAS);
        $this->user = Cookie::get_jwt()->name;
    }

    // NILAI //

    public function getAllNilai($kelas)
    {
        $this->db->query("SELECT * FROM {$this->table_nilai} WHERE kelas = :kelas AND `status` = 1");
        $this->db->bind('kelas', $kelas);

        return $this->db->fetchAll();
    }

    public function getNilaiById($id)
    {
        $this->db->query("SELECT * FROM {$this->table_nilai} WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function hapusDataNilai($id)
    {
        $this->db->query(
            "UPDATE {$this->table_nilai}
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

    public function tambahDataNilai($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table_nilai}
                VALUES 
            (null, :uuid, :nisn, :namasiswa, :kelas, :jeniskelamin, :namaindustri, :nilaisiswa, DEFAULT, 
            '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)"
        );
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('namasiswa', $data['namasiswa']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('jeniskelamin', $data['jeniskelamin']);
        $this->db->bind('namaindustri', $data['namaindustri']);
        $this->db->bind('nilaisiswa', $data['nilaisiswa']);
        $this->db->bind('created_by', $this->user);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataNilai($data)
    {
        $this->db->query(
            "UPDATE {$this->table_nilai} SET 
                nisn = :nisn, 
                namasiswa = :namasiswa, 
                kelas = :kelas,
                jeniskelamin = :jeniskelamin,
                namaindustri = :namaindustri,
                nilaisiswa = :nilaisiswa,
                modified_at = CURRENT_TIMESTAMP,
                modified_by = :modified_by
            WHERE id = :id"
        );

        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('namasiswa', $data['namasiswa']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('jeniskelamin', $data['jeniskelamin']);
        $this->db->bind('namaindustri', $data['namaindustri']);
        $this->db->bind('nilaisiswa', $data['nilaisiswa']);
        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function importDataNilai()
    {
        $fields = [
            "nisn",
            "namasiswa",
            "kelas",
            "jeniskelamin",
            "namaindustri",
            "nilaisiswa",
            "keterangannilai",
        ];

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
            $response = $this->tambahDataNilai($data);
        }
        return $response;
    }


    // PENEMPATAN //

    public function getAllPenempatan($kelas)
    {
        $this->db->query("SELECT * FROM {$this->table_penempatan} WHERE kelassiswa = :kelassiswa AND `status` = 1");
        $this->db->bind('kelassiswa', $kelas);
        return $this->db->fetchAll();
    }

    public function getPenempatanById($id)
    {
        $this->db->query("SELECT * FROM {$this->table_penempatan} WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function tambahDataPenempatan($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table_penempatan}
                VALUES 
            (null, :uuid, :nisn, :namasiswa, :kelassiswa, :namaperusahaan,
            '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)"
        );

        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('namasiswa', $data['namasiswa']);
        $this->db->bind('kelassiswa', $data['kelassiswa']);
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('created_by', $this->user);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPenempatan($id)
    {
        $this->db->query(
            "UPDATE {$this->table_penempatan}
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


    public function ubahDataPenempatan($data)
    {
        $this->db->query(
            "UPDATE {$this->table_penempatan}
                SET 
                nisn = :nisn, 
                namasiswa = :namasiswa, 
                kelassiswa = :kelassiswa,
                namaperusahaan = :namaperusahaan, 
                modified_at = CURRENT_TIMESTAMP, 
                modified_by = :modified_by 
            WHERE id = :id"
        );

        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('namasiswa', $data['namasiswa']);
        $this->db->bind('kelassiswa', $data['kelassiswa']);
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('modified_by', $this->user);

        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function importDataPenempatan()
    {
        $fields = [
            'nisn',
            'namasiswa',
            'kelassiswa',
            'namaperusahaan'
        ];

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
            $response = $this->tambahDataPenempatan($data);
        }
        return $response;
    }


    // JUMLAH DATA

    public function getJmlDatapp()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM `perpanjangmasapkl` WHERE `status` = 1");
        return $this->db->fetch();
    }

    public function getJmlDataiz()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM `perizinanpkl` WHERE `status` = 1");
        return $this->db->fetch();
    }

    public function getJmlDataind()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM `dataindustripkl` WHERE `status` = 1");
        return $this->db->fetch();
    }

    public function getJmlDatadp()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM `dayatampungpkl` WHERE `status` = 1");
        return $this->db->fetch();
    }

    public function getJmlDatatable()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM `daftarsiswapegawai` WHERE `status` = 1");
        return $this->db->fetch();
    }

    public function getJmlDatabm()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM `siswabermasalah` WHERE `status` = 1");
        return $this->db->fetch();
    }

    public function getJmlDatatp()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM {$this->table_penempatan} WHERE `status` = 1");
        return $this->db->fetch();
    }
    public function getJmlDatamon()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM {$this->tableMON} WHERE `status` = 1");
        return $this->db->fetch();
    }
    public function getJmlDataps()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM {$this->tableps} WHERE `status` = 1");
        return $this->db->fetch();
    }
    public function getJmlDatapb()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM {$this->tablepb} WHERE `status` = 1");
        return $this->db->fetch();
    }
    public function getJmlDatanilai()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM {$this->table_nilai} WHERE `status` = 1");
        return $this->db->fetch();
    }

    public function getSiswaPegawai()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    public function getExistSiswaPegawai()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE `status` = ' . 1);
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
        $this->db->query('SELECT * FROM ' . $this->tableind . ' WHERE `status` = ' . 1);
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
            "UPDATE `dataindustripkl`
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
        $this->db->query(
            "UPDATE `dataindustripkl`
                SET 
                kompetensikeahlian = :kompetensikeahlian, 
                namaperusahaan = :namaperusahaan, 
                alamat = :alamat,
                kota = :kota, 
                modified_at = CURRENT_TIMESTAMP, 
                modified_by = :modified_by 
            WHERE id = :id"
        );

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
        $this->db->query('SELECT * FROM ' . $this->table_penempatan);
        return $this->db->fetchAll();
    }

    public function getExistSiswatp()
    {
        $this->db->query('SELECT * FROM ' . $this->table_penempatan . ' WHERE `status` = ' . 1);
        return $this->db->fetchAll();
    }

    public function getDetailtp($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table_penempatan . ' WHERE id = :id');
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
        $this->db->query('SELECT * FROM ' . $this->tableMON . ' WHERE `status` = ' . 1);
        return $this->db->fetchAll();
    }

    public function getDetailMON($id)
    {
        $this->db->query('SELECT * FROM ' . $this->tableMON . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function getPemberkasanById($id)
    {
        $this->db->query("SELECT * FROM {$this->tableps} WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function TambahDataMON($data)
    {
        $this->db->query(
            "INSERT INTO `monitoringpkl`
                VALUES 
            (null, :uuid, :namaperusahaan_monitoringpkl, :namaguru_monitoringpkl, :tanggal_monitoringpkl,
            '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)"
        );
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
            "UPDATE `monitoringpkl`
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
        $this->db->query(
            "UPDATE `monitoringpkl`
                SET 
                namaperusahaan_monitoringpkl = :namaperusahaan_monitoringpkl, 
                namaguru_monitoringpkl = :namaguru_monitoringpkl, 
                tanggal_monitoringpkl = :tanggal_monitoringpkl, 
                modified_at = CURRENT_TIMESTAMP, 
                modified_by = :modified_by
            WHERE id = :id"
        );

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
        $this->db->query("SELECT * FROM monitoringpkl WHERE namaperusahaan_monitoringpkl LIKE :keyword");
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }


    //   PEMBEKALAN PKL

    public function getSiswaPB()
    {
        $this->db->query('SELECT * FROM ' . $this->tablepb);
        return $this->db->fetchAll();
    }
    public function getExistSiswaPB()
    {
        $this->db->query('SELECT * FROM ' . $this->tablepb . ' WHERE `status` = ' . 1);
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
        $this->db->query(
            "INSERT INTO `pembekalanpkl`
                VALUES 
            (null, :uuid, :dilakukanoleh, :tanggalpersiapan, :jadwal, :peserta, :tempat,
            '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)"
        );

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

    // PEMBERKASAN PKL

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
    public function getSiswaPemberkasan($id)
    {
        $this->db->query('SELECT * FROM ' . $this->tableps . ' WHERE namasiswa_pemberkasan = :namasiswa_pemberkasan WHERE id = :id');
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

    public function uploadSuratPemberkasan()
    {
        $targetDir = 'images/humas/pkl/pemberkasan/surat/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadsurat_pemberkasan']['name'];
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
        if ($_FILES["uploadsurat_pemberkasan"]["error"] === 4) {
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
            move_uploaded_file($_FILES['uploadsurat_pemberkasan']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }
    public function uploadKartuPelajarPemberkasan()
    {
        $targetDir = 'images/humas/pkl/pemberkasan/kartupelajar/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadkartupelajar_pemberkasan']['name'];
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
        if ($_FILES["uploadkartupelajar_pemberkasan"]["error"] === 4) {
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
            move_uploaded_file($_FILES['uploadkartupelajar_pemberkasan']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }
    public function uploadRaportPemberkasan()
    {
        $targetDir = 'assets/raport/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadebookraport_pemberkasan']['name'];
        $imageFileType = explode('.', $temp);
        $imageFileType = strtolower(end($imageFileType));

        // validasi ekstensi file
        // $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($imageFileType != "pdf") {
            echo "Sorry, only PDF files are allowed.";
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
                  alert("Silahkan Upload Raport")
              </script>
          ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["uploadebookraport_pemberkasan"]["size"] > 5000000) {
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

    public function uploadBuktiLunasNilaiPemberkasan()
    {
        $targetDir = 'images/humas/pkl/pemberkasan/buktilunasnilai/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadbuktilunasnilai_pemberkasan']['name'];
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
        if ($_FILES["uploadbuktilunasnilai_pemberkasan"]["error"] === 4) {
            echo
            '
              <script>
                  alert("Silahkan Upload Gambar")
              </script>
          ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["uploadbuktilunasnilai_pemberkasan"]["size"] > 1000000) {
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
            move_uploaded_file($_FILES['uploadbuktilunasnilai_pemberkasan']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }
    public function uploadBuktiLunasAdministrasiPemberkasan()
    {
        $targetDir = 'images/humas/pkl/pemberkasan/buktilunasadm/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadbuktilunasadministrasi_pemberkasan']['name'];
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
        if ($_FILES["uploadbuktilunasadministrasi_pemberkasan"]["error"] === 4) {
            echo
            '
              <script>
                  alert("Silahkan Upload Gambar")
              </script>
          ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["uploadbuktilunasadministrasi_pemberkasan"]["size"] > 1000000) {
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
            move_uploaded_file($_FILES['uploadbuktilunasadministrasi_pemberkasan']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }
    public function uploadBuktiLunasPerpusPemberkasan()
    {
        $targetDir = 'images/humas/pkl/pemberkasan/buktilunasperpus/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadbuktilunasperpus_pemberkasan']['name'];
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
        if ($_FILES["uploadbuktilunasperpus_pemberkasan"]["error"] === 4) {
            echo
            '
              <script>
                  alert("Silahkan Upload Gambar")
              </script>
          ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["uploadbuktilunasperpus_pemberkasan"]["size"] > 1000000) {
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
            move_uploaded_file($_FILES['uploadbuktilunasperpus_pemberkasan']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }

    public function tambahDataPemberkasan($data)
    {
        $query  = "INSERT INTO pemberkasanpkl
                           VALUES 
                      (null, 
                      :uuid, 
                      :nisn_pemberkasan, 
                      :nis_pemberkasan, 
                      :namasiswa_pemberkasan, 
                      :tanggallahir_pemberkasan, 
                      :jurusan_pemberkasan, 
                      :jeniskelamin_pemberkasan, 
                      :domisili_pemberkasann, 
                      :pkldimana_pemberkasan, 
                      :uploadfoto_pemberkasan, 
                      :uploadsurat_pemberkasan, 
                      :uploadkartupelajar_pemberkasan, 
                      :uploadebookraport_pemberkasan, 
                      :uploadbuktilunasnilai_pemberkasan, 
                      :uploadbuktilunasadministrasi_pemberkasan, 
                      :uploadbuktilunasperpus_pemberkasan, 
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
        $surat = $this->uploadSuratPemberkasan();
        if (!$surat) {
            return false;
        }
        $kartu = $this->uploadKartuPelajarPemberkasan();
        if (!$kartu) {
            return false;
        }
        $raport = $this->uploadRaportPemberkasan();
        if (!$raport) {
            return false;
        }
        $nilai = $this->uploadBuktiLunasNilaiPemberkasan();
        if (!$nilai) {
            return false;
        }
        $administrasi = $this->uploadBuktiLunasAdministrasiPemberkasan();
        if (!$administrasi) {
            return false;
        }
        $perpus = $this->uploadBuktiLunasPerpusPemberkasan();
        if (!$perpus) {
            return false;
        }
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('nisn_pemberkasan', $data['nisn_pemberkasan']);
        $this->db->bind('nis_pemberkasan', $data['nis_pemberkasan']);
        $this->db->bind('namasiswa_pemberkasan', $data['namasiswa_pemberkasan']);
        $this->db->bind('tanggallahir_pemberkasan', $data['tanggallahir_pemberkasan']);
        $this->db->bind('jurusan_pemberkasan', $data['jurusan_pemberkasan']);
        $this->db->bind('jeniskelamin_pemberkasan', $data['jeniskelamin_pemberkasan']);
        $this->db->bind('domisili_pemberkasann', $data['domisili_pemberkasann']);
        $this->db->bind('pkldimana_pemberkasan', $data['pkldimana_pemberkasan']);
        $this->db->bind('uploadfoto_pemberkasan', $foto);
        $this->db->bind('uploadsurat_pemberkasan', $surat);
        $this->db->bind('uploadkartupelajar_pemberkasan', $kartu);
        $this->db->bind('uploadebookraport_pemberkasan', $raport);
        $this->db->bind('uploadbuktilunasnilai_pemberkasan', $nilai);
        $this->db->bind('uploadbuktilunasadministrasi_pemberkasan', $administrasi);
        $this->db->bind('uploadbuktilunasperpus_pemberkasan', $perpus);
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
                      nis_pemberkasan = :nis_pemberkasan, 
                      namasiswa_pemberkasan = :namasiswa_pemberkasan,
                      tanggallahir_pemberkasan = :tanggallahir_pemberkasan,
                      jurusan_pemberkasan = :jurusan_pemberkasan,
                      jeniskelamin_pemberkasan = :jeniskelamin_pemberkasan,
                      domisili_pemberkasann = :domisili_pemberkasann, 
                      pkldimana_pemberkasan = :pkldimana_pemberkasan, 
                      uploadfoto_pemberkasan = :uploadfoto_pemberkasan, 
                      uploadsurat_pemberkasan = :uploadsurat_pemberkasan, 
                      uploadkartupelajar_pemberkasan = :uploadkartupelajar_pemberkasan, 
                      uploadebookraport_pemberkasan = :uploadebookraport_pemberkasan,
                      uploadbuktilunasnilai_pemberkasan = :uploadbuktilunasnilai_pemberkasan, 
                      uploadbuktilunasadministrasi_pemberkasan = :uploadbuktilunasadministrasi_pemberkasan, 
                      uploadbuktilunasperpus_pemberkasan = :uploadbuktilunasperpus_pemberkasan, 
                      modified_at = CURRENT_TIMESTAMP, 
                      modified_by = :modified_by 
                    WHERE id = :id";

        $this->db->query($query);
        if ($_FILES["uploadfoto_pemberkasan"]["error"] === 4) {
            $foto = $data['fotoLama'];
        } else {
            $foto = $this->uploadFotoPemberkasan();
        }
        if ($_FILES["uploadsurat_pemberkasan"]["error"] === 4) {
            $surat = $data['suratLama'];
        } else {
            $surat = $this->uploadSuratPemberkasan();
        }
        if ($_FILES["uploadkartupelajar_pemberkasan"]["error"] === 4) {
            $kartu = $data['kartuPelajarLama'];
        } else {
            $kartu = $this->uploadKartuPelajarPemberkasan();
        }
        if ($_FILES["uploadebookraport_pemberkasan"]["error"] === 4) {
            $raport = $data['raportLama'];
        } else {
            $raport = $this->uploadRaportPemberkasan();
        }
        if ($_FILES["uploadbuktilunasnilai_pemberkasan"]["error"] === 4) {
            $nilai = $data['nilaiLama'];
        } else {
            $nilai = $this->uploadBuktiLunasNilaiPemberkasan();
        }
        if ($_FILES["uploadbuktilunasadministrasi_pemberkasan"]["error"] === 4) {
            $administrasi = $data['administrasiLama'];
        } else {
            $administrasi = $this->uploadBuktiLunasAdministrasiPemberkasan();
        }
        if ($_FILES["uploadbuktilunasperpus_pemberkasan"]["error"] === 4) {
            $perpus = $data['perpusLama'];
        } else {
            $perpus = $this->uploadBuktiLunasPerpusPemberkasan();
        }
        $this->db->bind('nisn_pemberkasan', $data['nisn_pemberkasan']);
        $this->db->bind('nis_pemberkasan', $data['nis_pemberkasan']);
        $this->db->bind('namasiswa_pemberkasan', $data['namasiswa_pemberkasan']);
        $this->db->bind('tanggallahir_pemberkasan', $data['tanggallahir_pemberkasan']);
        $this->db->bind('jurusan_pemberkasan', $data['jurusan_pemberkasan']);
        $this->db->bind('jeniskelamin_pemberkasan', $data['jeniskelamin_pemberkasan']);
        $this->db->bind('domisili_pemberkasann', $data['domisili_pemberkasann']);
        $this->db->bind('pkldimana_pemberkasan', $data['pkldimana_pemberkasan']);
        $this->db->bind('uploadfoto_pemberkasan', $foto);
        $this->db->bind('uploadsurat_pemberkasan', $surat);
        $this->db->bind('uploadkartupelajar_pemberkasan', $kartu);
        $this->db->bind('uploadebookraport_pemberkasan', $raport);
        $this->db->bind('uploadbuktilunasnilai_pemberkasan', $nilai);
        $this->db->bind('uploadbuktilunasadministrasi_pemberkasan', $administrasi);
        $this->db->bind('uploadbuktilunasperpus_pemberkasan', $perpus);
        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
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


    //  DAYA TAMPUNG

    public function getSiswaDP()
    {
        $this->db->query("SELECT * FROM `{$this->tabledp}` WHERE `status` = 1");
        return $this->db->fetchAll();
    }
    public function getExistSiswaDP()
    {
        $this->db->query('SELECT * FROM ' . $this->tabledp . ' WHERE `status` = ' . 1);
        return $this->db->fetchAll();
    }

    public function getDetailDP($id)
    {
        $this->db->query("SELECT * FROM `{$this->tabledp}` WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }
    public function TambahDataDP($data)
    {
        $this->db->query(
            "INSERT INTO `{$this->tabledp}`
                VALUES 
            (null, :uuid, :namaperusahaan, :jurusan, :jeniskelamin, :jumlah,
            '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)"
        );

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
            "UPDATE `{$this->tabledp}`
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
        $this->db->query(
            "UPDATE `{$this->tabledp}`
                SET 
                namaperusahaan = :namaperusahaan, 
                jurusan = :jurusan, 
                jeniskelamin = :jeniskelamin,
                jumlah = :jumlah, 
                modified_at = CURRENT_TIMESTAMP, 
                modified_by = :modified_by 
            WHERE id = :id"
        );

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
        $this->db->query("SELECT * FROM `{$this->tabledp}` WHERE jurusan LIKE :keyword");
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }


    // PERPANJANGAN PKL

    public function getSiswaPP()
    {
        $this->db->query('SELECT * FROM ' . $this->tablepp);
        return $this->db->fetchAll();
    }
    public function getExistSiswaPP()
    {
        $this->db->query('SELECT * FROM ' . $this->tablepp . ' WHERE `status` = ' . 1);
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
        $this->db->query(
            "INSERT INTO `perpanjangmasapkl`
                VALUES 
            (null, :uuid, :ppnama, :ppkelas, :nisn, :namaperusahaan, :tanggalperpanjangpkl,
            '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)"
        );

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
        $this->db->query(
            "UPDATE perpanjangmasapkl SET 
                ppnama = :ppnama, 
                ppkelas = :ppkelas, 
                nisn = :nisn,
                namaperusahaan = :namaperusahaan,
                tanggalperpanjangpkl = :tanggalperpanjangpkl, 
                modified_at = CURRENT_TIMESTAMP, 
                modified_by = :modified_by 
            WHERE id = :id"
        );

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


    //  IZIN PKL

    public function getSiswaIZ()
    {
        $this->db->query('SELECT * FROM ' . $this->tableiz);
        return $this->db->fetchAll();
    }

    public function getExistSiswaIZ()
    {
        $this->db->query('SELECT * FROM ' . $this->tableiz . ' WHERE `status` = ' . 1);
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
        $this->db->query(
            "INSERT INTO `perizinanpkl`
                VALUES 
            (null, :uuid, :nisn, :nama, :kelas, :namaperusahaan, :halizin, :drtanggal, :hgtanggal,
            '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)"
        );

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
        $this->db->query("SELECT * FROM perizinanpkl WHERE kelas LIKE :keyword");
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }


    //    SISWA BERMASALAH

    public function getExistSiswaBM()
    {
        $this->db->query('SELECT * FROM ' . $this->tablebm . ' WHERE `status` = ' . 1);
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
        $this->db->query(
            "INSERT INTO siswabermasalah
                VALUES 
            (null, :uuid, :nisn, :nama, :kelas, :namaperusahaan, :jenismasalah, :solusi,
            '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)"
        );

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
        $this->db->query(
            "UPDATE siswabermasalah
                SET 
                nisn = :nisn, 
                nama = :nama, 
                kelas = :kelas,
                namaperusahaan = :namaperusahaan,
                jenismasalah = :jenismasalah,
                solusi = :solusi, 
                modified_at = CURRENT_TIMESTAMP, 
                modified_by = :modified_by
            WHERE id = :id"
        );

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

    //  IMPORT

    public function importDatasiswa()
    {
        $fields = [
            'nisn',
            'namasiswa',
            'kelas',
            'jurusan',
            'namaperusahaan'
        ];

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

    public function importDatamon()
    {
        $fields = [
            'namaperusahaan_monitoringpkl',
            'namaguru_monitoringpkl',
            'tanggalmonitoringpkl'
        ];

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

    public function importDatadp()
    {
        $fields = [
            'namaperusahaan',
            'jurusan',
            'jeniskelamin',
            'jumlah'
        ];

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