    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">MoU</h3>
                        <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/bkk/index"> Laman
                                BKK</a> | <span class="text-primary"> MoU </span></h6>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="table" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Dudika</th>
                                        <th>Bidang Kerja Dudika</th>
                                        <th>Tanggal MoU</th>
                                        <th>No. MoU</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    $m = 1;
                                    foreach ($data['siswa'] as $siswa) : ?>
                                        <tr>
                                           
                                            <td><?= $i++ ?></td>
                                            <td><?= $siswa['dudika']; ?></td>
                                            <td><?= $siswa['bidangkerjadudika']; ?></td>
                                            <td><?= $siswa['tglmou']; ?></td>
                                            <td><?= $siswa['no_mou']; ?></td>
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


    