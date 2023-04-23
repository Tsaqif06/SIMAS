<form action="<?= BASEURL; ?>/poinpelanggaran/tambah" method="post">
    <input type="hidden" name="id" id="id">

    <div class="form-group">
        <label for="namaPelanggaran">Nama Pelanggaran</label>
        <input type="text" class="form-control" id="namaPelanggaran" name="namaPelanggaran">
    </div>

    <div class="form-group">
        <label for="poinPelanggaran">Poin</label>
        <input type="number" class="form-control" id="poinPelanggaran" name="poinPelanggaran">
    </div>