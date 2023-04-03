<form action="<?= BASEURL ?>guru/tambahData" method="post">
    <input type="hidden" name="id_guru" id="id_guru">
    <div class="mb-3">
        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required>
    </div>
    <div class="mb-3">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
            <option selected>Open this select menu</option>
            <option value="P">P</option>
            <option value="L">L</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
    </div>
    <div class="mb-3">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
    </div>
    <div class="mb-3">
        <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
        <input type="text" class="form-control" name="alamat_lengkap" id="alamat_lengkap" required>
    </div>
    <div class="mb-3">
        <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
        <input type="text" class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" required>
    </div>
    <div class="mb-3">
        <label for="jurusan_pendidikan_terakhir" class="form-label">Jurusan Pendidikan Terakhir</label>
        <input type="text" class="form-control" name="jurusan_pendidikan_terakhir" id="jurusan_pendidikan_terakhir" required>
    </div>
    <div class="mb-3">
        <label for="nomor_hp" class="form-label">Nomor HP</label>
        <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" required>
    </div>
    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select class="form-select" name="kategori" id="kategori" required>
            <option selected>Open this select menu</option>
            <option value="ASN">ASN</option>
            <option value="GTT">GTT</option>
            <option value="PPPK">PPPK</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="mapel_yg_diampu" class="form-label">Mapel Yang Diampu</label>
        <select class="form-select" name="mapel_yg_diampu" id="mapel_yg_diampu" required>
            <option selected>Open this select menu</option>
            <option value="Matematika">Matematika</option>
            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
            <option value="Bahasa Inggris">Bahasa Inggris</option>
            <option value="Bahasa Daerah">Bahasa Daerah</option>
            <option value="IPAS">IPAS</option>
            <option value="PJOK">PJOK</option>
            <option value="Sejarah">Sejarah</option>
            <option value="PP">PP</option>
            <option value="Inka">Inka</option>
            <option value="Seni Budaya">Seni Budaya</option>
            <option value="BK">BK</option>
            <option value="PAI">PAI</option>
            <option value="TG">TG</option>
            <option value="RPL">RPL</option>
            <option value="Perhotelan">Perhotelan</option>
            <option value="Multimedia">Multimedia</option>
            <option value="Animasi">Animasi</option>
            <option value="TL">TL</option>
            <option value="TM">TM</option>
            <option value="TKJ">TKJ</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="kategori_mapel" class="form-label">Kategori Mapel</label>
        <select class="form-select" name="kategori_mapel" id="kategori_mapel">
            <option selected>Open this select menu</option>
            <option value="Umum">Umum</option>
            <option value="BK">BK</option>
            <option value="Kejuruan">Kejuruan</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="nip" class="form-label">NIP</label>
        <input type="text" class="form-control" name="nip" id="nip" required>
    </div>
    <div class="mb-3">
        <label for="status_sertifikasi" class="form-label">Status Sertifikasi</label>
        <select class="form-select" name="status_sertifikasi" id="status_sertifikasi" required>
            <option selected>Open this select menu</option>
            <option value="Sudah">Sudah</option>
            <option value="Belum">Belum</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="keahlian_ganda" class="form-label">Keahlian Ganda</label>
        <input type="text" class="form-control" name="keahlian_ganda" id="keahlian_ganda" required>
    </div>
    <div class="mb-3">
        <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
        <select class="form-select" name="status_pernikahan" id="status_pernikahan" required>
            <option selected>Open this select menu</option>
            <option value="Menikah">Menikah</option>
            <option value="Belum">Belum</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="upload" class="form-control" name="foto" id="foto" required>
    </div>