<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DATA MAPEL</h3>
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
                    Tambah Data Mapel
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
                                        <th>Kode Mapel</th>
                                        <th>Nama Mapel</th>
                                        <th>kurikulum</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['mapel'] as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td class="font-weight-medium">
                                                <a href="" class="badge text-bg-success tampilModalUbah" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $row['id_mapel'] ?>">
                                                    Edit
                                                </a>
                                                <a href="<?= BASEURL ?>master/hapusData/mapel/<?= $row['id_mapel'] ?>">
                                                    <div class=" font-weight-medium pt-2">
                                                        <div class="badge badge-danger delete" onclick="return confirm('Apakah Anda Yakin Mau Menghapus Data?')">Delete</div>
                                                </a>
                                            </td>
                                            <td><?= $row["kode_mapel"]; ?></td>
                                            <td><?= $row["nama_mapel"] ?></td>
                                            <td><?= $row["kurikulum"] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>d
            </div>
        </div>





        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalLabel">Tambah Data Mapel</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL ?>master/tambahData/mapel" method="post">
                            <input type="text" name="id_mapel" id="id_mapel">
                            <div class="mb-3">
                                <label for="kode_mapel" class="form-label">Kode Mapel</label>
                                <input type="text" class="form-control" name="kode_mapel" id="kode_mapel" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_mapel" class="form-label">Nama Mapel</label>
                                <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" required>
                            </div>
                            <div class="mb-3">
                                <label for="kurikulum" class="form-label">Kurikulum</label>
                                <input type="text" class="form-control" name="kurikulum" id="kurikulum" required>
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

<script src="../js/script/master/mapel.js"></script>