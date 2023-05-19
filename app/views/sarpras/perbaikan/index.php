<?php
  include('connect.php');
  $kategori = mysqli_query($connect, "SELECT statusperbaikan FROM data_perbaikan GROUP BY statusperbaikan");
  $jumlah = mysqli_query($connect, "SELECT COUNT(statusperbaikan) AS jumlah FROM data_perbaikan GROUP BY statusperbaikan");
?>

<!-- <div class="main-panel"> -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">DATA PERBAIKAN PRASARANA</h3>
                  <h6 class="font-weight-normal mb-0">Data perbaikan barang di SMKN 4 Malang</span></h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
                <?php Flasher ::flash(); ?>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <a class="btn btn-primary" role="button" data-toggle="modal" data-target="#exampleModalLong">Tambah Data Perbaikan</a>
              <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport"
                    data-url="<?= BASEURL ?>/perbaikan" data-bs-toggle="modal" data-bs-target="#modalImport">
                    Import Data Dari Excel
                </button>
            </div>
        </div>
          <div class="row">
          <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Status</h4>
                  <canvas id="proses"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div id="exampleModalLong" class="modal fade" role="dialog" data-backdrop="static" >
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                <h3 id="modalLabel"> Tambah Data Perbaikan</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form action="<?= BASEURL; ?>/perbaikan/tambah" method="post">
                      <input type="hidden" name="id" id="id">
                      <input type="hidden" name="statusperbaikan" id="statusperbaikan">

                      <div class="form-group">
                      <label for="exampleInputEmail1">Kode Inventaris</label>
                      <input type="text" class="form-control" id="kode" name="kode" placeholder="" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Barang</label>
                      <input type="text" class="form-control" id="barang" name="barang" placeholder="" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Pengajuan</label>
                      <input type="text" class="form-control" id="pengajuan" name="pengajuan" placeholder="" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Tindakan</label>
                      <input type="text" class="form-control" id="tindakan" name="tindakan" placeholder="" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Kondisi Awal</label>
                      <input type="text" class="form-control" id="kondisi_awal" name="kondisi_awal" placeholder="" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Kondisi Akhir</label>
                      <input type="text" class="form-control" id="kondisi_akhir" name="kondisi_akhir" placeholder="" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Teknisi</label>
                      <input type="text" class="form-control" id="teknisi" name="teknisi" placeholder="" required/>
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
            <div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalLabel">Import Data Perbaikan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL ?>/perbaikan/importData" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="file">Pilih file Excel (.xlsx)</label>
                                <input type="file" name="file" id="file">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary batal" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
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
                        <th>Kode Inventaris</th>
                        <th>Nama Barang</th>
                        <th>Pengajuan</th>
                        <th>Tindakan</th>
                        <th>Kondisi Awal</th>
                        <th>Kondisi Akhir</th>
                        <th>Teknisi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                        <?php foreach( $data['perbaikan'] as $perbaikan ) : ?>
                        <tr>
                        <td><?= $i++;?></td>
                        <td>
                        <?php
                            if ($perbaikan['statusperbaikan']==1) {
                              echo '<a class="badge badge-success" href="statusperbaikan.php?id='.$perbaikan['id'].'&statusperbaikan=0">Selesai</a>';
                            } elseif ($perbaikan['statusperbaikan']==0) {
                              echo '<a class="badge badge-danger" href="statusperbaikan.php?id='.$perbaikan['id'].'&statusperbaikan=2">Belum</a>';
                            } else {
                              echo '<a class="badge badge-warning" href="statusperbaikan.php?id='.$perbaikan['id'].'&statusperbaikan=1">Proses</a>';
                            }
                          ?>
                        </td>
                        <td><?=$perbaikan['kode']?></td>
                        <td><?=$perbaikan['barang']?></td>
                        <td><?=$perbaikan['pengajuan']?></td>
                        <td><?=$perbaikan['tindakan']?></td>
                        <td><?=$perbaikan['kondisi_awal']?></td>
                        <td><?=$perbaikan['kondisi_akhir']?></td>
                        <td><?=$perbaikan['teknisi']?></td>
                        <td>
                            <a href="<?= BASEURL;?>/perbaikan/ubah/<?=$perbaikan['id']?>" data-bs-toggle="modal" data-bs-target="#exampleModalLong" class="tampilModalUbah" data-id="<?= $perbaikan['id'];?>">
                            <button class="button-arounder"> 
                                <span class="material-symbols-outlined"> edit </span>
                            </button>
                            </a>
                            <a href="<?= BASEURL;?>/perbaikan/hapus/<?=$perbaikan['id']?>" onclick="return confirm ('Hapus data?') ">
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

      <script src="<?= BASEURL; ?>/vendors/chart.js/chart.min.js"></script>
      <script>
    $(function() {
    const BASEURL = window.location.href;
    console.log(BASEURL)
    $('.tombolTambahData').on('click', function(){
        $('formModalLabel').html('Tambah Data Prestasi')
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });

			$(".tampilModalUbah").click(function () {
				$("#modal").addClass("edit");
				$("#modalLabel").html("Ubah Data Perbaikan");
				$(".modal-footer button[type=submit]").html("Ubah Data");
				$(".modal-body form").attr("action", `${BASEURL}/ubah`);

				const id = $(this).data("id");
                console.log(id)

				$.ajax({
					url: `${BASEURL}/getubah`,
					data: { id: id },
					method: "post",
					dataType: "json",
					success: function (data) {
						$('#nama').val(data.nama);
                        $('#kode').val(data.kode);
                        $('#barang').val(data.barang);
                        $('#pengajuan').val(data.pengajuan);
                        $('#tindakan').val(data.tindakan);
                        $('#kondisi_awal').val(data.kondisi_awal);
                        $('#kondisi_akhir').val(data.kondisi_akhir);
                        $('#statusperbaikan').val(data.statusperbaikan);
                        $('#teknisi').val(data.teknisi);
                        $('#note').val(data.note);
                        $('#id').val(data.id);
                        console.log(data);
					},
				})
            })
		}
	);
      </script>
      <script>
      $(document).ready(function () {
        $('#demo').DataTable();
      });
    </script>
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
    $(function() {
  /* ChartJS
   * -------
   * Data and config for chartjs
   */
  'use strict';
  var proses = {
            labels: ["Belum", "Proses", "Selesai"],
            datasets: [{
            label: 'Status',
            data: [
              <?php 
                $jumlah_Broadcast = mysqli_query($connect,"SELECT * from data_perbaikan where statusperbaikan='0' AND status = 1");
                echo mysqli_num_rows($jumlah_Broadcast);
              ?>,
              <?php 
                $jumlah_Badminton = mysqli_query($connect,"SELECT * from data_perbaikan where statusperbaikan='2' AND status = 1");
                echo mysqli_num_rows($jumlah_Badminton);
              ?>,
              <?php 
                $jumlah_Robotik = mysqli_query($connect,"SELECT * from data_perbaikan where statusperbaikan='1' AND status = 1");
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

  if ($("#proses").length) {
    var barChartCanvas = $("#proses").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvas, {
      type: 'pie',
      data: proses,
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
  
  var options = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    },
    legend: {
      display: false
    },
    elements: {
      point: {
        radius: 0
      }
    }

  };
    });
  </script>

<script>
    $(function() {
    const BASEURL = window.location.href;
    console.log(BASEURL)
    $('.tombolTambahData').on('click', function(){
        $('formModalLabel').html('Tambah Data Prestasi')
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });

			$(".tampilModalUbah").click(function () {
				$("#modal").addClass("edit");
				$("#modalLabel").html("Ubah Data Perbaikan");
				$(".modal-footer button[type=submit]").html("Ubah Data");
				$(".modal-body form").attr("action", `${BASEURL}/ubah`);

				const id = $(this).data("id");
                console.log(id)

				$.ajax({
					url: `${BASEURL}/getubah`,
					data: { id: id },
					method: "post",
					dataType: "json",
					success: function (data) {
						$('#nama').val(data.nama);
                        $('#kode').val(data.kode);
                        $('#barang').val(data.barang);
                        $('#pengajuan').val(data.pengajuan);
                        $('#tindakan').val(data.tindakan);
                        $('#kondisi_awal').val(data.kondisi_awal);
                        $('#kondisi_akhir').val(data.kondisi_akhir);
                        $('#statusperbaikan').val(data.statusperbaikan);
                        $('#teknisi').val(data.teknisi);
                        $('#note').val(data.note);
                        $('#id').val(data.id);
                        console.log(data);
					},
				})
            })
		}
	);
  </script>