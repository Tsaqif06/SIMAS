<?php

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Ramsey\Uuid\Uuid;

<?php

/**
 * Summary of pegawai_model
 */
class pkl_model extends Database {
      private $table = 'daftarsiswapegawai';
      private $tableind ='dataindustripkl';
      private $tabletp ='datatempatpkl';
      private $tableMON ='monitoringpkl';
      private $tablepb ='pembekalanpkl';
      private $tableps ='pemberkasanpkl';
      private $tabledp ='dayatampungpkl';
      private $tablepp ='perpanjangmasapkl';
      private $tableiz ='perizinanpkl';
      private $tablebm ='siswabermasalah';
      private $tablenilai ='nilaipkl';

      private $db;
       
      public function __construct() {
            $this->db = new Database;
      }

      public function getSiswaPegawai() {
            $this->db->query('SELECT * FROM ' . $this->table);
            return $this->db->resultSet();
      }

      public function getDetailSiswa($id) {
            $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
            $this->db->bind('id', $id);
            return $this->db->single();
      }

      public function TambahDataSiswa($data) {
            $query = "INSERT INTO daftarsiswapegawai
                        VALUES 
                        (null, :nisn, :namasiswa, :kelas, :jurusan, :namaperusahaan)";
          
            $this->db->query($query);
            $this->db->bind('nisn', $data['nisn']);
            $this->db->bind('namasiswa', $data['namasiswa']);
            $this->db->bind('kelas', $data['kelas']);
            $this->db->bind('jurusan', $data['jurusan']);
            $this->db->bind('namaperusahaan', $data['namaperusahaan']);
          
            $this->db->execute();

            return $this->db->rowCount();
      }

      public function HapusDataSiswa($id) {
            $query = "DELETE FROM daftarsiswapegawai WHERE id = :id";

            $this->db->query($query);
            $this->db->bind('id', $id);

            $this->db->execute();
            return $this->db->rowCount();
      }

      public function ubahDataSiswa($data) {
            $query = "UPDATE daftarsiswapegawai SET 
                        nisn = :nisn, 
                        namasiswa = :namasiswa, 
                        kelas = :kelas,
                        jurusan = :jurusan, 
                        namaperusahaan = :namaperusahaan 
                       WHERE id = :id";
     
            $this->db->query($query);
            $this->db->bind('nisn', $data['nisn']);
            $this->db->bind('namasiswa', $data['namasiswa']);
            $this->db->bind('kelas', $data['kelas']);
            $this->db->bind('jurusan', $data['jurusan']);
            $this->db->bind('namaperusahaan', $data['namaperusahaan']);
            $this->db->bind('id', $data['id']);
     
            $this->db->execute();
            return $this->db->rowCount();
      }
      
      public function caridataPegawai() {
            $keyword = $_POST['keyword'];
            $query  =   "SELECT * FROM daftarsiswapegawai WHERE namasiswa LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            return $this->db->resultSet();
      }


// dataindustri

      public function getSiswaind() {
            $this->db->query('SELECT * FROM ' . $this->tableind);
            return $this->db->resultSet();
      }

      public function getDetailind($id) {
            $this->db->query('SELECT * FROM ' . $this->tableind . ' WHERE id = :id');
            $this->db->bind('id', $id);
            return $this->db->single();
      }

      public function TambahDataind($data) {
            $query = "INSERT INTO dataindustripkl
                        VALUES 
                        (null, :kompetensikeahlian, :namaperusahaan, :alamat, :kota)";
          
            $this->db->query($query);
            $this->db->bind('kompetensikeahlian', $data['kompetensikeahlian']);
            $this->db->bind('namaperusahaan', $data['namaperusahaan']);
            $this->db->bind('alamat', $data['alamat']);
            $this->db->bind('kota', $data['kota']);
          
            $this->db->execute();

            return $this->db->rowCount();
      }

      public function HapusDataind($id) {
            $query = "DELETE FROM dataindustripkl WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);

            $this->db->execute();

            return $this->db->rowCount();
      }

      public function ubahDataind($data) {
            $query = "UPDATE dataindustripkl SET 
                        kompetensikeahlian = :kompetensikeahlian, 
                        namaperusahaan = :namaperusahaan, 
                        alamat = :alamat,
                        kota = :kota 
                      WHERE id = :id";
     
            $this->db->query($query);
            $this->db->bind('kompetensikeahlian', $data['kompetensikeahlian']);
            $this->db->bind('namaperusahaan', $data['namaperusahaan']);
            $this->db->bind('alamat', $data['alamat']);
            $this->db->bind('kota', $data['kota']);
            $this->db->bind('id', $data['id']);
     
            $this->db->execute();
            return $this->db->rowCount();
      }
       
