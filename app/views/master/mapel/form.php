<form action="<?= BASEURL ?>/mapel/tambahData" method="post">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="uuid" id="uuid">
    <div class="mb-3">
        <label for="kode_mapel" class="form-label">Kode Mapel</label>
        <input type="text" class="form-control" name="kode_mapel" id="kode_mapel" required>
    </div>
    <div class="mb-3">
        <label for="nama_mapel" class="form-label">Nama Mapel</label>
        <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" required>
    </div>
    <div class="mb-3">
        <label for="kurikulum" class="form-label">Kurikulum</label>
        <input type="text" class="form-control" name="kurikulum" id="kurikulum" required>
    </div>