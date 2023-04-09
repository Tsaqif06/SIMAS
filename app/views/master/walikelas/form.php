<form action="<?= BASEURL ?>walikelas/tambahData" method="post">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="uuid" id="uuid">
    <div class="mb-3">
        <label for="nama_walikelas" class="form-label">Nama Wali Kelas</label>
        <input type="text" class="form-control" name="nama_walikelas" id="nama_walikelas" required>
    </div>
    <div class="mb-3">
        <label for="nama_kelas" class="form-label">Nama Kelas</label>
        <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" required>
    </div>