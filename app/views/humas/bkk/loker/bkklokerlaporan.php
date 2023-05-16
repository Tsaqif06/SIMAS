    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Lowongan Pekerjaan</h3>
                        <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/bkk/index"> Laman
                                BKK</a> | <span class="text-primary"> Lowongan Pekerjaan </span></h6>
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
                    <button type="button" class="btn btn-primary tombolTambahDataLoker" data-toggle="modal"
                        data-target="#formModal">Tambah Data</button>
                    <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-toggle="modal"
                        data-target="#modalImport">
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
                            <table id="table" class="table table-hover table-main">
                                <thead>
                                    <tr>
                                        <th>Aksi</th>
                                        <th>No</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Jurusan</th>
                                        <th>Profesi</th>
                                        <th>Kriteria</th>
                                        <th>Kontak</th>
                                        <th>Foto Loker</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data['siswa'] as $siswa) : ?>
                                    <tr>
                                        <td>
                                            <!-- <a href = "<?= BASEURL; ?>/bkk/detailloker/<?= $siswa['id']; ?>" class="badge badge-info" style="text-decoration: none;"><i class="mdi mdi-information-variant"></i></a> -->
                                            <a data-url="<?= BASEURL; ?>/bkk/ubahloker/<?= $siswa['id']; ?>"
                                                class="badge badge-success tampilModalEditLoker" data-toggle="modal"
                                                data-target="#formModal" data-id="<?= $siswa['id']; ?>"><i
                                                    class="mdi mdi-lead-pencil"></i></a>
                                            <a href="<?= BASEURL; ?>/bkk/hapusloker/<?= $siswa['id']; ?>"
                                                class="badge badge-danger" style="text-decoration: none;"><i
                                                    class="mdi mdi-delete"></i></a>
                                        </td>
                                        <td><?= $no++; ?></td>
                                        <td><?= $siswa['namaperusahaan']; ?></td>
                                        <td><?= $siswa['untukjurusan']; ?></td>
                                        <td><?= $siswa['profesiygdibutuhkan']; ?></td>
                                        <td><?= $siswa['kriteriaprofesi']; ?></td>
                                        <td><?= $siswa['kontakperusahaan']; ?></td>
                                        <td><img src="<?= BASEURL; ?>/images/humas/bkk/loker/<?= $siswa['upfotoloker']; ?>"
                                                alt="no img" style="width: 65px; height: 65px;"></td>
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
                    <h1 class="modal-title fs-5" id="modalLabel">Import Data/h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL ?>/bkk/importDataloker" method="post" enctype="multipart/form-data">
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
                    <h5 class="modal-title" id="formModalLabelLoker">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
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
    </div>