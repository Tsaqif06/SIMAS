<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-main">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Aksi</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat Lengkap</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Jurusan Pendidikan Terakhir</th>
                                <th>Nomor HP</th>
                                <th>Kategori</th>
                                <th>Status Pernikahan</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($data['karyawan'] as $row) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td class="font-weight-medium">
                                        <a href="" class="badge text-bg-success tampilModalUbah" style="cursor: pointer;" data-url="<?= BASEURL ?>master/ubahData/Karyawan" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $row['id_karyawan'] ?>">
                                            Edit
                                        </a>
                                        <a href="<?= BASEURL ?>master/hapusData/Karyawan/<?= $row['id_karyawan'] ?>">
                                            <div class="font-weight-medium pt-2">
                                                <div class="badge badge-danger delete" onclick="return confirm('Apakah Anda Yakin Mau Menghapus Data?')">Delete</div>
                                        </a>
                                    </td>
                                    <td><?= $row["nama_lengkap"] ?></td>
                                    <td><?= $row["jenis_kelamin"]; ?></td>
                                    <td><?= $row["tempat_lahir"]; ?></td>
                                    <td><?= $row["tanggal_lahir"]; ?></td>
                                    <td><?= $row["alamat_lengkap"]; ?></td>
                                    <td><?= $row["pendidikan_terakhir"]; ?></td>
                                    <td><?= $row["jurusan_pendidikan_terakhir"]; ?></td>
                                    <td><?= $row["nomor_hp"]; ?></td>
                                    <td><?= $row["kategori"]; ?></td>
                                    <td><?= $row["status_pernikahan"]; ?></td>
                                    <td><?= $row["foto"]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>