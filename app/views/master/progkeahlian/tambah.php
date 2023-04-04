<form action="<?= BASEURL ?>progkeahlian/tambahData" method="post">
    <div class="tambah">
        <input type="hidden" name="id_programkeahlian" id="id_programkeahlian">
        <div class="mb-3">
            <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
            <input type="text" class="form-control" name="nama_jurusan" id="nama_jurusan" required>
        </div>
        <div class="mb-3">
            <label for="program_keahlian" class="form-label">Program Keahlian</label>
            <input type="text" class="form-control" name="program_keahlian" id="program_keahlian" required>
        </div>
    </div>