      public function caridataind() {
            $keyword = $_POST['keyword'];
            $query  =   "SELECT * FROM dataindustripkl WHERE kota LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            return $this->db->resultSet();
      }


// DATA NILAI

      public function getNilaiDGA() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DG A'");
            return $this->db->resultSet();
      }

      public function getNilaiExistDGA() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DG A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiDGB() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DG B'");
            return $this->db->resultSet();
      }

      public function getNilaiExistDGB() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DG B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiDGC() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DG C'");
            return $this->db->resultSet();
      }

      public function getNilaiExistDGC() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DG C' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiDGD() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DG D'");
            return $this->db->resultSet();
      }

      public function getNilaiExistDGD() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DG D' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiPDA() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PD A'");
            return $this->db->resultSet();
      }

      public function getNilaiExistPDA() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PD A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiPDB() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PD B'");
            return $this->db->resultSet();
      }

      public function getNilaiExistPDB() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PD B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiPDC() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PD C'");
            return $this->db->resultSet();
      }

      public function getNilaiExistPDC() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PD C' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiPDD() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PD D'");
            return $this->db->resultSet();
      }

      public function getNilaiExistPDD() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PD D' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistTLA() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI TL A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistTLB() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI TL B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistTMA() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI TM A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistTMB() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI TM B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistRPLA() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI RPL A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistRPLB() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI RPL B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistRPLC() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI RPL C' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistTKJA() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI TKJ A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistTKJB() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI TKJ B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistDKVA() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DKV A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistDKVB() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DKV B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistDKVC() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI DKV C' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistPHA() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PH A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistPHB() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI PH B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistANIA() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI ANI A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistANIB() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI ANI B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiExistANIC() {
            $this->db->query("SELECT * FROM {$this->tablenilai} WHERE kelas = 'XI ANI C' AND status = 1");
            return $this->db->resultSet();
      }

      public function getNilaiById($id) {
            $this->db->query('SELECT * FROM ' . $this->tablenilai . ' WHERE id = :id');
            $this->db->bind('id', $id);
            return $this->db->single();
      }

      public function tambahDataNilai($data) {
            $query = "INSERT INTO nilaipkl
                        VALUES 
                        (null, :nisn, :namasiswa, :kelas, :jeniskelamin, :namaindustri, :nilaisiswa, :keterangannilai, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)";
          
            $this->db->query($query);
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

      public function hapusDataNilai($id) {
            $this->db->query(
                  "UPDATE {$this->tablenilai}
                      SET
                      deleted_at = CURRENT_TIMESTAMP,
                      deleted_by = :deleted_by,
                      is_deleted = 1,
                      status = 0,
                      is_restored = 0
                    WHERE id = :id"
                 );
          
                 $this->db->bind('deleted_by', "Super Admin");
                  $this->db->bind("id", $id);
          
                  $this->db->execute();
                  return $this->db->rowCount();
      }

      public function ubahDataNilai($data) {
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

      public function getSiswaDGA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DG A'");
            return $this->db->resultSet();
      }

      public function getExistDGA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DG A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaDGB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DG B'");
            return $this->db->resultSet();
      }

      public function getExistDGB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DG B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaDGC() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DG C'");
            return $this->db->resultSet();
      }

      public function getExistDGC() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DG C' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaDGD() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DG D'");
            return $this->db->resultSet();
      }

      public function getExistDGD() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DG D' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaPDA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PD A'");
            return $this->db->resultSet();
      }

      public function getExistPDA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PD A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaPDB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PD B'");
            return $this->db->resultSet();
      }

      public function getExistPDB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PD B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaPDC() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PD C'");
            return $this->db->resultSet();
      }

      public function getExistPDC() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PD C' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaPDD() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PD D'");
            return $this->db->resultSet();
      }

      public function getExistPDD() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PD D' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaTLA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI TL A'");
            return $this->db->resultSet();
      }

      public function getExistTLA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI TL A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaTLB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI TL B'");
            return $this->db->resultSet();
      }

      public function getExistTLB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI TL B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaTMA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI Mekatronika A'");
            return $this->db->resultSet();
      }

      public function getExistTMA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI Mekatronika A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaTMB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI Mekatronika B'");
            return $this->db->resultSet();
      }

      public function getExistTMB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI Mekatronika B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaRPLA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI RPL A'");
            return $this->db->resultSet();
      }

      public function getExistRPLA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI RPL A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaRPLB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI RPL B'");
            return $this->db->resultSet();
      }

      public function getExistRPLB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI RPL B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaRPLC() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI RPL C'");
            return $this->db->resultSet();
      }

      public function getExistRPLC() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI RPL C' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaTKJA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI TKJ A'");
            return $this->db->resultSet();
      }

      public function getExistTKJA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI TKJ A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaTKJB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI TKJ B'");
            return $this->db->resultSet();
      }

      public function getExistTKJB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI TKJ B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaDKVA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DKV A'");
            return $this->db->resultSet();
      }

      public function getExistDKVA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DKV A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaDKVB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DKV B'");
            return $this->db->resultSet();
      }

      public function getExistDKVB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DKV B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaDKVC() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DKV C'");
            return $this->db->resultSet();
      }

      public function getExistDKVC() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI DKV C' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaPHA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PH A'");
            return $this->db->resultSet();
      }

      public function getExistPHA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PH A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaPHB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PH B'");
            return $this->db->resultSet();
      }

      public function getExistPHB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI PH B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaANIA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI ANIMASI A'");
            return $this->db->resultSet();
      }

      public function getExistANIA() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI ANIMASI A' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaANIB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI ANIMASI B'");
            return $this->db->resultSet();
      }

      public function getExistANIB() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI ANIMASI B' AND status = 1");
            return $this->db->resultSet();
      }

      public function getSiswaANIC() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI ANIMASI C'");
            return $this->db->resultSet();
      }

      public function getExistANIC() {
            $this->db->query("SELECT * FROM {$this->tabletp} WHERE kelassiswa = 'XI ANIMASI C' AND status = 1");
            return $this->db->resultSet();
      }

      public function getDetailtp($id) {
            $this->db->query('SELECT * FROM ' . $this->tabletp . ' WHERE id = :id');
            $this->db->bind('id', $id);
            return $this->db->single();
      }

      public function TambahDatatp($data) {
            $query = "INSERT INTO datatempatpkl
                        VALUES 
                      (null, :nisn, :namasiswa, :kelassiswa, :namaperusahaan, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)";
       
            $this->db->query($query);
            $this->db->bind('nisn', $data['nisn']);
            $this->db->bind('namasiswa', $data['namasiswa']);
            $this->db->bind('kelassiswa', $data['kelassiswa']);
            $this->db->bind('namaperusahaan', $data['namaperusahaan']);
            $this->db->bind('created_by', "Super Admin");
       
            $this->db->execute();

            return $this->db->rowCount();
      }

      public function HapusDatatp($id) {
            $this->db->query(
                  "UPDATE {$this->tabletp}
                      SET
                      deleted_at = CURRENT_TIMESTAMP,
                      deleted_by = :deleted_by,
                      is_deleted = 1,
                      status = 0,
                      is_restored = 0
                    WHERE id = :id"
            );
          
                  $this->db->bind('deleted_by', "Super Admin");
                  $this->db->bind("id", $id);

            $this->db->execute();
            return $this->db->rowCount();
      }


      public function ubahDatatp($data) {
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
            $this->db->bind('modified_by', "Super Admin");
            $this->db->bind('id', $data['id']);
  
            $this->db->execute();
            return $this->db->rowCount();
      }
    

      public function caridatatp() {
            $keyword = $_POST['keyword'];
            $query  =   "SELECT * FROM datatempatpkl WHERE kelassiswa LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            return $this->db->resultSet();
      }

