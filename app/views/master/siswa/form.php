<form action="<?= BASEURL ?>/siswa/tambahData" method="post">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="uuid" id="uuid">
    <div class="mb-3">
        <label for="nisn" class="form-label">NISN</label>
        <input type="text" class="form-control" name="nisn" id="nisn" required>
    </div>
    <div class="mb-3">
        <label for="nama_siswa" class="form-label">Nama Siswa</label>
        <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" required>
    </div>
    <div class="mb-3">
        <label for="jalur" class="form-label">Jalur</label>
        <select class="form-select" name="jalur" id="jalur" required>
            <option selected disabled>Open this select menu</option>
            <option value="Prestasi Akademik">Prestasi Akademik</option>
            <option value="Prestasi Non-Akademik">Prestasi Non-Akademik</option>
            <option value="Afirmasi">Afirmasi</option>
            <option value="Perpindahan Orang Tua">Perpindahan Orang Tua</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <select class="form-select" name="jurusan" id="jurusan" required>
            <option selected disabled>Open this select menu</option>
            <?php foreach ($data['kompkeahlian'] as $row) : ?>
                <option value="<?= $row['kode_kompkeahlian'] ?>"><?= $row['kode_kompkeahlian'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" name="alamat" id="alamat" required>
    </div>
    <div class="mb-3">
        <label for="nomor_hp_siswa" class="form-label">No. HP Siswa</label>
        <input type="text" class="form-control" name="nomor_hp_siswa" id="nomor_hp_siswa" required>
    </div>
    <div class="mb-3">
        <label for="ayah" class="form-label">Ayah</label>
        <input type="text" class="form-control" name="ayah" id="ayah" required>
    </div>
    <div class="mb-3">
        <label for="ibu" class="form-label">Ibu</label>
        <input type="text" class="form-control" name="ibu" id="ibu" required>
    </div>
    <div class="mb-3">
        <label for="nomor_hp_orangtua" class="form-label">No. HP Orangtua</label>
        <input type="text" class="form-control" name="nomor_hp_orangtua" id="nomor_hp_orangtua" required>
    </div>
    <div class="mb-3">
        <label for="wali" class="form-label">Wali</label>
        <input type="text" class="form-control" name="wali" id="wali" required>
    </div>
    <div class="mb-3">
        <label for="nomor_hp_wali" class="form-label">No. HP Wali</label>
        <input type="text" class="form-control" name="nomor_hp_wali" id="nomor_hp_wali" required>
    </div>
    <div class="mb-3">
        <label for="tahun_diterima" class="form-label">Tahun Diterima</label>
        <input type="text" class="form-control" name="tahun_diterima" id="tahun_diterima" required>
    </div>
    <div class="mb-3">
        <label for="agama" class="form-label">Agama</label>
        <select class="form-select" name="agama" id="agama" required>
            <option selected disabled>Open this select menu</option>
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Katolik">Katolik</option>
            <option value="Hindu">Hindu</option>
            <option value="Buddha">Buddha</option>
            <option value="Konghucu">Konghucu</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
            <option selected disabled>Open this select menu</option>
            <option value="L">L</option>
            <option value="P">P</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
    </div>
    <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <input type="text" class="form-control" name="kelas" id="kelas" required>
    </div>
    <div class="mb-3">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
    </div>
    <div class="mb-3">
        <label for="usia_sekarang" class="form-label">Usia Sekarang</label>
        <input type="text" class="form-control" name="usia_sekarang" id="usia_sekarang" required>
    </div>