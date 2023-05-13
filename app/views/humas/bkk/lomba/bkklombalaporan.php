    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Lomba</h3>
                        <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/bkk/index"> Laman
                                BKK</a> | <span class="text-primary"> Lomba </span></h6>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">Tambah
                        Data</button>
                    <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-toggle="modal" data-target="#modalImport">
                        Import Data Dari Excel
                    </button>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModalLabelLomba">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL; ?>/bkk/tambahlomba" method="post" class="forms-sample" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="pamfletLama" id="pamfletLama">
                                <div class="form-group">
                                    <label for="penyelenggara">Penyelenggara</label>
                                    <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="penyelenggara">
                                </div>
                                <div class="form-group">
                                    <label for="peserta">Peserta</label>
                                    <input type="text" class="form-control" id="peserta" name="peserta" placeholder="Peserta">
                                </div>
                                <div class="form-group">
                                    <label for="tanggaldaftar">Tanggal Daftar</label>
                                    <input type="date" class="form-control" id="tanggaldaftar" name="tanggaldaftar">
                                </div>
                                <div class="form-group">
                                    <label for="tanggallomba">Tanggal Lomba</label>
                                    <input type="date" class="form-control" id="tanggallomba" name="tanggallomba">
                                </div>
                                <div class="form-group">
                                    <label for="tempatlomba">Tempat</label>
                                    <input type="text" class="form-control" id="tempatlomba" name="tempatlomba" placeholder="Domisili">
                                </div>
                                <div class="form-group">
                                    <label>Unggah Pamflet Lomba</label>
                                    <input type="file" class="file-upload-default" id="pamfletlomba" name="pamfletlomba">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Pamflet Lomba">
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
                                        <th>Penyelenggara</th>
                                        <th>Peserta</th>
                                        <th>Tanggal Pendaftaran</th>
                                        <th>Tanggal Lomba</th>
                                        <th>Tempat</th>
                                        <th>Pamflet Lomba</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data['siswa'] as $siswa) : ?>
                                        <tr>
                                            <td>
                                                <!-- <a href = "<?= BASEURL; ?>/bkk/detaillomba/<?= $siswa['id']; ?>" class="badge badge-info" style="text-decoration: none;"><i class="mdi mdi-information-variant"></i></a> -->
                                                <a data-url="<?= BASEURL; ?>/bkk/ubahlomba/<?= $siswa['id']; ?>" class="badge badge-success tampilModalEditLomba" data-toggle="modal" data-target="#formModal" data-id="<?= $siswa['id']; ?>"><i class="mdi mdi-lead-pencil"></i></a>
                                                <a href="<?= BASEURL; ?>/bkk/hapuslomba/<?= $siswa['id']; ?>" class="badge badge-danger" style="text-decoration: none;"><i class="mdi mdi-delete"></i></a>
                                            </td>
                                            <td><?= $i++ ?></td>
                                            <td><?= $siswa['penyelenggara']; ?></td>
                                            <td><?= $siswa['peserta']; ?></td>
                                            <td><?= $siswa['tanggaldaftar']; ?></td>
                                            <td><?= $siswa['tanggallomba']; ?></td>
                                            <td><?= $siswa['tempatlomba']; ?></td>
                                            <td><img src="<?= BASEURL; ?>/images/humas/bkk/lomba/<?= $siswa['pamfletlomba']; ?>" alt src="<?= BASEURL; ?>/images/notfound.png" style="width: 65px; height: 65px;"></td>
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
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. SIMAS. All
                rights reserved.</span>
        </div>
    </footer>
    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

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
                    <form action="<?= BASEURL ?>/bkk/importDatalomba" method="post" enctype="multipart/form-data">
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