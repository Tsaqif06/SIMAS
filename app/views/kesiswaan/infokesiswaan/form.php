<form action="<?= BASEURL; ?>/infokesiswaan/tambahData" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id">

    <div class="form-group">
        <label for="kegiatan_infoKesiswaan">Kegiatan</label>
        <input type="text" class="form-control" id="kegiatan_infoKesiswaan" name="kegiatan_infoKesiswaan">
    </div>

    <div class="form-group">
        <label for="deskripsi_infoKesiswaan">Deskripsi</label>
        <input type="text" class="form-control" id="deskripsi_infoKesiswaan" name="deskripsi_infoKesiswaan">
    </div>

    <div class="form-group">
        <label for="foto">Dokumentasi</label>
        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
    </div>

    <div class="form-group">
        <label for="tanggal_kegiatanOsis">Tanggal Kegiatan Osis</label>
        <input type="date" class="form-control" id="tanggal_kegiatanOsis" name="tanggal_kegiatanOsis">
    </div>