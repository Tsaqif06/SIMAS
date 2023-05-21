    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DATA GURU</h3>
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
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat Lengkap</th>
                                        <th>Pendidikan Terakhir</th>
                                        <th>Jurusan Pendidikan Terakhir</th>
                                        <th>No. HP</th>
                                        <th>Kategori</th>
                                        <th>Mapel yang diampu</th>
                                        <th>Kategori Mapel</th>
                                        <th>NIP</th>
                                        <th>Status Sertifikasi</th>
                                        <th>Keahlian Ganda</th>
                                        <th>Status Pernikahan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['guru'] as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <?php if (file_exists("images/datafoto/{$row["foto"]}")) : ?>
                                                <td><img src="images/datafoto/<?= $row["foto"]; ?>" class="data-img" style="width: 65px; height: 65px;"></td>
                                            <?php else : ?>
                                                <td><img src="images/datafoto/pp.png" class="data-img" style="width: 65px; height: 65px;"></td>
                                            <?php endif; ?>
                                            <td><?= $row["nama_lengkap"] ?></td>
                                            <td><?= $row["jenis_kelamin"] ?></td>
                                            <td><?= $row["tempat_lahir"] ?></td>
                                            <td><?= $row["tanggal_lahir"] ?></td>
                                            <td><?= $row["alamat_lengkap"] ?></td>
                                            <td><?= $row["pendidikan_terakhir"] ?></td>
                                            <td><?= $row["jurusan_pendidikan_terakhir"] ?></td>
                                            <td><?= $row["nomor_hp"] ?></td>
                                            <td><?= $row["kategori"] ?></td>
                                            <td><?= $row["mapel_yg_diampu"] ?></td>
                                            <td><?= $row["kategori_mapel"] ?></td>
                                            <td><?= $row["nip"] ?></td>
                                            <td><?= $row["status_sertifikasi"] ?></td>
                                            <td><?= $row["keahlian_ganda"] ?></td>
                                            <td><?= $row["status_pernikahan"] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>