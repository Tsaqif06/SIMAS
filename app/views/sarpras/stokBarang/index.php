<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">DATA STOK BARANG</h3>
          <h6 class="font-weight-normal mb-0">Data Stok Barang di SMKN 4 Malang</span></h6>
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
    <div class="col">
      <a class="btn btn-primary" role="button" data-toggle="modal" data-target="#exampleModalLong">ISI FORM
        PENGAJUAN</a>
      <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-url="<?= BASEURL ?>/stokBarang"
        data-bs-toggle="modal" data-bs-target="#modalImport">
        Import Data Dari Excel
      </button>
    </div>
  </div>
  <div id="exampleModalLong" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 id="modalLabel"> Tambah Data Stok Barang</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="<?= BASEURL; ?>/stokBarang/tambah" method="post">
            <input type="hidden" name="id" id="id">

            <div class="form-group">
              <label for="exampleInputEmail1">Kode Barang</label>
              <input type="text" class="form-control" id="kode" name="kode" placeholder="" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Nama Barang</label>
              <input type="text" class="form-control" id="barang" name="barang" placeholder="" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Stok</label>
              <input type="number" class="form-control" id="stok" name="stok" placeholder="" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Harga Jual</label>
              <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="text" class="form-control" id="harga" name="harga" placeholder="10000" required />
              </div>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Kategori</label>
              <select class="form-control" id="kategori" name="kategori" placeholder="" required>
                <option value="Alat Kebersihan">Alat Kebersihan</option>
                <option value="Alat Listrik">Alat Listrik</option>
                <option value="Alat Praktek">Alat Praktek</option>
                <option value="ATK">ATK</option>
                <option value="Barang Praktik">Barang Praktik</option>
                <option value="Barang Modal">Barang Modal</option>
                <option value="Buku Agenda Tamu">Buku Agenda Tamu</option>
                <option value="Komputer">Komputer</option>
                <option value="Lain-lain">Lain-lain</option>
                <option value="LAN">LAN</option>
                <option value="Tukang">Tukang</option>
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">UPC</label>
              <input type="text" class="form-control" id="upc" name="upc" placeholder="" required />
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
          <h1 class="modal-title fs-5" id="modalLabel">Import Data Stok Barang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= BASEURL ?>/stokBarang/importData" method="post" enctype="multipart/form-data">
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
                  <th>Kode</th>
                  <th>Nama Barang</th>
                  <th>Stok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ?>
                <?php foreach ($data['stok'] as $stok): ?>
                  <tr>
                    <td>
                      <?= $i++ ?>
                    </td>
                    <td>
                      <?= $stok['kode'] ?>
                    </td>
                    <td>
                      <?= $stok['barang'] ?>
                    </td>
                    <td>
                      <?= $stok['stok'] ?>
                    </td>
                    <td>
                      <a href="<?= BASEURL; ?>/stokBarang/ubah/<?= $stok['id'] ?>" data-bs-toggle="modal"
                        data-bs-target="#exampleModalLong" class="tampilModalUbah" data-id="<?= $stok['id']; ?>">
                        <button class="button-arounder">
                          <span class="material-symbols-outlined"> edit </span>
                        </button>
                      </a>
                      <a href="<?= BASEURL; ?>/stokBarang/hapus/<?= $stok['id'] ?>"
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
        'use strict';
        var stokBarangKategori = {
          labels: [<?php while ($row = mysqli_fetch_array($kategori)) {
            echo '"' . $row['kategori'] . '",';
          } ?>],
          datasets: [{
            label: '# of Votes',
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

        // Get context with jQuery - using jQuery's .get() method.
        if ($("#kategoriStokBarang").length) {
          var barChartCanvas = $("#kategoriStokBarang").get(0).getContext("2d");
          // This will get the first returned node in the jQuery collection.
          var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: stokBarangKategori,
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
      });
    </script>