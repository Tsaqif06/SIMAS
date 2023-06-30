
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
                    <button type="button" class="btn btn-primary tampilModalImport" data-toggle="modal"
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
                                        <th>Tanggal Monitoring</th>
                                    </tr>
                                </thead>
                                <?php
                foreach ($data['mp'] as $mp) {
                ?>
                                <tr>

                                    <td>
                                        
                                    <a class="badge badge-success tampildataubah3"
                                                data-url="<?= BASEURL ?>/PKL/ubahDTAMonitoring/<?= $mp['id']; ?>"
                                                data-toggle="modal" data-target="#formmodal"
                                                data-id="<?= $mp['id'] ?>"><i class="mdi mdi-lead-pencil"></i></a>

                                            <a href="<?= BASEURL; ?>/pkl/hapusdatamonitoring/<?= $mp['id']; ?> " onclick="return confirm('Apakah anda sudah yakin?');"
                                                class="badge badge-danger"><i class="mdi mdi-delete"></i></a>

                                    
                                    </td>
                        

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
</div>
