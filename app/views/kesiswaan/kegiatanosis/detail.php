    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DATA KEGIATAN OSIS</h3>
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
                                        <th>Kegiatan OSIS</th>
                                        <th>Deskripsi Kegiatan</th>
                                        <th>Dokumentasi Kegiatan</th>
                                        <th>Tanggal Kegiatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['kegiatanosis'] as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row['kegiatan_kegiatanOsis']; ?></td>
                                            <td><?= $row['deskripsi_kegiatanOsis']; ?></td>
                                            <?php if (file_exists("images/datafoto/{$row["foto"]}")) : ?>
                                                <td><img src="images/datafoto/<?= $row["foto"]; ?>" class="data-img" style="width: 65px; height: 65px;"></td>
                                            <?php else : ?>
                                                <td><img src="images/datafoto/pp.png" class="data-img" style="width: 65px; height: 65px;"></td>
                                            <?php endif; ?>
                                            <td><?= $row['tanggal_kegiatanOsis']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>