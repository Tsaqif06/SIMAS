<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DATA GURU</h3>
                        <h6 class="font-weight-normal mb-0">WEB DEV | SIMAS</h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Hari ini (11 Mar 2023)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
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
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary my-3 tampilModalTambah" data-bs-toggle="modal" data-bs-target="#modal">
                    Tambah Data Guru
                </button>
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
                                        <th>Aksi</th>
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
                                        <th>Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['guru'] as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td class="font-weight-medium">
                                                <a href="" class="badge text-bg-success tampilModalUbah" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $row['id_guru'] ?>">
                                                    Edit
                                                </a>
                                                <a href="<?= BASEURL ?>master/hapusData/Guru/<?= $row['id_guru'] ?>">
                                                    <div class=" font-weight-medium pt-2">
                                                        <div class="badge badge-danger delete" onclick="return confirm('Yakin Ingin Hapus Data?')">Delete</div>
                                                </a>
                                            </td>
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
                                            <td><?= $row["foto"] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalLabel">Tambah Data Guru</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL ?>master/tambahData/Guru" method="post">
                                <input type="hidden" name="id_guru" id="id_guru">
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                                        <option selected>Open this select menu</option>
                                        <option value="P">P</option>
                                        <option value="L">L</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                    <input type="text" class="form-control" name="alamat_lengkap" id="alamat_lengkap" required>
                                </div>
                                <div class="mb-3">
                                    <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jurusan_pendidikan_terakhir" class="form-label">Jurusan Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" name="jurusan_pendidikan_terakhir" id="jurusan_pendidikan_terakhir" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_hp" class="form-label">Nomor HP</label>
                                    <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select class="form-select" name="kategori" id="kategori" required>
                                        <option selected>Open this select menu</option>
                                        <option value="ASN">ASN</option>
                                        <option value="GTT">GTT</option>
                                        <option value="PPPK">PPPK</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="mapel_yg_diampu" class="form-label">Mapel Yang Diampu</label>
                                    <select class="form-select" name="mapel_yg_diampu" id="mapel_yg_diampu" required>
                                        <option selected>Open this select menu</option>
                                        <option value="Matematika">Matematika</option>
                                        <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                        <option value="Bahasa Inggris">Bahasa Inggris</option>
                                        <option value="Bahasa Daerah">Bahasa Daerah</option>
                                        <option value="IPAS">IPAS</option>
                                        <option value="PJOK">PJOK</option>
                                        <option value="Sejarah">Sejarah</option>
                                        <option value="PP">PP</option>
                                        <option value="Inka">Inka</option>
                                        <option value="Seni Budaya">Seni Budaya</option>
                                        <option value="BK">BK</option>
                                        <option value="PAI">PAI</option>
                                        <option value="TG">TG</option>
                                        <option value="RPL">RPL</option>
                                        <option value="Perhotelan">Perhotelan</option>
                                        <option value="Multimedia">Multimedia</option>
                                        <option value="Animasi">Animasi</option>
                                        <option value="TL">TL</option>
                                        <option value="TM">TM</option>
                                        <option value="TKJ">TKJ</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="kategori_mapel" class="form-label">Kategori Mapel</label>
                                    <select class="form-select" name="kategori_mapel" id="kategori_mapel">
                                        <option selected>Open this select menu</option>
                                        <option value="Umum">Umum</option>
                                        <option value="BK">BK</option>
                                        <option value="Kejuruan">Kejuruan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nip" class="form-label">NIP</label>
                                    <input type="text" class="form-control" name="nip" id="nip" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status_sertifikasi" class="form-label">Status Sertifikasi</label>
                                    <select class="form-select" name="status_sertifikasi" id="status_sertifikasi" required>
                                        <option selected>Open this select menu</option>
                                        <option value="Sudah">Sudah</option>
                                        <option value="Belum">Belum</option>
                                    </select>   
                                </div>
                                <div class="mb-3">
                                    <label for="keahlian_ganda" class="form-label">Keahlian Ganda</label>
                                    <input type="text" class="form-control" name="keahlian_ganda" id="keahlian_ganda" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
                                    <select class="form-select" name="status_pernikahan" id="status_pernikahan" required>
                                        <option selected>Open this select menu</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Belum">Belum</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="upload" class="form-control" name="foto" id="foto" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="../js/script/master/guru.js"></script>