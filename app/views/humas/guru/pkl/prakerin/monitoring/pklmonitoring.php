
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
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table table-hover" id="table">
                                <thead>
                                    <tr>
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
