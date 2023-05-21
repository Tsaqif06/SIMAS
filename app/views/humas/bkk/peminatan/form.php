<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">PEMINATAN</h3>
                    <h6 class="font-weight-normal mb-0">WEB DEV | SIMAS</h6>
                </div>
                
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-lg-6">
                <?php Flasher::flash(); ?>
            </div>
        </div>

    <div class="row">
    <form action="<?= BASEURL; ?>/bkk/tambahpeminatan" method="post" class="forms-sample">
                                <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="jeniskelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                        <option selected>--Pilih Jenis Kelamin</option>
                                        <option velue="Laki-laki">Laki - Laki</option>
                                        <option velue="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas">
                                </div>
                                <div class="form-group">
                                    <label for="domisili">Domisili</label>
                                    <input type="text" class="form-control" id="domisili" name="domisili" placeholder="Domisili">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label for="nohp">No. Telp</label>
                                    <input type="number" class="form-control" id="nohp" name="nohp" placeholder="No. Telp">
                                </div>
                                <div class="form-group">
                                    <label for="rencanasetelahlulus">Rencana setelah lulus</label>
                                    <select class="form-control" id="rencanasetelahlulus" name="rencanasetelahlulus">
                                        <option selected>--Pilih Rencana Anda--</option>
                                        <option value="Bekerja">Bekerja</option>
                                        <option value="Kuliah">Kuliah</option>
                                        <option velue="Berwirausaha">Berwirausaha</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </form>
    </div>

</div>
