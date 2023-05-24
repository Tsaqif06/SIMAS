    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DATA ALUMNI SUKSES</h3>
                        <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/bkk/index"> Laman
                                BKK</a> | <span class="text-primary"> Alumni Sukses </span></h6>
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
                                        <th>Nama Lengkap</th>
                                        <th>Jurusan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No. Telp.</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Jabatan saat ini</th>
                                        <th>Foto Terbaru</th>
                                        <th>CV Terbaru</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data['siswa'] as $siswa) : ?>
                                    <tr>
                                        
                                        <td><?= $no++; ?></td>
                                        <td><?= $siswa['namalengkap']; ?></td>
                                        <td><?= $siswa['jurusan']; ?></td>
                                        <td><?= $siswa['jk']; ?></td>
                                        <td><?= $siswa['notelpwa']; ?></td>
                                        <td><?= $siswa['namaperusahaansaatini']; ?></td>
                                        <td><?= $siswa['jabatansaatini']; ?></td>
                                        <td><img src="<?= BASEURL; ?>/images/humas/bkk/das/<?= $siswa['uploadfototerbaru']; ?>"
                                                alt="no img" style="width: 65px; height: 65px;"></td>
                                        <td><img src="<?= BASEURL; ?>/images/humas/bkk/das/<?= $siswa['uploadcvterbaru']; ?>"
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
