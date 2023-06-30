<form action="<?= BASEURL; ?>/izin/tambahData" method="post">
    <input type="hidden" name="id" id="id">

    <div class="form-group">
        <label for="ID_KEHADIRAN">ID Keahdiran</label>
        <input type="number" class="form-control" id="ID_KEHADIRAN" name="ID_KEHADIRAN">
    </div>

    <div class="form-group">
        <label for="KETERANGAN">Keterangan</label>
        <input type="text" class="form-control" id="KETERANGAN" name="KETERANGAN">
    </div>

    <div class="form-group">
        <label for="STATUSS">Status</label>
        <select class="form-control" id="STATUSS" name="STATUSS">
            <option value="I">Ijin</option>
        </select>
    </div>