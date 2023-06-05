<?php

// echo "<pre>";
// var_dump($data['data_penempatan']);
// echo "</pre>";

?>

<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <div class="row">
            <div class="col-lg-12">
              <h3 class="font-weight-bold">PRAKTIK KERJA LAPANGAN</h3>
              <h6 class="font-weight-normal mb-0"> Laman PKL Siswa | <span class="text-primary"> SIMAS </span></h6>
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

  <div class="row justify-content">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card animate-gradient">
        <div class="card-body">
          <div class="row justify-content p-2">
            <div class="col-md-8 grid-margin">
              <?php if (!$data['data_pemberkasan']) : ?>
                <h3 class="card-text text-white">Anda belum melakukan pemberkasan.</h3>
                <h4 class="card-text text-white">Segera lakukan pemberkasan.</h4>
              <?php elseif ($data['data_pemberkasan']['status_pemberkasan'] == 0) : ?>
                <h3 class="card-text text-white">Data pemberkasan Anda belum lengkap.</h3>
                <h4 class="card-text text-white">Segera lengkapi data pemberkasan.</h4>
              <?php elseif ($data['data_pemberkasan']['status_pemberkasan'] == 1 && !$data['data_penempatan']) : ?>
                <h3 class="card-text text-white">Data sudah lengkap !</h3>
                <h4 class="card-text text-white">Proses penempatan sedang dilakukan oleh Kabeng Anda.</h4>
              <?php else : ?>
                <h3 class="card-text text-white">Anda sudah mendapatkan tempat PKL !</h3>
                <h4 class="card-text text-white">Selamat ! Berjuanglah sebaik mungkin !</h4>
              <?php endif ?>
            </div>
            <div class="col-md-4">
              <button type="button" class="btn btn-icon-text btn-light btn-block btn-lg text-primary" data-toggle="modal" data-target="#modal">
                <?php if (!$data['data_pemberkasan']) : ?>
                  <i class="mdi mdi-account-card-details btn-icon-prepend icon-lg"></i>
                  Isi Form Pemberkasan
                <?php elseif ($data['data_pemberkasan']['status_pemberkasan'] == 0) : ?>
                  <i class="mdi mdi-account-card-details  btn-icon-prepend"></i>
                  Lengkapi Pemberkasan
                <?php elseif ($data['data_pemberkasan']['status_pemberkasan'] == 1 && !$data['data_penempatan']) : ?>
                  <i class="mdi mdi-account-check  btn-icon-prepend"></i>
                  Sunting Data Pemberkasan
                <?php else : ?>
                  <i class="mdi mdi-map-marker  btn-icon-prepend"></i>
                  Lihat Data Penempatan
                <?php endif ?>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php if (!$data['data_penempatan']) : ?>

    <!-- Modal kalau mau isi form pemberkasan-->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Pemberkasan</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= BASEURL ?>/pkl/tambahpemberkasan" method="post" enctype="multipart/form-data">
            <?php if ($data['data_pemberkasan']) : ?>
              <input type="hidden" name="id" value="<?= $data['data_pemberkasan']['id'] ?>">
            <?php endif ?>
            <div class="row justify-content-md-center">
              <div class="col-md-6">
                <div class="modal-body">
                  <h4 class="modal-title">Data Diri</h4>

                  <div class="form-group">
                    <label for="nis_pemberkasan">NIS</label>
                    <input type="number" class="form-control" readonly id="nis_pemberkasan" name="nis_pemberkasan" placeholder="NIS" value="<?= $data['siswa']['nis'] ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="nisn_pemberkasan">NISN</label>
                    <input type="number" class="form-control" readonly id="nisn_pemberkasan" name="nisn_pemberkasan" placeholder="NISN" value="<?= $data['siswa']['nisn'] ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="namasiswa_pemberkasan">Nama Lengkap</label>
                    <input type="text" class="form-control" readonly id="namasiswa_pemberkasan" name="namasiswa_pemberkasan" placeholder="Nama Lengkap" value="<?= $data['siswa']['nama_siswa'] ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="kelas_pemberkasan">Kelas</label>
                    <input class="form-control" id="kelas_pemberkasan" name="kelas_pemberkasan" placeholder="Kelas" required>
                  </div>

                  <div class="form-group">
                    <label for="jurusan_pemberkasan">Jurusan</label>
                    <select class="form-control text-dark" aria-label="Default select example" id="jurusan_pemberkasan" name="jurusan_pemberkasan" required>
                      <option selected>--Pilih Jurusan--</option>
                      <option value="TG">Teknik Grafika</option>
                      <option value="TKJ">Teknik Komputer Jaringan</option>
                      <option value="RPL">Rekayasa Perangkat Lunak</option>
                      <option value="ANI">Animasi</option>
                      <option value="DKV">Desain Komunikasi Visual</option>
                      <option value="TL">Logistik</option>
                      <option value="MEKA">Mekatronika</option>
                      <option value="PH">Perhotelan</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="tanggallahir_pemberkasan">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggallahir_pemberkasan" name="tanggallahir_pemberkasan" required>
                  </div>

                  <div class="form-group">
                    <label for="jeniskelamin_pemberkasan" class="col-form-label">Jenis Kelamin</label>
                    <div class="form-check">
                      <label for="jeniskelamin_pemberkasan" class="form-check-label">
                        <input type="radio" class="form-check-input" name="jeniskelamin_pemberkasan" id="Laki-laki" value="Laki-laki" checked>
                        Laki - laki
                      </label>
                    </div>
                    <div class="form-check">
                      <label for="jeniskelamin_pemberkasan" class="form-check-label">
                        <input type="radio" class="form-check-input" name="jeniskelamin_pemberkasan" id="Perempuan" value="Perempuan">
                        Perempuan
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="agama_pemberkasan">Agama</label>
                    <input type="text" class="form-control" id="agama_pemberkasan" name="agama_pemberkasan" placeholder="Agama" required>
                  </div>

                  <div class="form-group">
                    <label for="domisili_pemberkasan">Domisili</label>
                    <input type="text" class="form-control" id="domisili_pemberkasan" name="domisili_pemberkasan" placeholder="Domisili" required>
                  </div>

                  <div class="form-group">
                    <label for="alamat_pemberkasan">Alamat Rumah</label>
                    <input type="text" class="form-control" id="alamat_pemberkasan" name="alamat_pemberkasan" placeholder="Alamat Rumah" required>
                  </div>

                  <div class="form-group">
                    <label for="notelp_pemberkasan">No. Telp. / HP</label>
                    <input type="number" class="form-control" id="notelp_pemberkasan" name="notelp_pemberkasan" placeholder="No. Telp. / HP" required>
                  </div>
                </div>

              </div>
              <div class="col-md-6">
                <div class="modal-body">
                  <h4 class="modal-title">Kontak Orang Tua / Wali Murid</h4>
                  <div class="form-group">
                    <label for="notelportu_pemberkasan">No. Telp. / HP (Orang Tua / Wali Murid)</label>
                    <input type="number" class="form-control" id="notelportu_pemberkasan" name="notelportu_pemberkasan" placeholder="No. Telp. / HP" required>
                  </div>
                </div>

                <div class="modal-body">
                  <h4 class="modal-title">Lampiran</h4>

                  <div class="form-group">
                    <label>Foto 3 : 4</label>
                    <input type="file" class="file-upload-default" id="uploadfoto_pemberkasan" name="uploadfoto_pemberkasan">
                    <div class="input-group col-xs-12">
                      <?php if ($data['data_pemberkasan'] && !empty($data['data_pemberkasan']['uploadfoto_pemberkasan'])) : ?>
                        <input type="text" class="form-control file-upload-info" style="cursor: default;" readonly placeholder="(Klik untuk Melihat Foto Lama)"
                        onclick="window.open(`<?= BASEURL ?>/assets/pkl/pemberkasan/foto/<?= $data['data_pemberkasan']['uploadfoto_pemberkasan'] ?>`, `_blank`)">
                        <input type="hidden" name="fotoLama" value="<?= $data['data_pemberkasan']['uploadfoto_pemberkasan'] ?>">
                      <?php else : ?>
                        <input type="text" class="form-control file-upload-info" style="cursor: default;" readonly placeholder="Unggah Foto 3 : 4">
                        <input type="hidden" name="fotoLama" value="">
                      <?php endif ?>
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">
                          <?= ($data['data_pemberkasan'] && !empty($data['data_pemberkasan']['uploadfoto_pemberkasan'])) ? "Ubah" : "Unggah" ?>
                        </button>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Foto Kartu Pelajar</label>
                    <input type="file" class="file-upload-default" id="uploadkartupelajar_pemberkasan" name="uploadkartupelajar_pemberkasan">
                    <div class="input-group col-xs-12">
                      <?php if ($data['data_pemberkasan'] && !empty($data['data_pemberkasan']['uploadkartupelajar_pemberkasan'])) : ?>
                        <input type="text" class="form-control file-upload-info" style="cursor: default;" readonly placeholder="(Klik untuk Melihat Foto Lama)"
                        onclick="window.open(`<?= BASEURL ?>/assets/pkl/pemberkasan/kartupelajar/<?= $data['data_pemberkasan']['uploadkartupelajar_pemberkasan'] ?>`, `_blank`)">
                        <input type="hidden" name="kartuPelajarLama" value="<?= $data['data_pemberkasan']['uploadkartupelajar_pemberkasan'] ?>">
                      <?php else : ?>
                        <input type="text" class="form-control file-upload-info" style="cursor: default;" readonly placeholder="Unggah Foto">
                        <input type="hidden" name="kartuPelajarLama" value="">
                      <?php endif ?>
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">
                          <?= ($data['data_pemberkasan'] && !empty($data['data_pemberkasan']['uploadkartupelajar_pemberkasan'])) ? "Ubah" : "Unggah" ?>
                        </button>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Rapor Digital Semester 1, 2, 3</label>
                    <input type="file" class="file-upload-default" name="uploadebookraport_pemberkasan" id="uploadebookraport_pemberkasan">
                    <div class="input-group col-xs-12">
                      <?php if ($data['data_pemberkasan'] && !empty($data['data_pemberkasan']['uploadebookraport_pemberkasan'])) : ?>
                        <input type="text" class="form-control file-upload-info" style="cursor: default;" readonly placeholder="(Klik untuk Melihat Raport Lama)"
                        onclick="window.open(`<?= BASEURL ?>/assets/raport/<?= $data['data_pemberkasan']['uploadebookraport_pemberkasan'] ?>`, `_blank`)">
                        <input type="hidden" name="raportLama" value="<?= $data['data_pemberkasan']['uploadebookraport_pemberkasan'] ?>">
                      <?php else : ?>
                        <input type="text" class="form-control file-upload-info" style="cursor: default;" readonly placeholder="Unggah Rapor Digital">
                        <input type="hidden" name="raportLama" value="">
                      <?php endif ?>
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">
                          <?= ($data['data_pemberkasan'] && !empty($data['data_pemberkasan']['uploadebookraport_pemberkasan'])) ? "Ubah" : "Unggah" ?>
                        </button>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Foto Surat Pernyataan Bermaterai</label>
                    <input type="file" class="file-upload-default" id="uploadsurat_pemberkasan" name="uploadsurat_pemberkasan">
                    <div class="input-group col-xs-12">
                      <?php if ($data['data_pemberkasan'] && !empty($data['data_pemberkasan']['uploadsurat_pemberkasan'])) : ?>
                        <input type="text" class="form-control file-upload-info" style="cursor: default;" readonly placeholder="(Klik untuk Melihat Foto Lama)"
                        onclick="window.open(`<?= BASEURL ?>/assets/pkl/pemberkasan/surat/<?= $data['data_pemberkasan']['uploadsurat_pemberkasan'] ?>`, `_blank`)">
                        <input type="hidden" name="suratLama" value="<?= $data['data_pemberkasan']['uploadsurat_pemberkasan'] ?>">
                      <?php else : ?>
                        <input type="text" class="form-control file-upload-info" style="cursor: default;" readonly placeholder="Unggah Foto">
                        <input type="hidden" name="suratLama" value="">
                      <?php endif ?>
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">
                          <?= ($data['data_pemberkasan'] && !empty($data['data_pemberkasan']['uploadsurat_pemberkasan'])) ? "Ubah" : "Unggah" ?>
                        </button>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Bukti Lunas Nilai</label>
                    <input type="file" class="file-upload-default" name="uploadbuktilunasnilai_pemberkasan" id="uploadbuktilunasnilai_pemberkasan">
                    <div class="input-group col-xs-12">
                      <?php if ($data['data_pemberkasan'] && !empty($data['data_pemberkasan']['uploadbuktilunasnilai_pemberkasan'])) : ?>
                        <input type="text" class="form-control file-upload-info" style="cursor: default;" readonly placeholder="(Klik untuk Melihat Bukti Lama)"
                        onclick="window.open(`<?= BASEURL ?>/assets/pkl/pemberkasan/buktilunasnilai/<?= $data['data_pemberkasan']['uploadbuktilunasnilai_pemberkasan'] ?>`, `_blank`)">
                        <input type="hidden" name="nilaiLama" value="<?= $data['data_pemberkasan']['uploadbuktilunasnilai_pemberkasan'] ?>">
                      <?php else : ?>
                        <input type="text" class="form-control file-upload-info" style="cursor: default;" readonly placeholder="Unggah Bukti Lunas Nilai">
                        <input type="hidden" name="nilaiLama" value="">
                      <?php endif ?>
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">
                          <?= ($data['data_pemberkasan'] && !empty($data['data_pemberkasan']['uploadbuktilunasnilai_pemberkasan'])) ? "Ubah" : "Unggah" ?>
                        </button>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Bukti Lunas Administrasi</label>
                    <input type="file" class="file-upload-default" name="uploadbuktilunasadministrasi_pemberkasan" id="uploadbuktilunasadministrasi_pemberkasan">
                    <div class="input-group col-xs-12">
                      <?php if ($data['data_pemberkasan'] && !empty($data['data_pemberkasan']['uploadbuktilunasadministrasi_pemberkasan'])) : ?>
                        <input type="text" class="form-control file-upload-info" style="cursor: default;" readonly placeholder="(Klik untuk Melihat Bukti Lama)"
                        onclick="window.open(`<?= BASEURL ?>/assets/pkl/pemberkasan/buktilunasadm/<?= $data['data_pemberkasan']['uploadbuktilunasadministrasi_pemberkasan'] ?>`, `_blank`)">
                        <input type="hidden" name="administrasiLama" value="<?= $data['data_pemberkasan']['uploadbuktilunasadministrasi_pemberkasan'] ?>">
                      <?php else : ?>
                        <input type="text" class="form-control file-upload-info" style="cursor: default;" readonly placeholder="Unggah Bukti Lunas Administrasi">
                        <input type="hidden" name="administrasiLama" value="">
                      <?php endif ?>
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">
                          <?= ($data['data_pemberkasan'] && !empty($data['data_pemberkasan']['uploadbuktilunasadministrasi_pemberkasan'])) ? "Ubah" : "Unggah" ?>
                        </button>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Bukti Lunas Perpustakaan</label>
                    <input type="file" class="file-upload-default" name="uploadbuktilunasperpus_pemberkasan" id="uploadbuktilunasperpus_pemberkasan">
                    <div class="input-group col-xs-12">
                      <?php if ($data['data_pemberkasan'] && !empty($data['data_pemberkasan']['uploadbuktilunasperpus_pemberkasan'])) : ?>
                        <input type="text" class="form-control file-upload-info" style="cursor: default;" readonly placeholder="(Klik untuk Melihat Bukti Lama)"
                        onclick="window.open(`<?= BASEURL ?>/assets/pkl/pemberkasan/buktilunasperpus/<?= $data['data_pemberkasan']['uploadbuktilunasperpus_pemberkasan'] ?>`, `_blank`)">
                        <input type="hidden" name="perpusLama" value="<?= $data['data_pemberkasan']['uploadbuktilunasperpus_pemberkasan'] ?>">
                      <?php else : ?>
                        <input type="text" class="form-control file-upload-info" style="cursor: default;" readonly placeholder="Unggah Bukti Lunas Perpustakaan">
                        <input type="hidden" name="perpusLama" value="">
                      <?php endif ?>
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">
                          <?= ($data['data_pemberkasan'] && !empty($data['data_pemberkasan']['uploadbuktilunasperpus_pemberkasan'])) ? "Ubah" : "Unggah" ?>
                        </button>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="modal-body">
                <h4 class="modal-title">Pemilihan Kota</h4>
                <div class="form-group">
                  <label for="kota1_pemberkasan">Ingin Prakerin di Kota</label>
                  <input type="text" class="form-control" id="kota1_pemberkasan" name="kota1_pemberkasan" placeholder="Kota 1" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="kota2_pemberkasan" name="kota2_pemberkasan" placeholder="Kota 2" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="kota3_pemberkasan" name="kota3_pemberkasan" placeholder="Kota 3" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Batalkan</button>
              <button type="submit" class="btn btn-primary mr-2"><?= (!$data['data_pemberkasan']) ? "Kirim" : "Ubah" ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>

  <?php else : ?>

    <!--Modal udah dapet tempat pkl ahay-->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="modalpenempatanlabel">Data Penempatan</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h4>Anda ditempatkan di Industri : </h4>
            <h3 class="text-primary"><?= $data['data_penempatan']['namaperusahaan'] ?></h3>
          </div>
          <div class="modal-body">
            <h4>Di Kota : </h4>
            <h3 class="text-primary"><?= $data['data_penempatan']['tempatperusahaan'] ?></h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

  <?php endif ?>

  <div class="row justify-content">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h4>Surat Pemberitahuan Persyaratan PKL</h4>
          </div>
          <object data="../assets/pkl/Surat Pemberitahuan Persyaratan PKL.pdf" width="100%" height="500"></object>
        </div>
      </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h4>Surat Pilihan Kota</h4>
          </div>
          <object data="../assets/pkl/Surat Edaran Pilihan kota.pdf" width="100%" height="500"></object>
        </div>
      </div>
    </div>
  </div>

  <?php if ($data['data_pemberkasan'] && !$data['data_penempatan']) : ?>
    <script>
      $(document).ready(function() {
        $('#modal form').attr('action', '<?= BASEURL ?>/pkl/ubahpemberkasan');
        $('#modal #kelas_pemberkasan').val("<?= $data['data_pemberkasan']['kelas_pemberkasan'] ?>");
        $('#modal #jurusan_pemberkasan').val("<?= $data['data_pemberkasan']['jurusan_pemberkasan'] ?>");
        $('#modal #namasiswa_pemberkasan').val("<?= $data['data_pemberkasan']['namasiswa_pemberkasan'] ?>");
        $('#modal #nis_pemberkasan').val("<?= $data['data_pemberkasan']['nis_pemberkasan'] ?>");
        $('#modal #nisn_pemberkasan').val("<?= $data['data_pemberkasan']['nisn_pemberkasan'] ?>");
        $('#modal #tanggallahir_pemberkasan').val("<?= $data['data_pemberkasan']['tanggallahir_pemberkasan'] ?>");
        $('#modal #<?= $data['data_pemberkasan']['jeniskelamin_pemberkasan'] ?>').prop('checked', true);
        $('#modal #agama_pemberkasan').val("<?= $data['data_pemberkasan']['agama_pemberkasan'] ?>");
        $('#modal #domisili_pemberkasan').val("<?= $data['data_pemberkasan']['domisili_pemberkasan'] ?>");
        $('#modal #alamat_pemberkasan').val("<?= $data['data_pemberkasan']['alamat_pemberkasan'] ?>");
        $('#modal #notelp_pemberkasan').val("<?= $data['data_pemberkasan']['notelp_pemberkasan'] ?>");
        $('#modal #notelportu_pemberkasan').val("<?= $data['data_pemberkasan']['notelportu_pemberkasan'] ?>");
        $('#modal #kota1_pemberkasan').val("<?= $data['data_pemberkasan']['kota1_pemberkasan'] ?>");
        $('#modal #kota2_pemberkasan').val("<?= $data['data_pemberkasan']['kota2_pemberkasan'] ?>");
        $('#modal #kota3_pemberkasan').val("<?= $data['data_pemberkasan']['kota3_pemberkasan'] ?>");
      });
    </script>
  <?php endif ?>

</div>