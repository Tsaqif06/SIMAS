<div class="collapse" id="form-elements">
    <ul class="nav flex-column sub-menu">
        <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/pkl/index">PKL</a></li>
        <div class="collapse" id="form-elements">
            <div class="navsubitem">
                <a class="nav-link" href="<?= BASEURL; ?>/pkl/rekap">Rekap PKL</a>
                <a class="nav-link" href="<?= BASEURL; ?>/pkl/pembekalan">Pembekalan PKL</a>
                <a class="nav-link" href="<?= BASEURL; ?>/pkl/pemberkasan">Pemberkasan</a>
                <a class="nav-link" href="<?= BASEURL; ?>/pkl/prakerin">Prakerin</a>
                <a class="nav-link" href="<?= BASEURL; ?>/pkl/nilai">Nilai PKL</a>
                <a class="nav-link" href="<?= BASEURL; ?>/pkl/dtampung">Daya Tampung</a>
            </div>
            <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/bkk/index">BKK</a></li>
            <div class="navsubitem">
                <a class="nav-link" href="<?= BASEURL; ?>/bkk/das">Alumni Sukses</a>
                <a class="nav-link" href="<?= BASEURL; ?>/bkk/mou">MoU</a>
                <a class="nav-link" href="<?= BASEURL; ?>/bkk/peminatan">Peminatan</a>
                <a class="nav-link" href="<?= BASEURL; ?>/bkk/workshop">Workshop</a>
                <a class="nav-link" href="<?= BASEURL; ?>/bkk/kebekerjaan">Kebekerjaan</a>
                <a class="nav-link" href="<?= BASEURL; ?>/bkk/spw">SPW</a>
                <a class="nav-link" href="<?= BASEURL; ?>/bkk/lomba">Lomba</a>
                <a class="nav-link" href="<?= BASEURL; ?>/bkk/loker">Lowongan Kerja</a>
            </div>
            <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/ict/index">ICT</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/stiru/index">Studi Tiru</a></li>
    </ul>
</div>
</li>
</ul>
</nav>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">MONITORING PKL</h3>
                        <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/pkl"> Laman
                                PKL</a> | <a class="text-dark" href="<?= BASEURL; ?>/pkl/prakerin"> Prakerin </a> |
                            <span class="text-primary"> Monitoring </span></h6>
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
            <div class="col-md-12 grid-margin">
                <div class="template-demo">
                    <button type="button" class="btn btn-primary tomboltambahdata3" data-toggle="modal"
                        data-target="#formmodal">Tambah Data</button>
                    <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-toggle="modal"
                        data-target="#modalImport">
                        Import Data Dari Excel
                    </button>
                </div>
            </div>

            <div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalLabel">Import Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL ?>/pkl/importDatamon" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="file">Pilih file Excel (.xlsx)</label>
                                    <input type="file" name="file" id="file">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary batal" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="formmodal" tabindex="-1" role="dialog" aria-labelledby="judulModal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="judulModallabel3">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL; ?>/PKL/tambahdataMonitoring" method="post">



                                <input type="hidden" name="id" id="id">

                                <div class="form-group">
                                    <label for="namaperusahaan_monitoringpkl">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="namaperusahaan_monitoringpkl"
                                        name="namaperusahaan_monitoringpkl">
                                </div>

                                <div class="mt-3"></div>

                                <div class="form-group">
                                    <label for="namaguru_monitoringpkl">Nama Guru </label>
                                    <input type="text" class="form-control" id="namaguru_monitoringpkl"
                                        name="namaguru_monitoringpkl">
                                </div>


                                <div class="form-group">
                                    <label for="tanggal_monitoringpkl">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal_monitoringpkl"
                                        name="tanggal_monitoringpkl">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-fw"
                                data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th>Aksi</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Nama Guru</th>
                                        <th>Tanggal Monitroing</th>
                                    </tr>
                                </thead>
                                <?php
                foreach ($data['mp'] as $mp) {
                ?>
                                <tr>

                                    <td>
                                        <div class="mt-3">

                                            <a class="badge badge-success tampildataubah3"
                                                data-url="<?= BASEURL ?>/PKL/ubahDTAMonitoring/<?= $mp['id']; ?>"
                                                data-toggle="modal" data-target="#formmodal"
                                                data-id="<?= $mp['id'] ?>">Edit</a>
                                            <div class="mt-3">
                                                <a href="<?= BASEURL; ?>/pkl/hapusdatamonitoring/<?= $mp['id']; ?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Apakah anda sudah yakin?');">Hapus</a>
                                    </td>
                        </div>

                        <td>
                            <?= $mp['namaperusahaan_monitoringpkl'] ?>
                        </td>
                        <td>
                            <?= $mp['namaguru_monitoringpkl'] ?>
                        </td>
                        <td>
                            <?= $mp['tanggal_monitoringpkl'] ?>
                        </td>

                        </tr>
                        <?php
                }
          ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>