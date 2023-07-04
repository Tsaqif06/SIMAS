<div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">MoU</h3>
                        <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/bkk/index"> Laman
                                BKK</a> | <span class="text-primary"> MoU </span></h6>
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
                    <button type="button" class="btn btn-primary tombolTambahDataMou" data-toggle="modal" data-target="#formModal">Tambah Data</button>
                    <button type="button" class="btn btn-primary tampilModalImport" data-toggle="modal" data-target="#modalImport">
                        Import Data Dari Excel
                    </button>
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
                                        <th>Nama Dudika</th>
                                        <th>Bidang Kerja Dudika</th>
                                        <th>Tanggal MoU</th>
                                        <th>No. MoU</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    $m = 1;
                                    foreach ($data['siswa'] as $siswa) : ?>
                                        <tr>
                                            <td>
                                                <!-- <a href = "<?= BASEURL; ?>/bkk/detailmou/<?= $siswa['id']; ?>" class="badge badge-info" ><i class="mdi mdi-information-variant"></i></a> -->
                                                <a class="badge badge-success tampilModalEditdas" data-url="<?= BASEURL; ?>/bkk/ubahmou/<?= $siswa['id']; ?>" data-toggle="modal" data-target="#formModal" data-id="<?= $siswa['id']; ?>"><i class="mdi mdi-lead-pencil"></i></a>
                                                <a href="<?= BASEURL; ?>/bkk/hapusmou/<?= $siswa['id']; ?>" class="badge badge-danger"><i class="mdi mdi-delete"></i></a>
                                            </td>
                                            <td><?= $i++ ?></td>
                                            <td><?= $siswa['dudika']; ?></td>
                                            <td><?= $siswa['bidangkerjadudika']; ?></td>
                                            <td><?= $siswa['tglmou']; ?></td>
                                            <td><?= $siswa['no_mou']; ?></td>
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
                    <form action="<?= BASEURL ?>/bkk/importDatamou" method="post" enctype="multipart/form-data">
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
                    <h5 class="modal-title" id="formModalLabelMou">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/bkk/tambahmou" class="forms-sample" method="post">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="dudika">Nama Dudika</label>
                            <input type="text" class="form-control" id="dudika" name="dudika" placeholder="Nama Dudika">
                        </div>
                        <div class="form-group">
                            <label for="bidangkerjadudika">Bidang Kerja Dudika</label>
                            <input type="text" class="form-control" id="bidangkerjadudika" name="bidangkerjadudika" placeholder="Bidang Kerja Dudika">
                        </div>
                        <div class="form-group">
                            <label for="tglmou">Tanggal MoU</label>
                            <input type="text" class="form-control" id="tglmou" name="tglmou" placeholder="Tanggal MoU">
                        </div>
                        <div class="form-group">
                            <label for="no_mou">No. MoU</label>
                            <input type="text" class="form-control" id="no_mou" name="no_mou" placeholder="No. MoU">
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