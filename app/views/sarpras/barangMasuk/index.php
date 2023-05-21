<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">DATA BARANG MASUK</h3>
          <h6 class="font-weight-normal mb-0">Data Barang Masuk</span></h6>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLong">TAMBAH DATA BARANG MASUK</button>
      <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-url="<?= BASEURL ?>/barangMasuk" data-bs-toggle="modal" data-bs-target="#modalImport">
        Import Data Dari Excel
      </button>
    </div>
  </div>
  <div id="exampleModalLong" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
      <!-- modal -->
      <div class="modal-content">
        <div class="modal-header">
          <h3 id="modalLabel"> Tambah Data Pengajuan</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype="multipart/form-data" action="<?= BASEURL; ?>/barangMasuk/tambah" method="post">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="fotoLama" id="fotoLama">

            <div class="form-group">
              <label for="exampleInputEmail1">Tanggal</label>
              <input type="date" class="form-control" id="tgl" name="tgl" placeholder="" required />
            </div>


            <label for="exampleInputEmail1">Foto Barang</label>
            <input class="form-control" type="file" id="foto" name="foto">


            <div class="form-group">
              <label for="exampleInputEmail1">Uraian</label>
              <input type="text" class="form-control" id="uraian" name="uraian" placeholder="" required />
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
              <label for="exampleInputEmail1">Keterangan</label>
              <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="" required />
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
          <h1 class="modal-title fs-5" id="modalLabel">Import Data Barang Masuk</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= BASEURL ?>/barangMasuk/importData" method="post" enctype="multipart/form-data">
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
                  <th>Tanggal</th>
                  <th>Foto Barang</th>
                  <th>Uraian</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['barang_masuk'] as $masuk) : ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $masuk['tgl'] ?></td>
                    <td width="175px"><img src="<?= BASEURL ?>/images/datafoto/<?= $masuk['foto'] ?>" style="border-radius: 0px; width: 100%; height: auto;"></td>
                    <td><?= $masuk['uraian'] ?></td>
                    <td><?= $masuk['jumlah'] ?></td>
                    <td><?= $masuk['satuan'] ?></td>
                    <td><?= $masuk['keterangan'] ?></td>
                    <td>
                      <a href="<?= BASEURL; ?>/barangMasuk/ubah/<?= $masuk['id'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModalLong" class="tampilModalUbah" data-id="<?= $masuk['id']; ?>">
                        <button class="button-arounder">
                          <span class="material-symbols-outlined"> edit </span>
                        </button>
                      </a>
                      <a href="<?= BASEURL; ?>/barangMasuk/hapus/<?= $masuk['id'] ?>" onclick="return confirm ('Hapus data?') ">
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
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
  </div> -->
</footer>
<!-- <script src="<?= BASEURL; ?>/js/pengajuanMapel.js"></script> -->
<script>
  $(document).ready(function() {
    $('#print').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'excel', 'pdf', 'print'
      ]
    });
  });
</script>
<script>
  $(function() {
    const BASEURL = window.location.href;
    console.log(BASEURL)
    $('.tombolTambahData').on('click', function() {
      $('formModalLabel').html('Tambah Data Barang Masuk')
      $('.modal-footer button[type=submit]').html('Tambah Data');

    });

    $(".tampilModalUbah").click(function() {
      $("#modal").addClass("edit");
      $("#modalLabel").html("Ubah Data Barang Masuk");
      $(".modal-footer button[type=submit]").html("Ubah Data");
      $(".modal-body form").attr("action", `${BASEURL}/ubah`);

      const id = $(this).data("id");
      console.log(id);

      $.ajax({
        url: `${BASEURL}/getubah`,
        data: {
          id: id
        },
        method: "post",
        dataType: "json",
        success: function(data) {
          $('#tgl').val(data.tgl);
          $("#fotoLama").val(data.foto);
          $('#uraian').val(data.uraian);
          $('#jumlah').val(data.jumlah);
          $('#satuan').val(data.satuan);
          $('#keterangan').val(data.keterangan);
          $('#id').val(data.id);
          console.log(data);
        },
      })
    })
  });
</script>
