<form action="<?= BASEURL; ?>/pelanggaran/tambahData" method="post">
    <input type="hidden" name="id" id="id">

    <div class="form-group">
        <label for="NIS">NIS</label>
        <input type="number" class="form-control" id="NIS" name="NIS">
    </div>

    <div class="form-group">
        <label for="namaPelanggar">Nama</label>
        <input type="text" class="form-control" id="namaPelanggar" name="namaPelanggar">
    </div>

    <div class="form-group">
        <label for="namaDataPelanggaran">Pelanggaran</label>
        <input type="text" class="form-control" id="namaDataPelanggaran" name="namaDataPelanggaran">
    </div>

    <div class="form-group">
        <label for="poinDataPelanggaran">Poin Pelanggaran</label>
        <input type="text" class="form-control" id="poinDataPelanggaran" name="poinDataPelanggaran">
    </div>