//    data monitoring pkl

      public function getSiswaMON() {
            $this->db->query('SELECT * FROM ' . $this->tableMON);
            return $this->db->resultSet();
      }
  
      public function getDetailMON($id) {
            $this->db->query('SELECT * FROM ' . $this->tableMON . ' WHERE id = :id');
            $this->db->bind('id', $id);
            return $this->db->single();
      }

      public function TambahDataMON($data) {
            $query = "INSERT INTO monitoringpkl
                        VALUES 
                      (null, :namaperusahaan_monitoringpkl, :namaguru_monitoringpkl, :tanggal_monitoringpkl)";
         
            $this->db->query($query);
            $this->db->bind('namaperusahaan_monitoringpkl', $data['namaperusahaan_monitoringpkl']);
            $this->db->bind('namaguru_monitoringpkl', $data['namaguru_monitoringpkl']);
            $this->db->bind('tanggal_monitoringpkl', $data['tanggal_monitoringpkl']);
         
            $this->db->execute();
            return $this->db->rowCount();
      }
  
      public function HapusDataMON($id) {
            $query = "DELETE FROM monitoringpkl WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);
  
            $this->db->execute();
  
            return $this->db->rowCount();
      }
  
      public function ubahDataMON($data) {
            $query = "UPDATE monitoringpkl SET 
                        namaperusahaan_monitoringpkl = :namaperusahaan_monitoringpkl, 
                        namaguru_monitoringpkl = :namaguru_monitoringpkl, 
                        tanggal_monitoringpkl = :tanggal_monitoringpkl
                      WHERE id = :id";
    
            $this->db->query($query);
            $this->db->bind('namaperusahaan_monitoringpkl', $data['namaperusahaan_monitoringpkl']);
            $this->db->bind('namaguru_monitoringpkl', $data['namaguru_monitoringpkl']);
            $this->db->bind('tanggal_monitoringpkl', $data['tanggal_monitoringpkl']);
            $this->db->bind('id', $data['id']);
    
            $this->db->execute();
            return $this->db->rowCount();
      }
      
      public function caridataMON() {
            $keyword = $_POST['keyword'];
            $query  =   "SELECT * FROM monitoringpkl WHERE namaperusahaan_monitoringpkl LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            return $this->db->resultSet();
      }
  

