
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DAYA TAMPUNG</h3>
                        <h6 class="font-weight-normal mb-0">Laman Daya Tampung | <span class="text-primary">SIMAS</span>
                        </h6>
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
                                    <th>Nama Perusahaan</th h>
                                    <th>Jurusan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <?php
              foreach ($data['pd'] as $pd) {
              ?>
                            <tr>
                    <td>
                        <?= $pd['namaperusahaan'] ?>
                    </td>
                    <td>
                        <?= $pd['jurusan'] ?>
                    </td>
                    <td>
                        <?= $pd['jeniskelamin'] ?>
                    </td>
                    <td>
                        <?= $pd['jumlah'] ?>
                    </td>

                    </tr>
                    <?php
              }
        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>