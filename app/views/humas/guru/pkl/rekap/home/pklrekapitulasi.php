
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">REKAP PKL</h3>
                                    <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/pkl/index">
                                            Laman PKL</a> | <span class="text-primary">Rekapitulasi</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card data-icon-card-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 text-white">
                                                    <h3>Perpanjang Masa PKL</h3>
                                                </div>
                                                <div class="col-3">
                                                    <i class="ti-bar-chart-alt text-pink icon-lg"></i>
                                                </div>
                                                <div class="col-9">
                                                    <h4 class="text-lightpurple">Jumlah Data :</h4>
                                                    <h3 class="text-yellow"><?= $data['jmlpp'] ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <a href="<?= BASEURL; ?>/pkl/perpanjang"><button type="button"
                                                    class="btn btn-inverse-primary btn-fw btn-block">Masuk ke laman
                                                    ini</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card data-icon-card-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 text-white">
                                                    <h3>Magang Karyawan</h3>
                                                </div>
                                                <div class="col-3">
                                                    <i class="ti-bar-chart-alt text-pink icon-lg"></i>
                                                </div>
                                                <div class="col-9">
                                                    <h4 class="text-lightpurple">Jumlah Data :</h4>
                                                    <h3 class="text-yellow"><?= $data['jmltable'] ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <a href="<?= BASEURL; ?>/pkl/pengangkatan"><button type="button"
                                                    class="btn btn-inverse-primary btn-fw btn-block">Masuk ke laman
                                                    ini</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card data-icon-card-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 text-white">
                                                    <h3>Perizinan PKL</h3>
                                                </div>
                                                <div class="col-3">
                                                    <i class="ti-bar-chart-alt text-pink icon-lg"></i>
                                                </div>
                                                <div class="col-9">
                                                    <h4 class="text-lightpurple">Jumlah Data :</h4>
                                                    <h3 class="text-yellow"><?= $data['jmliz'] ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <a href="<?= BASEURL; ?>/pkl/perizinan"><button type="button"
                                                    class="btn btn-inverse-primary btn-fw btn-block">Masuk ke laman
                                                    ini</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card data-icon-card-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 text-white">
                                                    <h3>Siswa Bermasalah</h3>
                                                </div>
                                                <div class="col-3">
                                                    <i class="ti-bar-chart-alt text-pink icon-lg"></i>
                                                </div>
                                                <div class="col-9">
                                                    <h4 class="text-lightpurple">Jumlah Data :</h4>
                                                    <h3 class="text-yellow"><?= $data['jmlbm'] ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <a href="<?= BASEURL; ?>/pkl/siswabermasalah"><button type="button"
                                                    class="btn btn-inverse-primary btn-fw btn-block">Masuk ke laman
                                                    ini</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card data-icon-card-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 text-white">
                                                    <h3>Data Industri PKL</h3>
                                                </div>
                                                <div class="col-3">
                                                    <i class="ti-bar-chart-alt text-pink icon-lg"></i>
                                                </div>
                                                <div class="col-9">
                                                    <h4 class="text-lightpurple">Jumlah Data :</h4>
                                                    <h3 class="text-yellow"><?= $data['jmlind'] ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <a href="<?= BASEURL; ?>/pkl/dataindustri"><button type="button"
                                                    class="btn btn-inverse-primary btn-fw btn-block">Masuk ke laman
                                                    ini</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card data-icon-card-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 text-white">
                                                    <h3>Penempatan PKL</h3>
                                                </div>
                                                <div class="col-3">
                                                    <i class="ti-bar-chart-alt text-pink icon-lg"></i>
                                                </div>
                                                <div class="col-9">
                                                    <h4 class="text-lightpurple">Jumlah Data :</h4>
                                                    <h3 class="text-yellow"><?= $data['jmltp'] ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <a href="<?= BASEURL; ?>/pkl/penempatan"><button type="button"
                                                    class="btn btn-inverse-primary btn-fw btn-block">Masuk ke laman
                                                    ini</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>