//   pembekalan pkl

      public function getSiswaPB() {
            $this->db->query('SELECT * FROM ' . $this->tablepb);
            return $this->db->resultSet();
      }

     public function getDetailPB($id) {
            $this->db->query('SELECT * FROM ' . $this->tablepb . ' WHERE id = :id');
            $this->db->bind('id', $id);
            return $this->db->single();
      }

      public function TambahDataPB($data) {
            $query = "INSERT INTO pembekalanpkl
                        VALUES 
                      (null, :dilakukanoleh, :tanggalpersiapan, :jadwal, :peserta, :tempat)";
       
            $this->db->query($query);
            $this->db->bind('dilakukanoleh', $data['dilakukanoleh']);
            $this->db->bind('tanggalpersiapan', $data['tanggalpersiapan']);
            $this->db->bind('jadwal', $data['jadwal']);
            $this->db->bind('peserta', $data['peserta']);
            $this->db->bind('tempat', $data['tempat']);
       
       
            $this->db->execute();

            return $this->db->rowCount();
      }

      public function HapusDataPB($id) {
            $query = "DELETE FROM pembekalanpkl WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);

            $this->db->execute();

            return $this->db->rowCount();
      }


      public function ubahDataPB($data) {
          $query = "UPDATE pembekalanpkl SET  
                        dilakukanoleh = :dilakukanoleh, 
                        tanggalpersiapan = :tanggalpersiapan,
                        jadwal = :jadwal,
                        peserta = :peserta,
                        tempat = :tempat
                    WHERE id = :id";
  
          $this->db->query($query);
          $this->db->bind('dilakukanoleh', $data['dilakukanoleh']);
          $this->db->bind('tanggalpersiapan', $data['tanggalpersiapan']);
          $this->db->bind('jadwal', $data['jadwal']);
          $this->db->bind('peserta', $data['peserta']);
          $this->db->bind('tempat', $data['tempat']);
          $this->db->bind('id', $data['id']);
  
          $this->db->execute();
          return $this->db->rowCount();
      }
    

      public function caridataPB() {
            $keyword = $_POST['keyword'];
            $query  =   "SELECT * FROM pembekalanpkl WHERE peserta LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            return $this->db->resultSet();
      }


