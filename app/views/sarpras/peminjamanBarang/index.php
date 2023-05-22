<!-- <div class="main-panel"> -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">DATA PEMINJAMAN BARANG</h3>
          <h6 class="font-weight-normal mb-0">Data Peminjaman Barang di SMKN 4 Malang</span></h6>
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
    <div class="col-6">
      <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-url="<?= BASEURL ?>/peminjamanBarang" data-bs-toggle="modal" data-bs-target="#modalImport">
        Import Data Dari Excel
      </button>
    </div>
  </div>

  <div id="exampleModalLong" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 id="modalLabel"> Tambah Data Peminjaman Barang</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="<?= BASEURL; ?>/peminjamanBarang/tambah" method="post">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
              <label for="kelas">Kelas</label>
              <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas">
            </div>
            <div class="form-group">
              <label for="namabarang">Nama Barang</label>
              <input type="text" class="form-control" id="namabarang" name="namabarang">
            </div>
            <div class="form-group">
              <label for="jangkawaktu">Jangka Waktu</label>
              <input type="number" class="form-control" id="jangkawaktu" name="jangkawaktu">
            </div>
            <div class="form-group">
              <label for="tanggal">Tanggal Peminjaman</label>
              <input type="date" class="form-control" id="tanggal" name="tanggal">
            </div>
            <div class="form-group">
              <label for="tglpengembalian">Tanggal Pengembalian</label>
              <input type="date" class="form-control" id="tglpengembalian" name="tglpengembalian">
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input type="text" class="form-control" id="keterangan" name="keterangan">
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
          <h1 class="modal-title fs-5" id="modalLabel">Import Data Peminjaman Barang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= BASEURL ?>/peminjamanBarang/importData" method="post" enctype="multipart/form-data">
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
            <table id="print" id="table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Tanggal Pengembalian</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['peminjaman'] as $peminjaman) : ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td>
                      <?php if ($peminjaman['statuspinjam'] == 0) : ?>
                        <a class="badge badge-warning fw-bold mx-auto" href="<?= BASEURL; ?>/peminjamanBarang/ubahStatusPinjam/1/<?= $peminjaman['id'] ?>" onclick="confirm(`Ubah status menjadi 'dipinjam'?`)">Diajukan</a>
                      <?php elseif ($peminjaman['statuspinjam'] == 1) : ?>
                        <a class="badge badge-success fw-bold mx-auto" href="<?= BASEURL; ?>/peminjamanBarang/ubahStatusPinjam/2/<?= $peminjaman['id'] ?>" onclick="confirm(`Ubah status menjadi 'dikembalikan'?`)">Dipinjam</a>
                      <?php else : ?>
                        <a class="badge badge-secondary fw-bold mx-auto" href="<?= BASEURL; ?>/peminjamanBarang/ubahStatusPinjam/0/<?= $peminjaman['id'] ?>" onclick="confirm(`Ubah status menjadi semula? ('dipinjam')`)">Dikembalikan</a>
                      <?php endif ?>
                    </td>
                    <td><?= $peminjaman['tanggal'] ?></td>
                    <td><?= $peminjaman['nama'] ?></td>
                    <td><?= $peminjaman['kelas'] ?></td>
                    <td><?= $peminjaman['namabarang'] ?></td>
                    <td><?= $peminjaman['jumlahbarang'] ?></td>
                    <td><?= $peminjaman['tglpengembalian'] ?></td>
                    <td><?= $peminjaman['keterangan'] ?></td>
                    <td>
                      <a href="<?= BASEURL; ?>/peminjamanBarang/ubah/<?= $peminjaman['id'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModalLong" class="tampilModalUbah" data-id="<?= $peminjaman['id']; ?>">
                        <button class="button-arounder">
                          <span class="material-symbols-outlined"> edit </span>
                        </button>
                      </a>
                      <a href="<?= BASEURL; ?>/peminjamanBarang/hapus/<?= $peminjaman['id'] ?>" onclick="return confirm ('Hapus data?') ">
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
</div>
</div>
<script>
  $(function() {
    const BASEURL = window.location.href;
    console.log(BASEURL)
    $('.tombolTambahData').on('click', function() {
      $('formModalLabel').html('Tambah Data Prestasi')
      $('.modal-footer button[type=submit]').html('Tambah Data');

    });

    $(".tampilModalUbah").click(function() {
      $("#modal").addClass("edit");
      $("#modalLabel").html("Ubah Data Peminjaman Barang");
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
        success: function(data) {
          $('#nama').val(data.nama);
          $('#kelas').val(data.kelas);
          $('#namabarang').val(data.namabarang);
          $('#tanggal').val(data.tanggal);
          $('#tglpengembalian').val(data.tglpengembalian);
          $('#jangkawaktu').val(data.jangkawaktu);
          $('#keterangan').val(data.keterangan);
          $('#id').val(data.id);
          console.log(data);
        },
      });
    });

    $('#print').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'excel', 'pdf', 'print'
      ]
    });

  });
</script>