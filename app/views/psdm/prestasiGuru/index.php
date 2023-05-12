<?php
include('connect.php');
$kategori = mysqli_query($connect, "SELECT tahun FROM prestasi_guru GROUP BY tahun");
$jumlah = mysqli_query($connect, "SELECT COUNT(tahun) AS jumlah FROM prestasi_guru GROUP BY tahun");
$juara = mysqli_query($connect, "SELECT juara FROM prestasi_guru GROUP BY juara");
$jumlahJuara = mysqli_query($connect, "SELECT COUNT(juara) AS jumlahJuara FROM prestasi_guru GROUP BY juara");
?>

<style>
  .button-arounder {
    background: white;
    font-size: 4px;
    border: solid 2px #4B49AC;
    padding: .375em 1.125em;
    font-weight: bold;
    border-radius: 10px;
    color: #4B49AC;
    width: 50%;
  }

  .button-arounder:hover,
  .button-arounder:focus {
    box-shadow: 0 4px 8px hsla(190deg, 15%, 5%, .2);
    transform: translateY(-4px);
    background: #4B49AC;
    border-top-left-radius: var(--radius);
    border-top-right-radius: var(--radius);
    border-bottom-left-radius: var(--radius);
    border-bottom-right-radius: var(--radius);
    color: white;
    border-radius: 10px;
    width: 50%;
  }

  td {
    word-break: break-all;
    width: 100px;
  }
</style>
<div class="content-wrapper">
  <div class="row mb-4">
    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
      <h3 class="font-weight-bold">DATA PRESTASI GURU</h3>
      <h6 class="font-weight-normal mb-0">Data prestasi guru SMKN 4 Malang</span></h6>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLong">Tambah Data Prestasi</button>
      <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-bs-toggle="modal" data-bs-target="#modalImport">
        Import Data Dari Excel
      </button>
    </div>
  </div>

  <div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalLabel">Import Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= BASEURL ?>/prestasiGuru/importData" method="post" enctype="multipart/form-data">
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

  <div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tahun</h4>
          <canvas id="prestasiGuru"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Juara</h4>
          <canvas id="juaraGuru"></canvas>
        </div>
      </div>
    </div>
  </div>


  <div id="exampleModalLong" class="modal fade" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <h3 id="modalLabel"> Tambah Data Prestasi </h3>
          <span type="button" data-bs-dismiss="modal" aria-label="Close" class="material-symbols-outlined">close</span>
        </div>

        <div class="modal-body">
          <form action="<?= BASEURL; ?>/prestasiGuru/tambah" method="post">
            <input type="hidden" name="id" id="id">

            <div class="form-group">
              <label for="exampleInputEmail1">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Prestasi</label>
              <input type="text" class="form-control" id="prestasi" name="prestasi" placeholder="Prestasi" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Skala</label>
              <input type="text" class="form-control" id="skala" name="skala" placeholder="Skala" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Juara</label>
              <input type="number" class="form-control" id="juara" name="juara" placeholder="Juara" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Tahun</label>
              <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Tahun" required />
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
            <table id="table" class="table table-striped table-bordered">

              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Prestasi</th>
                  <th>Skala</th>
                  <th>Juara</th>
                  <th>Tahun</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach ($data['prestasi_guru'] as $prestasi) : ?>
                  <tr>
                    <td><?= $prestasi['nama'] ?></td>
                    <td><?= $prestasi['prestasi'] ?></td>
                    <td><?= $prestasi['skala'] ?></td>
                    <td><?= $prestasi['juara'] ?></td>
                    <td><?= $prestasi['tahun'] ?></td>
                    <td>
                      <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalLong" class="tampilModalUbah" data-id="<?= $prestasi['id']; ?>">
                        <button class="button-arounder">
                          <span class="material-symbols-outlined"> edit </span>
                        </button>
                      </a>
                      <a href="<?= BASEURL; ?>/prestasiGuru/hapus/<?= $prestasi['id'] ?>" onclick="return confirm ('Hapus data?') ">
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
</div>


<script src="<?= BASEURL; ?>/js/script.js"></script>
<script src="<?= BASEURL; ?>/vendors/chart.js/chart.min.js"></script>
<!-- <script src="<?= BASEURL; ?>/js/chart.js"></script> -->

<script>
  var prestasi = {
    labels: [<?php while ($row = mysqli_fetch_array($kategori)) {
                echo '"' . $row['tahun'] . '",';
              } ?>],
    datasets: [{
      label: 'Jumlah juara tahun',
      data: [<?php while ($row = mysqli_fetch_array($jumlah)) {
                echo '"' . $row['jumlah'] . '",';
              } ?>],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
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

  if ($("#prestasiGuru").length) {
    var barChartCanvas = $("#prestasiGuru").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: prestasi,
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  }
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

  var juara = {
    labels: [<?php while ($row = mysqli_fetch_array($juara)) {
                echo '"' . $row['juara'] . '",';
              } ?>],
    datasets: [{
      label: 'Jumlah juara tahun',
      data: [<?php while ($row = mysqli_fetch_array($jumlahJuara)) {
                echo '"' . $row['jumlahJuara'] . '",';
              } ?>],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
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

  if ($("#juaraGuru").length) {
    var barChartCanvas = $("#juaraGuru").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvas, {
      type: 'pie',
      data: juara,
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