<div class="collapse" id="form-elements">
    <ul class="nav flex-column sub-menu">
        <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/pkl/index">PKL</a></li>
        <div class="collapse" id="form-elements">
            <div class="navsubitem">
                <a class="nav-link" href="<?= BASEURL; ?>/pkl/rekap">Rekap PKL</a>
                <a class="nav-link" href="<?= BASEURL; ?>/pkl/pembekalan">Pembekalan PKL</a>
                <a class="nav-link" href="<?= BASEURL; ?>/pkl/pemberkasan">Pemberkasan</a>
                <a class="nav-link" href="<?= BASEURL; ?>/pkl/prakerin">Prakerin</a>
                <a class="nav-link" href="<?= BASEURL; ?>/pkl/nilai">Nilai PKL</a>
                <a class="nav-link" href="<?= BASEURL; ?>/pkl/dtampung">Daya Tampung</a>
            </div>
            <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/bkk/index">BKK</a></li>
            <div class="navsubitem">
                <a class="nav-link" href="<?= BASEURL; ?>/bkk/das">Alumni Sukses</a>
                <a class="nav-link" href="<?= BASEURL; ?>/bkk/mou">MoU</a>
                <a class="nav-link" href="<?= BASEURL; ?>/bkk/peminatan">Peminatan</a>
                <a class="nav-link" href="<?= BASEURL; ?>/bkk/workshop">Workshop</a>
                <a class="nav-link" href="<?= BASEURL; ?>/bkk/kebekerjaan">Kebekerjaan</a>
                <a class="nav-link" href="<?= BASEURL; ?>/bkk/spw">SPW</a>
                <a class="nav-link" href="<?= BASEURL; ?>/bkk/lomba">Lomba</a>
                <a class="nav-link" href="<?= BASEURL; ?>/bkk/loker">Lowongan Kerja</a>
            </div>
            <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/ict/index">ICT</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/stiru/index">Studi Tiru</a></li>
    </ul>
</div>
</li>
</ul>
</nav>

<div class="container mt-5">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tomboltambahdata" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah data siswa
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
                    <form action="<?= BASEURL ?>/pkl/importData" method="post" enctype="multipart/form-data">
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
            <form action="<?= BASEURL; ?>/pkl/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari data.." name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolcari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h4>DAFTAR SISWA YANG DIANGKAT SEBAGAI PEGAWAI</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Nisn</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Nama Perusahaan</th>
                    </tr>
                </thead>
                <?php
                foreach ($data['pg'] as $row) {
                ?>
                    <tr>

                        <td>
                            <div class="mt-3">
                                <a href="<?= BASEURL; ?>/pkl/ubah/<?= $row['id']; ?>" class="btn btn-warning float-right tampildataubah" data-bs-toggle="modal" data-bs-target="#formModal" data-id=<?= $row['id']; ?>>Ubah</a>
                                <div class="mt-3">
                                    <a href="<?= BASEURL; ?>/pkl/hapus/<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda sudah yakin?');">Hapus</a>
                        </td>
        </div>

        <td><?= $row['nisn'] ?></td>
        <td><?= $row['namasiswa'] ?></td>
        <td><?= $row['kelas'] ?></td>
        <td><?= $row['jurusan'] ?></td>
        <td><?= $row['namaperusahaan'] ?></td>

        </tr>
    <?php
                }
    ?>
    </table>

    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="judulModallabel">Tambah data siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="<?= BASEURL; ?>/Pkl/tambahdata" method="post">



                        <input type="hidden" name="id" id="id">


                        <div class="form-group">
                            <label for="nisn"> Nisn</label>
                            <input type="text" class="form-control" id="nisn" name="nisn">
                        </div>
                        <div class="form-group">
                            <label for="namasiswa">Nama Siswa</label>
                            <input type="text" class="form-control" id="namasiswa" name="namasiswa">
                        </div>

                        <div class="mt-3"></div>

                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas">
                        </div>



                        <div class="form-group mb-3">
                            <label for="Jurusan">Jurusan</label>
                            <select class="form-control" id="jurusan" name="jurusan">
                                <option value="Tekhnik Grafika">Tekhnik Grafika</option>
                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                <option value="Logistik">Logistik</option>
                                <option value="Perhotelan">Perhotelan</option>
                                <option value="Mekatronika">Mekatronika</option>
                                <option value="Desain Komunikasi Visual">DKV</option>
                                <option value="Tekhnik Komputer Jaringan">TKJ</option>
                                <div>


                            </select>
                            <div class="form-group mt-3" style="margin-top : 10px">
                                <label for="namaperusahaan">Nama Perusahaan</label>
                                <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan" </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>