    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Lowongan Pekerjaan</h3>
                        <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/bkk/index"> Laman
                                BKK</a> | <span class="text-primary"> Lowongan Pekerjaan </span></h6>
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
                                        <th>Nama Perusahaan</th>
                                        <th>Jurusan</th>
                                        <th>Profesi</th>
                                        <th>Kriteria</th>
                                        <th>Kontak</th>
                                        <th>Foto Loker</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data['siswa'] as $siswa) : ?>
                                    <tr>
                                        
                                        <td><?= $no++; ?></td>
                                        <td><?= $siswa['namaperusahaan']; ?></td>
                                        <td><?= $siswa['untukjurusan']; ?></td>
                                        <td><?= $siswa['profesiygdibutuhkan']; ?></td>
                                        <td><?= $siswa['kriteriaprofesi']; ?></td>
                                        <td><?= $siswa['kontakperusahaan']; ?></td>
                                        <td><img src="<?= BASEURL; ?>/images/humas/bkk/loker/<?= $siswa['upfotoloker']; ?>"
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
    