// pemberkasanpkl

      public function getSiswaPS() {
            $this->db->query('SELECT * FROM ' . $this->tableps);
            return $this->db->resultSet();
      }

      public function getDetailPS($id) {
            $this->db->query('SELECT * FROM ' . $this->tableps . ' WHERE id = :id');
            $this->db->bind('id', $id);
            return $this->db->single();
      }

      public function TambahDataPS($data) {
            $query = "INSERT INTO pemberkasanpkl
                        VALUES 
                      (null, :nisn_pemberkasan, :namasiswa_pemberkasan, :tanggallahir_pemberkasan, :jurusan_pemberkasan, :jeniskelamin_pemberkasan, :domisili_pemberkasann, :uploadfoto_pemberkasan, :uploadebookraport_pemberkasan, :uploadbuktilunas_pemberkasan)";
       
            $this->db->query($query);
            $this->db->bind('nisn_pemberkasan', $data['nisn_pemberkasan']);
            $this->db->bind('namasiswa_pemberkasan', $data['namasiswa_pemberkasan']);
            $this->db->bind('tanggallahir_pemberkasan', $data['tanggallahir_pemberkasan']);
            $this->db->bind('jurusan_pemberkasan', $data['jurusan_pemberkasan']);
            $this->db->bind('jeniskelamin_pemberkasan', $data['jeniskelamin_pemberkasan']);
            $this->db->bind('domisili_pemberkasann', $data['domisili_pemberkasann']);
            $this->db->bind('uploadfoto_pemberkasan', $data['uploadfoto_pemberkasan']);
            $this->db->bind('uploadebookraport_pemberkasan', $data['uploadebookraport_pemberkasan']);
            $this->db->bind('uploadbuktilunas_pemberkasan', $data['uploadbuktilunas_pemberkasan']);
       
            $this->db->execute();

            return $this->db->rowCount();
      }

      public function HapusDataPS($id) {
            $query = "DELETE FROM pemberkasanpkl WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);

            $this->db->execute();

            return $this->db->rowCount();
      }


      public function ubahDataPS($data) {
          $query = "UPDATE pemberkasanpkl SET  
                        nisn_pemberkasan = :nisn_pemberkasan, 
                        namasiswa_pemberkasan = :namasiswa_pemberkasan,
                        tanggallahir_pemberkasan = :tanggallahir_pemberkasan,
                        jurusan_pemberkasan = :jurusan_pemberkasan,
                        jeniskelamin_pemberkasan, = :jeniskelamin_pemberkasan,
                        domisili_pemberkasan, = :domisili_pemberkasan,
                        uploadfoto_pemberkasan, = :uploadfoto_pemberkasan,
                        uploadebookraport_pemberkasan, = :uploadebookraport_pemberkasan,
                        uploadbuktilunas_pemberkasan, = :uploadbuktilunas_pemberkasan
                    WHERE id = :id";
  
            $this->db->query($query);
            $this->db->bind('nisn_pemberkasan', $data['nisn_pemberkasan']);
            $this->db->bind('namasiswa_pemberkasan', $data['namasiswa_pemberkasan']);
            $this->db->bind('tanggallahir_pemberkasan', $data['tanggallahir_pemberkasan']);
            $this->db->bind('jurusan_pemberkasan', $data['jurusan_pemberkasan']);
            $this->db->bind('jeniskelamin_pemberkasan,', $data['jeniskelamin_pemberkasan']);
            $this->db->bind('domisili_pemberkasan,', $data['domisili_pemberkasan']);
            $this->db->bind('uploadfoto_pemberkasan,', $data['uploadfoto_pemberkasan']);
            $this->db->bind('uploadebookraport_pemberkasan,', $data['uploadebookraport_pemberkasan']);
            $this->db->bind('uploadbuktilunas_pemberkasan,', $data['uploadbuktilunas_pemberkasan']);
            $this->db->bind('id', $data['id']);
      
            $this->db->execute();
            return $this->db->rowCount();
      }
    
      public function caridataPS() {
          $keyword = $_POST['keyword'];
          $query  =   "SELECT * FROM pemberkasanpkl WHERE domisili_pemberkasan LIKE :keyword";
          $this->db->query($query);
          $this->db->bind('keyword', "%$keyword%");
         return $this->db->resultSet();
      }


