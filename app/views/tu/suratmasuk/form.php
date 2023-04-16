<form action="<?= BASEURL ?>/suratmasuk/tambahData" method="post">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="nomor_berkas" id="nomor_berkas">
    <div class="mb-3">
        <label for="alamat_pengirim" class="form-label">Alamat Pengirim</label>
        <input type="text" class="form-control" name="alamat_pengirim" id="alamat_pengirim" required>
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="text" class="form-control" name="tanggal" id="tanggal" required>
    </div>
    <div class="mb-3">
        <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
        <input type="text" class="form-control" name="tanggal_surat" id="tanggal_surat" required>
    </div>
    <div class="mb-3">
        <label for="nomor_surat" class="form-label">Nomor Surat</label>
        <input type="text" class="form-control" name="nomor_surat" id="nomor_surat" required>
    </div>
    <div class="mb-3">
        <label for="perihal" class="form-label">Perihal</label>
        <input type="text" class="form-control" name="perihal" id="perihal" required>
    </div>
    <div class="mb-3">
        <label for="nomor_petunjuk" class="form-label">Nomor Petunjuk</label>
        <input type="text" class="form-control" value="-" name="nomor_petunjuk" id="nomor_petunjuk" required>
    </div>