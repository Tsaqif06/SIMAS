<div class="container mt-5">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tomboltambahdata5" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah data
            </button>
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

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/PKL/caridtPS" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari data" name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolcari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h4>DATA Berkas</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Nisn</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal lahir</th>
                        <th>Jurusan</th>
                        <th>Jenis Kelamin</th>
                        <th>Domisili</th>
                        <th>FOTO Berkas</th>
                        <th>Ebook</th>
                        <th>Bukti Lunas</th>
                    </tr>
                </thead>
                <?php
                foreach ($data['ps'] as $ps) {
                ?>
                    <tr>

                        <td>
                            <div class="mt-3">
                                <a href="<?= BASEURL; ?>/pkl/ubahDTAPS/<?= $ps['id']; ?>" class="btn btn-warning float-right tampildataubah5" data-bs-toggle="modal" data-bs-target="#formModal" data-id=<?= $ps['id']; ?>>Ubah</a>
                                <div class="mt-3">
                                    <a href="<?= BASEURL; ?>/pkl/HapusDataPS/<?= $ps['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda sudah yakin?');">Hapus</a>
                        </td>
        </div>

        <td>
            <?= $ps['nisn_pemberkasan'] ?>
        </td>
        <td>
            <?= $ps['namasiswa_pemberkasan'] ?>
        </td>
        <td>
            <?= $ps['tanggallahir_pemberkasan'] ?>
        </td>
        <td>
            <?= $ps['jurusan_pemberkasan'] ?>
        </td>
        <td>
            <?= $ps['jeniskelamin_pemberkasan'] ?>
        </td>
        <td>
            <?= $ps['domisili_pemberkasann'] ?>
        </td>
        <td>
            <?= $ps['uploadfoto_pemberkasan'] ?>
        </td>
        <td>
            <?= $ps['uploadebookraport_pemberkasan'] ?>
        </td>
        <td>
            <?= $ps['uploadbuktilunas_pemberkasan'] ?>
        </td>

        </tr>
    <?php
                }
    ?>
    </table>

    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="judulModallabel5">Tambah data siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="<?= BASEURL; ?>/PKL/TambahDTAPS" method="post">



                        <input type="hidden" name="id" id="id">


                        <div class="mt-3"></div>

                        <div class="form-group">
                            <label for="nisn_pemberkasan">Nisn</label>
                            <input type="text" class="form-control" id="nisn_pemberkasan" name="nisn_pemberkasan">
                        </div>

                        <div class="form-group">
                            <label for="namasiswa_pemberkasan">Nama Siswa</label>
                            <input type="text" class="form-control" id="namasiswa_pemberkasan" name="namasiswa_pemberkasan">
                        </div>

                        <div class="form-group">
                            <label for="tanggallahir_pemberkasan">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggallahir_pemberkasan" name="tanggallahir_pemberkasan">
                        </div>

                        <div class="form-group mb-3">
                            <label for="jurusan_pemberkasan">Jurusan</label>
                            <select class="form-control" id="jurusan_pemberkasan" name="jurusan_pemberkasan">
                                <option value="Tekhnik Grafika">Tekhnik Grafika</option>
                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                <option value="Logistik">Logistik</option>
                                <option value="Perhotelan">Perhotelan</option>
                                <option value="Mekatronika">Mekatronika</option>
                                <option value="Desain Komunikasi Visual">DKV</option>
                                <option value="Tekhnik Komputer Jaringan">TKJ</option>
                            </select>
                            <div>

                                <div class="form-group">
                                    <label for="jeniskelamin_pemberkasan">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="jeniskelamin_pemberkasan" name="jeniskelamin_pemberkasan">
                                </div>

                                <div class="form-group">
                                    <label for="domisili_pemberkasann">Domisili</label>
                                    <input type="text" class="form-control" id="domisili_pemberkasann" name="domisili_pemberkasann">
                                </div>
                                <div class="form-group">
                                    <label for="uploadfoto_pemberkasan">Pilih Foto Berkas:</label>
                                    <input type="text" class="form-control" id="uploadfoto_pemberkasan" name="uploadfoto_pemberkasan">
                                </div>

                                <div class="form-group">
                                    <label for="uploadebookraport_pemberkasan">Pilih Foto Ebook</label>
                                    <input type="text" class="form-control" id="uploadebookraport_pemberkasan" name="uploadebookraport_pemberkasan">
                                </div>

                                <div class="form-group">
                                    <label for="uploadbuktilunas_pemberkasan">Bukti Lunas</label>
                                    <input type="text" class="form-control" id="uploadbuktilunas_pemberkasan" name="uploadbuktilunas_pemberkasan">
                                </div>


                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>