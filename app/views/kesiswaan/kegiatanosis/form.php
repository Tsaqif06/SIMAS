<form action="<?= BASEURL; ?>/kegiatanosis/tambahData" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="fotoLama" id="fotoLama">
    <div class="mb-3 wrapFotoSekarang">
        <label for="fotoSekarang" class="form-label">Foto Yang Sekarang</label>
        <br>
        <img src="" alt="Tidak Ada Foto" id="fotoSekarang" style="width: 70px; height: 70px;">
    </div>

    <div class="form-group">
        <label for="kegiatan_kegiatanOsis">Kegiatan</label>
        <input type="text" class="form-control" id="kegiatan_kegiatanOsis" name="kegiatan_kegiatanOsis">
    </div>

    <div class="form-group">
        <label for="deskripsi_kegiatanOsis">Deskripsi</label>
        <input type="text" class="form-control" id="deskripsi_kegiatanOsis" name="deskripsi_kegiatanOsis">
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label foto">Dokumentasi</label>
        <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
        <p class="text-danger">Ukuran Gambar Tidak Boleh Lebih Dari 1MB!</p>
    </div>

    <div class="form-group">
        <label for="tanggal_kegiatanOsis">Tanggal Kegiatan Osis</label>
        <input type="date" class="form-control" id="tanggal_kegiatanOsis" name="tanggal_kegiatanOsis">
    </div>