//    DAYA TAMPUNG

      public function getSiswaDP() {
            $this->db->query('SELECT * FROM ' . $this->tabledp);
            return $this->db->resultSet();
      }

      public function getDetailDP($id) {
            $this->db->query('SELECT * FROM ' . $this->tabledp . ' WHERE id = :id');
            $this->db->bind('id', $id);
            return $this->db->single();
      }
      
      public function TambahDataDP($data) {
            $query = "INSERT INTO dayatampungpkl
                        VALUES 
                      (null, :namaperusahaan, :jurusan, :jeniskelamin, :jumlah)";
          
            $this->db->query($query);
            $this->db->bind('namaperusahaan', $data['namaperusahaan']);
            $this->db->bind('jurusan', $data['jurusan']);
            $this->db->bind('jeniskelamin', $data['jeniskelamin']);
            $this->db->bind('jumlah', $data['jumlah']);
          
            $this->db->execute();

            return $this->db->rowCount();
      }
      
      public function HapusDataDP($id) {
            $query = "DELETE FROM dayatampungpkl WHERE id = :id";

            $this->db->query($query);
            $this->db->bind('id', $id);

            $this->db->execute();
            return $this->db->rowCount();
      }

      public function ubahDataDP($data) {
            $query = "UPDATE dayatampungpkl SET 
                        namaperusahaan = :namaperusahaan, 
                        jurusan = :jurusan, 
                        jeniskelamin = :jeniskelamin,
                        jumlah = :jumlah 
                      WHERE id = :id";
     
            $this->db->query($query);
            $this->db->bind('namaperusahaan', $data['namaperusahaan']);
            $this->db->bind('jurusan', $data['jurusan']);
            $this->db->bind('jeniskelamin', $data['jeniskelamin']);
            $this->db->bind('jumlah', $data['jumlah']);
            $this->db->bind('id', $data['id']);
     
            $this->db->execute();
            return $this->db->rowCount();
      }
       
      public function caridataDP() {
            $keyword = $_POST['keyword'];
            $query  =   "SELECT * FROM dayatampungpkl WHERE jurusan LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            return $this->db->resultSet();
      }

      
//    perpanjangpkl

      public function getSiswaPP() {
            $this->db->query('SELECT * FROM ' . $this->tablepp);
            return $this->db->resultSet();
      }

      public function getDetailPP($id) {
            $this->db->query('SELECT * FROM ' . $this->tablepp . ' WHERE id = :id');
            $this->db->bind('id', $id);
            return $this->db->single();
      }
      
      public function TambahDataPP($data) {
            $query = "INSERT INTO perpanjangmasapkl
                        VALUES 
                      (null, :ppnama, :ppkelas, :nisn, :namaperusahaan, :tanggalperpanjangpkl)";
          
            $this->db->query($query);
            $this->db->bind('ppnama', $data['ppnama']);
            $this->db->bind('ppkelas', $data['ppkelas']);
            $this->db->bind('nisn', $data['nisn']);
            $this->db->bind('namaperusahaan', $data['namaperusahaan']);
            $this->db->bind('tanggalperpanjangpkl', $data['tanggalperpanjangpkl']);
          
            $this->db->execute();
            return $this->db->rowCount();
      }

      public function HapusDataPP($id) {
            $query = "DELETE FROM perpanjangmasapkl WHERE id = :id";

            $this->db->query($query);
            $this->db->bind('id', $id);

            $this->db->execute();
            return $this->db->rowCount();
      }

      public function ubahDataPP($data) {
            $query = "UPDATE perpanjangmasapkl SET 
                        ppnama = :ppnama, 
                        ppkelas = :ppkelas, 
                        nisn = :nisn,
                        namaperusahaan = :namaperusahaan,
                        tanggalperpanjangpkl = :tanggalperpanjangpkl 
                      WHERE id = :id";
     
            $this->db->query($query);
            $this->db->bind('ppnama', $data['ppnama']);
            $this->db->bind('ppkelas', $data['ppkelas']);
            $this->db->bind('nisn', $data['nisn']);
            $this->db->bind('namaperusahaan', $data['namaperusahaan']);
            $this->db->bind('tanggalperpanjangpkl', $data['tanggalperpanjangpkl']);
            $this->db->bind('id', $data['id']);
     
            $this->db->execute();
            return $this->db->rowCount();
      }
       
      public function caridataPP() {
            $keyword = $_POST['keyword'];
            $query  =   "SELECT * FROM perpanjangmasapkl WHERE ppkelas LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            return $this->db->resultSet();
      }

      
