<form action="<?= BASEURL ?>kompkeahlian/tambahData" method="post">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="uuid" id="uuid">
    <div class="mb-3">
        <label for="kode_kompkeahlian" class="form-label">Kode Kompetensi Keahlian</label>
        <input type="text" class="form-control" name="kode_kompkeahlian" id="kode_kompkeahlian" required>
    </div>
    <div class="mb-3">
        <label for="nama_kompkeahlian" class="form-label">Nama Kompetensi Keahlian</label>
        <input type="text" class="form-control" name="nama_kompkeahlian" id="nama_kompkeahlian" required>
    </div>