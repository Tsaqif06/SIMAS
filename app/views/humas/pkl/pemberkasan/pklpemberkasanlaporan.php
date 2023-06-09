<?php

$jurusan = "";
switch ($data['user']['username']) {
  case 'Kabeng TG':
    $jurusan = 'TEKNIK GRAFIKA';
    break;
  case 'Kabeng TL':
    $jurusan = 'LOGISTIK';
    break;
  case 'Kabeng MEKA':
    $jurusan = 'MEKATRONIKA';
    break;
  case 'Kabeng PH':
    $jurusan = 'PERHOTELAN';
    break;
  case 'Kabeng ANI':
    $jurusan = 'ANIMASI';
    break;
  case 'Kabeng DKV':
    $jurusan = 'DESAIN KOMUNIKASI VISUAL';
    break;
  case 'Kabeng TKJ':
    $jurusan = 'TEKNIK KOMPUTER DAN JARINGAN';
    break;
  case 'Kabeng RPL':
    $jurusan = 'REKAYASA PERANGKAT LUNAK';
}

?>

<script>
  const BASEURL = "<?= BASEURL ?>";
</script>

<!-- partial -->
<!-- <div class="main-panel"> -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <div class="row">
            <div class="col-lg-12">
              <h3 class="font-weight-bold">PEMBERKASAN <?= $jurusan ?></h3> <!--xxx = jurusan-->
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
                <?php $i = 1 ?>
                <?php foreach ($data['siswa'] as $row) : ?>
                  <td>
                    <?php if ($row['status_pemberkasan'] == 0) : ?>
                      <a class="badge bg-secondary text-white" style="font-size: 15px;"><i class="mdi mdi-map-marker"></i></a>
                    <?php elseif ($row['status_penempatan'] == 0) : ?>
                      <a class="badge badge-success tampilModalPenempatan" data-toggle="modal" data-target="#modalpenempatan" data-id="<?= $row['id'] ?>" style="font-size: 15px;"><i class="mdi mdi-map-marker"></i></a>
                    <?php elseif ($row['status_penempatan'] == 1) : ?>
                      <a class="badge badge-info tampilModalPenempatan edit" data-toggle="modal" data-target="#modalpenempatan" data-id="<?= $row['id'] ?>" style="font-size: 15px;"><i class="mdi mdi-map-marker"></i></a>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php if ($row['status_pemberkasan'] == 0) : ?>
                      <a class="badge badge-danger" style="font-size: 15px;" title="Data Siswa Belum Lengkap!"><i class="ti ti-close"></i></a>
                    <?php elseif ($row['status_penempatan'] == 0) : ?>
                      <a class="badge badge-warning text-white" style="font-size: 15px;" title="Siswa Siap Ditempatkan!"><i class="ti ti-alert"></i></a>
                    <?php elseif ($row['status_penempatan'] == 1) : ?>
                      <a class="badge badge-success" style="font-size: 15px;" title="Siswa Sudah Ditempatkan!"><i class="ti ti-check"></i></a>
                    <?php endif ?>
                  </td>
                  <td><?= $row['nis_pemberkasan'] ?></td>
                  <td><?= $row['kelas_pemberkasan'] ?></td>
                  <td><?= $row['namasiswa_pemberkasan'] ?></td>
                  <td><?= $row['notelportu_pemberkasan'] ?></td>
                  <td>
                    <a href="" class="badge badge-primary tampilModalDataSiswa" data-toggle="modal" data-target="#modaldatasiswa" data-id="<?= $row['id'] ?>" style="font-size: 15px;">
                      <i class="ti-file btn-icon-prepend"></i>Lihat Data
                    </a>
                  </td>
                  <td>
                    <a href="" class="badge badge-primary tampilModalDataLampiran" data-toggle="modal" data-target="#modaldatalampiran" data-id="<?= $row['id'] ?>" style="font-size: 15px;">
                      <i class="ti-file btn-icon-prepend"></i>Lihat Data
                    </a>
                  </td>
                  <td>
                    <a href="" class="badge badge-primary tampilModalDataKota" data-toggle="modal" data-target="#modaldatakota" data-id="<?= $row['id'] ?>" style="font-size: 15px;">
                      <i class="ti-file badge-icon-prepend"></i>Lihat Data
                    </a>
                  </td>
                <?php endforeach ?>
                <!-- <tr> Data yang dikirim lengkap, sudah dapat tempat pkl
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
                <tr> Data yang dikirim lengkap, belum ditempatkan pkl
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
                <tr> Data yang dikirim belum lengkap
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
                </tr> -->
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
        <form action="<?= BASEURL ?>/pkl/tambahDataPenempatan" method="post">
          <input type="hidden" name="daripemberkasan" value="1">
          <input type="hidden" id="id" name="id">
          <input type="hidden" id="nis" name="nis">
          <input type="hidden" id="nisn" name="nisn">
          <input type="hidden" id="namasiswa" name="namasiswa">
          <input type="hidden" id="kelassiswa" name="kelassiswa">
          <input type="hidden" id="jurusansiswa" name="jurusansiswa">
          <div class="row justify-content-md-center">
            <div class="col-md-12">
              <div class="modal-body">
                <h4 class="modal-title" id="exampleModalLabel">Data Pemilihan Kota</h4>
                <div class="form-group">
                  <input type="text" class="form-control kota1_pemberkasan" placeholder="Kota 1" readonly>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control kota2_pemberkasan" placeholder="Kota 2" readonly>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control kota3_pemberkasan" placeholder="Kota 3" readonly>
                </div>
              </div>
              <div class="modal-body">
                <h4 class="modal-title" id="exampleModalLabel">Penempatan Siswa</h4>
                <div class="form-group">
                  <label for="tempatperusahaan">Penempatan Kota</label>
                  <input type="text" class="form-control" id="tempatperusahaan" name="tempatperusahaan" placeholder="Kota" required>
                </div>
                <div class="form-group">
                  <label for="namaperusahaan">Penempatan Industri</label>
                  <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan" placeholder="Nama Perusahaan" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary mr-2">Simpan Data</button>
          </div>
        </form>
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
                <label for="kelas_pemberkasan">Kelas</label>
                <input class="form-control" id="kelas_pemberkasan" name="kelas_pemberkasan" placeholder="Kelas" disabled>
              </div>

              <div class="form-group">
                <label for="jurusan_pemberkasan">Jurusan</label>
                <select class="form-control text-dark" aria-label="Default select example" id="jurusan_pemberkasan" name="jurusan_pemberkasan" disabled>
                  <option selected>--Pilih Jurusan--</option>
                  <option value="TG">Teknik Grafika</option>
                  <option value="TKJ">Teknik Komputer Jaringan</option>
                  <option value="RPL">Rekayasa Perangkat Lunak</option>
                  <option value="ANI">Animasi</option>
                  <option value="DKV">Desain Komunikasi Visual</option>
                  <option value="TL">Logistik</option>
                  <option value="MEKA">Mekatronika</option>
                  <option value="PH">Perhotelan</option>
                </select>
              </div>

              <div class="form-group">
                <label for="namasiswa_pemberkasan">Nama Lengkap</label>
                <input type="text" class="form-control" id="namasiswa_pemberkasan" name="namasiswa_pemberkasan" placeholder="Nama Lengkap" readonly>
              </div>

              <div class="form-group">
                <label for="nis_pemberkasan">NIS</label>
                <input type="number" class="form-control" id="nis_pemberkasan" name="nis_pemberkasan" placeholder="NIS" readonly>
              </div>

              <div class="form-group">
                <label for="nisn_pemberkasan">NISN</label>
                <input type="number" class="form-control" id="nisn_pemberkasan" name="nisn_pemberkasan" placeholder="NISN" readonly>
              </div>

              <div class="form-group">
                <label for="tanggallahir_pemberkasan">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggallahir_pemberkasan" name="tanggallahir_pemberkasan" readonly>
              </div>

              <div class="form-group">
                <label for="jeniskelamin_pemberkasan" class="col-form-label">Jenis Kelamin</label>
                <div class="form-check">
                  <label for="jeniskelamin_pemberkasan" class="form-check-label">
                    <input type="radio" class="form-check-input" name="jeniskelamin_pemberkasan" id="Laki-laki" value="Laki-laki" disabled>
                    Laki - laki
                  </label>
                </div>
                <div class="form-check">
                  <label for="jeniskelamin_pemberkasan" class="form-check-label">
                    <input type="radio" class="form-check-input" name="jeniskelamin_pemberkasan" id="Perempuan" value="Perempuan" disabled>
                    Perempuan
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label for="agama_pemberkasan">Agama</label>
                <input type="text" class="form-control" id="agama_pemberkasan" name="agama_pemberkasan" placeholder="Agama" readonly>
              </div>

              <div class="form-group">
                <label for="domisili_pemberkasan">Domisili</label>
                <input type="text" class="form-control" id="domisili_pemberkasan" name="domisili_pemberkasan" placeholder="Domisili" readonly>
              </div>

              <div class="form-group">
                <label for="alamat_pemberkasan">Alamat Rumah</label>
                <input type="text" class="form-control" id="alamat_pemberkasan" name="alamat_pemberkasan" placeholder="Alamat Rumah" readonly>
              </div>

              <div class="form-group">
                <label for="notelp_pemberkasan">No. Telp. / HP</label>
                <input type="number" class="form-control" id="notelp_pemberkasan" name="notelp_pemberkasan" placeholder="No. Telp. / HP" readonly>
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
                <div class="input-group col-xs-12">
                  <input type="text" id="uploadfoto_pemberkasan" class="form-control" readonly placeholder="xxx">
                  <span class="input-group-append">
                    <button id="lihat_foto" onclick="" class="btn btn-primary" type="button">Lihat</button>
                  </span>
                </div>
              </div>

              <div class="form-group">
                <label>Foto Kartu Pelajar</label>
                <div class="input-group col-xs-12">
                  <input type="text" id="uploadkartupelajar_pemberkasan" class="form-control" readonly placeholder="xxx">
                  <span class="input-group-append">
                    <button id="lihat_kartupelajar" onclick="" class="btn btn-primary" type="button">Lihat</button>
                  </span>
                </div>
              </div>

              <div class="form-group">
                <label>Rapor Digital Semester 1, 2, 3 (*pdf)</label>
                <div class="input-group col-xs-12">
                  <input type="text" id="uploadebookraport_pemberkasan" class="form-control" readonly placeholder="xxx">
                  <span class="input-group-append">
                    <button id="lihat_raport" onclick="" class="btn btn-primary" type="button">Lihat</button>
                  </span>
                </div>
              </div>

              <div class="form-group">
                <label>Foto Surat Pernyataan Bermaterai</label>
                <div class="input-group col-xs-12">
                  <input type="text" id="uploadsurat_pemberkasan" class="form-control" readonly placeholder="xxx">
                  <span class="input-group-append">
                    <button id="lihat_surat" onclick="" class="btn btn-primary" type="button">Lihat</button>
                  </span>
                </div>
              </div>

              <div class="form-group">
                <label>Bukti Lunas Nilai</label>
                <div class="input-group col-xs-12">
                  <input type="text" id="uploadbuktilunasnilai_pemberkasan" class="form-control" readonly placeholder="xxx">
                  <span class="input-group-append">
                    <button id="lihat_buktinilai" onclick="" class="btn btn-primary" type="button">Lihat</button>
                  </span>
                </div>
              </div>

              <div class="form-group">
                <label>Bukti Lunas Administrasi</label>
                <div class="input-group col-xs-12">
                  <input type="text" id="uploadbuktilunasadministrasi_pemberkasan" class="form-control" readonly placeholder="xxx">
                  <span class="input-group-append">
                    <button id="lihat_buktiadministrasi" onclick="" class="btn btn-primary" type="button">Lihat</button>
                  </span>
                </div>
              </div>

              <div class="form-group">
                <label>Bukti Lunas Perpustakaan</label>
                <div class="input-group col-xs-12">
                  <input type="text" id="uploadbuktilunasperpus_pemberkasan" class="form-control" readonly placeholder="xxx">
                  <span class="input-group-append">
                    <button id="lihat_buktiperpus" onclick="" class="btn btn-primary" type="button">Lihat</button>
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
                <input type="text" class="form-control" id="kota1_pemberkasan" name="kota1_pemberkasan" placeholder="Kota 1" readonly>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="kota2_pemberkasan" name="kota2_pemberkasan" placeholder="Kota 2" readonly>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="kota3_pemberkasan" name="kota3_pemberkasan" placeholder="Kota 3" readonly>
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



  <script>
    $(document).ready(function() {
      $('#tablepemberkasan').DataTable();
      
      $('.tampilModalDataSiswa').click(function () {
        let data_id = $(this).data("id");

        $.ajax({
          url: `${BASEURL}/pkl/getUbahPemberkasan`,
					data: { id: data_id },
					method: "post",
					dataType: "json",
					success: function (data) {
            $(`#kelas_pemberkasan`).val(data.kelas_pemberkasan);
            $(`#jurusan_pemberkasan`).val(data.jurusan_pemberkasan);
            $(`#namasiswa_pemberkasan`).val(data.namasiswa_pemberkasan);
            $(`#nis_pemberkasan`).val(data.nis_pemberkasan);
            $(`#nisn_pemberkasan`).val(data.nisn_pemberkasan);
            $(`#tanggallahir_pemberkasan`).val(data.tanggallahir_pemberkasan);
            $(`#${data.jeniskelamin_pemberkasan}`).prop('checked', true);
            $(`#agama_pemberkasan`).val(data.agama_pemberkasan);
            $(`#domisili_pemberkasan`).val(data.domisili_pemberkasan);
            $(`#alamat_pemberkasan`).val(data.alamat_pemberkasan);
            $(`#notelp_pemberkasan`).val(data.notelp_pemberkasan);
          }
        });
      });
      

      $('.tampilModalDataLampiran').click(function () {
        let data_id = $(this).data("id");

        $.ajax({
          url: `${BASEURL}/pkl/getUbahPemberkasan`,
					data: { id: data_id },
					method: "post",
					dataType: "json",
					success: function (data) {
            $('#uploadfoto_pemberkasan').val(data.uploadfoto_pemberkasan);
            $('#lihat_foto').attr('onclick', `window.open('${BASEURL}/assets/pkl/pemberkasan/foto/${data.uploadfoto_pemberkasan}', '_blank')`);

            $('#uploadkartupelajar_pemberkasan').val(data.uploadkartupelajar_pemberkasan);
            $('#lihat_kartupelajar').attr('onclick', `window.open('${BASEURL}/assets/pkl/pemberkasan/kartupelajar/${data.uploadkartupelajar_pemberkasan}', '_blank')`);

            $('#uploadebookraport_pemberkasan').val(data.uploadebookraport_pemberkasan);
            $('#lihat_raport').attr('onclick', `window.open('${BASEURL}/assets/raport/${data.uploadebookraport_pemberkasan}', '_blank')`);

            $('#uploadsurat_pemberkasan').val(data.uploadsurat_pemberkasan);
            $('#lihat_surat').attr('onclick', `window.open('${BASEURL}/assets/pkl/pemberkasan/surat/${data.uploadsurat_pemberkasan}', '_blank')`);

            $('#uploadbuktilunasnilai_pemberkasan').val(data.uploadbuktilunasnilai_pemberkasan);
            $('#lihat_buktinilai').attr('onclick', `window.open('${BASEURL}/assets/pkl/pemberkasan/buktilunasnilai/${data.uploadbuktilunasnilai_pemberkasan}', '_blank')`);

            $('#uploadbuktilunasadministrasi_pemberkasan').val(data.uploadbuktilunasadministrasi_pemberkasan);
            $('#lihat_buktiadministrasi').attr('onclick', `window.open('${BASEURL}/assets/pkl/pemberkasan/buktilunasadm/${data.uploadbuktilunasadministrasi_pemberkasan}', '_blank')`);

            $('#uploadbuktilunasperpus_pemberkasan').val(data.uploadbuktilunasperpus_pemberkasan);
            $('#lihat_buktiperpus').attr('onclick', `window.open('${BASEURL}/assets/pkl/pemberkasan/buktilunasperpus/${data.uploadbuktilunasperpus_pemberkasan}', '_blank')`);
          }
        });
      });


      $('.tampilModalDataKota').click(function () {
        let data_id = $(this).data("id");

        $.ajax({
          url: `${BASEURL}/pkl/getUbahPemberkasan`,
					data: { id: data_id },
					method: "post",
					dataType: "json",
					success: function (data) {
            $('#kota1_pemberkasan').val(data.kota1_pemberkasan);
            $('#kota2_pemberkasan').val(data.kota2_pemberkasan);
            $('#kota3_pemberkasan').val(data.kota3_pemberkasan);
          }
        });
      });


      $('.tampilModalPenempatan').click(function () {
        let btn = $(this);
        let data_id = btn.data("id");

        $.ajax({
          url: `${BASEURL}/pkl/getUbahPemberkasan`,
					data: { id: data_id },
					method: "post",
					dataType: "json",
					success: function (data) {
            $('#modalpenempatan form').attr('action', `${BASEURL}/pkl/tambahDataPenempatan`);
            $('#modalpenempatan button[type="submit"]').html("Simpan Data");
            $('#id').val(data.id);
            $('#nis').val(data.nis_pemberkasan);
            $('#nisn').val(data.nisn_pemberkasan);
            $('#namasiswa').val(data.namasiswa_pemberkasan);
            $('#kelassiswa').val(data.kelas_pemberkasan);
            $('#jurusansiswa').val(data.jurusan_pemberkasan);
            $('#modalpenempatan .kota1_pemberkasan').val(data.kota1_pemberkasan);
            $('#modalpenempatan .kota2_pemberkasan').val(data.kota2_pemberkasan);
            $('#modalpenempatan .kota3_pemberkasan').val(data.kota3_pemberkasan);

            if (btn.hasClass('edit')) {
              $.ajax({
                url: `${BASEURL}/pkl/getUbahPenempatan`,
                data: {
                  nama: $('#namasiswa').val(),
                  nis: $('#nis').val()
                },
                method: "post",
                dataType: "json",
                success: function (data) {
                  $('#modalpenempatan form').attr('action', `${BASEURL}/pkl/ubahDataPenempatan`);
                  $('#modalpenempatan button[type="submit"]').html("Ubah Data");
                  $('#id').val(data.id);
                  $('#tempatperusahaan').val(data.tempatperusahaan);
                  $('#namaperusahaan').val(data.namaperusahaan);
                }
              });
            }

          }
        });

      });
    });
  </script>
</div>