<form action="<?= BASEURL ?>kelas/ubahData" method="post">
    <div class="edit">
        <input type="hidden" name="id_kelas" id="id_kelas">
        <div class="mb-3">
            <label for="tingkat" class="form-label">Tingkat</label>
            <input type="text" class="form-control" name="tingkat" id="tingkat" required>
        </div>
        <div class="mb-3">
            <label for="kode_kelas" class="form-label">Kode kelas</label>
            <input type="text" class="form-control" name="kode_kelas" id="kode_kelas" required>
        </div>
    </div>