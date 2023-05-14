<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">SEKOLAH PENCETAK WIRAUSAHA</h3>
                    <h6 class="font-weight-normal mb-0">WEB DEV | SIMAS</h6>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Hari ini (11 Mar 2023)
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                <a class="dropdown-item" href="#">January - March</a>
                                <a class="dropdown-item" href="#">March - June</a>
                                <a class="dropdown-item" href="#">June - August</a>
                                <a class="dropdown-item" href="#">August - November</a>
                            </div>
                        </div>
                    </div>
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
        <form action="<?= BASEURL; ?>/bkk/tambahspw/" method="post" class="forms-sample"
                                enctype="multipart/form-data">

                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="fdiriLama" id="fdiriLama">
                                <input type="hidden" name="fprodukLama" id="fprodukLama">

                                <div class="form-group">
                                    <label for="nisn">NISN</label>
                                    <input type="number" class="form-control" id="nisn" name="nisn" placeholder="NISN">
                                </div>
                                <div class="form-group">
                                    <label for="namalengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="namalengkap" name="namalengkap"
                                        placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select class="form-control" id="jk" name="jk">
                                        <option selected>--Pilih Jenis Kelamin--</option>
                                        <option value="Laki-laki">Laki - laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas">
                                </div>
                                <div class="form-group">
                                    <label for="notelp">No. Telp.</label>
                                    <input type="text" class="form-control" id="notelp" name="notelp"
                                        placeholder="No Telp">
                                </div>
                                <div class="form-group">
                                    <label for="namausaha">Nama Usaha</label>
                                    <input type="text" class="form-control" id="namausaha" name="namausaha"
                                        placeholder="Nama Usaha">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label for="kepemilikanusaha">Kepemilikan Usaha</label>
                                    <input type="text" class="form-control" id="kepemilikanusaha"
                                        name="kepemilikanusaha" placeholder="Kepemilikan Usaha">
                                </div>
                                <div class="form-group">
                                    <label for="sejaktgl">Sejak Tanggal</label>
                                    <input type="date" class="form-control" id="sejaktgl" name="sejaktgl">
                                </div>
                                <div class="form-group">
                                    <label for="omzet">Omzet Per-Bulan</label>
                                    <input type="text" class="form-control" id="omzet" name="omzet"
                                        placeholder="Omzet Per-Bulan">
                                </div>
                                <div class="form-group">
                                    <label for="fotodiri">Foto Diri Sendiri</label>
                                    <input type="file" class="file-upload-default" id="fotodiri" name="fotodiri">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                            placeholder="Unggah Foto Diri Sendiri">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Unggah</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fotousaha">Foto Produk Usaha</label>
                                    <input type="file" class="file-upload-default" id="fotousaha" name="fotousaha">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                            placeholder="Unggah Foto Produk Usaha">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Unggah</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary btn-fw"
                                        data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </form>
    </div>

</div>
</div>