    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DATA ABSEN</h3>
                        <h6 class="font-weight-normal mb-0">WEB DEV | SIMAS</h6>
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
                <button type="button" class="btn btn-primary my-3 tampilModalTambah" data-url="<?= BASEURL ?>/kehadiran/tambahData" data-bs-toggle="modal" data-bs-target="#modal">
                    Tambah Data Absen
                </button>
                <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-bs-toggle="modal" data-bs-target="#modalImport">
                    Import Data Dari Excel
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Aksi</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Lokasi</th>
                                        <th>Waktu Absen</th>
                                        <th>Keterangan</th>
                                        <th>Lihat Bukti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['kehadiran'] as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td class="font-weight-medium">
                                                <a href="" class=" tampilModalUbah" style="cursor: pointer;" data-url="<?= BASEURL ?>/kehadiran/ubahData" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $row['id'] ?>">
                                                <button class="button-arounder">
                          <span class="material-symbols-outlined"> edit </span>
                        </button>
                                                </a>
                                                <a href="<?= BASEURL ?>/kehadiran/hapusData/<?= $row['id'] ?>">
                                                    <div class=" font-weight-medium pt-2">
                                                    <button class="button-arounder">
                          <span class="material-symbols-outlined"> delete </span>
                        </button>
                                                </a>
                                            </td>
                                            <td> <?= $row['nisn'] ?></td>
                                            <td> <?= $row['nama'] ?> </td>
                                            <td> <?= $row['lokasi'] ?> </td>
                                            <td> <?= $row['attend_at'] ?> </td>
                                            <td><button type="button" class="btn btn-<?= $row['bs-class'] ?> btn-rounded btn-fw"><?= $row['keterangan'] ?></button>
                                            </td>
                                            <td><button type="button" class="btn btn-inverse-success btn-fw">Lihat
                                                    Bukti</button></td>
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