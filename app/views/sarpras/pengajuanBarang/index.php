<?php
  include('connect.php');
  $kategori = mysqli_query($connect, "SELECT jurusan FROM pengajuan_jurusan GROUP BY jurusan");
  // $jumlah_animasi = mysqli_query($connect, "SELECT SUM(jurusan) AS jumlah FROM pengajuan_jurusan GROUP BY jurusan");
?>
<!-- <div class="main-panel"> -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">PENGAJUAN SARANA PRASARANA</h3>
                    <h6 class="font-weight-normal mb-0">Pengajuan di SMKN 4 Malang</span></h6>
                </div>
              </div>
            </div>
          </div>                        
          <div class="col-md-12 grid-margin transparent">
            <div class="row">

              <a class="spa-load col-md-6 mb-4 stretch-card transparent pengajuan" href="<?= BASEURL; ?>/pengajuanJurusan" style="text-decoration:none;">
                <div class="card card-dark-blue">
                  <div class="card-body">
                    <h5 class="mb-4">PENGAJUAN JURUSAN</h5>
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Jurusan</h4>
                        <canvas id="jurusan"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </a>

              <a class="spa-load col-md-6 mb-4 stretch-card transparent" href="<?= BASEURL; ?>/pengajuanMapel" style="text-decoration:none;">
                <div class="card card-dark-blue">
                  <div class="card-body">
                    <h5 class="mb-4">PENGAJUAN MAPEL</h5>
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Mapel</h4>
                        <canvas id="mapel"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </a>

              <div class="col-md-12 grid-margin transparent">
                <div class="row">
                  <a class="spa-load col-md-6 mb-4 stretch-card transparent" href="<?= BASEURL; ?>/pengajuanBidang" style="text-decoration: none;">
                    <div class="card card-tale">
                      <div class="card-body">
                        <h5 class="mb-4">PENGAJUAN BIDANG</h5>
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Bidang</h4>
                            <canvas id="bidang"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>

              <a class="spa-load col-md-6 mb-4 stretch-card transparent" href="<?= BASEURL; ?>/pengajuanWaka" style="text-decoration: none;">
                <div class="card card-tale">
                  <div class="card-body">
                    <h5 class="mb-4">PENGAJUAN WAKA</h5>
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Waka</h4>
                        <canvas id="waka"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            </div>
          </div>
        </div>
      </div>

        

      <!-- tabel -->

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>

        <script src="<?= BASEURL; ?>/vendors/chart.js/chart.min.js"></script>
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

  var mapel = {
            labels: ["Agama", "Bahasa Jawa", "Informatika", "IPAS", "Matematika", "PJOK", "PKK", "Seni"],
            datasets: [{
            label: 'Pengajuan',
            data: [
              <?php 
                $jumlah_Agama = mysqli_query($connect,"select * from pengajuan_mapel where mapel='Agama'");
                echo mysqli_num_rows($jumlah_Agama);
              ?>,
              <?php 
                $jumlah_Bahasa_Jawa = mysqli_query($connect,"select * from pengajuan_mapel where mapel='Bahasa Jawa'");
                echo mysqli_num_rows($jumlah_Bahasa_Jawa);
              ?>,
              <?php 
                $jumlah_Informatika = mysqli_query($connect,"select * from pengajuan_mapel where mapel='Informatika'");
                echo mysqli_num_rows($jumlah_Informatika);
              ?>,
              <?php 
                $jumlah_IPAS = mysqli_query($connect,"select * from pengajuan_mapel where mapel='IPAS'");
                echo mysqli_num_rows($jumlah_IPAS);
              ?>,
              <?php 
                $jumlah_Matematika = mysqli_query($connect,"select * from pengajuan_mapel where mapel='Matematika'");
                echo mysqli_num_rows($jumlah_Matematika);
              ?>,
              <?php 
                $jumlah_PJOK = mysqli_query($connect,"select * from pengajuan_mapel where mapel='PJOK'");
                echo mysqli_num_rows($jumlah_PJOK);
              ?>,
              <?php 
                $jumlah_PKK = mysqli_query($connect,"select * from pengajuan_mapel where mapel='PKK'");
                echo mysqli_num_rows($jumlah_PKK);
              ?>,
              <?php 
                $jumlah_Seni = mysqli_query($connect,"select * from pengajuan_mapel where mapel='Seni'");
                echo mysqli_num_rows($jumlah_Seni);
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

  if ($("#mapel").length) {
    var barChartCanvas = $("#mapel").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: mapel,
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

  var bidang = {
            labels: ["Bank", "BK", "Inbis", "Masjid", "Ekstrakurikuler", "Kopsis", "Perpustakaan", "CS", "M&R"],
            datasets: [{
            label: 'Pengajuan',
            data: [
              <?php 
                $jumlah_Bank = mysqli_query($connect,"select * from pengajuan_bidang where bidang='Bank'");
                echo mysqli_num_rows($jumlah_Bank);
              ?>,
              <?php 
                $jumlah_BK = mysqli_query($connect,"select * from pengajuan_bidang where bidang='BK'");
                echo mysqli_num_rows($jumlah_BK);
              ?>,
              <?php 
                $jumlah_Inbis = mysqli_query($connect,"select * from pengajuan_bidang where bidang='Inbis'");
                echo mysqli_num_rows($jumlah_Inbis);
              ?>,
              <?php 
                $jumlah_Masjid = mysqli_query($connect,"select * from pengajuan_bidang where bidang='Masjid'");
                echo mysqli_num_rows($jumlah_Masjid);
              ?>,
              <?php 
                $jumlah_Ekstrakurikuler = mysqli_query($connect,"select * from pengajuan_bidang where bidang='Ekstrakurikuler'");
                echo mysqli_num_rows($jumlah_Ekstrakurikuler);
              ?>,
              <?php 
                $jumlah_Kopsis = mysqli_query($connect,"select * from pengajuan_bidang where bidang='Kopsis'");
                echo mysqli_num_rows($jumlah_Kopsis);
              ?>,
              <?php 
                $jumlah_Perpustakaan = mysqli_query($connect,"select * from pengajuan_bidang where bidang='Perpustakaan'");
                echo mysqli_num_rows($jumlah_Perpustakaan);
              ?>,
              <?php 
                $jumlah_CS = mysqli_query($connect,"select * from pengajuan_bidang where bidang='CS'");
                echo mysqli_num_rows($jumlah_CS);
              ?>,
              <?php 
                $jumlah_MR = mysqli_query($connect,"select * from pengajuan_bidang where bidang='M&R'");
                echo mysqli_num_rows($jumlah_MR);
              ?>,
            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(0, 255, 228, 0.2)',
              'rgba(255, 0, 252, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(0, 255, 228, 1)',
              'rgba(255, 0, 252, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            fill: false
          }]
          };

  if ($("#bidang").length) {
    var barChartCanvas = $("#bidang").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: bidang,
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

  var waka = {
            labels: ["Humas", "Kurikulum", "Kesiswaan", "PSDM", "TU"],
            datasets: [{
            label: 'Pengajuan',
            data: [
              <?php 
                $jumlah_Humas = mysqli_query($connect,"select * from pengajuan_waka where waka='Humas'");
                echo mysqli_num_rows($jumlah_Humas);
              ?>,
              <?php 
                $jumlah_Kurikulum = mysqli_query($connect,"select * from pengajuan_waka where waka='Kurikulum'");
                echo mysqli_num_rows($jumlah_Kurikulum);
              ?>,
              <?php 
                $jumlah_Kesiswaan = mysqli_query($connect,"select * from pengajuan_waka where waka='Kesiswaan'");
                echo mysqli_num_rows($jumlah_Kesiswaan);
              ?>,
              <?php 
                $jumlah_PSDM = mysqli_query($connect,"select * from pengajuan_waka where waka='PSDM'");
                echo mysqli_num_rows($jumlah_PSDM);
              ?>,
              <?php 
                $jumlah_TU = mysqli_query($connect,"select * from pengajuan_waka where waka='TU'");
                echo mysqli_num_rows($jumlah_TU);
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

  if ($("#waka").length) {
    var barChartCanvas = $("#waka").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: waka,
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
        </script>
