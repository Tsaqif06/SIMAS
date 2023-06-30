<?php
  include('connect.php');
  $kategori = mysqli_query($connect, "SELECT nama FROM fasilitas WHERE status = 1 GROUP BY nama");
  $jumlah = mysqli_query($connect, "SELECT SUM(jumlah) AS jumlah FROM fasilitas GROUP BY nama");
?>

<!-- <div class="main-panel"> -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">DATA FASILITAS</h3>
                  <h6 class="font-weight-normal mb-0">Data Sarana dan Prasarana di SMKN 4 Malang</span></h6>
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
              <a class="btn btn-primary" role="button" data-toggle="modal" data-target="#exampleModalLong">Tambah Data Fasilitas</a>
              <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-url="<?= BASEURL ?>/fasilitas" data-bs-toggle="modal" data-bs-target="#modalImport"> Import Data Dari Excel </button>
            </div>
        </div>

          <div class="row">
          <a class="col-lg-12 grid-margin stretch-card" href="#print" style="text-decoration: none;">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Fasilitas</h4>
                  <canvas id="fasilitas"></canvas>
                </div>
              </div>
            </a>
          <!-- </div> -->
          <div id="exampleModalLong" class="modal fade" role="dialog" data-backdrop="static">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h3 id="modalLabel"> Tambah Data Fasilitas</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form action="<?= BASEURL; ?>/fasilitas/tambah" method="post">
                      <input type="hidden" name="id" id="id">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Fasilitas</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Fasilitas" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah</label>
                      <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Keterangan</label>
                      <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required/>
                    </div>

                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                  </div>
              </form>
              </div>
            </div>
            </div>
          </div>
          <div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalLabel">Import Data Mata Pelajaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL ?>/fasilitas/importData" method="post" enctype="multipart/form-data">
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
                        <th>Nama Fasilitas</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                        <?php foreach( $data['fasilitas'] as $fasilitas ) : ?>
                        <tr>
                        <td><?= $i++;?></td>
                        <td><?=$fasilitas['nama']?></td>
                        <td><?=$fasilitas['jumlah']?></td>
                        <td><?=$fasilitas['keterangan']?></td>
                        <td>
                            <a href="<?= BASEURL;?>/fasilitas/ubah/<?=$fasilitas['id']?>" data-bs-toggle="modal" data-bs-target="#exampleModalLong" class="tampilModalUbah" data-id="<?= $fasilitas['id'];?>">
                            <button class="button-arounder"> 
                                <span class="material-symbols-outlined"> edit </span>
                            </button>
                            </a>
                            <a href="<?= BASEURL;?>/fasilitas/hapus/<?=$fasilitas['id']?>" onclick="return confirm ('Hapus data?') ">
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

        
        <!-- <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer> -->
        <!-- <script src="<?=BASEURL;?>/js/pengajuanJurusan.js"></script> -->
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
    const BASEURL = window.location.href;
    console.log(BASEURL)
    $('.tombolTambahData').on('click', function(){
        $('formModalLabel').html('Tambah Data Pengajuan')
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });

    $(".tampilModalUbah").click(function () {
		$("#modal").addClass("edit");
		$("#modalLabel").html("Ubah Data Pengajuan");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr("action", `${BASEURL}/ubah`);

		const id = $(this).data("id");
        console.log(id);

		$.ajax({
            url: `${BASEURL}/getubah`,
            data: { id: id },
            method: "post",
            dataType: "json",
            success: function (data) {
                $('#nama').val(data.nama);
                $('#jumlah').val(data.jumlah);
                $('#keterangan').val(data.keterangan);
                $('#id').val(data.id);
                console.log(data);
            },
        })
    })
});
  </script>
  <script>
    $(function() {
  /* ChartJS
   * -------
   * Data and config for chartjs
   */
  'use strict';
  var fasilitas = {
    labels: [<?php while($row = mysqli_fetch_array($kategori)) {echo '"'.$row['nama'].'",';} ?>],
    datasets: [{
      label: '# of Votes',
      data: [<?php while($row = mysqli_fetch_array($jumlah)) {echo '"'.$row['jumlah'].'",';} ?>],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: false
    }]
  };

  // Get context with jQuery - using jQuery's .get() method.
  if ($("#fasilitas").length) {
    var barChartCanvas = $("#fasilitas").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: fasilitas,
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
		});

  var doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
  }
  </script>
