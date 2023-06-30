    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DATA SISWA</h3>
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
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Jalur</th>
                                        <th>Jurusan</th>
                                        <th>Alamat</th>
                                        <th>No. HP Siswa</th>
                                        <th>Ayah</th>
                                        <th>Ibu</th>
                                        <th>No. HP Orangtua</th>
                                        <th>Wali</th>
                                        <th>No. HP Wali</th>
                                        <th>Tahun Diterima</th>
                                        <th>Agama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Kelas</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Usia Sekarang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['siswa'] as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row["nisn"] ?></td>
                                            <td><?= $row["nis"] ?></td>
                                            <td><?= $row["nama_siswa"] ?></td>
                                            <td><?= $row["jalur"] ?></td>
                                            <td><?= $row["jurusan"] ?></td>
                                            <td><?= $row["alamat"] ?></td>
                                            <td><?= $row["nomor_hp_siswa"] ?></td>
                                            <td><?= $row["ayah"] ?></td>
                                            <td><?= $row["ibu"] ?></td>
                                            <td><?= $row["nomor_hp_orangtua"] ?></td>
                                            <td><?= $row["wali"] ?></td>
                                            <td><?= $row["nomor_hp_wali"] ?></td>
                                            <td><?= $row["tahun_diterima"] ?></td>
                                            <td><?= $row["agama"] ?></td>
                                            <td><?= $row["jenis_kelamin"] ?></td>
                                            <td><?= $row["tempat_lahir"] ?></td>
                                            <td><?= $row["kelas"] ?></td>
                                            <td><?= $row["tanggal_lahir"] ?></td>
                                            <td><?= $row["usia_sekarang"] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>