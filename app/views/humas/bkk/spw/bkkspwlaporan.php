    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Sekolah Pencetak Wirausaha</h3>
                        <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/bkk/index"> Laman
                                BKK</a> | <span class="text-primary"> SPW </span></h6>
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
                    <button type="button " class="btn btn-primary tombolTambahDataSpw" data-toggle="modal"
                        data-target="#formModal">Tambah Data</button>
                    <button type="button" class="btn btn-primary tampilModalImport" data-toggle="modal"
                        data-target="#modalImport">
                        Import Data Dari Excel
                    </button>
                </div>
            </div>

            <div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalLabel">Import Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL ?>/bkk/importDataspw" method="post" enctype="multipart/form-data">
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
            <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModalLabelSpw">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL; ?>/bkk/tambahspw/" method="post" class="forms-sample"
                                enctype="multipart/form-data">

                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="fdiriLama" id="fdiriLama">
                                <input type="hidden" name="fprodukLama" id="fprodukLama">

                                <div class="form-group">
                                    <label for="nisn">NISN</label>
                                    <input type="number" class="form-control" id="nisn" name="nisn" placeholder="NISN">
                                </div>
                                <div class="form-group">
                                    <label for="namalengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="namalengkap" name="namalengkap"
                                        placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select class="form-control" id="jk" name="jk">
                                        <option selected>--Pilih Jenis Kelamin--</option>
                                        <option value="Laki-laki">Laki - laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas">
                                </div>
                                <div class="form-group">
                                    <label for="notelp">No. Telp.</label>
                                    <input type="text" class="form-control" id="notelp" name="notelp"
                                        placeholder="No Telp">
                                </div>
                                <div class="form-group">
                                    <label for="namausaha">Nama Usaha</label>
                                    <input type="text" class="form-control" id="namausaha" name="namausaha"
                                        placeholder="Nama Usaha">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label for="kepemilikanusaha">Kepemilikan Usaha</label>
                                    <input type="text" class="form-control" id="kepemilikanusaha"
                                        name="kepemilikanusaha" placeholder="Kepemilikan Usaha">
                                </div>
                                <div class="form-group">
                                    <label for="sejaktgl">Sejak Tanggal</label>
                                    <input type="date" class="form-control" id="sejaktgl" name="sejaktgl">
                                </div>
                                <div class="form-group">
                                    <label for="omzet">Omzet Per-Bulan</label>
                                    <input type="text" class="form-control" id="omzet" name="omzet"
                                        placeholder="Omzet Per-Bulan">
                                </div>
                                <div class="form-group">
                                    <label for="fotodiri">Foto Diri Sendiri</label>
                                    <input type="file" class="file-upload-default" id="fotodiri" name="fotodiri">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                            placeholder="Unggah Foto Diri Sendiri">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Unggah</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fotousaha">Foto Produk Usaha</label>
                                    <input type="file" class="file-upload-default" id="fotousaha" name="fotousaha">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                            placeholder="Unggah Foto Produk Usaha">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Unggah</button>
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
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kelas</th>
                                        <th>No Telp</th>
                                        <th>Nama Usaha</th>
                                        <th>Alamat</th>
                                        <th>Kepemilikan Usaha</th>
                                        <th>Sejak Tanggal</th>
                                        <th>Omzet Per-Bulan</th>
                                        <th>Foto diri</th>
                                        <th>Foto Usaha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data['siswa'] as $siswa) : ?>
                                    <tr>

                                        <td>
                                            <!-- <a href = "<?= BASEURL; ?>/bkk/detailspw/<?= $siswa['id']; ?>" class="badge badge-info" style="text-decoration: none;"><i class="mdi mdi-information-variant"></i></a> -->
                                            <a data-url="<?= BASEURL; ?>/bkk/ubahspw/<?= $siswa['id']; ?>"
                                                class="badge badge-success tampilModalEditSpw" data-toggle="modal"
                                                data-target="#formModal" data-id="<?= $siswa['id']; ?>"><i
                                                    class="mdi mdi-lead-pencil"></i></a>
                                            <a href="<?= BASEURL; ?>/bkk/hapusspw/<?= $siswa['id']; ?>"
                                                class="badge badge-danger" style="text-decoration: none;"><i
                                                    class="mdi mdi-delete"></i></a>
                                        </td>
                                        <td><?= $i++ ?></td>
                                        <td><?= $siswa['nisn']; ?></td>
                                        <td><?= $siswa['namalengkap']; ?></td>
                                        <td><?= $siswa['jk']; ?></td>
                                        <td><?= $siswa['kelas']; ?></td>
                                        <td><?= $siswa['notelp']; ?></td>
                                        <td><?= $siswa['namausaha']; ?></td>
                                        <td><?= $siswa['alamat']; ?></td>
                                        <td><?= $siswa['kepemilikanusaha']; ?></td>
                                        <td><?= $siswa['sejaktgl']; ?></td>
                                        <td><?= $siswa['omzet']; ?></td>
                                        <td><img src="<?= BASEURL; ?>/images/humas/bkk/spw/<?= $siswa['fotodiri']; ?>"
                                                alt="no img" style="width: 65px; height: 65px;"></td>
                                        <td><img src="<?= BASEURL; ?>/images/humas/bkk/spw/<?= $siswa['fotousaha']; ?>"
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