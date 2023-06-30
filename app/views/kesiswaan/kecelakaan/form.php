<form action="<?= BASEURL; ?>/kecelakaan/tambah" method="post">
    <input type="hidden" name="id" id="id">

    <div class="form-group">
        <label for="NIS">NIS</label>
        <input type="number" class="form-control" id="NIS" name="NIS">
    </div>

    <div class="form-group">
        <label for="tanggalKecelakaan">Tanggal</label>
        <input type="date" class="form-control" id="tanggalKecelakaan" name="tanggalKecelakaan">
    </div>

    <div class="form-group">
        <label for="jenisKlaimAsuransi">Jenis Klaim Asuransi</label>
        <select class="form-control" id="jenisKlaimAsuransi" name="jenisKlaimAsuransi">
            <option value="Asuransi Kecelakaan">Asuransi Kecelakaan</option>
        </select>
    </div>