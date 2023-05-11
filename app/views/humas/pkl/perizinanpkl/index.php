<div class="container mt-5">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tomboltambahdata8" data-bs-toggle="modal" data-bs-target="#formModal">
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
                    <form action="<?= BASEURL ?>/pkl/importDataiz" method="post" enctype="multipart/form-data">
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
            <form action="<?= BASEURL; ?>/PKL/caridtIZ" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari data" name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolcari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h4>Perizinan</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Nisn</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Nama Perusahaan</th>
                        <th>Hal Izin</th>
                        <th>Dari Tanggal</th>
                        <th>Hingga Tanggal</th>
                    </tr>
                </thead>
                <?php
                foreach ($data['iz'] as $iz) {
                ?>
                    <tr>

                        <td>
                            <div class="mt-3">
                                <a href="<?= BASEURL; ?>/pkl/ubahDTAIZ/<?= $iz['id']; ?>" class="btn btn-warning float-right tampildataubah8" data-bs-toggle="modal" data-bs-target="#formModal" data-id=<?= $iz['id']; ?>>Ubah</a>
                                <div class="mt-3">
                                    <a href="<?= BASEURL; ?>/pkl/HapusDataIZ/<?= $iz['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda sudah yakin?');">Hapus</a>
                        </td>
        </div>

        <td>
            <?= $iz['nisn'] ?>
        </td>
        <td>
            <?= $iz['nama'] ?>
        </td>
        <td>
            <?= $iz['kelas'] ?>
        </td>
        <td>
            <?= $iz['namaperusahaan'] ?>
        </td>
        <td>
            <?= $iz['halizin'] ?>
        </td>
        <td>
            <?= $iz['drtanggal'] ?>
        </td>
        <td>
            <?= $iz['hgtanggal'] ?>
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
                    <h1 class="modal-title fs-5" id="judulModallabel8">Tambah data siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="<?= BASEURL; ?>/PKL/TambahDTAIZ" method="post">



                        <input type="hidden" name="id" id="id">


                        <div class="mt-3"></div>

                        <div class="form-group">
                            <label for="nisn">Nisn</label>
                            <input type="text" class="form-control" id="nisn" name="nisn">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas">
                        </div>
                        <div class="form-group">
                            <label for="namaperusahaan">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan">
                        </div>
                        <div class="form-group">
                            <label for="halizin">Hal Izin</label>
                            <input type="text" class="form-control" id="halizin" name="halizin">
                        </div>
                        <div class="form-group">
                            <label for="drtanggal">Dari Tanggal</label>
                            <input type="Date" class="form-control" id="drtanggal" name="drtanggal">
                        </div>
                        <div class="form-group">
                            <label for="hgtanggal">Hingga Tanggal</label>
                            <input type="Date" class="form-control" id="hgtanggal" name="hgtanggal">
                        </div>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>