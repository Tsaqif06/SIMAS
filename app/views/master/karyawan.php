<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DATA KARYAWAN</h3>
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
                <button type="button" class="btn btn-primary my-3 tampilModalTambah karyawan" data-bs-toggle="modal" data-bs-target="#modal">
                    Tambah Data Karyawan
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-main">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Aksi</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat Lengkap</th>
                                        <th>Pendidikan Terakhir</th>
                                        <th>Jurusan Pendidikan Terakhir</th>
                                        <th>Nomor HP</th>
                                        <th>Kategori</th>
                                        <th>Status Pernikahan</th>
                                        <th>Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['karyawan'] as $row) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td class="font-weight-medium">
                                                <a href="<?= BASEURL ?>master/ubahData/Karyawan" class="badge text-bg-success tampilModalUbahKaryawan" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $row['id_karyawan'] ?>">
                                                    Edit
                                                </a>
                                                <a href="<?= BASEURL ?>master/hapusData/Karyawan/<?= $row['id_karyawan'] ?>"">
                                                    <div class=" font-weight-medium pt-2">
                                                    <div class="badge badge-danger delete" onclick="return confirm('Apakah Anda Yakin Mau Menghapus Data?')">Delete</div>
                                                </a>
                                            </td>
                                            <td><?= $row["nama_lengkap"] ?></td>
                                            <td><?= $row["jenis_kelamin"]; ?></td>
                                            <td><?= $row["tempat_lahir"]; ?></td>
                                            <td><?= $row["tanggal_lahir"]; ?></td>
                                            <td><?= $row["alamat_lengkap"]; ?></td>
                                            <td><?= $row["pendidikan_terakhir"]; ?></td>
                                            <td><?= $row["jurusan_pendidikan_terakhir"]; ?></td>
                                            <td><?= $row["nomor_hp"]; ?></td>
                                            <td><?= $row["kategori"]; ?></td>
                                            <td><?= $row["status_pernikahan"]; ?></td>
                                            <td><?= $row["foto"]; ?></td>
                                        </tr>
                                        <?php $i++ ?>
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
                        <h1 class="modal-title fs-5" id="modalLabel">Tambah Data Karyawan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL ?>master/tambahData/Karyawan" method="post">
                            <input type="text" name="id_karyawan" id="id_karyawan" value="<?= $row['id_karyawan'] ?>" style="display: none;">
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                <input type="text" class="form-control" name="alamat_lengkap" id="alamat_lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                                <input type="text" class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" required>
                            </div>
                            <div class="mb-3">
                                <label for="jurusan_pendidikan_terakhir" class="form-label">Jurusan Pendidikan Terakhir</label>
                                <input type="text" class="form-control" name="jurusan_pendidikan_terakhir" id="jurusan_pendidikan_terakhir" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_hp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" required>
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" class="form-control" name="kategori" id="kategori" required>
                            </div>
                            <div class="mb-3">
                                <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
                                <input type="text" class="form-control" name="status_pernikahan" id="status_pernikahan" required>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="text" class="form-control" name="foto" id="foto" required>
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

<script src="../js/script/karyawan.js"></script>