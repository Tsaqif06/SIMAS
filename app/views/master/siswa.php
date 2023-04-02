<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DATA SISWA</h3>
                        <h6 class="font-weight-normal mb-0">WEB DEV | SIMAS</h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Hari ini (11 Mar 2023)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
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
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary my-3 tampilModalTambah" data-url="<?= BASEURL ?>master/tambahData/siswa" data-bs-toggle="modal" data-bs-target="#modal">
                    Tambah Data Siswa
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-main">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Aksi</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Jalur</th>
                                        <th>Jurusan</th>
                                        <th>Alamat</th>
                                        <th>No. HP Siswa</th>
                                        <th>Ayah</th>
                                        <th>Ibu</th>
                                        <th>No. HP Orangtua</th>
                                        <th>Wali</th>
                                        <th>No. HP Wali</th>
                                        <th>Tahun Diterima</th>
                                        <th>Agama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Kelas</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Usia Sekarang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['siswa'] as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td class="font-weight-medium">
                                                <a href="" class="badge text-bg-success tampilModalUbah" style="cursor: pointer;" data-url="<?= BASEURL ?>master/ubahData/Siswa" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $row['id_siswa'] ?>">
                                                    Edit
                                                </a>
                                                <a href="<?= BASEURL ?>master/hapusData/Siswa/<?= $row['id_siswa'] ?>">
                                                    <div class="font-weight-medium pt-2">
                                                        <div class="badge badge-danger delete" onclick="return confirm('Yakin Ingin Hapus Data?')">Delete</div>
                                                </a>
                                            </td>
                                            <td><?= $row["nisn"] ?></td>
                                            <td><?= $row["nama_siswa"] ?></td>
                                            <td><?= $row["jalur"] ?></td>
                                            <td><?= $row["jurusan"] ?></td>
                                            <td><?= $row["alamat"] ?></td>
                                            <td><?= $row["nomor_hp_siswa"] ?></td>
                                            <td><?= $row["ayah"] ?></td>
                                            <td><?= $row["ibu"] ?></td>
                                            <td><?= $row["nomor_hp_orangtua"] ?></td>
                                            <td><?= $row["wali"] ?></td>
                                            <td><?= $row["nomor_hp_wali"] ?></td>
                                            <td><?= $row["tahun_diterima"] ?></td>
                                            <td><?= $row["agama"] ?></td>
                                            <td><?= $row["jenis_kelamin"] ?></td>
                                            <td><?= $row["tempat_lahir"] ?></td>
                                            <td><?= $row["kelas"] ?></td>
                                            <td><?= $row["tanggal_lahir"] ?></td>
                                            <td><?= $row["usia_sekarang"] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalLabel">Tambah Data Siswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL ?>master/tambahData/Siswa" method="post">
                            <input type="hidden" name="id_siswa" id="id_siswa">
                            <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" class="form-control" name="nisn" id="nisn" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" required>
                            </div>
                            <div class="mb-3">
                                <label for="jalur" class="form-label">Jalur</label>
                                <select class="form-select" required>
                                    <option selected disabled>Open this select menu</option>
                                    <option value="Prestasi Akademik">Prestasi Akademik</option>
                                    <option value="Prestasi Non-Akademik">Prestasi Non-Akademik</option>
                                    <option value="Afirmasi">Afirmasi</option>
                                    <option value="Perpindahan Orang Tua">Perpindahan Orang Tua</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <select class="form-select" name="jurusan" id="jurusan" required>
                                    <option selected disabled>Open this select menu</option>
                                    <?php foreach ($data['kompkeahlian'] as $row) : ?>
                                        <option value="<?= $row['kode_kompkeahlian'] ?>"><?= $row['kode_kompkeahlian'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_hp_siswa" class="form-label">No. HP Siswa</label>
                                <input type="text" class="form-control" name="nomor_hp_siswa" id="nomor_hp_siswa" required>
                            </div>
                            <div class="mb-3">
                                <label for="ayah" class="form-label">Ayah</label>
                                <input type="text" class="form-control" name="ayah" id="ayah" required>
                            </div>
                            <div class="mb-3">
                                <label for="ibu" class="form-label">Ibu</label>
                                <input type="text" class="form-control" name="ibu" id="ibu" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_hp_orangtua" class="form-label">No. HP Orangtua</label>
                                <input type="text" class="form-control" name="nomor_hp_orangtua" id="nomor_hp_orangtua" required>
                            </div>
                            <div class="mb-3">
                                <label for="wali" class="form-label">Wali</label>
                                <input type="text" class="form-control" name="wali" id="wali" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_hp_wali" class="form-label">No. HP Wali</label>
                                <input type="text" class="form-control" name="nomor_hp_wali" id="nomor_hp_wali" required>
                            </div>
                            <div class="mb-3">
                                <label for="tahun_diterima" class="form-label">Tahun Diterima</label>
                                <input type="text" class="form-control" name="tahun_diterima" id="tahun_diterima" required>
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select class="form-select" name="agama" id="agama" required>
                                    <option selected disabled>Open this select menu</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" required>
                                    <option selected disabled>Open this select menu</option>
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" class="form-control" name="kelas" id="kelas" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="usia_sekarang" class="form-label">Usia Sekarang</label>
                                <input type="text" class="form-control" name="usia_sekarang" id="usia_sekarang" required>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="../js/script/master/siswa.js"></script>