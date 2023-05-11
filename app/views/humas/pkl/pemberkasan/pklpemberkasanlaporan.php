<div class="collapse" id="form-elements">
  <ul class="nav flex-column sub-menu">
    <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/pkl">PKL</a></li>
    <div class="navsubitem">
      <a class="nav-link" href="<?= BASEURL; ?>/pkl/rekap">Rekap PKL</a>
      <a class="nav-link" href="<?= BASEURL; ?>/pkl/pembekalan">Pembekalan PKL</a>
      <a class="nav-link" href="#">Pemberkasan</a>
      <a class="nav-link" href="<?= BASEURL; ?>/pkl/prakerin">Prakerin</a>
      <a class="nav-link" href="<?= BASEURL; ?>/pkl/nilai">Nilai PKL</a>
      <a class="nav-link" href="<?= BASEURL; ?>/pkl/dtampung">Daya Tampung</a>
    </div>
    <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/bkk/index">BKK</a></li>
    <div class="navsubitem">
      <a class="nav-link" href="<?= BASEURL; ?>/bkk/das">Alumni Sukses</a>
      <a class="nav-link" href="<?= BASEURL; ?>/bkk/mou">MoU</a>
      <a class="nav-link" href="<?= BASEURL; ?>/bkk/peminatan">Peminatan</a>
      <a class="nav-link" href="<?= BASEURL; ?>/bkk/workshop">Workshop</a>
      <a class="nav-link" href="<?= BASEURL; ?>/bkk/kebekerjaan">Kebekerjaan</a>
      <a class="nav-link" href="<?= BASEURL; ?>/bkk/spw">SPW</a>
      <a class="nav-link" href="<?= BASEURL; ?>/bkk/lomba">Lomba</a>
      <a class="nav-link" href="<?= BASEURL; ?>/bkk/loker">Lowongan Kerja</a>
    </div>
    <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/ict/index">ICT</a></li>
    <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/stiru/index">Studi Tiru</a></li>
  </ul>
</div>
</li>
</ul>
</nav>

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <div class="row">
          <div class="col-12 grid-margin">
            <h3 class="font-weight-bold">PEMBERKASAN PKL</h3>
            <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/pkl"> Laman PKL</a> | <span class="text-primary"> Pemberkasan </span></h6>
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
          <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-toggle="modal" data-target="#modalImport">
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
                <input type="hidden" name="raportLama" id="raportLama">
                <input type="hidden" name="buktiLama" id="buktiLama">
                <div class="form-group">
                  <label for="nisn_pemberkasan">NISN</label>
                  <input type="number" class="form-control" id="nisn_pemberkasan" name="nisn_pemberkasan" placeholder="NISN">
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
                    <option value="Laki-laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="domisili_pemberkasann">Domisili</label>
                  <input type="text" class="form-control" id="domisili_pemberkasann" name="domisili_pemberkasann" placeholder="Domisili">
                </div>
                <div class="form-group">
                  <label>Foto 3 : 4</label>
                  <input type="file" class="file-upload-default" name="uploadfoto_pemberkasan" id="uploadfoto_pemberkasan">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Foto 3 : 4">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Rapor Digital</label>
                  <input type="file" class="file-upload-default" name="uploadebookraport_pemberkasan" id="uploadebookraport_pemberkasan">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Rapor Digital">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Bukti Lunas</label>
                  <input type="file" class="file-upload-default" name="uploadbuktilunas_pemberkasan" id="uploadbuktilunas_pemberkasan">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Bukti Lunas">
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
              <table id="myTable" class="table table-hover table-main">
                <thead>
                  <tr>
                    <th>Aksi</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jurusan</th>
                    <th>Jenis Kelamin</th>
                    <th>Domisili</th>
                    <th>Foto 3 : 4</th>
                    <th>E- book rapor</th>
                    <th>Bukti Lunas</th>
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
                      <td><?= $siswa['nisn_pemberkasan']; ?></td>
                      <td><?= $siswa['namasiswa_pemberkasan']; ?></td>
                      <td><?= $siswa['tanggallahir_pemberkasan']; ?></td>
                      <td><?= $siswa['jurusan_pemberkasan']; ?></td>
                      <td><?= $siswa['jeniskelamin_pemberkasan']; ?></td>
                      <td><?= $siswa['domisili_pemberkasann']; ?></td>
                      <td><img src="<?= BASEURL; ?>/images/humas/pkl/pemberkasan/foto/<?= $siswa['uploadfoto_pemberkasan']; ?>" alt="no img" style="width: 65px; height: 65px;"></td>
                      <td><img src="<?= BASEURL; ?>/images/humas/pkl/pemberkasan/raport/<?= $siswa['uploadebookraport_pemberkasan']; ?>" alt="no img" style="width: 65px; height: 65px;"></td>
                      <td><img src="<?= BASEURL; ?>/images/humas/pkl/pemberkasan/buktilunas/<?= $siswa['uploadbuktilunas_pemberkasan']; ?>" alt="no img" style="width: 65px; height: 65px;"></td>
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