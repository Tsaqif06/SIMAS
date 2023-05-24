    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Peminatan</h3>
                        <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/bkk/index"> Laman
                                BKK</a> | <span class="text-primary"> Peminatan </span></h6>
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
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kelas</th>
                                        <th>Domisili</th>
                                        <th>Alamat</th>
                                        <th>No. Telp</th>
                                        <th>Rencana setelah lulus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data['siswa'] as $siswa) : ?>
                                        <tr>
                                            
                                            </td>
                                            <td><?= $i++; ?></td>
                                            <td><?= $siswa['nama']; ?></td>
                                            <td><?= $siswa['jeniskelamin']; ?></td>
                                            <td><?= $siswa['kelas']; ?></td>
                                            <td><?= $siswa['domisili']; ?></td>
                                            <td><?= $siswa['alamat']; ?></td>
                                            <td><?= $siswa['nohp']; ?></td>
                                            <td><?= $siswa['rencanasetelahlulus']; ?></td>

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

