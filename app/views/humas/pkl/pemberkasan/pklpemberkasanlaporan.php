<!-- partial -->
<!-- <div class="main-panel"> -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="font-weight-bold">PEMBERKASAN <?= $data['jurusan'] ?></h3> <!--xxx = jurusan-->
                            <h6 class="font-weight-normal mb-0"> Laman Pemberkasan Kabeng | <span class="text-primary"> SIMAS </span></h6>
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
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablepemberkasan" class="table table-hover table-main">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Status</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Nama</th>
                                    <th>Kontak Ortu / Wali Murid</th>
                                    <th>Data Siswa</th>
                                    <th>Lampiran Siswa</th>
                                    <th>Pilihan Kota Siswa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr> <!--Data yang dikirim lengkap, sudah dapat tempat pkl-->
                                    <td><a class="badge bg-secondary text-white" style="font-size: 15px;"><i class="mdi mdi-map-marker"></i></a></td>
                                    <td><a class="badge badge-success" style="font-size: 15px;"><i class="ti ti-check"></i></a></td>
                                    <td>22767</td>
                                    <td>XI RPL C</td>
                                    <td>Raib Permata</td>
                                    <td>08213769038</td>
                                    <td><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#modaldatasiswa" style="font-size: 15px;"><i class="ti-file btn-icon-prepend"></i>Lihat Data</a></td>
                                    <td><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#modaldatalampiran" style="font-size: 15px;"><i class="ti-file btn-icon-prepend"></i>Lihat Data</a></td>
                                    <td><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#modaldatakota" style="font-size: 15px;"><i class="ti-file badge-icon-prepend"></i>Lihat Data</a></td>
                                </tr>
                                <tr> <!--Data yang dikirim lengkap, belum ditempatkan pkl-->
                                    <td>
                                        <a class="badge badge-info" data-toggle="modal" data-target="#modalpenempatan" style="font-size: 15px;"><i class="mdi mdi-map-marker"></i></a>
                                    </td>
                                    <td>
                                        <a class="badge badge-warning text-white" style="font-size: 15px;"><i class="ti ti-alert"></i></a>
                                    </td>
                                    <td>22767</td>
                                    <td>XI RPL C</td>
                                    <td>Raib Permata</td>
                                    <td>08213769038</td>
                                    <td><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#modaldatasiswa" style="font-size: 15px;"><i class="ti-file btn-icon-prepend"></i>Lihat Data</a></td>
                                    <td><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#modaldatalampiran" style="font-size: 15px;"><i class="ti-file btn-icon-prepend"></i>Lihat Data</a></td>
                                    <td><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#modaldatakota" style="font-size: 15px;"><i class="ti-file badge-icon-prepend"></i>Lihat Data</a></td>
                                </tr>
                                <tr> <!--Data yang dikirim belum lengkap-->
                                    <td>
                                        <a class="badge bg-secondary text-white" style="font-size: 15px;"><i class="mdi mdi-map-marker"></i></a>
                                    </td>
                                    <td>
                                        <a class="badge badge-danger" style="font-size: 15px;"><i class="ti ti-close"></i></a>
                                    </td>
                                    <td>22767</td>
                                    <td>XI RPL C</td>
                                    <td>Raib Permata</td>
                                    <td>08213769038</td>
                                    <td><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#modaldatasiswa" style="font-size: 15px;"><i class="ti-file btn-icon-prepend"></i>Lihat Data</a></td>
                                    <td><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#modaldatalampiran" style="font-size: 15px;"><i class="ti-file btn-icon-prepend"></i>Lihat Data</a></td>
                                    <td><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#modaldatakota" style="font-size: 15px;"><i class="ti-file badge-icon-prepend"></i>Lihat Data</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--penempatan-->
    <div class="modal fade" id="modalpenempatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Penempatan Siswa</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                        <div class="modal-body">
                            <h4 class="modal-title" id="exampleModalLabel">Data Pemilihan Kota</h4>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pkldimana_pemberkasan" name="pkldimana_pemberkasan" placeholder="Kota 1">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pkldimana_pemberkasan" name="pkldimana_pemberkasan" placeholder="Kota 2">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pkldimana_pemberkasan" name="pkldimana_pemberkasan" placeholder="Kota 3">
                            </div>
                        </div>
                        <div class="modal-body">
                            <h4 class="modal-title" id="exampleModalLabel">Penempatan Siswa</h4>
                            <form>
                                <div class="form-group">
                                    <label for="pkldimana">Penempatan Kota</label>
                                    <input type="text" class="form-control" id="pkldimana" name="pkldimana_pemberkasan" placeholder="Kota">
                                </div>
                                <div class="form-group">
                                    <label for="indus">Penempatan Industri</label>
                                    <input type="text" class="form-control" id="indus" name="pkldimana_pemberkasan" placeholder="Industri">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary mr-2">Simpan Data</button>
                </div>
            </div>
        </div>
    </div>

    <!--lihat data siswa-->
    <div class="modal fade" id="modaldatasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Data Siswa</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                        <div class="modal-body">
                            <h4 class="modal-title" id="exampleModalLabel">Data Diri</h4>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input class="form-control" id="nis_pemberkasan" name="kelas" placeholder="Kelas">
                            </div>

                            <div class="form-group">
                                <label for="jurusan_pemberkasan">Jurusan</label>
                                <select class="form-control" aria-label="Default select example" id="jurusan_pemberkasan" name="jurusan_pemberkasan">
                                    <option selected>--Pilih Jurusan--</option>
                                    <option value="Teknik Grafika">Teknik Grafika</option>
                                    <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                    <option value="Animasi">Animasi</option>
                                    <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                    <option value="Logistik">Logistik</option>
                                    <option value="Mekatronika">Mekatronika</option>
                                    <option value="Perhotelan">Perhotelan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="namasiswa_pemberkasan">Nama Lengkap</label>
                                <input type="text" class="form-control" id="namasiswa_pemberkasan" name="namasiswa_pemberkasan" placeholder="Nama Lengkap">
                            </div>

                            <div class="form-group">
                                <label for="nis_pemberkasan">NIS</label>
                                <input type="number" class="form-control" id="nis_pemberkasan" name="nis_pemberkasan" placeholder="NIS">
                            </div>

                            <div class="form-group">
                                <label for="nisn_pemberkasan">NISN</label>
                                <input type="number" class="form-control" id="nisn_pemberkasan" name="nisn_pemberkasan" placeholder="NISN">
                            </div>

                            <div class="form-group">
                                <label for="tanggallahir_pemberkasan">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggallahir_pemberkasan" name="tanggallahir_pemberkasan">
                            </div>

                            <div class="form-group">
                                <label for="jeniskelamin_pemberkasan" class="col-form-label">Jenis Kelamin</label>
                                <div class="form-check">
                                    <label for="jeniskelamin_pemberkasan" class="form-check-label">
                                        <input type="radio" class="form-check-input" name="jeniskelamin_pemberkasan" id="lakilaki" value="" checked>
                                        Laki - laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label for="jeniskelamin_pemberkasan" class="form-check-label">
                                        <input type="radio" class="form-check-input" name="jeniskelamin_pemberkasan" id="perempuan" value="option2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama">
                            </div>

                            <div class="form-group">
                                <label for="domisili_pemberkasann">Domisili</label>
                                <input type="text" class="form-control" id="domisili_pemberkasann" name="domisili_pemberkasann" placeholder="Domisili">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat Rumah</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Rumah">
                            </div>

                            <div class="form-group">
                                <label for="nohp">No. Telp. / HP</label>
                                <input type="number" class="form-control" id="nohp" name="nohp" placeholder="No. Telp. / HP">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!--lihat data ortu-->
    <div class="modal fade" id="modaldataortu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Data Orang Tua / Wali</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                        <div class="modal-body">
                            <h4 class="modal-title" id="exampleModalLabel">Kontak Orang Tua / Wali Murid</h4>
                            <div class="form-group">
                                <input type="number" class="form-control" id="nohport" name="nohport" placeholder="No. Telp. / HP">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!--lihat data lampiran-->
    <div class="modal fade" id="modaldatalampiran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Lampiran Data</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                        <div class="modal-body">
                            <h4 class="modal-title" id="exampleModalLabel">Lampiran</h4>
                            <div class="form-group">
                                <label>Foto 3 : 4</label>
                                <input type="file" class="file-upload-default" id="uploadfoto_pemberkasan" name="uploadfoto_pemberkasan">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="xxx">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Lihat</button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Foto Kartu Pelajar</label>
                                <input type="file" class="file-upload-default" id="uploadkartupelajar_pemberkasan" name="uploadkartupelajar_pemberkasan">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="xxx">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Lihat</button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Rapor Digital Semester 1, 2, 3</label>
                                <input type="file" class="file-upload-default" name="uploadebookraport_pemberkasan" id="uploadebookraport_pemberkasan">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="xxx">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Lihat</button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Foto Surat Pernyataan Bermaterai</label>
                                <input type="file" class="file-upload-default" id="uploadsurat_pemberkasan" name="uploadsurat_pemberkasan">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="xxx">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Lihat</button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Bukti Lunas Nilai</label>
                                <input type="file" class="file-upload-default" name="uploadbuktilunasnilai_pemberkasan" id="uploadbuktilunasnilai_pemberkasan">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="xxx">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Lihat</button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Bukti Lunas Administrasi</label>
                                <input type="file" class="file-upload-default" name="uploadbuktilunasadministrasi_pemberkasan" id="uploadbuktilunasadministrasi_pemberkasan">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="xxx">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Lihat</button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Bukti Lunas Perpustakaan</label>
                                <input type="file" class="file-upload-default" name="uploadbuktilunasperpus_pemberkasan" id="uploadbuktilunasperpus_pemberkasan">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="xxx">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Lihat</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!--lihat data lampiran-->
    <div class="modal fade" id="modaldatakota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Data Pilihan Kota</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                        <div class="modal-body">
                            <h4 class="modal-title" id="exampleModalLabel">Pemilihan Kota</h4>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pkldimana_pemberkasan" name="pkldimana_pemberkasan" placeholder="Kota 1">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pkldimana_pemberkasan" name="pkldimana_pemberkasan" placeholder="Kota 2">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pkldimana_pemberkasan" name="pkldimana_pemberkasan" placeholder="Kota 3">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>




</div>
<script>
    $(document).ready(function() {
        $('#tablepemberkasan').DataTable();
    });
</script>