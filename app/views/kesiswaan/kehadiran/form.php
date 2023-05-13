<form action="<?= BASEURL; ?>/kehadiran/tambahData" method="post">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="imei" id="imei">

    <div class="form-group">
        <label for="nisn">NISN</label>
        <input type="number" class="form-control" id="nisn" name="nisn">
    </div>

    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama">
    </div>

    <div class="form-group">
        <label for="lokasi">Lokasi</label>
        <input type="text" class="form-control" id="lokasi" name="lokasi">
    </div>

    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <select class="form-control" id="keterangan" name="keterangan">
            <option value="Hadir">Hadir</option>
            <option value="Sakit">Sakit</option>
            <option value="Izin">Izin</option>
            <option value="Alpha">Alpha</option>
        </select>
    </div>