<form action="<?= BASEURL ?>/kelas/tambahData" method="post">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="uuid" id="uuid">
    <div class="mb-3">
        <label for="tingkat" class="form-label">Tingkat</label>
        <input type="text" class="form-control" name="tingkat" id="tingkat" required>
    </div>
    <div class="mb-3">
        <label for="kode_kelas" class="form-label">Kode kelas</label>
        <input type="text" class="form-control" name="kode_kelas" id="kode_kelas" required>
    </div>