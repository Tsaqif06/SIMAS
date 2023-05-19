<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">LOWONGAN KERJA</h3>
                    <h6 class="font-weight-normal mb-0">WEB DEV | SIMAS</h6>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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
    <form action="<?= BASEURL; ?>/bkk/tambahloker" method="post" class="forms-sample"
                        enctype="multipart/form-data">
                        <input type="hidden" name="fotoLama" id="fotoLama">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="namaperusahaan">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan"
                                placeholder="Nama Perusahaan">
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Untuk Jurusan</label>
                            <select class="form-control" aria-label="Default select example" id="untukjurusan"
                                name="untukjurusan">
                                <option selected>--Pilih Jurusan--</option>
                                <?php foreach ($data['kompkeahlian'] as $row) : ?>
                                <option value="<?= $row['kode_kompkeahlian'] ?>"><?= $row['kode_kompkeahlian'] ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="profesiygdibutuhkan">Profesi yang dibutuhkan</label>
                            <input type="text" class="form-control" id="profesiygdibutuhkan" name="profesiygdibutuhkan"
                                placeholder="Profesi yang dibutuhkan">
                        </div>
                        <div class="form-group">
                            <label for="kriteriaprofesi">Kriteria profesi</label>
                            <input type="text" class="form-control" id="kriteriaprofesi" name="kriteriaprofesi"
                                placeholder="Masukkan kriteria">
                        </div>
                        <div class="form-group">
                            <label for="kontakperusahaan">Kontak Perusahaan</label>
                            <input type="text" class="form-control" id="kontakperusahaan" name="kontakperusahaan"
                                placeholder="Kontak">
                        </div>
                        <div class="form-group">
                            <label>Unggah Loker</label>
                            <input type="file" class="file-upload-default" name="upfotoloker" id="upfotoloker">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Unggah Loker">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
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
