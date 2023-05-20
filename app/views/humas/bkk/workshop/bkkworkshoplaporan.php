    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">WORKSHOP</h3>
                        <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/bkk/index"> Laman
                                BKK</a> | <span class="text-primary"> Workshop </span></h6>
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
                    <button type="button" class="btn btn-primary tombolTambahDataWorkshop" data-toggle="modal" data-target="#formModal">Tambah Data</button>
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
                            <form action="<?= BASEURL ?>/bkk/importDataworkshop" method="post" enctype="multipart/form-data">
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
                            <h5 class="modal-title" id="formModalLabelWorkshop">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL; ?>/bkk/tambahworkshop/" method="post" class="forms-sample">
                                <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label for="penyelenggara">Penyelenggara</label>
                                    <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Penyelenggara">
                                </div>
                                <div class="form-group">
                                    <label for="kegiatan">Kegiatan</label>
                                    <input type="text" class="form-control" id="kegiatan" name="kegiatan" placeholder="Kegiatan">
                                </div>
                                <div class="form-group">
                                    <label for="tujuan">Tujuan</label>
                                    <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan">
                                </div>
                                <div class="form-group">
                                    <label for="peserta">Peserta</label>
                                    <input type="text" class="form-control" id="peserta" name="peserta" placeholder="Peserta">
                                </div>
                                <div class="form-group">
                                    <label for="tanggalpersiapan">Tanggal Persiapan</label>
                                    <input type="date" class="form-control" id="tanggalpersiapan" name="tanggalpersiapan">
                                </div>
                                <div class="form-group">
                                    <label for="tanggaldilakukan">Tanggal Dilakukan</label>
                                    <input type="date" class="form-control" id="tanggaldilakukan" name="tanggaldilakukan">
                                </div>
                                <div class="form-group">
                                    <label for="tempat">Tempat</label>
                                    <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat">
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
                                        <th>Penyelenggara</th>
                                        <th>Kegiatan</th>
                                        <th>Tujuan</th>
                                        <th>Peserta</th>
                                        <th>Tanggal Persiapan</th>
                                        <th>Tanggal Dilakukan</th>
                                        <th>Tempat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data['siswa'] as $siswa) : ?>
                                        <tr>
                                            <td>
                                                <!-- <a href = "<?= BASEURL; ?>/bkk/detailworkshop/<?= $siswa['id']; ?>" class="badge badge-info" style="text-decoration: none;"><i class="mdi mdi-information-variant"></i></a> -->
                                                <a data-url="<?= BASEURL; ?>/bkk/ubahworkshop/<?= $siswa['id']; ?>" class="badge badge-success tampilModalEditWorkshop" data-toggle="modal" data-target="#formModal" data-id="<?= $siswa['id']; ?>"><i class="mdi mdi-lead-pencil"></i></a>
                                                <a href="<?= BASEURL; ?>/bkk/hapusworkshop/<?= $siswa['id']; ?>" class="badge badge-danger" style="text-decoration: none;"><i class="mdi mdi-delete"></i></a>
                                            </td>
                                            </td>
                                            <td><?= $i++; ?></td>
                                            <td><?= $siswa['penyelenggara']; ?></td>
                                            <td><?= $siswa['kegiatan']; ?></td>
                                            <td><?= $siswa['tujuan']; ?></td>
                                            <td><?= $siswa['peserta']; ?></td>
                                            <td><?= $siswa['tanggalpersiapan']; ?></td>
                                            <td><?= $siswa['tanggaldilakukan']; ?></td>
                                            <td><?= $siswa['tempat']; ?></td>
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
