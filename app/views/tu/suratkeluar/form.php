    <form action="<?= BASEURL ?>/suratkeluar/tambahData" method="post">
        <input type="hidden" name="id" id="id">
        <input type="hidden" name="nomor_berkas" id="nomor_berkas">
        <div class="mb-3">
            <label for="alamat_penerima" class="form-label">Alamat Penerima</label>
            <input type="text" class="form-control" name="alamat_penerima" id="alamat_penerima" required>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="text" class="form-control" name="tanggal" id="tanggal" required>
        </div>
        <div class="mb-3">
            <label for="perihal" class="form-label">Perihal</label>
            <input type="text" class="form-control" name="perihal" id="perihal" required>
        </div>
        <div class="mb-3">
            <label for="no_petunjuk" class="form-label">Nomor Petunjuk</label>
            <input type="text" class="form-control" value="-" name="no_petunjuk" id="no_petunjuk" required>
        </div>