<?php



use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Ramsey\Uuid\Uuid;

class BKK_model
{
    private $tabledas = "alumnisukses";
    private $tablelomba = "lomba";
    private $tableloker = "loker";
    private $tablemou = "mou";
    private $tablepeminatan = "peminatan";
    private $tablerekrutindustri = "rekrutmendenganindustri";
    private $tablespw = "spw";
    private $tableworkshop = "workshop";
    private $user;
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_HUMAS);
        $this->user = Cookie::get_jwt()->name;
    }


    public function getExistdas()
    {
        $this->db->query('SELECT * FROM ' . $this->tabledas . '  WHERE `status` = 1 ORDER BY namalengkap ASC');
        return $this->db->fetchAll();
    }
    public function getJmlDataDas()
    {
        $this->db->query("SELECT COUNT(*) AS count FROM {$this->tabledas} WHERE `status` = 1");
        return $this->db->fetch();
    }

    public function getExistlomba()
    {
        $this->db->query('SELECT * FROM ' . $this->tablelomba . ' WHERE `status` = 1 ORDER BY penyelenggara ASC');
        return $this->db->fetchAll();
    }


    public function getExistpeminatan()
    {
        $this->db->query('SELECT * FROM ' . $this->tablepeminatan . ' WHERE `status` = 1 ORDER BY nama ASC');
        return $this->db->fetchAll();
    }

    public function getExistworkshop()
    {
        $this->db->query('SELECT * FROM ' . $this->tableworkshop . ' WHERE `status` = 1 ORDER BY penyelenggara ASC');
        return $this->db->fetchAll();
    }

    public function getExistloker()
    {
        $this->db->query('SELECT * FROM ' . $this->tableloker . ' WHERE `status` = 1 ORDER BY namaperusahaan ASC');
        return $this->db->fetchAll();
    }

    public function getExistmou()
    {
        $this->db->query('SELECT * FROM ' . $this->tablemou . ' WHERE `status` = 1 ORDER BY dudika ASC');
        return $this->db->fetchAll();
    }

    public function getExistspw()
    {
        $this->db->query('SELECT * FROM ' . $this->tablespw . ' WHERE `status` = 1 ORDER BY namalengkap ASC');
        return $this->db->fetchAll();
    }

    public function getBKKdasById($id)
    {
        $this->db->query('SELECT * FROM alumnisukses WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function getBKKpeminatanById($id)
    {
        $this->db->query("SELECT * FROM peminatan WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function getBKKmouById($id)
    {
        $this->db->query("SELECT * FROM {$this->tablemou} WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function getBKKworkshopById($id)
    {
        $this->db->query("SELECT * FROM {$this->tableworkshop} WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function getBKKspwById($id)
    {
        $this->db->query("SELECT * FROM {$this->tablespw} WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function getBKKrekrutById($id)
    {
        $this->db->query("SELECT * FROM {$this->tablerekrutindustri} WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function getBKKlombaById($id)
    {
        $this->db->query("SELECT * FROM {$this->tablelomba} WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function getBKKlokerById($id)
    {
        $this->db->query("SELECT * FROM {$this->tableloker} WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function uploadFotoDas()
    {
        $targetDir = 'images/humas/bkk/das/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadfototerbaru']['name'];
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
        if ($_FILES["uploadfototerbaru"]["error"] === 4) {
            echo
            '
            <script>
                alert("Silahkan Upload Gambar")
            </script>
        ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["uploadfototerbaru"]["size"] > 1000000) {
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
            move_uploaded_file($_FILES['uploadfototerbaru']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }



    public function uploadCVDas()
    {
        $targetDir = 'images/humas/bkk/das/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['uploadcvterbaru']['name'];
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
        if ($_FILES["uploadcvterbaru"]["error"] === 4) {
            echo
            '
            <script>
                alert("Silahkan Upload Gambar")
            </script>
        ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["uploadcvterbaru"]["size"] > 1000000) {
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
            move_uploaded_file($_FILES['uploadcvterbaru']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }



    public function tambahDataBKKdas($data)
    {


        $query = "INSERT INTO alumnisukses 
            VALUES 
            (null, :uuid, :namalengkap, :jurusan,  :jk, :notelpwa, :namaperusahaansaatini, :jabatansaatini, :uploadfototerbaru, :uploadcvterbaru, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)";


        $this->db->bind('uuid', Uuid::uuid4()->toString());

        $this->db->query($query);
        $foto = $this->uploadFotoDas();
        if (!$foto) {
            return false;
        }
        $cv = $this->uploadCVDas();
        if (!$cv) {
            return false;
        }
        $this->db->bind('namalengkap', $data['namalengkap']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('jk', $data['jk']);
        $this->db->bind('notelpwa', $data['notelpwa']);
        $this->db->bind('namaperusahaansaatini', $data['namaperusahaansaatini']);
        $this->db->bind('jabatansaatini', $data['jabatansaatini']);
        $this->db->bind('uploadfototerbaru', $foto);
        $this->db->bind('uploadcvterbaru', $cv);
        $this->db->bind('created_by', "Super Admin");

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function uploadPamfletLomba()
    {
        $targetDir = 'images/humas/bkk/lomba/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['pamfletlomba']['name'];
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
        if ($_FILES["pamfletlomba"]["error"] === 4) {
            echo
            '
            <script>
                alert("Silahkan Upload Gambar")
            </script>
        ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["pamfletlomba"]["size"] > 1000000) {
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
            move_uploaded_file($_FILES['pamfletlomba']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }

    public function tambahDataBKKlomba($data)
    {
        $query = "INSERT INTO {$this->tablelomba} 
            VALUES 
            (null, :uuid, :penyelenggara, :peserta, :tanggaldaftar, :tanggallomba, :tempatlomba, :pamfletlomba, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());

        $pamflet = $this->uploadPamfletLomba();
        if (!$pamflet) {
            return false;
        }
        $this->db->bind('penyelenggara', $data['penyelenggara']);
        $this->db->bind('peserta', $data['peserta']);
        $this->db->bind('tanggaldaftar', $data['tanggaldaftar']);
        $this->db->bind('tanggallomba', $data['tanggallomba']);
        $this->db->bind('tempatlomba', $data['tempatlomba']);
        $this->db->bind('pamfletlomba', $pamflet);
        $this->db->bind('created_by', "Super Admin");

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahDataBKKpeminatan($data)
    {
        $query = "INSERT INTO {$this->tablepeminatan} 
            VALUES 
            (null, :uuid, :nama, :jeniskelamin, :kelas, :domisili, :alamat, :nohp, :rencanasetelahlulus, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jeniskelamin', $data['jeniskelamin']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('domisili', $data['domisili']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('nohp', $data['nohp']);
        $this->db->bind('rencanasetelahlulus', $data['rencanasetelahlulus']);
        $this->db->bind('created_by', "Super Admin");

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function uploadLoker()
    {
        $targetDir = 'images/humas/bkk/loker/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['upfotoloker']['name'];
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
        if ($_FILES["upfotoloker"]["error"] === 4) {
            echo
            '
            <script>
                alert("Silahkan Upload Gambar")
            </script>
        ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["upfotoloker"]["size"] > 1000000) {
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
            move_uploaded_file($_FILES['upfotoloker']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }

    public function tambahDataBKKloker($data)
    {
        $query = "INSERT INTO {$this->tableloker}  
            VALUES 
            (null, :uuid, :namaperusahaan, :untukjurusan, :profesiygdibutuhkan, :kriteriaprofesi, :kontakperusahaan, :upfotoloker, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());

        $fotoloker = $this->uploadLoker();
        if (!$fotoloker) {
            return false;
        }
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('untukjurusan', $data['untukjurusan']);
        $this->db->bind('profesiygdibutuhkan', $data['profesiygdibutuhkan']);
        $this->db->bind('kriteriaprofesi', $data['kriteriaprofesi']);
        $this->db->bind('kontakperusahaan', $data['kontakperusahaan']);
        $this->db->bind('upfotoloker', $fotoloker);
        $this->db->bind('created_by', "Super Admin");


        $this->db->execute();
        return $this->db->rowCount();
    }

    public function uploadDiriSpw()
    {
        $targetDir = 'images/humas/bkk/spw/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['fotodiri']['name'];
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
        if ($_FILES["fotodiri"]["error"] === 4) {
            echo
            '
            <script>
                alert("Silahkan Upload Gambar")
            </script>
        ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["fotodiri"]["size"] > 1000000) {
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
            move_uploaded_file($_FILES['fotodiri']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }
    public function uploadUsahaSpw()
    {
        $targetDir = 'images/humas/bkk/spw/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['fotousaha']['name'];
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
        if ($_FILES["fotousaha"]["error"] === 4) {
            echo
            '
            <script>
                alert("Silahkan Upload Gambar")
            </script>
        ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["fotousaha"]["size"] > 1000000) {
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
            move_uploaded_file($_FILES['fotousaha']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }

    public function tambahDataBKKspw($data)
    {
        $query = "INSERT INTO {$this->tablespw} 
            VALUES 
            (null, :uuid, :nisn, :namalengkap, :jk, :kelas, :notelp, :namausaha, :alamat, :kepemilikanusaha, :sejaktgl, :omzet, :fotodiri, :fotousaha, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());

        $diri = $this->uploadDiriSpw();
        if (!$diri) {
            return false;
        }
        $usaha = $this->uploadUsahaSpw();
        if (!$usaha) {
            return false;
        }
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('namalengkap', $data['namalengkap']);
        $this->db->bind('jk', $data['jk']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('notelp', $data['notelp']);
        $this->db->bind('namausaha', $data['namausaha']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('kepemilikanusaha', $data['kepemilikanusaha']);
        $this->db->bind('sejaktgl', $data['sejaktgl']);
        $this->db->bind('omzet', $data['omzet']);
        $this->db->bind('fotodiri', $diri);
        $this->db->bind('fotousaha', $usaha);
        $this->db->bind('created_by', "Super Admin");


        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahDataBKKworkshop($data)
    {
        $query = "INSERT INTO {$this->tableworkshop}  
            VALUES 
            (null, :uuid, :penyelenggara, :kegiatan, :tujuan, :peserta, :tanggalpersiapan, :tanggaldilakukan, :tempat, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT)";

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());

        $this->db->bind('penyelenggara', $data['penyelenggara']);
        $this->db->bind('kegiatan', $data['kegiatan']);
        $this->db->bind('tujuan', $data['tujuan']);
        $this->db->bind('peserta', $data['peserta']);
        $this->db->bind('tanggalpersiapan', $data['tanggalpersiapan']);
        $this->db->bind('tanggaldilakukan', $data['tanggaldilakukan']);
        $this->db->bind('tempat', $data['tempat']);
        $this->db->bind('created_by', "Super Admin");

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahDataBKKmou($data)
    {
        $query =  "INSERT INTO {$this->tablemou} VALUES (
                     null,  
                    :dudika, 
                    :bidangkerjadudika, 
                    :tglmou,
                    :no_mou, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '',0 ,0, DEFAULT
             )";

        $this->db->query($query);
        $this->db->bind('dudika', $data['dudika']);
        $this->db->bind('bidangkerjadudika', $data['bidangkerjadudika']);
        $this->db->bind('tglmou', $data['tglmou']);
        $this->db->bind('no_mou', $data['no_mou']);
        $this->db->bind('created_by', "Super Admin");


        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataBKKdas($id)
    {
        $this->db->query(
            "UPDATE {$this->tabledas}
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

    public function hapusDataBKKpeminatan($id)
    {
        $this->db->query(
            "UPDATE {$this->tablepeminatan}
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

    public function hapusDataBKKmou($id)
    {
        $this->db->query(
            "UPDATE {$this->tablemou}
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

    public function hapusDataBKKspw($id)
    {
        $this->db->query(
            "UPDATE {$this->tablemou}
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

    public function hapusDataBKKworkshop($id)
    {
        $this->db->query(
            "UPDATE {$this->tableworkshop}
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


    public function hapusDataBKKloker($id)
    {
        $this->db->query(
            "UPDATE {$this->tableloker}
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

    public function hapusDataBKKlomba($id)
    {
        $this->db->query(
            "UPDATE {$this->tablelomba}
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



    //-----------------------------------UBAH DATA-----------------------------------------



    public function ubahDataBKKdas($data)
    {
        $query = "UPDATE alumnisukses SET 
                    namalengkap = :namalengkap, 
                    jurusan = :jurusan, 
                    jk = :jk, 
                    notelpwa = :notelpwa, 
                    namaperusahaansaatini = :namaperusahaansaatini, 
                    jabatansaatini = :jabatansaatini, 
                    uploadfototerbaru = :uploadfototerbaru, 
                    uploadcvterbaru = :uploadcvterbaru, 
                      modified_at = CURRENT_TIMESTAMP, 
                      modified_by = :modified_by  
                  WHERE id = :id";

        $this->db->query($query);
        if ($_FILES["uploadfototerbaru"]["error"] === 4) {
            $foto = $data['fotoLama'];
        } else {
            $foto = $this->uploadFotoDas();
        }

        if ($_FILES["uploadcvterbaru"]["error"] === 4) {
            $cv = $data['cvLama'];
        } else {
            $cv = $this->uploadCVDas();
        }
        $this->db->bind('namalengkap', $data['namalengkap']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('jk', $data['jk']);
        $this->db->bind('notelpwa', $data['notelpwa']);
        $this->db->bind('namaperusahaansaatini', $data['namaperusahaansaatini']);
        $this->db->bind('jabatansaatini', $data['jabatansaatini']);
        $this->db->bind('uploadfototerbaru', $foto);
        $this->db->bind('uploadcvterbaru', $cv);
        $this->db->bind('modified_by', "Super Admin");

        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataBKKpeminatan($data)
    {
        $query = 'UPDATE ' . $this->tablepeminatan . ' SET 
                    nama = :nama, 
                    jeniskelamin = :jeniskelamin, 
                    kelas = :kelas, 
                    domisili = :domisili, 
                    alamat = :alamat, 
                    nohp = :nohp, 
                    rencanasetelahlulus = :rencanasetelahlulus, 
                    modified_at = CURRENT_TIMESTAMP, 
                    modified_by = :modified_by 
                  WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jeniskelamin', $data['jeniskelamin']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('domisili', $data['domisili']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('nohp', $data['nohp']);
        $this->db->bind('rencanasetelahlulus', $data['rencanasetelahlulus']);
        $this->db->bind('modified_by', "Super Admin");

        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataBKKmou($data)
    {
        $query = 'UPDATE ' . $this->tablemou . ' SET 
                    dudika = :dudika, 
                    bidangkerjadudika = :bidangkerjadudika, 
                    tglmou = :tglmou,
                    no_mou = :no_mou, 
                    modified_at = CURRENT_TIMESTAMP, 
                    modified_by = :modified_by  
                  WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('dudika', $data['dudika']);
        $this->db->bind('bidangkerjadudika', $data['bidangkerjadudika']);
        $this->db->bind('tglmou', $data['tglmou']);
        $this->db->bind('no_mou', $data['no_mou']);
        $this->db->bind('modified_by', "Super Admin");

        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataBKKworkshop($data)
    {
        $query = 'UPDATE ' . $this->tableworkshop . ' SET 
                    penyelenggara = :penyelenggara, 
                    tujuan = :tujuan, 
                    peserta = :peserta,
                    tanggalpersiapan = :tanggalpersiapan, 
                    tanggaldilakukan = :tanggaldilakukan, 
                    tempat = :tempat, 
                    modified_at = CURRENT_TIMESTAMP, 
                    modified_by = :modified_by  
                  WHERE id = :id';

        $this->db->query($query);
        $this->db->bind('penyelenggara', $data['penyelenggara']);
        $this->db->bind('tujuan', $data['tujuan']);
        $this->db->bind('peserta', $data['peserta']);
        $this->db->bind('tanggalpersiapan', $data['tanggalpersiapan']);
        $this->db->bind('tanggaldilakukan', $data['tanggaldilakukan']);
        $this->db->bind('tempat', $data['tempat']);
        $this->db->bind('modified_by', "Super Admin");

        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataBKKspw($data)
    {
        $query = 'UPDATE ' . $this->tablespw . ' SET 
                    nisn = :nisn, 
                    namalengkap = :namalengkap,
                    jk = :jk, 
                    kelas = :kelas, 
                    notelp = :notelp, 
                    namausaha = :namausaha, 
                    alamat = :alamat, 
                    kepemilikanusaha = :kepemilikanusaha, 
                    sejaktgl = :sejaktgl, 
                    omzet = :omzet,
                    fotodiri =  :fotodiri, 
                    fotousaha = :fotousaha, 
                    modified_at = CURRENT_TIMESTAMP, 
                    modified_by = :modified_by  
                  WHERE id = :id';

        $this->db->query($query);
        if ($_FILES["fotodiri"]["error"] === 4) {
            $diri = $data['fdiriLama'];
        } else {
            $diri = $this->uploadDiriSpw();
        }

        if ($_FILES["fotousaha"]["error"] === 4) {
            $usaha = $data['fprodukLama'];
        } else {
            $usaha = $this->uploadUsahaSpw();
        }
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('namalengkap', $data['namalengkap']);
        $this->db->bind('jk', $data['jk']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('notelp', $data['notelp']);
        $this->db->bind('namausaha', $data['namausaha']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('kepemilikanusaha', $data['kepemilikanusaha']);
        $this->db->bind('sejaktgl', $data['sejaktgl']);
        $this->db->bind('omzet', $data['omzet']);
        $this->db->bind('fotodiri', $diri);
        $this->db->bind('fotousaha', $usaha);
        $this->db->bind('modified_by', "Super Admin");

        $this->db->bind('id', $data['id']);


        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataBKKloker($data)
    {
        $query = 'UPDATE ' . $this->tableloker . ' SET 
                    namaperusahaan = :namaperusahaan, 
                    untukjurusan = :untukjurusan, 
                    profesiygdibutuhkan = :profesiygdibutuhkan,
                    kriteriaprofesi = :kriteriaprofesi, 
                    kontakperusahaan = :kontakperusahaan, 
                    upfotoloker = :upfotoloker, 
                    modified_at = CURRENT_TIMESTAMP, 
                    modified_by = :modified_by  
                  WHERE id = :id';

        $this->db->query($query);
        if ($_FILES["upfotoloker"]["error"] === 4) {
            $loker = $data['fotoLama'];
        } else {
            $loker = $this->uploadLoker();
        }
        $this->db->bind('namaperusahaan', $data['namaperusahaan']);
        $this->db->bind('untukjurusan', $data['untukjurusan']);
        $this->db->bind('profesiygdibutuhkan', $data['profesiygdibutuhkan']);
        $this->db->bind('kriteriaprofesi', $data['kriteriaprofesi']);
        $this->db->bind('kontakperusahaan', $data['kontakperusahaan']);
        $this->db->bind('upfotoloker', $loker);
        $this->db->bind('modified_by', "Super Admin");

        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataBKKlomba($data)
    {
        $query = 'UPDATE ' . $this->tablelomba . ' SET 
                    penyelenggara = :penyelenggara, 
                    peserta = :peserta, 
                    tanggaldaftar = :tanggaldaftar,
                    tanggallomba = :tanggallomba, 
                    tempatlomba = :tempatlomba, 
                    pamfletlomba = :pamfletlomba, 
                    modified_at = CURRENT_TIMESTAMP, 
                    modified_by = :modified_by  
                  WHERE id = :id';

        $this->db->query($query);
        if ($_FILES["pamfletlomba"]["error"] === 4) {
            $pamfletlomba = $data['pamfletLama'];
        } else {
            $pamfletlomba = $this->uploadPamfletLomba();
        }
        $this->db->bind('penyelenggara', $data['penyelenggara']);
        $this->db->bind('peserta', $data['peserta']);
        $this->db->bind('tanggaldaftar', $data['tanggaldaftar']);
        $this->db->bind('tanggallomba', $data['tanggallomba']);
        $this->db->bind('tempatlomba', $data['tempatlomba']);
        $this->db->bind('pamfletlomba', $pamfletlomba);
        $this->db->bind('modified_by', "Super Admin");
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    //----------------------------------IMPORT-DATA---------------------------------
    public function importDatadas()
    {
        $fields = [
            'namalengkap',
            'jurusan',
            'jk',
            'notelpwa',
            'namaperusahaansaatini',
            'jabatansaatini'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/bkk/das');
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
            $response = $this->tambahDataBKKdas($data);
        }
        return $response;
    }

    public function importDatalomba()
    {
        $fields = [
            'penyelenggara',
            'peserta',
            'tanggaldaftar',
            'tanggallomba',
            'tempatlomba'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/bkk/lomba');
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
            $response = $this->tambahDataBKKlomba($data);
        }
        return $response;
    }

    public function importDatapeminatan()
    {
        $fields = [
            'nama',
            'jeniskelamin',
            'kelas',
            'domisili',
            'alamat',
            'nohp',
            'rencanasetelahlulus'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/bkk/peminatan');
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
            $response = $this->tambahDataBKKpeminatan($data);
        }
        return $response;
    }

    public function importDataloker()
    {
        $fields = [
            'namaperusahaan',
            'untukjurusan',
            'profesiygdibutuhkan',
            'kriteriaprofesi',
            'kontakperusahaan'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/bkk/loker');
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
            $response = $this->tambahDataBKKloker($data);
        }
        return $response;
    }

    public function importDataspw()
    {
        $fields = [
            'nisn',
            'namalengkap',
            'jk',
            'kelas',
            'notelp',
            'jabatansaatini',
            'namausaha',
            'alamat',
            'kepemilikanusaha',
            'sejaktgl',
            'omzet'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/bkk/spw');
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
            $response = $this->tambahDataBKKspw($data);
        }
        return $response;
    }

    public function importDataworkshop()
    {
        $fields = [
            'penyelenggara',
            'kegiatan',
            'tujuan',
            'peserta',
            'tanggalpersiapan',
            'tanggaldilakukan',
            'tempat'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/bkk/workshop');
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
            $response = $this->tambahDataBKKworkshop($data);
        }
        return $response;
    }

    public function importDatamou()
    {
        $fields = [
            'dudika',
            'bidangkerjadudika',
            'tglmou',
            'no_mou'
        ];

        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/bkk/mou');
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
            $response = $this->tambahDataBKKmou($data);
        }
        return $response;
    }
}