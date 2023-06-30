<form action="<?= BASEURL; ?>/asuransi/tambah" method="post">
    <input type="hidden" name="id" id="id">

    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>

    <div class="form-group">
        <label for="jenisKlaimAsuransi">Jenis Klaim Asuransi</label>
        <select class="form-control" id="jenisKlaimAsuransi" name="jenisKlaimAsuransi">
            <option value="Asuransi Kecelakaan">Asuransi Kecelakaan</option>
            <option value="Asuransi Orang Tua Meninggal">Asuransi Orang Tua Meninggal</option>
        </select>
    </div>

    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama">
    </div>

    <div class="form-group">
        <label for="NIS">NIS</label>
        <input type="number" class="form-control" id="NIS" name="NIS">
    </div>

    <div class="form-group">
        <label for="programKeahlian">Program Keahlian</label>
        <select class="form-control" id="programKeahlian" name="programKeahlian">
            <option value="RPL, GIM">RPL, GIM</option>
            <option value="DG,PD">DG, PD</option>
        </select>
    </div>

    <div class="form-group">
        <label for="kelas">Kelas</label>
        <input type="number" class="form-control" id="kelas" name="kelas">
    </div>

    <div class="form-group">
        <label for="jurusan">Jurusan</label>
        <select class="form-control" id="jurusan" name="jurusan">
            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
            <option value="Multi Media">Multi Media</option>
            <option value="Teknik Grafika">Teknik Grafika</option>
            <option value="Produksi Grafika">Produksi Grafika</option>
            <option value="Desain Grafika">Desain Grafika</option>
            <option value="Mekatronika">Mekatronika</option>
            <option value="Logistik">Logistik</option>
            <option value="Perhotelan">Perhotelan</option>
            <option value="Animasi">Animasi</option>
        </select>
    </div>

    <div class="form-group">
        <label for="kodeKelas">Kode Kelas</label>
        <input type="number" class="form-control" id="kodeKelas" name="kodeKelas">
    </div>

    <div class="form-group">
        <label for="noHP">Nomor Handphone</label>
        <input type="number" class="form-control" id="noHP" name="noHP">
    </div>