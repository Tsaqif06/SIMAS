      <!-- partial -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 grid-margin">
                  <h3 class="font-weight-bold">STUDI TIRU</h3>
                  <h6 class="font-weight-normal mb-0">Laman Laporan Studi Tiru | <span class="text-primary">SIMAS</span></h6>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">Tambah Data</button>
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
                        <form action="<?= BASEURL ?>/stiru/importData" method="post" enctype="multipart/form-data">
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


              </div>

              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive ">
                        <table id="table" class="table table-hover">
                          <thead>
                            <tr>
                              <th>Aksi</th>
                              <th>No</th>
                              <th>Nama Instansi</th>
                              <th>Peserta</th>
                              <th>Tanggal</th>
                              <th>Tujuan</th>
                              <th>Tempat</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1;
                            foreach ($data['stiru'] as $stiru) : ?>
                              <tr>
                                <td>
                                  <a class="badge badge-success tampilModalEditstiru" data-url="<?= BASEURL; ?>/stiru/ubahstiru/<?= $stiru['id']; ?>" data-toggle="modal" data-target="#formModal" data-id="<?= $stiru['id']; ?>"><i class="mdi mdi-lead-pencil"></i></a>
                                  <a href="<?= BASEURL; ?>/stiru/hapusstiru/<?= $stiru['id']; ?>" class="badge badge-danger" style="text-decoration: none;"><i class="mdi mdi-delete"></i></a>
                                </td>
                                <td><?= $no++; ?></td>
                                <td><?= $stiru['instansi']; ?></td>
                                <td><?= $stiru['peserta']; ?></td>
                                <td><?= $stiru['tanggal']; ?></td>
                                <td><?= $stiru['tujuan']; ?></td>
                                <td><?= $stiru['tempat']; ?></td>
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
          </div>

        </div>



      <!-- Modal -->
      <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title tombolTambahDataStiru" id="formModalLabelStiru">Tambah Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= BASEURL; ?>/stiru/tambahstiru/" method="post">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                  <label for="instansi" class="col-form-label">Nama Instansi</label>
                  <input type="text" class="form-control" id="instansi" name="instansi">
                </div>
                <div class="form-group">
                  <label for="peserta" class="col-form-label">Peserta</label>
                  <input type="text" class="form-control" id="peserta" name="peserta">
                </div>
                <div class="form-group">
                  <label for="tanggal" class="col-form-label">Tanggal</label>
                  <input type="text" class="form-control" id="tanggal" name="tanggal">
                </div>
                <div class="form-group">
                  <label for="tujuan" class="col-form-label">Tujuan</label>
                  <input type="text" class="form-control" id="tujuan" name="tujuan">
                </div>
                <div class="form-group">
                  <label for="tempat" class="col-form-label">Tempat</label>
                  <input type="text" class="form-control" id="tempat" name="tempat">
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