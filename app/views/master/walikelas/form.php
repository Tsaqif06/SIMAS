<form action="<?= BASEURL ?>walikelas/tambahData" method="post">
    <input type="hidden" name="id_walikelas" id="id_walikelas">
    <div class="mb-3">
        <label for="nama_walikelas" class="form-label">Nama Wali Kelas</label>
        <input type="text" class="form-control" name="nama_walikelas" id="nama_walikelas" required>
    </div>
    <div class="mb-3">
        <label for="nama_kelas" class="form-label">Nama Kelas</label>
        <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" required>
    </div>