    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DATA WALI KELAS</h3>
                        <h6 class="font-weight-normal mb-0">WEB DEV | SIMAS</h6>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-main" id="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Wali Kelas</th>
                                        <th>NIP</th>
                                        <th>Gol</th>
                                        <th>Pangkat</th>
                                        <th>Jabatan</th>
                                        <th>Telepon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['walikelas'] as $row) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $row["nama"]; ?></td>
                                        <td><?= $row["nip"] ?></td>
                                        <td><?= $row["gol"] ?></td>
                                        <td><?= $row["pangkat"] ?></td>
                                        <td><?= $row["jabatan"] ?></td>
                                        <td><?= $row["telepon"] ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>