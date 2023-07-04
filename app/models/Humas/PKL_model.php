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
    private $aspekteknis = 'aspekteknis';
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
        // $this->db->query("SELECT * FROM `aspekteknis`
        //                 JOIN `nilaipkl` ON 
        //                 `aspekteknis`.`siswa_id` = `nilaipkl`.`id` 
        //                 WHERE `nilaipkl`.`kelas` = :kelas AND `nilaipkl`.`status` = 1");
        $this->db->query("SELECT * FROM {$this->table_nilai} WHERE kelas = :kelas AND `status` = 1");
        $this->db->bind('kelas', $kelas);

        return $this->db->fetchAll();
    }

    public function getDataAspekTeknis($jurusan, $kelas)
    {
        $this->db->query("SELECT * FROM `aspekteknis`
                        JOIN `nilaipkl` ON 
                        `aspekteknis`.`siswa_id` = `nilaipkl`.`id` 
                        WHERE `nilaipkl`.`kelas` = :kelas AND `nilaipkl`.`status` = 1 AND `aspekteknis`.`jurusan_aspek` = :jurusan");
        $this->db->bind('kelas', $kelas);
        $this->db->bind('jurusan', $jurusan);

        return $this->db->fetchAll();
    }

    public function getNamaAspekTeknis($jurusan)
    {
        $this->db->query("SELECT nama_aspek FROM {$this->aspekteknis} WHERE jurusan_aspek = :jurusan GROUP BY nama_aspek");
        $this->db->bind('jurusan', $jurusan);

        return $this->db->fetchAll();
    }

    public function getNilaiById($id)
    {
        $this->db->query("SELECT * FROM {$this->table_nilai} WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function getTeknisById($id)
    {
        $this->db->query("SELECT * FROM {$this->aspekteknis} WHERE siswa_id = :id");
        $this->db->bind('id', $id);
        return $this->db->fetchAll();
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

        $this->db->bind('deleted_by', $this->user);
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahDataNilai($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table_nilai}
                VALUES 
            (null, :uuid, :nis, :namasiswa, :kelas, :jeniskelamin, :namaindustri, :religius, :kejujuran, :disiplin,
            :kerjasama, :inisiatif, :tanggungjawab, :kebersihan, :kesantunan, :mutupekerjaan, :ratarata, DEFAULT,
            '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)"
        );

        $tmp = 0;
        foreach ($data['teknis'] as $row) {
            $tmp += $row;
        }
        $ratarata = $tmp / $data['length'];

        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('namasiswa', $data['namasiswa']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('jeniskelamin', $data['jeniskelamin']);
        $this->db->bind('namaindustri', $data['namaindustri']);
        $this->db->bind('religius', $data['religius']);
        $this->db->bind('kejujuran', $data['kejujuran']);
        $this->db->bind('disiplin', $data['disiplin']);
        $this->db->bind('kerjasama', $data['kerjasama']);
        $this->db->bind('inisiatif', $data['inisiatif']);
        $this->db->bind('tanggungjawab', $data['tanggungjawab']);
        $this->db->bind('kebersihan', $data['kebersihan']);
        $this->db->bind('kesantunan', $data['kesantunan']);
        $this->db->bind('mutupekerjaan', $data['mutupekerjaan']);
        $this->db->bind('ratarata', $ratarata);
        $this->db->bind('created_by', $this->user);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tambahDataAspek($nilaiAspek, $data)
    {
        foreach ($nilaiAspek as $nama_aspek => $nilai) {
            $this->db->query(
                "INSERT INTO {$this->aspekteknis}
                VALUES 
            (null, :uuid, :siswa_id, :jurusan_aspek, :nama_aspek, :nilai,
            '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)"
            );
            $this->db->bind('uuid', Uuid::uuid4()->toString());
            $this->db->bind('siswa_id', $data['siswa_id']);
            $this->db->bind('jurusan_aspek', $data['jurusan_aspek']);
            $this->db->bind('nama_aspek', $nama_aspek);
            $this->db->bind('nilai', $nilai);
            $this->db->bind('created_by', $this->user);

            $this->db->execute();
        }
        return $this->db->rowCount();
    }
    public function getLastInsertId()
    {
        return $this->db->lastInsertId();
    }

    public function ubahDataNilai($data)
    {
        $this->db->query(
            "UPDATE {$this->table_nilai} SET 
                nis = :nis, 
                namasiswa = :namasiswa, 
                kelas = :kelas,
                jeniskelamin = :jeniskelamin,
                namaindustri = :namaindustri,
                modified_at = CURRENT_TIMESTAMP,
                modified_by = :modified_by
            WHERE id = :id"
        );

        $this->db->bind('nis', $data['nis']);
        $this->db->bind('namasiswa', $data['namasiswa']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('jeniskelamin', $data['jeniskelamin']);
        $this->db->bind('namaindustri', $data['namaindustri']);
        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahRataRata($data, $id)
    {
        $tmp = 0;
        foreach ($data as $row) {
            $tmp += $row;
        }
        $ratarata = $tmp / count($data);
        $this->db->query(
            "UPDATE {$this->table_nilai} SET 
                ratarata = :ratarata
            WHERE id = :id"
        );

        $this->db->bind('ratarata', $ratarata);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataAspek($data)
    {
        foreach ($data as $row) {
            $this->db->query(
                "UPDATE {$this->aspekteknis} SET 
                    nilai = :nilai, 
                    modified_at = CURRENT_TIMESTAMP,
                    modified_by = :modified_by
                WHERE siswa_id = :siswa_id AND nama_aspek = :nama_aspek"
            );

            $this->db->bind('nilai', $row['nilai']);
            $this->db->bind('nama_aspek', $row['nama_aspek']);
            $this->db->bind('modified_by', $this->user);
            $this->db->bind('siswa_id', $row['siswa_id']);

            $this->db->execute();
        }
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

    public function cariSiswaPenempatan($nama, $nis)
    {
        $this->db->query("SELECT * FROM {$this->table_penempatan} WHERE `namasiswa` = :namasiswa AND `nis` = :nis AND `status` = 1");
        $this->db->bind('namasiswa', $nama);
        $this->db->bind('nis', $nis);
        return $this->db->fetch();
    }

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
        if ($data['id']) {
            $this->db->query(
                "UPDATE {$this->tableps}
                    SET
                    status_penempatan = 1, 
                    modified_at = CURRENT_TIMESTAMP, 
                    modified_by = :modified_by 
                WHERE id = :id"
            );
            $this->db->bind('modified_by', $this->user);
            $this->db->bind('id', $data['id']);
            $this->db->execute();
        }

        $this->db->query(
            "INSERT INTO {$this->table_penempatan}
                VALUES 
            (null, :uuid, :nisn, :nis, :namasiswa, :kelassiswa, :tempatperusahaan, :namaperusahaan,
            '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)"
        );

        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('namasiswa', $data['namasiswa']);
        $this->db->bind('kelassiswa', $data['kelassiswa']);
        $this->db->bind('tempatperusahaan', $data['tempatperusahaan']);
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
                nis = :nis, 
                namasiswa = :namasiswa, 
                kelassiswa = :kelassiswa,
                tempatperusahaan = :tempatperusahaan,
                namaperusahaan = :namaperusahaan, 
                modified_at = CURRENT_TIMESTAMP, 
                modified_by = :modified_by 
            WHERE id = :id"
        );

        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('namasiswa', $data['namasiswa']);
        $this->db->bind('kelassiswa', $data['kelassiswa']);
        $this->db->bind('tempatperusahaan', $data['tempatperusahaan']);
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
            'nis',
            'namasiswa',
            'kelassiswa',
            'tempatperusahaan',
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

    public function cariSiswa($nama, $nis)
    {
        $this->db->query("SELECT * FROM masterdata.mastersiswa WHERE `nama_siswa` = :nama_siswa AND `nis` = :nis");
        $this->db->bind("nama_siswa", $nama);
        $this->db->bind("nis", $nis);

        return $this->db->fetch();
    }

    public function cariSiswaPemberkasan($nama, $nis)
    {
        $this->db->query(
            'SELECT * FROM ' . $this->tableps .
                ' WHERE 
            `namasiswa_pemberkasan` = :namasiswa_pemberkasan AND
            `nis_pemberkasan` = :nis_pemberkasan AND
            `status` = 1 '
        );
        $this->db->bind("namasiswa_pemberkasan", $nama);
        $this->db->bind("nis_pemberkasan", $nis);

        return $this->db->fetch();
    }

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

    public function getSiswaPSbyJurusan($jurusan)
    {
        $this->db->query('SELECT * FROM ' . $this->tableps . ' WHERE `status` = 1 AND `jurusan_pemberkasan` = :jurusan_pemberkasan');
        $this->db->bind("jurusan_pemberkasan", $jurusan);
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

    public function uploadFotoPemberkasan($fileName)
    {
        $targetDir = 'assets/pkl/pemberkasan/foto/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadfoto_pemberkasan'];

        // cek gambar diupload atau tidak
        if ($temp["error"] === 4) return '';

        // validasi ukuran file
        if ($temp["size"] > 1000000) {
            echo '<script>
                      alert("Ukuran File Terlalu Besar")
                  </script>';
            return false;
        }

        // validasi ekstensi file
        $imageFileType = explode('.', $temp['name']);
        $imageFileType = strtolower(end($imageFileType));
        $validation = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $validation)) {
            echo "Sorry, only " . implode(", ", $validation) . " files are allowed.";
            exit;
        }

        $fileName .= "." . $imageFileType;
        $targetFile = $targetDir . $fileName; // nama file upload

        // simpan file upload ke direktori
        try {
            move_uploaded_file($temp['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }

    public function uploadSuratPemberkasan($fileName)
    {
        $targetDir = 'assets/pkl/pemberkasan/surat/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadsurat_pemberkasan'];

        // cek gambar diupload atau tidak
        if ($temp["error"] === 4) return '';

        // validasi ukuran file
        if ($temp["size"] > 1000000) {
            echo '<script>
                      alert("Ukuran File Terlalu Besar")
                  </script>';
            return false;
        }

        // validasi ekstensi file
        $imageFileType = explode('.', $temp['name']);
        $imageFileType = strtolower(end($imageFileType));
        $validation = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $validation)) {
            echo "Sorry, only " . implode(", ", $validation) . " files are allowed.";
            exit;
        }

        $fileName .= "." . $imageFileType;
        $targetFile = $targetDir . $fileName; // nama file upload

        // simpan file upload ke direktori
        try {
            move_uploaded_file($temp['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }

    public function uploadKartuPelajarPemberkasan($fileName)
    {
        $targetDir = 'assets/pkl/pemberkasan/kartupelajar/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadkartupelajar_pemberkasan'];

        // cek gambar diupload atau tidak
        if ($temp["error"] === 4) return '';

        // validasi ukuran file
        if ($temp["size"] > 1000000) {
            echo '<script>
                      alert("Ukuran File Terlalu Besar")
                  </script>';
            return false;
        }

        // validasi ekstensi file
        $imageFileType = explode('.', $temp['name']);
        $imageFileType = strtolower(end($imageFileType));
        $validation = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $validation)) {
            echo "Sorry, only " . implode(", ", $validation) . " files are allowed.";
            exit;
        }

        $fileName .= "." . $imageFileType;
        $targetFile = $targetDir . $fileName; // nama file upload

        // simpan file upload ke direktori
        try {
            move_uploaded_file($temp['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }

    public function uploadRaportPemberkasan($fileName)
    {
        $targetDir = 'assets/raport/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadebookraport_pemberkasan'];

        // cek gambar diupload atau tidak
        if ($temp["error"] === 4) return '';

        // validasi ukuran file
        if ($temp["size"] > 5000000) {
            echo '<script>
                      alert("Ukuran File Terlalu Besar")
                  </script>';
            return false;
        }

        // validasi ekstensi file
        $imageFileType = explode('.', $temp['name']);
        $imageFileType = strtolower(end($imageFileType));
        $validation = ["pdf"];
        if (!in_array($imageFileType, $validation)) {
            echo "Sorry, only " . implode(", ", $validation) . " files are allowed.";
            exit;
        }

        $fileName .= "." . $imageFileType;
        $targetFile = $targetDir . $fileName; // nama file upload

        // simpan file upload ke direktori
        try {
            move_uploaded_file($temp['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }

    public function uploadBuktiLunasNilaiPemberkasan($fileName)
    {
        $targetDir = 'assets/pkl/pemberkasan/buktilunasnilai/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadbuktilunasnilai_pemberkasan'];

        // cek gambar diupload atau tidak
        if ($temp["error"] === 4) return '';

        // validasi ukuran file
        if ($temp["size"] > 1000000) {
            echo '<script>
                      alert("Ukuran File Terlalu Besar")
                  </script>';
            return false;
        }

        // validasi ekstensi file
        $imageFileType = explode('.', $temp['name']);
        $imageFileType = strtolower(end($imageFileType));
        $validation = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $validation)) {
            echo "Sorry, only " . implode(", ", $validation) . " files are allowed.";
            exit;
        }

        $fileName .= "." . $imageFileType;
        $targetFile = $targetDir . $fileName; // nama file upload

        // simpan file upload ke direktori
        try {
            move_uploaded_file($temp['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }

    public function uploadBuktiLunasAdministrasiPemberkasan($fileName)
    {
        $targetDir = 'assets/pkl/pemberkasan/buktilunasadm/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadbuktilunasadministrasi_pemberkasan'];

        // cek gambar diupload atau tidak
        if ($temp["error"] === 4) return '';

        // validasi ukuran file
        if ($temp["size"] > 1000000) {
            echo '<script>
                      alert("Ukuran File Terlalu Besar")
                  </script>';
            return false;
        }

        // validasi ekstensi file
        $imageFileType = explode('.', $temp['name']);
        $imageFileType = strtolower(end($imageFileType));
        $validation = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $validation)) {
            echo "Sorry, only " . implode(", ", $validation) . " files are allowed.";
            exit;
        }

        $fileName .= "." . $imageFileType;
        $targetFile = $targetDir . $fileName; // nama file upload

        // simpan file upload ke direktori
        try {
            move_uploaded_file($temp['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }

    public function uploadBuktiLunasPerpusPemberkasan($fileName)
    {
        $targetDir = 'assets/pkl/pemberkasan/buktilunasperpus/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadbuktilunasperpus_pemberkasan'];

        // cek gambar diupload atau tidak
        if ($temp["error"] === 4) return '';

        // validasi ukuran file
        if ($temp["size"] > 1000000) {
            echo '<script>
                      alert("Ukuran File Terlalu Besar")
                  </script>';
            return false;
        }

        // validasi ekstensi file
        $imageFileType = explode('.', $temp['name']);
        $imageFileType = strtolower(end($imageFileType));
        $validation = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $validation)) {
            echo "Sorry, only " . implode(", ", $validation) . " files are allowed.";
            exit;
        }

        $fileName .= "." . $imageFileType;
        $targetFile = $targetDir . $fileName; // nama file upload

        // simpan file upload ke direktori
        try {
            move_uploaded_file($temp['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }

    public function tambahDataPemberkasan($data)
    {

        $this->db->query(
            "INSERT INTO {$this->tableps}
                VALUES 
            (null, :uuid, 
            :nisn_pemberkasan, 
            :nis_pemberkasan, 
            :namasiswa_pemberkasan, 
            :tanggallahir_pemberkasan, 
            :agama_pemberkasan, 
            :kelas_pemberkasan, 
            :jurusan_pemberkasan, 
            :jeniskelamin_pemberkasan, 
            :domisili_pemberkasan, 
            :alamat_pemberkasan, 
            :notelp_pemberkasan, 
            :notelportu_pemberkasan, 
            :kota1_pemberkasan, 
            :kota2_pemberkasan, 
            :kota3_pemberkasan, 
            DEFAULT,
            0,
            :uploadfoto_pemberkasan, 
            :uploadsurat_pemberkasan, 
            :uploadkartupelajar_pemberkasan, 
            :uploadebookraport_pemberkasan, 
            :uploadbuktilunasnilai_pemberkasan, 
            :uploadbuktilunasadministrasi_pemberkasan, 
            :uploadbuktilunasperpus_pemberkasan, 
            '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)"
        );

        $foto = $this->uploadFotoPemberkasan($data['kelas_pemberkasan'] . "_" . $this->user . " (foto 3x4)");
        if (is_bool($foto) && !$foto) return false;

        $surat = $this->uploadSuratPemberkasan($data['kelas_pemberkasan'] . "_" . $this->user . " (surat pernyataan)");
        if (is_bool($surat) && !$surat) return false;

        $kartu = $this->uploadKartuPelajarPemberkasan($data['kelas_pemberkasan'] . "_" . $this->user . " (kartu pelajar)");
        if (is_bool($kartu) && !$kartu) return false;

        $raport = $this->uploadRaportPemberkasan($data['kelas_pemberkasan'] . "_" . $this->user . " (e-book raport)");
        if (is_bool($raport) && !$raport) return false;

        $nilai = $this->uploadBuktiLunasNilaiPemberkasan($data['kelas_pemberkasan'] . "_" . $this->user . " (bukti lunas nilai)");
        if (is_bool($nilai) && !$nilai) return false;

        $administrasi = $this->uploadBuktiLunasAdministrasiPemberkasan($data['kelas_pemberkasan'] . "_" . $this->user . " (bukti lunas administrasi)");
        if (is_bool($administrasi) && !$administrasi) return false;

        $perpus = $this->uploadBuktiLunasPerpusPemberkasan($data['kelas_pemberkasan'] . "_" . $this->user . " (bukti lunas perpus)");
        if (is_bool($perpus) && !$perpus) return false;

        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('nisn_pemberkasan', $data['nisn_pemberkasan']);
        $this->db->bind('nis_pemberkasan', $data['nis_pemberkasan']);
        $this->db->bind('namasiswa_pemberkasan', $data['namasiswa_pemberkasan']);
        $this->db->bind('tanggallahir_pemberkasan', $data['tanggallahir_pemberkasan']);
        $this->db->bind('agama_pemberkasan', $data['agama_pemberkasan']);
        $this->db->bind('kelas_pemberkasan', $data['kelas_pemberkasan']);
        $this->db->bind('jurusan_pemberkasan', $data['jurusan_pemberkasan']);
        $this->db->bind('jeniskelamin_pemberkasan', $data['jeniskelamin_pemberkasan']);
        $this->db->bind('domisili_pemberkasan', $data['domisili_pemberkasan']);
        $this->db->bind('alamat_pemberkasan', $data['alamat_pemberkasan']);
        $this->db->bind('notelp_pemberkasan', $data['notelp_pemberkasan']);
        $this->db->bind('notelportu_pemberkasan', $data['notelportu_pemberkasan']);
        $this->db->bind('kota1_pemberkasan', $data['kota1_pemberkasan']);
        $this->db->bind('kota2_pemberkasan', $data['kota2_pemberkasan']);
        $this->db->bind('kota3_pemberkasan', $data['kota3_pemberkasan']);
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

    public function ubahDataPemberkasan($data)
    {
        $this->db->query(
            "UPDATE {$this->tableps} SET  
                nisn_pemberkasan = :nisn_pemberkasan, 
                nis_pemberkasan = :nis_pemberkasan, 
                namasiswa_pemberkasan = :namasiswa_pemberkasan, 
                tanggallahir_pemberkasan = :tanggallahir_pemberkasan, 
                agama_pemberkasan = :agama_pemberkasan, 
                kelas_pemberkasan = :kelas_pemberkasan, 
                jurusan_pemberkasan = :jurusan_pemberkasan, 
                jeniskelamin_pemberkasan = :jeniskelamin_pemberkasan, 
                domisili_pemberkasan = :domisili_pemberkasan, 
                alamat_pemberkasan = :alamat_pemberkasan, 
                notelp_pemberkasan = :notelp_pemberkasan, 
                notelportu_pemberkasan = :notelportu_pemberkasan, 
                kota1_pemberkasan = :kota1_pemberkasan, 
                kota2_pemberkasan = :kota2_pemberkasan, 
                kota3_pemberkasan = :kota3_pemberkasan, 
                uploadfoto_pemberkasan = :uploadfoto_pemberkasan, 
                uploadsurat_pemberkasan = :uploadsurat_pemberkasan, 
                uploadkartupelajar_pemberkasan = :uploadkartupelajar_pemberkasan, 
                uploadebookraport_pemberkasan = :uploadebookraport_pemberkasan,
                uploadbuktilunasnilai_pemberkasan = :uploadbuktilunasnilai_pemberkasan, 
                uploadbuktilunasadministrasi_pemberkasan = :uploadbuktilunasadministrasi_pemberkasan, 
                uploadbuktilunasperpus_pemberkasan = :uploadbuktilunasperpus_pemberkasan, 
                modified_at = CURRENT_TIMESTAMP, 
                modified_by = :modified_by 
            WHERE id = :id"
        );

        $foto = ($_FILES["uploadfoto_pemberkasan"]["error"] === 4) ? $data['fotoLama'] : $this->uploadFotoPemberkasan($data['kelas_pemberkasan'] . "_" . $this->user . " (foto 3x4)");

        $kartu =  ($_FILES["uploadkartupelajar_pemberkasan"]["error"] === 4) ? $data['kartuPelajarLama'] : $kartu = $this->uploadKartuPelajarPemberkasan($data['kelas_pemberkasan'] . "_" . $this->user . " (kartu pelajar)");

        $raport = ($_FILES["uploadebookraport_pemberkasan"]["error"] === 4) ? $data['raportLama'] : $this->uploadRaportPemberkasan($data['kelas_pemberkasan'] . "_" . $this->user . " (e-book raport)");

        $surat = ($_FILES["uploadsurat_pemberkasan"]["error"] === 4) ? $surat = $data['suratLama'] : $surat = $this->uploadSuratPemberkasan($data['kelas_pemberkasan'] . "_" . $this->user . " (surat pernyataan)");

        $nilai = ($_FILES["uploadbuktilunasnilai_pemberkasan"]["error"] === 4) ? $data['nilaiLama'] : $this->uploadBuktiLunasNilaiPemberkasan($data['kelas_pemberkasan'] . "_" . $this->user . " (bukti lunas nilai)");

        $administrasi = ($_FILES["uploadbuktilunasadministrasi_pemberkasan"]["error"] === 4) ? $data['administrasiLama'] : $this->uploadBuktiLunasAdministrasiPemberkasan($data['kelas_pemberkasan'] . "_" . $this->user . " (bukti lunas administrasi)");

        $perpus = ($_FILES["uploadbuktilunasperpus_pemberkasan"]["error"] === 4) ? $data['perpusLama'] : $this->uploadBuktiLunasPerpusPemberkasan($data['kelas_pemberkasan'] . "_" . $this->user . " (bukti lunas perpus)");

        $this->db->bind('nisn_pemberkasan', $data['nisn_pemberkasan']);
        $this->db->bind('nis_pemberkasan', $data['nis_pemberkasan']);
        $this->db->bind('namasiswa_pemberkasan', $data['namasiswa_pemberkasan']);
        $this->db->bind('tanggallahir_pemberkasan', $data['tanggallahir_pemberkasan']);
        $this->db->bind('agama_pemberkasan', $data['agama_pemberkasan']);
        $this->db->bind('kelas_pemberkasan', $data['kelas_pemberkasan']);
        $this->db->bind('jurusan_pemberkasan', $data['jurusan_pemberkasan']);
        $this->db->bind('jeniskelamin_pemberkasan', $data['jeniskelamin_pemberkasan']);
        $this->db->bind('domisili_pemberkasan', $data['domisili_pemberkasan']);
        $this->db->bind('alamat_pemberkasan', $data['alamat_pemberkasan']);
        $this->db->bind('notelp_pemberkasan', $data['notelp_pemberkasan']);
        $this->db->bind('notelportu_pemberkasan', $data['notelportu_pemberkasan']);
        $this->db->bind('kota1_pemberkasan', $data['kota1_pemberkasan']);
        $this->db->bind('kota2_pemberkasan', $data['kota2_pemberkasan']);
        $this->db->bind('kota3_pemberkasan', $data['kota3_pemberkasan']);
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
    // public function getExistSiswaDP()
    // {
    //     $this->db->query("SELECT * FROM `{$this->tabledp}` WHERE `status` = 1");
    //     return $this->db->fetchAll();
    // }
    public function getExistSiswaDP($perusahaan = 'all')
    {
        if ($perusahaan == 'all') {
            $this->db->query("SELECT * FROM `{$this->tabledp}` WHERE `status` = 1");
        } else {
            $this->db->query("SELECT * FROM `{$this->tabledp}` WHERE `namaperusahaan` = :perusahaan AND `status` = 1");
            $this->db->bind('perusahaan', $perusahaan);
        }
        return $this->db->fetchAll();
    }

    public function getNamaPerusahaan()
    {
        $this->db->query("SELECT namaperusahaan FROM `{$this->tabledp}` GROUP BY namaperusahaan");
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
            (null, :uuid, :namaperusahaan, :jumlahlakilaki, :jumlahperempuan, :kota, :mulaitahun, :sampaitahun, 
            '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)"
        );

        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('jumlahlakilaki', $data['jumlahlakilaki']);
        $this->db->bind('jumlahperempuan', $data['jumlahperempuan']);
        $this->db->bind('kota', $data['kota']);
        $this->db->bind('mulaitahun', $data['mulaitahun']);
        $this->db->bind('sampaitahun', $data['sampaitahun']);

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
                jumlahlakilaki = :jumlahlakilaki, 
                jumlahperempuan = :jumlahperempuan,
                kota = :kota,
                mulaitahun = :mulaitahun,
                sampaitahun = :sampaitahun,
                modified_at = CURRENT_TIMESTAMP, 
                modified_by = :modified_by 
            WHERE id = :id"
        );

        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('jumlahlakilaki', $data['jumlahlakilaki']);
        $this->db->bind('jumlahperempuan', $data['jumlahperempuan']);
        $this->db->bind('kota', $data['kota']);
        $this->db->bind('mulaitahun', $data['mulaitahun']);
        $this->db->bind('sampaitahun', $data['sampaitahun']);
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
            'tanggal_monitoringpkl'
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

 

    public function importDataPPJ()
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
    public function importDatadt()
    {
        $fields = [
            'namaperusahaan',
            'jumlahlakilaki',
            'jumlahperempuan',
            'kota',
            'mulaitahun',
            'sampaitahun'
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
    public function importDataPPS()
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
            $response = $this->tambahDataSiswa($data);
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
    
}