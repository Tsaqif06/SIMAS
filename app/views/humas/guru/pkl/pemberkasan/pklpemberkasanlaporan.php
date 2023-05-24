<!-- partial -->
<!-- <div class="main-panel"> -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <div class="row">
                    <div class="col-12 grid-margin">
                        <h3 class="font-weight-bold">PEMBERKASAN PKL</h3>
                        <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/pkl/index"> Laman
                                PKL</a> | <span class="text-primary"> Pemberkasan </span></h6>
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
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jurusan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Domisili</th>
                                        <th>Ingin Prakerin di Kota</th>
                                        <th>Foto 3 : 4</th>
                                        <th>Surat Pernyataan Bermaterai</th>
                                        <th>Kartu Pelajar</th>
                                        <th>E- book rapor</th>
                                        <th>Bukti Lunas Nilai</th>
                                        <th>Bukti Lunas Administrasi</th>
                                        <th>Bukti Lunas Perpustakaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                  foreach ($data['siswa'] as $siswa) : ?>
                                    <tr>
                                       
                                        <td><?= $no++ ?></td>
                                        <td><?= $siswa['nisn_pemberkasan']; ?></td>
                                        <td><?= $siswa['nis_pemberkasan']; ?></td>
                                        <td><?= $siswa['namasiswa_pemberkasan']; ?></td>
                                        <td><?= $siswa['tanggallahir_pemberkasan']; ?></td>
                                        <td><?= $siswa['jurusan_pemberkasan']; ?></td>
                                        <td><?= $siswa['jeniskelamin_pemberkasan']; ?></td>
                                        <td><?= $siswa['domisili_pemberkasann']; ?></td>
                                        <td><?= $siswa['pkldimana_pemberkasan']; ?></td>
                                        <td><img src="<?= BASEURL; ?>/images/humas/pkl/pemberkasan/foto/<?= $siswa['uploadfoto_pemberkasan']; ?>"
                                                alt="no img" style="width: 65px; height: 65px;"></td>
                                        <td><img src="<?= BASEURL; ?>/images/humas/pkl/pemberkasan/surat/<?= $siswa['uploadsurat_pemberkasan']; ?>"
                                                alt="no img" style="width: 65px; height: 65px;"></td>
                                        <td><img src="<?= BASEURL; ?>/images/humas/pkl/pemberkasan/kartupelajar/<?= $siswa['uploadkartupelajar_pemberkasan']; ?>"
                                                alt="no img" style="width: 65px; height: 65px;"></td>
                                        <!-- <td><img src="<?= BASEURL; ?>/assets/raport/<?= $siswa['uploadebookraport_pemberkasan']; ?>" alt="no img" style="width: 65px; height: 65px;"></td> -->
                                        <td><a href="<?= BASEURL; ?>/assets/raport/<?= $siswa['uploadebookraport_pemberkasan']; ?>"
                                                class="badge badge-primary btn-icon-text" target="_blank"><i
                                                    class="ti-file btn-icon-prepend"></i> Lihat Raport </a></td>
                                                    <!-- <td><a href="<?= BASEURL ?>/pkl/raportpemberkasan/<?= $siswa['id']; ?>"
                                                class="badge badge-primary btn-icon-text"><i
                                                    class="ti-download btn-icon-prepend"></i> Unduh Raport </a></td>     -->
                                        <td><img src="<?= BASEURL; ?>/images/humas/pkl/pemberkasan/buktilunasnilai/<?= $siswa['uploadbuktilunasnilai_pemberkasan']; ?>"
                                                alt="no img" style="width: 65px; height: 65px;"></td>
                                        <td><img src="<?= BASEURL; ?>/images/humas/pkl/pemberkasan/buktilunasadm/<?= $siswa['uploadbuktilunasadministrasi_pemberkasan']; ?>"
                                                alt="no img" style="width: 65px; height: 65px;"></td>
                                        <td><img src="<?= BASEURL; ?>/images/humas/pkl/pemberkasan/buktilunasperpus/<?= $siswa['uploadbuktilunasperpus_pemberkasan']; ?>"
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