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
                <button type="button" class="btn btn-primary my-3 tampilModalTambah" data-url="<?= BASEURL ?>/karyawan/tambahData" data-bs-toggle="modal" data-bs-target="#modal">
                    Tambah Data Karyawan
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
                                        <th>Foto</th>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['karyawan'] as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td class="font-weight-medium">
                                                <a href="" class="badge text-bg-success tampilModalUbah" style="cursor: pointer;" data-url="<?= BASEURL ?>/karyawan/ubahData" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $row['id'] ?>">
                                                    <i class="ti ti-pencil"></i>
                                                </a>
                                                <a href="<?= BASEURL ?>/karyawan/hapusData/<?= $row['id'] ?>">
                                                    <div class="font-weight-medium pt-2">
                                                        <div class="badge badge-danger delete" onclick="return confirm('Apakah Anda Yakin Mau Menghapus Data?')"><i class="ti ti-trash"></i></div>
                                                </a>
                                            </td>
                                            <?php if (file_exists("images/datafoto/{$row["foto"]}")) : ?>
                                                <td><img src="images/datafoto/<?= $row["foto"]; ?>" class="data-img" style="width: 65px; height: 65px;"></td>
                                            <?php else : ?>
                                                <td><img src="images/datafoto/pp.png" class="data-img" style="width: 65px; height: 65px;"></td>
                                            <?php endif; ?>
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
                        <h1 class="modal-title fs-5" id="modalLabel">Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">