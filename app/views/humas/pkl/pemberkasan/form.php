<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">PEMBERKASAN</h3>
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
    <form action="<?= BASEURL; ?>/pkl/tambahpemberkasan" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="fotoLama" id="fotoLama">
                <input type="hidden" name="suratLama" id="suratLama">
                <input type="hidden" name="kartuPelajarLama" id="kartuPelajarLama">
                <input type="hidden" name="raportLama" id="raportLama">
                <input type="hidden" name="nilaiLama" id="nilaiLama">
                <input type="hidden" name="administrasiLama" id="administrasiLama">
                <input type="hidden" name="perpusLama" id="perpusLama">
                  <div class="form-group">
                    <label for="nisn_pemberkasan">NISN</label>
                    <input type="number" class="form-control" id="nisn_pemberkasan" name="nisn_pemberkasan" placeholder="NISN">
                  </div>
                  <div class="form-group">
                    <label for="nis_pemberkasan">NIS</label>
                    <input type="number" class="form-control" id="nis_pemberkasan" name="nis_pemberkasan" placeholder="NIS">
                  </div>
                  <div class="form-group">
                    <label for="namasiswa_pemberkasan">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namasiswa_pemberkasan" name="namasiswa_pemberkasan" placeholder="Nama Lengkap">
                  </div>
                  <div class="form-group">
                    <label for="tanggallahir_pemberkasan">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggallahir_pemberkasan" name="tanggallahir_pemberkasan">
                  </div>
                  <div class="form-group">
                  <label for="jurusan_pemberkasan">Jurusan</label>
                  <select class="form-control" aria-label="Default select example" id="jurusan_pemberkasan" name="jurusan_pemberkasan">
                    <option selected>--Pilih Jurusan--</option>
                    <option value="Teknik Grafika">Teknik Grafika</option>
                    <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option value="Animasi">Animasi</option>
                    <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                    <option value="Logistik">Logistik</option>
                    <option value="Mekatronika">Mekatronika</option>
                    <option value="Perhotelan">Perhotelan</option>
                  </select>
                </div>
                  <div class="form-group">
                    <label for="jeniskelamin_pemberkasan">Jenis Kelamin</label>
                      <select class="form-control" id="jeniskelamin_pemberkasan" name="jeniskelamin_pemberkasan">
						            <option selected>--Pilih Jenis Kelamin--</option>
                        <option value="Laki-laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="domisili_pemberkasann">Domisili</label>
                    <input type="text" class="form-control" id="domisili_pemberkasann" name="domisili_pemberkasann" placeholder="Domisili">
                  </div>
                  <div class="form-group">
                    <label for="pkldimana_pemberkasan">Ingin Prakerin di Kota</label>
                    <input type="text" class="form-control" id="pkldimana_pemberkasan" name="pkldimana_pemberkasan" placeholder="Kota">
                  </div>
                  <div class="form-group">
                    <label>Foto 3 : 4</label>
                    <input type="file" class="file-upload-default" id="uploadfoto_pemberkasan" name="uploadfoto_pemberkasan">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Foto 3 : 4">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Foto Surat Pernyataan Bermaterai</label>
                    <input type="file" class="file-upload-default" id="uploadsurat_pemberkasan" name="uploadsurat_pemberkasan">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Foto">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Foto Kartu Pelajar</label>
                    <input type="file" class="file-upload-default" id="uploadkartupelajar_pemberkasan" name="uploadkartupelajar_pemberkasan">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Foto">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Rapor Digital Semester 1, 2, 3 (*pdf)</label>
                    <input type="file" class="file-upload-default" name="uploadebookraport_pemberkasan" id="uploadebookraport_pemberkasan">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Rapor Digital">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Bukti Lunas Nilai</label>
                    <input type="file" class="file-upload-default" name="uploadbuktilunasnilai_pemberkasan" id="uploadbuktilunasnilai_pemberkasan">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Bukti Lunas Nilai">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Bukti Lunas Administrasi</label>
                    <input type="file" class="file-upload-default" name="uploadbuktilunasadministrasi_pemberkasan" id="uploadbuktilunasadministrasi_pemberkasan">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Bukti Lunas Administrasi">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Bukti Lunas Perpustakaan</label>
                    <input type="file" class="file-upload-default" name="uploadbuktilunasperpus_pemberkasan" id="uploadbuktilunasperpus_pemberkasan">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Bukti Lunas Perpustakaan">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                      </span>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary mr-2">Kirim</button>
                </form>
    </div>

</div>
