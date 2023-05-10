<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DATA ALUMNI SUKSES</h3>
                        <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/bkk/index"> Laman
                                BKK</a> | <span class="text-primary"> Alumni Sukses </span></h6>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModaldas">Tambah
                        Data</button>
                    <!-- </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="template-demo"> -->
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
                            <table id="myTable" class="table table-hover table-main">
                                <thead>
                                    <tr>
                                        <th>Aksi</th>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jurusan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No. Telp.</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Jabatan saat ini</th>
                                        <th>Foto Terbaru</th>
                                        <th>CV Terbaru</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                              foreach ($data['siswa'] as $siswa): ?>
                                    <tr>
                                        <td>
                                            <!-- <a href="<?= BASEURL; ?>/bkk/detaildas/<?= $siswa['id']; ?>" class="badge badge-info" ><i class="mdi mdi-information-variant"></i></a> -->
                                            <a class="badge badge-success tampilModalUbahdas"
                                                data-url="<?= BASEURL ?>/bkk/ubahdas/<?= $siswa['id']; ?>"
                                                data-toggle="modal" data-target="#formModaldas"
                                                data-id="<?= $siswa['id'] ?>"><i class="mdi mdi-lead-pencil"></i></a>
                                            <a href="<?= BASEURL; ?>/bkk/hapusdas/<?= $siswa['id']; ?>"
                                                class="badge badge-danger"><i class="mdi mdi-delete"></i></a>
                                        </td>
                                        <td><?= $no++; ?></td>
                                        <td><?= $siswa['namalengkap']; ?></td>
                                        <td><?= $siswa['jurusan']; ?></td>
                                        <td><?= $siswa['jk']; ?></td>
                                        <td><?= $siswa['notelpwa']; ?></td>
                                        <td><?= $siswa['namaperusahaansaatini']; ?></td>
                                        <td><?= $siswa['jabatansaatini']; ?></td>
                                        <td><img src="<?= BASEURL; ?>/images/humas/bkk/das/<?= $siswa['uploadfototerbaru']; ?>"
                                                alt="no img" style="width: 65px; height: 65px;"></td>
                                        <td><img src="<?= BASEURL; ?>/images/humas/bkk/das/<?= $siswa['uploadcvterbaru']; ?>"
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

<!-- Modal -->
<div class="modal fade" id="formModaldas" tabindex="-1" role="dialog" aria-labelledby="judulModaldas"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabeldas">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="<?= BASEURL; ?>/bkk/tambahdas/" method="post"
                    enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="fotoLama" id="fotoLama">
                    <input type="hidden" name="cvLama" id="cvLama">
                    <div class="form-group">
                        <label for="namalengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namalengkap" name="namalengkap"
                            placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-control" id="jk" name="jk">
                            <option selected>--Pilih Jenis Kelamin--</option>
                            <option value="Laki-laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" aria-label="Default select example" id="jurusan" name="jurusan">
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
                        <label for="notelpwa">No. Telp.</label>
                        <input type="text" class="form-control" id="notelpwa" name="notelpwa" placeholder="No. Telp.">
                    </div>
                    <div class="form-group">
                        <label for="namaperusahaansaatini">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="namaperusahaansaatini" name="namaperusahaansaatini"
                            placeholder="Nama Perusahaan">
                    </div>
                    <div class="form-group">
                        <label for="jabatansaatini">Jabatan saat ini</label>
                        <input type="text" class="form-control" id="jabatansaatini" name="jabatansaatini"
                            placeholder="Jabatan saat ini">
                    </div>
                    <div class="form-group">
                        <label for="uploadfototerbaru">Foto terbaru</label>
                        <input type="file" id="uploadfototerbaru" name="uploadfototerbaru" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled
                                placeholder="Unggah Foto terbaru" accept="image/*">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="uploadcvterbaru">CV terbaru</label>
                        <input type="file" id="uploadcvterbaru" name="uploadcvterbaru" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled
                                placeholder="Unggah CV terbaru">
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
                <form action="<?= BASEURL ?>/bkk/importDatadas" method="post" enctype="multipart/form-data">
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