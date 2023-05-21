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
      <a class="btn btn-primary tombolTambahData" role="button" data-toggle="modal" data-target="#modal">ISI FORM
        PENGAJUAN</a>
      <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-url="<?= BASEURL ?>/stokBarang"
        data-bs-toggle="modal" data-bs-target="#modalImport">
        Import Data Dari Excel
      </button>
    </div>
  </div>

  <div id="modal" class="modal fade" role="dialog" data-backdrop="static">
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
              <label for="exampleInputEmail1">Satuan</label>
              <input type="text" class="form-control" id="satuan" name="satuan" placeholder="" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Stok</label>
              <input type="number" class="form-control" id="stok" name="stok" placeholder="" required />
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Tambah Data</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Tutup</button>
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
                      <a href="<?= BASEURL; ?>/stokBarang/ubah/<?= $stok['id'] ?>" data-toggle="modal" data-target="#modal" class="hai" data-id="<?= $stok['id']; ?>">
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
  $(document).ready(function () {
    const BASEURL = window.location.href;
    console.log(BASEURL)
    $('.tombolTambahData').on('click', function () {
      $('#modalLabel').html('Tambah Data Stok Barang')
      $('.modal-footer button[type=submit]').html('Tambah Data');

      $('#kode').val('');
      $('#barang').val('');
      $('#satuan').val('');
      $('#stok').val('');
      $('#harga').val('');
      $('#id').val('');

    });

    $(".hai").click(function () {
      $("#modal").addClass("edit");
      $("#modalLabel").html("Ubah Data Stok Barang");
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
          $('#kode').val(data.kode);
          $('#barang').val(data.barang);
          $('#satuan').val(data.satuan);
          $('#stok').val(data.stok);
          $('#harga').val(data.harga);
          $('#id').val(data.id);
          console.log(data);
        },
      })
    })
  });
</script>