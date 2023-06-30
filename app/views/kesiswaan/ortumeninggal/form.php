<form action="<?= BASEURL; ?>/ortumeninggal/tambah" method="post">
    <input type="hidden" name="id" id="id">

    <div class="form-group">
        <label for="NIS">NIS</label>
        <input type="number" class="form-control" id="NIS" name="NIS">
    </div>

    <div class="form-group">
        <label for="namaOrtu">Nama Orangtua</label>
        <input type="text" class="form-control" id="namaOrtu" name="namaOrtu">
    </div>

    <div class="form-group">
        <label for="tanggalMeninggal">Tanggal</label>
        <input type="date" class="form-control" id="tanggalMeninggal" name="tanggalMeninggal">
    </div>

    <div class="form-group">
        <label for="jenisKlaimAsuransi">Jenis Klaim Asuransi</label>
        <select class="form-control" id="jenisKlaimAsuransi" name="jenisKlaimAsuransi">
            <option value="Asuransi Orangtua Meninggal">Asuransi Orangtua Meninggal</option>
        </select>
    </div>