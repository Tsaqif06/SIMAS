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
          <h3 class="font-weight-bold">DATA PENGAJUAN WAKA</h3>
          <h6 class="font-weight-normal mb-0">Data Pengajuan Barang Untuk Wakil Kepala di SMKN 4 Malang</span></h6>
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
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Status</h4>
          <canvas id="proses"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">WAKA</h4>
          <canvas id="waka"></canvas>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="row mb-4">
            <div class="col">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLong">ISI FORM PENGAJUAN</button>
            </div>
          </div> -->
  <div id="exampleModalLong" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 id="modalLabel"> Tambah Data Pengajuan</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="<?= BASEURL; ?>/pengajuanWaka/tambah" method="post">
            <input type="hidden" name="id" id="id">

            <div class="form-group">
              <label for="exampleInputEmail1">Wakil Kepala</label>
              <select id="waka" name="waka" class="form-control">
                <option value="Kesiswaan">Kesiswaan</option>
                <option value="Kurikulum">Kurikulum</option>
                <option value="Sarana dan Prasarana">Sarana dan Prasarana</option>
                <option value="PSDM">PSDM</option>
                <option value="Humas">Humas</option>
                <option value="TU">TU</option>
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Nama Barang</label>
              <input type="text" class="form-control" id="barang" name="barang" placeholder="" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Spesifikasi</label>
              <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" placeholder="" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Kebutuhan Bulan Ke-</label>
              <input class="form-control" id="bulan" name="bulan" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Jumlah</label>
              <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Satuan</label>
              <input type="text" class="form-control" id="satuan" name="satuan" placeholder="" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Perkiraan Harga Satuan (Termasuk Pajak)</label>
              <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Perkiraan Total Harga</label>
              <input type="text" class="form-control" id="harga_total" name="harga_total" placeholder="" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Digunakan Untuk</label>
              <input type="text" class="form-control" id="digunakan_untuk" name="digunakan_untuk" placeholder=""
                required />
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
                  <th>WAKA</th>
                  <th>Nama Barang</th>
                  <th>Spesifikasi</th>
                  <th>Bulan Ke</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Perkiraan Harga Satuan + Pajak</th>
                  <th>Pekiraan Total Harga</th>
                  <th>Digunakan Untuk</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['pengajuan_waka'] as $pengajuan): ?>
                  <tr>
                    <td>
                      <?= $i++; ?>
                    </td>
                    <td>
                      <?php
                      if ($pengajuan['statuspengajuan'] == 1) {
                        echo '<a class="badge badge-success" href="statuswaka.php?id=' . $pengajuan['id'] . '&statuspengajuan=0">Selesai</a>';
                      } elseif ($pengajuan['statuspengajuan'] == 0) {
                        echo '<a class="badge badge-danger" href="statuswaka.php?id=' . $pengajuan['id'] . '&statuspengajuan=2">Belum</a>';
                      } else {
                        echo '<a class="badge badge-warning" href="statuswaka.php?id=' . $pengajuan['id'] . '&statuspengajuan=1">Proses</a>';
                      }
                      ?>
                    </td>
                    <td>
                      <?= $pengajuan['waka'] ?>
                    </td>
                    <td>
                      <?= $pengajuan['barang'] ?>
                    </td>
                    <td>
                      <?= $pengajuan['spesifikasi'] ?>
                    </td>
                    <td>
                      <?= $pengajuan['bulan'] ?>
                    </td>
                    <td>
                      <?= $pengajuan['jumlah'] ?>
                    </td>
                    <td>
                      <?= $pengajuan['satuan'] ?>
                    </td>
                    <td>
                      <?= $pengajuan['harga_satuan'] ?>
                    </td>
                    <td>
                      <?= $pengajuan['harga_total'] ?>
                    </td>
                    <td>
                      <?= $pengajuan['digunakan_untuk'] ?>
                    </td>
                    <td>
                      <a href="<?= BASEURL; ?>/pengajuanWaka/ubah/<?= $pengajuan['id'] ?>" data-bs-toggle="modal"
                        data-bs-target="#exampleModalLong" class="tampilModalUbah" data-id="<?= $pengajuan['id']; ?>">
                        <button class="button-arounder">
                          <span class="material-symbols-outlined"> edit </span>
                        </button>
                      </a>
                      <a href="<?= BASEURL; ?>/pengajuanWaka/hapus/<?= $pengajuan['id'] ?>"
                        onclick="return confirm ('Hapus data?') ">
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

