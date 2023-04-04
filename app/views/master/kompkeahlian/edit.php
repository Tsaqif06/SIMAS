<form action="<?= BASEURL ?>kompkeahlian/tambahData" method="post">
    <div class="edit">
        <input type="hidden" name="id_kompkeahlian" id="id_kompkeahlian">
        <div class="mb-3">
            <label for="kode_kompkeahlian" class="form-label">Kode Kompetensi Keahlian</label>
            <input type="text" class="form-control" name="kode_kompkeahlian" id="kode_kompkeahlian" required>
        </div>
        <div class="mb-3">
            <label for="nama_kompkeahlian" class="form-label">Nama Kompetensi Keahlian</label>
            <input type="text" class="form-control" name="nama_kompkeahlian" id="nama_kompkeahlian" required>
        </div>
    </div>