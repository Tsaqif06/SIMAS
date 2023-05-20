<!-- partial -->
<div class="content-wrapper">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Selamat Datang, <?= $data['user']['username'] ?>!</h3>
                    <h6 class="font-weight-normal mb-0">Web Admin SMKN 4 Malang | <span
                            class="text-primary">SIMAS</span></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin transparent">
            <div class="row">
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p>
                            <h4><i class="mdi mdi-account-multiple mx-2"></i>Jumlah Siswa</h4>
                            </p>
                            <br>
                            <p class="fs-30 mb-2"><?= $data['jmlSiswa'] ?></p>
                            <p>April 2023</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p>
                            <h4><i class="mdi mdi-account-multiple mx-2"></i>Jumlah Guru</h4>
                            </p>
                            <br>
                            <p class="fs-30 mb-2"><?= $data['jmlGuru'] ?></p>
                            <p>April 2023</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p>
                            <h4><i class="mdi mdi-account-multiple mx-2"></i>Jumlah Karyawan</h4>
                            </p>
                            <br>
                            <p class="fs-30 mb-2"><?= $data['jmlKaryawan'] ?></p>
                            <p>April 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--CHARTS PELANGGARAN-->
        <!-- <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                            <div class="ml-xl-4 mt-3">
                                                <p class="card-title">Pelanggaran Siswa</p>
                                                <h2 class="text-primary">April 2023</h2>
                                                <h4 class="font-weight-500 mb-xl-4 text-primary">Minggu Pertama</h4>
                                                <p class="mb-2 mb-xl-0">Total pelanggaran siswa SMKN 4 Malang tahun
                                                    2023 bulan April pada mingggu pertama.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-9">
                                            <div class="row">
                                                <div class="col-md-6 border-right">
                                                    <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                        <table class="table table-borderless report-table">
                                                            <tr>
                                                                <td class="text-muted">Terlambat</td>
                                                                <td class="w-100 px-0">
                                                                    <div class="progress progress-md mx-4">
                                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 97%" aria-valuenow="97%" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h5 class="font-weight-bold mb-0">1100</h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Merokok</td>
                                                                <td class="w-100 px-0">
                                                                    <div class="progress progress-md mx-4">
                                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h5 class="font-weight-bold mb-0">583</h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Kerapian</td>
                                                                <td class="w-100 px-0">
                                                                    <div class="progress progress-md mx-4">
                                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h5 class="font-weight-bold mb-0">924</h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Alpha</td>
                                                                <td class="w-100 px-0">
                                                                    <div class="progress progress-md mx-4">
                                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h5 class="font-weight-bold mb-0">664</h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Kelakuan</td>
                                                                <td class="w-100 px-0">
                                                                    <div class="progress progress-md mx-4">
                                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h5 class="font-weight-bold mb-0">560</h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Alaska</td>
                                                                <td class="w-100 px-0">
                                                                    <div class="progress progress-md mx-4">
                                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h5 class="font-weight-bold mb-0">793</h5>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <canvas id="north-america-chart"></canvas>
                                                    <div id="north-america-legend"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-3">Struktur Organisasi</p>
                        <div class="table-responsive">
                            <table id="print" class="table table-striped table-borderless table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 30%;">Nama</th>
                                        <th style="width: 28%;">Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['struktur_organisasi'] as $struktur): ?>
                                    <tr>
                                        <td>
                                            <?= $i++; ?>
                                        </td>
                                        <td>
                                            <?= $struktur['nama'] ?>
                                        </td>
                                        <td>
                                            <?= $struktur['jabatan'] ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!--CAROUSEL GALERI-->
            <div class="slider">
                <div class="slide active">
                    <img src="<?= BASEURL ?>/images/foto_galeri/workshop.jpeg"
                        alt="Workshop Pemanfaatan Energizer Dalam Proses Pembelajaran">
                    <div class="info">
                        <h4><b>Kegiatan</b></h4>
                        <h5>Workshop Pemanfaatan Energizer Dalam Proses Pembelajaran</h5>
                    </div>
                </div>
                <div class="slide">
                    <img src="<?= BASEURL ?>/images/foto_galeri/rapat.jpeg" alt="Rapat Dinas Dan Sosialisasi E-Kinerja">
                    <div class="info">
                        <h4><b>Kegiatan</b></h4>
                        <h5>Rapat Dinas Dan Sosialisasi E-Kinerja</h5>
                    </div>
                </div>
                <div class="slide">
                    <img src="<?= BASEURL ?>/images/foto_galeri/sagusaya.jpeg" alt="Sagusaya (Satu Guru Satu Karya)">
                    <div class="info">
                        <h4><b>Kegiatan</b></h4>
                        <h5>Sagusaya (Satu Guru Satu Karya)</h5>
                    </div>
                </div>
                <div class="slide">
                    <img src="<?= BASEURL ?>/images/foto_galeri/softskill.jpeg" alt="Softskil Guru">
                    <div class="info">
                        <h4><b>Kegiatan</b></h4>
                        <h5>Softskil Bapak/Ibu Guru</h5>
                    </div>
                </div>
                <div class="navigation">
                    <i class="fas fa-chevron-left prev-btn"></i>
                    <i class="fas fa-chevron-right next-btn"></i>
                </div>
                <div class="navigation-visibility">
                    <div class="slide-icon active"></div>
                    <div class="slide-icon"></div>
                    <div class="slide-icon"></div>
                    <div class="slide-icon"></div>
                </div>
            </div>


            <!--SOSMED ICT-->
            <div class="row">
                <div class="col-md-3 grid-margin">
                    <a href="https://smkn4malang.sch.id" target="_blank">
                        <div class="card d-flex align-items-center">
                            <div class="card-body">
                                <div class="d-flex flex-row align-items-center">
                                    <i class='fa-solid fa-code fa-2x text-black'></i>
                                    <div class="col-12">
                                        <h6 class="text-black">Website</h6>
                                        <p class="mt-2 text-muted card-text">SMKN 4 Malang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 grid-margin">
                    <a href="https://www.youtube.com/c/SMKN4MalangOfficial" target="_blank">
                        <div class="card d-flex align-items-center">
                            <div class="card-body">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="ti-youtube text-youtube icon-md"></i>
                                    <div class="col-12">
                                        <h6 class="text-youtube">Youtube</h6>
                                        <p class="mt-2 text-muted card-text">SMKN 4 Malang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 grid-margin">
                    <a href="https://www.instagram.com/smkn4malang.official" target="_blank">
                        <div class="card d-flex align-items-center">
                            <div class="card-body">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="ti-instagram text-instagram icon-md"></i>
                                    <div class="col-12">
                                        <h6 class="text-instagram1">Instagram</h6>
                                        <p class="mt-2 text-muted card-text">SMKN 4 Malang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 grid-margin">
                    <a href="https://www.instagram.com/bkksmkn4malang" target="_blank">
                        <div class="card d-flex align-items-center">
                            <div class="card-body">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="ti-instagram text-instagram icon-md"></i>
                                    <div class="col-12">
                                        <h6 class="text-instagram1">Instagram BKK</h6>
                                        <p class="mt-2 text-muted card-text">SMKN 4 Malang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 grid-margin">
                    <a href="https://twitter.com/smkn4malang" target="_blank">
                        <div class="card d-flex align-items-center">
                            <div class="card-body">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="ti-twitter-alt text-twitter icon-md"></i>
                                    <div class="col-12">
                                        <h6 class="text-twitter">Twitter</h6>
                                        <p class="mt-2 text-muted card-text">SMKN 4 Malang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 grid-margin">
                    <a href="https://www.facebook.com/smknegeri4malang" target="_blank">
                        <div class="card d-flex align-items-center">
                            <div class="card-body">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="ti-facebook text-facebook icon-md"></i>
                                    <div class="col-12">
                                        <h6 class="text-facebook">Facebook</h6>
                                        <p class="mt-2 text-muted card-text">SMKN 4 Malang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 grid-margin">
                    <a href="https://www.tiktok.com/@smkn4malang.official" target="_blank">
                        <div class="card d-flex align-items-center">
                            <div class="card-body">
                                <div class="d-flex flex-row align-items-center">
                                    <i class='fab fa-tiktok fa-2x text-black'></i>
                                    <div class="col-12">
                                        <h6 class="text-black">Tiktok</h6>
                                        <p class="mt-2 text-muted card-text">SMKN 4 Malang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 grid-margin">
                    <a href="https://t.me/bkksmkn4malang" target="_blank">
                        <div class="card d-flex align-items-center">
                            <div class="card-body">
                                <div class="d-flex flex-row align-items-center">
                                    <i class='fab fa-telegram fa-2x text-telegram'></i>
                                    <div class="col-12">
                                        <h6 class="text-telegram">Telegram</h6>
                                        <p class="mt-2 text-muted card-text">SMKN 4 Malang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <script>
            $(document).ready(function() {
                $('#print').DataTable({

                });
            });
            </script>