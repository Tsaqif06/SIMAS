<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">SURAT MASUK</h3>
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
                    Tambah Data Surat Masuk
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
                                        <th>Nomor Berkas</th>
                                        <th>Alamat Pengirim</th>
                                        <th>Tanggal</th>
                                        <th>Tanggal Surat</th>
                                        <th>Nomor Surat</th>
                                        <th>Perihal</th>
                                        <th>Nomor Petunjuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['suratmasuk'] as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td class="font-weight-medium">
                                                <a href="" class="badge text-bg-success tampilModalUbah" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $row['id'] ?>">
                                                    Edit
                                                </a>
                                                <a href="<?= BASEURL ?>tu/hapusData/suratmasuk/<?= $row['id'] ?>">
                                                    <div class="font-weight-medium pt-2">
                                                        <div class="badge badge-danger delete" onclick="return confirm('Apakah Anda Yakin Mau Menghapus Data?')">Delete</div>
                                                </a>
                                            </td>
                                            <td><?= $row["nomor_berkas"] ?></td>
                                            <td><?= $row["alamat_pengirim"]; ?></td>
                                            <td><?= $row["tanggal"]; ?></td>
                                            <td><?= $row["tanggal_surat"]; ?></td>
                                            <td><?= $row["nomor_surat"]; ?></td>
                                            <td><?= $row["perihal"]; ?></td>
                                            <td><?= $row["nomor_petunjuk"]; ?></td>
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
                        <h1 class="modal-title fs-5" id="modalLabel">Tambah Data Surat Masuk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL ?>tu/tambahData/suratmasuk" method="post">
                            <input type="hidden" name="id" id="id">
                            <div class="mb-3">
                                <label for="nomor_berkas" class="form-label">Nomor Berkas</label>
                                <input type="text" class="form-control" name="nomor_berkas" id="nomor_berkas" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat_pengirim" class="form-label">Alamat Pengirim</label>
                                <input type="text" class="form-control" name="alamat_pengirim" id="alamat_pengirim" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="text" class="form-control" name="tanggal" id="tanggal" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                                <input type="text" class="form-control" name="tanggal_surat" id="tanggal_surat" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_surat" class="form-label">Nomor Surat</label>
                                <input type="text" class="form-control" name="nomor_surat" id="nomor_surat" required>
                            </div>
                            <div class="mb-3">
                                <label for="perihal" class="form-label">Perihal</label>
                                <input type="text" class="form-control" name="perihal" id="perihal" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_petunjuk" class="form-label">Nomor Petunjuk</label>
                                <input type="text" class="form-control" name="nomor_petunjuk" id="nomor_petunjuk" required>
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

<script src="../js/script/tu/suratmasuk.js"></script>