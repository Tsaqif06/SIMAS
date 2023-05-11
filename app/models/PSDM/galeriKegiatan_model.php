<?php

use Ramsey\Uuid\Uuid;

class galeriKegiatan_model
{
    private $table = 'galeri';
    private $user;
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_PSDM);
        $this->user = Cookie::get_jwt()->name;
    }

    public function getAllGaleri()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    public function getKegiatanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function getAllExistData()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE `status` = 1');
        return $this->db->fetchAll();
    }
    function upload()
    {
        global $con;
        $targetDir = 'datafoto/'; // direktori tempat menyimpan file upload
        $namaFile = $_FILES['fotokegiatan']['name'];
        $ukuranFile = $_FILES['fotokegiatan']['size'];
        // $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['fotokegiatan']['tmp_name'];
        // nama file upload
        // var_dump($_FILES); die;

        //cek apakah ada gambar yang diupload
        // if ( error === 4 ) {
        //     echo "<script>
        //             alert('Pilih gambar terlebih dahulu1');
        //           </script>";
        //     return false;
        // }

        //cek apakah file yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                    alert('Yang Anda upload bukan gambar!');
                  </script>";
            return false;
        }

        //cek jika ukuran gambar terlalu basar
        if ($ukuranFile > 10044070) {
            echo "<script>
                    alert('Ukuran gambar terlalu bersar!');
                  </script>";
            return false;
        }

        //lolos pengecekan
        //generate nama file baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        $targetFile = $targetDir . $namaFileBaru;

        move_uploaded_file($tmpName, $targetFile);

        // var_dump($namaFileBaru); die;
        // var_dump($targetFile); die;

        return $namaFileBaru;
    }

    public function tambahDataKegiatan($data)
    {
        $foto = $this->upload();
        if (!$foto) {
            return false;
        };

        $query = "INSERT INTO galeri
                    VALUES
                  (NULL, :uuid, :nama, :fotokegiatan, :deskripsi, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)";

        // var_dump($foto); die;

        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        $this->db->bind('fotokegiatan', $foto);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('created_by', $this->user);


        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataKegiatan($id)
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

    public function ubahDataKegiatan($data)
    {
        $query = "UPDATE galeri SET
                    nama = :nama,
                    fotokegiatan = :fotokegiatan,
                    deskripsi = :deskripsi,
                    modified_at = CURRENT_TIMESTAMP,
                        modified_by = :modified_by
                  WHERE id = :id";


        if ($_FILES["fotokegiatan"]["error"] === 4) {
            $foto = $data['fotoLama'];
        } else {
            $foto = $this->upload();
        }

        // $this->db->bind('foto', $foto);
        // foreach ($this->fields as $field) {
        //     $this->db->bind($field, $data[$field]);
        // }

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('fotokegiatan', $foto);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function cariDataGaleri()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM galeri WHERE deskripsi LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }
}
