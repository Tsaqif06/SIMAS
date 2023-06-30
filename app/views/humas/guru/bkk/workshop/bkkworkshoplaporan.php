    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">WORKSHOP</h3>
                        <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/bkk/index"> Laman
                                BKK</a> | <span class="text-primary"> Workshop </span></h6>
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
                                        <th>Penyelenggara</th>
                                        <th>Kegiatan</th>
                                        <th>Tujuan</th>
                                        <th>Peserta</th>
                                        <th>Tanggal Persiapan</th>
                                        <th>Tanggal Dilakukan</th>
                                        <th>Tempat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data['siswa'] as $siswa) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $siswa['penyelenggara']; ?></td>
                                            <td><?= $siswa['kegiatan']; ?></td>
                                            <td><?= $siswa['tujuan']; ?></td>
                                            <td><?= $siswa['peserta']; ?></td>
                                            <td><?= $siswa['tanggalpersiapan']; ?></td>
                                            <td><?= $siswa['tanggaldilakukan']; ?></td>
                                            <td><?= $siswa['tempat']; ?></td>
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
