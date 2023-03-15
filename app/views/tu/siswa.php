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
                <button type="button" class="btn btn-primary my-3 tampilModalTambah" data-bs-toggle="modal" data-bs-target="#modal">
                    Tambah Data Siswa
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
                                        <th>Aksi</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Ibu</th>
                                        <th>Ayah</th>
                                        <th>Jurusan</th>
                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['siswa'] as $row) : ?>
                                        <tr>
                                            <td class="font-weight-medium">
                                                <a href="<?= BASEURL ?>tu/ubahDataSiswa" class="badge text-bg-success tampilModalUbahSiswa" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modal" data-nisn="<?= $row['nisn'] ?>">
                                                    Edit
                                                </a>
                                                <a href="<?= BASEURL ?>tu/hapusDataSiswa/<?= $row['nisn'] ?>"">
                                                    <div class=" font-weight-medium pt-2">
                                                    <div class="badge badge-danger delete" onclick="return confirm('Yakin Ingin Hapus Data?')">Delete</div>
                                                </a>
                                            </td>
                                            <td><?= $row["nisn"] ?></td>
                                            <td><?= $row["nama"]; ?></td>
                                            <td><?= $row["kelamin"]; ?></td>
                                            <td><?= $row["alamat"]; ?></td>
                                            <td><?= $row["ibu"]; ?></td>
                                            <td><?= $row["ayah"]; ?></td>
                                            <td><?= $row["jurusan"]; ?></td>
                                            <td><?= $row["kelas"]; ?></td>
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
                        <form action="<?= BASEURL ?>tu/tambahDataSiswa" method="post">
                            <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" class="form-control" name="nisn" id="nisn" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="kelamin" class="form-label">Kelamin</label>
                                <input type="text" class="form-control" name="kelamin" id="kelamin" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" required>
                            </div>
                            <div class="mb-3">
                                <label for="ibu" class="form-label">Ibu</label>
                                <input type="text" class="form-control" name="ibu" id="ibu" required>
                            </div>
                            <div class="mb-3">
                                <label for="ayah" class="form-label">Ayah</label>
                                <input type="text" class="form-control" name="ayah" id="ayah" required>
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" class="form-control" name="jurusan" id="jurusan" required>
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" class="form-control" name="kelas" id="kelas" required>
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