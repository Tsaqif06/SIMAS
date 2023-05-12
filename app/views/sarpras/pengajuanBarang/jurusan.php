<?php
  include('connect.php');
  // $kategori = mysqli_query($connect, "SELECT nama FROM pengajuan_bidang GROUP BY nama");
  // $jumlah = mysqli_query($connect, "SELECT SUM(jumlah) AS jumlah FROM pengajuan_bidang GROUP BY nama");
?>
<!-- <div class="main-panel"> -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">DATA PENGAJUAN JURUSAN</h3>
                  <h6 class="font-weight-normal mb-0">Data Pengajuan Barang Untuk Jurusan di SMKN 4 Malang</span></h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
                <?php Flasher ::flash(); ?>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col">
              <a id="example" class="btn btn-primary mb-4" role="button" data-toggle="modal" data-target="#exampleModalLong">ISI FORM PENGAJUAN</a>
            </div>
          </div> -->
          <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Status</h4>
                  <canvas id="prosess"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Jurusan</h4>
                  <canvas id="jurusan"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div id="exampleModalLong" class="modal fade" role="dialog" data-backdrop="static" >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                <h3 id="modalLabel"> Tambah Data Pengajuan</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form action="<?= BASEURL; ?>/pengajuanJurusan/tambah" method="post">
                      <input type="hidden" name="id" id="id">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Jurusan</label>
                      <select class="form-control" id="jurusan" name="jurusan">
                        <option value="Teknik Grafika">Teknik Grafika</option>
                        <option value="Multimedia/DKV">Multimedia/DKV</option>
                        <option value="RPL">RPL</option>
                        <option value="TKJ">TKJ</option>
                        <option value="Animasi">Animasi</option>
                        <option value="Mekatronika">Mekatronika</option>
                        <option value="Logistik">Logistik</option>
                        <option value="Perhotelan">Perhotelan</option>
                        <option value="Desain Grafika">Design Grafika</option>
                        <option value="Produksi Grafika">Produksi Grafika</option>
                      </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Barang</label>
                        <input type="text" class="form-control" id="barang" name="barang" placeholder="" required/>
                      </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Spesifikasi</label>
                      <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" placeholder="" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Kebutuhan Bulan</label>
                      <input type="text" class="form-control" id="bulan" name="bulan" placeholder="" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah</label>
                      <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Satuan</label>
                      <input type="text" class="form-control" id="satuan" name="satuan" placeholder="" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Harga Satuan (Termasuk Pajak)</label>
                      <div class="input-group mb-3">
                      <span class="input-group-text">Rp</span>
                      <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="" required/>
                    </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Total Harga</label>
                      <div class="input-group mb-3">
                      <span class="input-group-text">Rp</span>
                      <input type="text" class="form-control" id="harga_total" name="harga_total" placeholder="" required/>
                    </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Digunakan Untuk</label>
                      <input type="text" class="form-control" id="digunakan_untuk" name="digunakan_untuk" placeholder="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                  </div>
              </form>
              </div>
            </div>
            </div>
          <div class="row py-10"> 
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card rounded shadow border-0" style="width: fit-content;">
              <div class="card-body p-10 bg-white rounded">
                <div class="table-responsive"> 
                  <table id="print" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Jurusan</th>
                        <th>Nama Barang</th>
                        <th>Spesifikasi Barang yang diajukan</th>
                        <th>Bulan Ke</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Harga Satuan + Pajak</th>
                        <th>Total Harga</th>
                        <th>Digunakan Untuk</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                        <?php foreach( $data['pengajuan_jurusan'] as $pengajuan ) : ?>
                        <tr>
                        <td><?=$i++?></td>
                        <td>
                        <?php
                            if ($pengajuan['statuspengajuan']==1) {
                              echo '<a class="badge badge-success" href="statusJurusan.php?id='.$pengajuan['id'].'&statuspengajuan=0">Selesai</a>';
                            } elseif ($pengajuan['statuspengajuan']==0) {
                              echo '<a class="badge badge-danger" href="statusJurusan.php?id='.$pengajuan['id'].'&statuspengajuan=2">Belum</a>';
                            } else {
                              echo '<a class="badge badge-warning" href="statusJurusan.php?id='.$pengajuan['id'].'&statuspengajuan=1">Proses</a>';
                            }
                          ?>
                        </td>
                        <td><?=$pengajuan['jurusan']?></td>
                        <td><?=$pengajuan['barang']?></td>
                        <td><?=$pengajuan['spesifikasi']?></td>
                        <td><?=$pengajuan['bulan']?></td>
                        <td><?=$pengajuan['jumlah']?></td>
                        <td><?=$pengajuan['satuan']?></td>
                        <td><?=$pengajuan['harga_satuan']?></td>
                        <td><?=$pengajuan['harga_total']?></td>
                        <td><?=$pengajuan['digunakan_untuk']?></td>
                        <td>
                            <a href="<?= BASEURL;?>/pengajuanJurusan/ubah/<?=$pengajuan['id']?>" data-bs-toggle="modal" data-bs-target="#exampleModalLong" class="tampilModalUbah" data-id="<?= $pengajuan['id'];?>">
                            <button class="button-arounder"> 
                                <span class="material-symbols-outlined"> edit </span>
                            </button>
                            </a>
                            <a href="<?= BASEURL;?>/pengajuanJurusan/hapus/<?=$pengajuan['id']?>" onclick="return confirm ('Hapus data?') ">
                            <button class="button-arounder">
                                <span class="material-symbols-outlined"> delete </span>
                            </button>
                            </a>
                        </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

        
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <script src="<?=BASEURL;?>/js/pengajuanJurusan.js"></script>
        <script src="<?= BASEURL; ?>/vendors/chart.js/chart.min.js"></script>
  <script>
    $(document).ready(function() {
    $('#print').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    } );
  } );
  </script>
  <script>
    var jurusan = {
            labels: ["Animasi", "Mekatronika", "DKV", "Perhotelan", "RPL", "Logistik", "TKJ", "Teknik Grafika"],
            datasets: [{
            label: 'Pengajuan',
            data: [
              <?php 
                $jumlah_animasi = mysqli_query($connect,"select * from pengajuan_jurusan where jurusan='Animasi'");
                echo mysqli_num_rows($jumlah_animasi);
              ?>,
              <?php 
                $jumlah_mekatronika = mysqli_query($connect,"select * from pengajuan_jurusan where jurusan='Mekatronika'");
                echo mysqli_num_rows($jumlah_mekatronika);
              ?>,
              <?php 
                $jumlah_DKV = mysqli_query($connect,"select * from pengajuan_jurusan where jurusan='DKV'");
                echo mysqli_num_rows($jumlah_DKV);
              ?>,
              <?php 
                $jumlah_Perhotelan = mysqli_query($connect,"select * from pengajuan_jurusan where jurusan='Perhotelan'");
                echo mysqli_num_rows($jumlah_Perhotelan);
              ?>,
              <?php 
                $jumlah_RPL = mysqli_query($connect,"select * from pengajuan_jurusan where jurusan='RPL'");
                echo mysqli_num_rows($jumlah_RPL);
              ?>,
              <?php 
                $jumlah_Logistik = mysqli_query($connect,"select * from pengajuan_jurusan where jurusan='Logistik'");
                echo mysqli_num_rows($jumlah_Logistik);
              ?>,
              <?php 
                $jumlah_TKJ = mysqli_query($connect,"select * from pengajuan_jurusan where jurusan='TKJ'");
                echo mysqli_num_rows($jumlah_TKJ);
              ?>,
              <?php 
                $jumlah_Teknik_Grafika = mysqli_query($connect,"select * from pengajuan_jurusan where jurusan='Teknik Grafika'");
                echo mysqli_num_rows($jumlah_Teknik_Grafika);
              ?>,
            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(0, 255, 228, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(0, 255, 228, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            fill: false
          }]
          };

  if ($("#jurusan").length) {
    var barChartCanvas = $("#jurusan").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: jurusan,
      options: {
        scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
  }

    var prosess = {
            labels: ["Belum", "Proses", "Selesai"],
            datasets: [{
            label: 'Status',
            data: [
              <?php 
                $jumlah_Broadcast = mysqli_query($connect,"SELECT * from pengajuan_jurusan where statuspengajuan='0'");
                echo mysqli_num_rows($jumlah_Broadcast);
              ?>,
              <?php 
                $jumlah_Badminton = mysqli_query($connect,"SELECT * from pengajuan_jurusan where statuspengajuan='2'");
                echo mysqli_num_rows($jumlah_Badminton);
              ?>,
              <?php 
                $jumlah_Robotik = mysqli_query($connect,"SELECT * from pengajuan_jurusan where statuspengajuan='1'");
                echo mysqli_num_rows($jumlah_Robotik);
              ?>,
            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(0, 255, 228, 0.2)',
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(0, 255, 228, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(0, 255, 228, 1)',
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(0, 255, 228, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            fill: false
          }]
          };

  if ($("#prosess").length) {
    var barChartCanvas = $("#prosess").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvas, {
      type: 'pie',
      data: prosess,
      options: doughnutPieOptions
		});
  }

  var doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
  };
  </script>