<form action="<?= BASEURL ?>/walikelas/tambahData" method="post">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="uuid" id="uuid">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" required>
    </div>
    <div class="mb-3">
        <label for="nip" class="form-label">NIP</label>
        <input type="text" class="form-control" name="nip" id="nip" required>
    </div>
    <div class="mb-3">
        <label for="gol" class="form-label">Gol</label>
        <input type="text" class="form-control" name="gol" id="gol" required>
    </div>
    <div class="mb-3">
        <label for="pangkat" class="form-label">Pangkat</label>
        <input type="text" class="form-control" name="pangkat" id="pangkat" required>
    </div>
    <div class="mb-3">
        <label for="jabatan" class="form-label">Jabatan</label>
        <input type="text" class="form-control" name="jabatan" id="jabatan" required>
    </div>
    <div class="mb-3">
        <label for="telepon" class="form-label">Telepon</label>
        <input type="text" class="form-control" name="telepon" id="telepon" required>
    </div>