<script src="<?= BASEURL; ?>/js/pengajuanWaka.js"></script>
<script src="<?= BASEURL; ?>/vendors/chart.js/chart.min.js"></script>
<script>
  $(document).ready(function () {
    $('#print').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'excel', 'pdf', 'print'
      ]
    });
  });
</script>
<script>
  $(function () {
    const BASEURL = window.location.href;
    // console.log(BASEURL)
    $('.tombolTambahData').on('click', function () {
      $('formModalLabel').html('Tambah Data Pengajuan')
      $('.modal-footer button[type=submit]').html('Tambah Data');

    });

    $(".tampilModalUbah").click(function () {
      $("#modal").addClass("edit");
      $("#modalLabel").html("Ubah Data Pengajuan");
      $(".modal-footer button[type=submit]").html("Ubah Data");
      $(".modal-body form").attr("action", `${BASEURL}/ubah`);

      const id = $(this).data("id");
      console.log(id)

      $.ajax({
        url: `${BASEURL}/getubah`,
        data: {
          id: id
        },
        method: "post",
        dataType: "json",
        success: function (data) {
          $('#waka').val(data.waka);
          $('#barang').val(data.barang);
          $('#spesifikasi').val(data.spesifikasi);
          $('#bulan').val(data.bulan);
          $('#jumlah').val(data.jumlah);
          $('#satuan').val(data.satuan);
          $('#harga_satuan').val(data.harga_satuan);
          $('#harga_total').val(data.harga_total);
          $('#digunakan_untuk').val(data.digunakan_untuk);
          $('#id').val(data.id);
          console.log(data);
        },
      })
    })
  });
</script>
<script>
  var proses = {
    labels: ["Belum", "Proses", "Selesai"],
    datasets: [{
      label: 'Status',
      data: [
        <?php
        $jumlah_Broadcast = mysqli_query($connect, "SELECT * from pengajuan_bidang where statuspengajuan='0'");
        echo mysqli_num_rows($jumlah_Broadcast);
        ?>,
        <?php
        $jumlah_Badminton = mysqli_query($connect, "SELECT * from pengajuan_bidang where statuspengajuan='2'");
        echo mysqli_num_rows($jumlah_Badminton);
        ?>,
        <?php
        $jumlah_Robotik = mysqli_query($connect, "SELECT * from pengajuan_bidang where statuspengajuan='1'");
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

  var waka = {
    labels: ["Humas", "Kurikulum", "Kesiswaan", "PSDM", "TU"],
    datasets: [{
      label: 'Pengajuan',
      data: [
        <?php
        $jumlah_Humas = mysqli_query($connect, "select * from pengajuan_waka where waka='Humas'");
        echo mysqli_num_rows($jumlah_Humas);
        ?>,
        <?php
        $jumlah_Kurikulum = mysqli_query($connect, "select * from pengajuan_waka where waka='Kurikulum'");
        echo mysqli_num_rows($jumlah_Kurikulum);
        ?>,
        <?php
        $jumlah_Kesiswaan = mysqli_query($connect, "select * from pengajuan_waka where waka='Kesiswaan'");
        echo mysqli_num_rows($jumlah_Kesiswaan);
        ?>,
        <?php
        $jumlah_PSDM = mysqli_query($connect, "select * from pengajuan_waka where waka='PSDM'");
        echo mysqli_num_rows($jumlah_PSDM);
        ?>,
        <?php
        $jumlah_TU = mysqli_query($connect, "select * from pengajuan_waka where waka='TU'");
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
              beginAtZero: true
            }
          }]
        }
      }
    });
  }
</script>