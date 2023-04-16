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
                <button type="button" class="btn btn-primary my-3 tampilModalTambah" data-url="<?= BASEURL ?>/siswa/tambahData" data-bs-toggle="modal" data-bs-target="#modal">
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
                                                <a href="" class="badge text-bg-success tampilModalUbah" style="cursor: pointer;" data-url="<?= BASEURL ?>/siswa/ubahData" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $row['id'] ?>">
                                                    <i class="ti ti-pencil"></i>
                                                </a>
                                                <a href="<?= BASEURL ?>/siswa/hapusData/<?= $row['id'] ?>">
                                                    <div class="font-weight-medium pt-2">
                                                        <div class="badge badge-danger delete" onclick="return confirm('Yakin Ingin Hapus Data?')"><i class="ti ti-trash"></i></div>
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