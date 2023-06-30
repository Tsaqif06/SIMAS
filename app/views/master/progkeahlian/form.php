<form action="<?= BASEURL ?>/progkeahlian/tambahData" method="post">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="uuid" id="uuid">
    <div class="mb-3">
        <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
        <select class="form-select" name="nama_jurusan" id="nama_jurusan" required>
            <option selected disabled>Open this select menu</option>
            <?php foreach ($data['kompkeahlian'] as $row) : ?>
                <option value="<?= $row['kode_kompkeahlian'] ?>"><?= $row['kode_kompkeahlian'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="program_keahlian" class="form-label">Program Keahlian</label>
        <input type="text" class="form-control" name="program_keahlian" id="program_keahlian" required>
    </div>