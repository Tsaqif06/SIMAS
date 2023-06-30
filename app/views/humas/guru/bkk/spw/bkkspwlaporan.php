    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Sekolah Pencetak Wirausaha</h3>
                        <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/bkk/index"> Laman
                                BKK</a> | <span class="text-primary"> SPW </span></h6>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="table" class="table table-hover table-main">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kelas</th>
                                        <th>No Telp</th>
                                        <th>Nama Usaha</th>
                                        <th>Alamat</th>
                                        <th>Kepemilikan Usaha</th>
                                        <th>Sejak Tanggal</th>
                                        <th>Omzet Per-Bulan</th>
                                        <th>Foto diri</th>
                                        <th>Foto Usaha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data['siswa'] as $siswa) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $siswa['nisn']; ?></td>
                                        <td><?= $siswa['namalengkap']; ?></td>
                                        <td><?= $siswa['jk']; ?></td>
                                        <td><?= $siswa['kelas']; ?></td>
                                        <td><?= $siswa['notelp']; ?></td>
                                        <td><?= $siswa['namausaha']; ?></td>
                                        <td><?= $siswa['alamat']; ?></td>
                                        <td><?= $siswa['kepemilikanusaha']; ?></td>
                                        <td><?= $siswa['sejaktgl']; ?></td>
                                        <td><?= $siswa['omzet']; ?></td>
                                        <td><img src="<?= BASEURL; ?>/images/humas/bkk/spw/<?= $siswa['fotodiri']; ?>"
                                                alt="no img" style="width: 65px; height: 65px;"></td>
                                        <td><img src="<?= BASEURL; ?>/images/humas/bkk/spw/<?= $siswa['fotousaha']; ?>"
                                                alt="no img" style="width: 65px; height: 65px;"></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->