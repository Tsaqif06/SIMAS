    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Peminatan</h3>
                        <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/bkk/index"> Laman
                                BKK</a> | <span class="text-primary"> Peminatan </span></h6>
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
                    <button type="button" class="btn btn-primary tombolTambahDataPeminatan" data-toggle="modal" data-target="#formModal">Tambah Data</button>
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
                            <h5 class="modal-title" id="formModalLabelPeminatan">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL; ?>/bkk/tambahpeminatan" method="post" class="forms-sample">
                                <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="jeniskelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                        <option selected>--Pilih Jenis Kelamin</option>
                                        <option velue="Laki-laki">Laki - Laki</option>
                                        <option velue="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas">
                                </div>
                                <div class="form-group">
                                    <label for="domisili">Domisili</label>
                                    <input type="text" class="form-control" id="domisili" name="domisili" placeholder="Domisili">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label for="nohp">No. Telp</label>
                                    <input type="number" class="form-control" id="nohp" name="nohp" placeholder="No. Telp">
                                </div>
                                <div class="form-group">
                                    <label for="rencanasetelahlulus">Rencana setelah lulus</label>
                                    <select class="form-control" id="rencanasetelahlulus" name="rencanasetelahlulus">
                                        <option selected>--Pilih Rencana Anda--</option>
                                        <option value="Bekerja">Bekerja</option>
                                        <option value="Kuliah">Kuliah</option>
                                        <option velue="Berwirausaha">Berwirausaha</option>
                                    </select>
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
                        <form action="<?= BASEURL ?>/bkk/importDatapeminatan" method="post" enctype="multipart/form-data">
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
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kelas</th>
                                        <th>Domisili</th>
                                        <th>Alamat</th>
                                        <th>No. Telp</th>
                                        <th>Rencana setelah lulus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data['siswa'] as $siswa) : ?>
                                        <tr>
                                            <td>
                                                <!-- <a href = "<?= BASEURL; ?>/bkk/detailpeminatan/<?= $siswa['id']; ?>" class="badge badge-info" style="text-decoration: none;"><i class="mdi mdi-information-variant"></i></a> -->
                                                <a class="badge badge-success tampilModalEditPeminatan" data-url="<?= BASEURL; ?>/bkk/ubahpeminatan/<?= $siswa['id']; ?>" data-toggle="modal" data-target="#formModal" data-id="<?= $siswa['id']; ?>"><i class="mdi mdi-lead-pencil"></i></a>
                                                <a href="<?= BASEURL; ?>/bkk/hapuspeminatan/<?= $siswa['id']; ?>" class="badge badge-danger" style="text-decoration: none;"><i class="mdi mdi-delete"></i></a>
                                            </td>
                                            </td>
                                            <td><?= $i++; ?></td>
                                            <td><?= $siswa['nama']; ?></td>
                                            <td><?= $siswa['jeniskelamin']; ?></td>
                                            <td><?= $siswa['kelas']; ?></td>
                                            <td><?= $siswa['domisili']; ?></td>
                                            <td><?= $siswa['alamat']; ?></td>
                                            <td><?= $siswa['nohp']; ?></td>
                                            <td><?= $siswa['rencanasetelahlulus']; ?></td>

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