//  izinpkl
         
      public function getSiswaIZ() {
            $this->db->query('SELECT * FROM ' . $this->tableiz);
            return $this->db->resultSet();
      }

      public function getDetailIZ($id) {
            $this->db->query('SELECT * FROM ' . $this->tableiz . ' WHERE id = :id');
            $this->db->bind('id', $id);
            return $this->db->single();
      }

      public function TambahDataIZ($data) {
            $query = "INSERT INTO perizinanpkl
                        VALUES 
                      (null, :nisn, :nama, :kelas, :namaperusahaan, :halizin, :drtanggal, :hgtanggal)";
          
            $this->db->query($query);
            $this->db->bind('nisn', $data['nisn']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('kelas', $data['kelas']);
            $this->db->bind('namaperusahaan', $data['namaperusahaan']);
            $this->db->bind('halizin', $data['halizin']);
            $this->db->bind('drtanggal', $data['drtanggal']);
            $this->db->bind('hgtanggal', $data['hgtanggal']);
          
            $this->db->execute();
            return $this->db->rowCount();
      }
      
      public function HapusDataIZ($id) {
            $query = "DELETE FROM perizinanpkl WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);

            $this->db->execute();
            return $this->db->rowCount();
      }
      
      public function ubahDataIZ($data) {
            $query = "UPDATE perizinanpkl SET 
                        nisn = :nisn, 
                        nama = :nama, 
                        kelas = :kelas,
                        namaperusahaan = :namaperusahaan,
                        halizin = :halizin,
                        drtanggal = :drtanggal,
                        hgtanggal = :hgtanggal
                      WHERE id = :id";
     
      
            $this->db->query($query);
            $this->db->bind('nisn', $data['nisn']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('kelas', $data['kelas']);
            $this->db->bind('namaperusahaan', $data['namaperusahaan']);
            $this->db->bind('halizin', $data['halizin']);
            $this->db->bind('drtanggal', $data['drtanggal']);
            $this->db->bind('hgtanggal', $data['hgtanggal']);
            $this->db->bind('id', $data['id']);
     
            $this->db->execute();
            return $this->db->rowCount();
      }
      
      public function caridataIZ() {
            $keyword = $_POST['keyword'];
            $query  =   "SELECT * FROM perizinanpkl WHERE kelas LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            return $this->db->resultSet();
      }


//    Siswa Bermasalah

      public function getSiswaBM() {
            $this->db->query('SELECT * FROM ' . $this->tablebm);
            return $this->db->resultSet();
      }

      public function getDetailBM($id) {
            $this->db->query('SELECT * FROM ' . $this->tablebm . ' WHERE id = :id');
            $this->db->bind('id', $id);
            return $this->db->single();
      }

      public function TambahDataBM($data) {
            $query = "INSERT INTO siswabermasalah
                        VALUES 
                      (null, :nisn, :nama, :kelas, :namaperusahaan, :jenismasalah, :solusi)";
       
            $this->db->query($query);
            $this->db->bind('nisn', $data['nisn']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('kelas', $data['kelas']);
            $this->db->bind('namaperusahaan', $data['namaperusahaan']);
            $this->db->bind('jenismasalah', $data['jenismasalah']);
            $this->db->bind('solusi', $data['solusi']);

            $this->db->execute();
            return $this->db->rowCount();
      }

      public function HapusDataBM($id) {
            $query = "DELETE FROM siswabermasalah WHERE id = :id";

            $this->db->query($query);
            $this->db->bind('id', $id);

            $this->db->execute();
            return $this->db->rowCount();
      }


      public function ubahDataBM($data) {
            $query = "UPDATE siswabermasalah SET 
                        nisn = :nisn, 
                        nama = :nama, 
                        kelas = :kelas,
                        namaperusahaan = :namaperusahaan,
                        jenismasalah = :jenismasalah,
                        solusi = :solusi
                     WHERE id = :id";
  
            $this->db->query($query);
            $this->db->bind('nisn', $data['nisn']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('kelas', $data['kelas']);
            $this->db->bind('namaperusahaan', $data['namaperusahaan']);
            $this->db->bind('jenismasalah', $data['jenismasalah']);
            $this->db->bind('solusi', $data['solusi']);
            $this->db->bind('id', $data['id']);
      
            $this->db->execute();
            return $this->db->rowCount();
      }
    

      // public function caridataBM()
      // {
      //     $keyword = $_POST['keyword'];
      //     $query  =   "SELECT * FROM perizinanpkl WHERE kelas LIKE :keyword";
      //     $this->db->query($query);
      //     $this->db->bind('keyword', "%$keyword%");
      //    return $this->db->resultSet();
      // }
}