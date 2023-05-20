<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">PEMINJAMAN BARANG</h3>
                    <h6 class="font-weight-normal mb-0">WEB DEV | SIMAS</h6>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <?php Flasher ::flash(); ?>
            </div>
          </div>

        <div class="row">
            <form action="<?= BASEURL; ?>/peminjamanBarang/tambah" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <!-- <input type="hidden" name="fotoLama" id="fotoLama">
                <input type="hidden" name="raportLama" id="raportLama">
                <input type="hidden" name="buktiLama" id="buktiLama"> -->
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                        placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas"
                        placeholder="Kelas">
                </div>
                <div class="form-group">
                    <label for="namabarang">Nama Barang</label>
                    <input type="text" class="form-control" id="namabarang"
                        name="namabarang">
                </div>
                <div class="form-group">
                    <label for="jangkawaktu">Jangka Waktu</label>
                    <input type="number" class="form-control" id="jangkawaktu"
                        name="jangkawaktu">
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Peminjaman</label>
                    <input type="date" class="form-control" id="tanggal"
                        name="tanggal">
                </div>
                <div class="form-group">
                    <label for="tglpengembalian">Tanggal Pengembalian</label>
                    <input type="date" class="form-control" id="tglpengembalian"
                        name="tglpengembalian">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan"
                        name="keterangan">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>

    </div>
</div>
