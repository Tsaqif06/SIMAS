    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DATA ABSEN</h3>
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
                            <table id="table" class="table table-striped table-main">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Lokasi</th>
                                        <th>Waktu Absen</th>
                                        <th>Keterangan</th>
                                        <th>Lihat Bukti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['kehadiran'] as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td> <?= $row['nisn'] ?></td>
                                            <td> <?= $row['nama'] ?> </td>
                                            <td> <?= $row['lokasi'] ?> </td>
                                            <td> <?= $row['attend_at'] ?> </td>
                                            <td><button type="button" class="btn btn-<?= $row['bs-class'] ?> btn-rounded btn-fw"><?= $row['keterangan'] ?></button></td>
                                            <td><button type="button" class="btn btn-inverse-success btn-fw">Lihat Bukti</button></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>