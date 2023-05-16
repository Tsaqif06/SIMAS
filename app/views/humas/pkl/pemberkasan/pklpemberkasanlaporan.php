
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <div class="row">
          <div class="col-12 grid-margin">
            <h3 class="font-weight-bold">PEMBERKASAN PKL</h3>
            <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/pkl/index"> Laman PKL</a> | <span class="text-primary"> Pemberkasan </span></h6>
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
      <div class="col-md-12 grid-margin">
        <div class="template-demo">
          <button type="button" class="btn btn-primary tambahpemberkasan" data-toggle="modal" data-target="#formModal">Tambah Data</button>
          <button type="button" class="btn btn-primary tampilModalImport" data-toggle="modal" data-target="#modalImport">
            Import Data Dari Excel
          </button>
        </div>
      </div>

      <div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modalLabel">Import Data</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= BASEURL ?>/pkl/importDatapemberkasan" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="file">Pilih file Excel (.xlsx)</label>
                  <input type="file" name="file" id="file">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary batal" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
            </form>
          </div>
        </div>
      </div>


      <!-- Modal -->
      <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="formModalLabelPemberkasan">Tambah Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
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
                    <label>Rapor Digital Semester 1, 2, 3</label>
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
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive ">
              <table id="table" class="table table-hover table-main">
                <thead>
                  <tr>
                    <th>Aksi</th>
                    <th>No</th>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jurusan</th>
                    <th>Jenis Kelamin</th>
                    <th>Domisili</th>
                    <th>Ingin Prakerin di Kota</th>
                    <th>Foto 3 : 4</th>
                    <th>Surat Pernyataan Bermaterai</th>
                    <th>Kartu Pelajar</th>
                    <th>E- book rapor</th>
                    <th>Bukti Lunas Nilai</th>
                    <th>Bukti Lunas Administrasi</th>
                    <th>Bukti Lunas Perpustakaan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($data['siswa'] as $siswa) : ?>
                    <tr>
                      <td>
                        <a class="badge badge-success tampilModalUbahps" data-url="<?= BASEURL ?>/pkl/ubahpemberkasan/<?= $siswa['id']; ?>" data-toggle="modal" data-target="#formModal" data-id="<?= $siswa['id'] ?>"><i class="mdi mdi-lead-pencil"></i></a>
                        <a href="<?= BASEURL; ?>/pkl/hapuspemberkasan/<?= $siswa['id']; ?>" class="badge badge-danger"><i class="mdi mdi-delete"></i></a>
                      </td>
                      <td><?= $no++ ?></td>
                      <td><?= $siswa['nisn_pemberkasan']; ?></td>
                      <td><?= $siswa['nis_pemberkasan']; ?></td>
                      <td><?= $siswa['namasiswa_pemberkasan']; ?></td>
                      <td><?= $siswa['tanggallahir_pemberkasan']; ?></td>
                      <td><?= $siswa['jurusan_pemberkasan']; ?></td>
                      <td><?= $siswa['jeniskelamin_pemberkasan']; ?></td>
                      <td><?= $siswa['domisili_pemberkasann']; ?></td>
                      <td><?= $siswa['pkldimana_pemberkasan']; ?></td>
                      <td><img src="<?= BASEURL; ?>/images/humas/pkl/pemberkasan/foto/<?= $siswa['uploadfoto_pemberkasan']; ?>" alt="no img" style="width: 65px; height: 65px;"></td>
                      <td><img src="<?= BASEURL; ?>/images/humas/pkl/pemberkasan/surat/<?= $siswa['uploadsurat_pemberkasan']; ?>" alt="no img" style="width: 65px; height: 65px;"></td>
                      <td><img src="<?= BASEURL; ?>/images/humas/pkl/pemberkasan/kartupelajar/<?= $siswa['uploadkartupelajar_pemberkasan']; ?>" alt="no img" style="width: 65px; height: 65px;"></td>
                      <!-- <td><img src="<?= BASEURL; ?>/images/humas/pkl/pemberkasan/raport/<?= $siswa['uploadebookraport_pemberkasan']; ?>" alt="no img" style="width: 65px; height: 65px;"></td> -->
                      <td><a href="<?= BASEURL ?>/pkl/raportpemberkasan/<?= $siswa['uploadebookraport_pemberkasan']; ?>" class="badge badge-primary btn-icon-text"><i class="ti-file btn-icon-prepend"></i> Lihat </a></td>
                      <td><img src="<?= BASEURL; ?>/images/humas/pkl/pemberkasan/buktilunasnilai/<?= $siswa['uploadbuktilunasnilai_pemberkasan']; ?>" alt="no img" style="width: 65px; height: 65px;"></td>
                      <td><img src="<?= BASEURL; ?>/images/humas/pkl/pemberkasan/buktilunasadm/<?= $siswa['uploadbuktilunasadministrasi_pemberkasan']; ?>" alt="no img" style="width: 65px; height: 65px;"></td>
                      <td><img src="<?= BASEURL; ?>/images/humas/pkl/pemberkasan/buktilunasperpus/<?= $siswa['uploadbuktilunasperpus_pemberkasan']; ?>" alt="no img" style="width: 65px; height: 65px;"></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>