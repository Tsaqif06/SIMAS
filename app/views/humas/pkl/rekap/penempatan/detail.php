<?php
$kelas = [
  'Teknik Grafika' => ['XI DG A', 'XI DG B', 'XI DG C', 'XI PD A', 'XI PD B', 'XI PD C', 'XI PD D'],
  'Logistik' => ['XI TL A', 'XI TL B'],
  'Mekatronika' => ['XI MEKA A', 'XI MEKA B'],
  'Perhotelan' => ['XI PH A', 'XI PH B'],
  'Animasi' => ['XI ANI A', 'XI ANI B', 'XI ANI C'],
  'Desain Komunikasi Visual' => ['XI DKV A', 'XI DKV B', 'XI DKV C'],
  'Teknik Komputer dan Jaringan' => ['XI TKJ A', 'XI TKJ B'],
  'Rekayasa Perangkat Lunak' => ['XI RPL A', 'XI RPL B', 'XI RPL C']
];

$jurusan = '';

foreach ($kelas as $key => $list) {
  if (in_array($data['kelas'], $list)) {
    $jurusan = $key;
    break;
  }
}
?>

<?php if ($jurusan == '') : ?>
  <script>
    location.replace("http://localhost/SIMAS/public/NotFound");
  </script>
<?php endif; ?>

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">DATA PENEMPATAN <?= strtoupper($jurusan) ?></h3>
            <h6 class="font-weight-normal mb-0">Laman Data Penempatan <?= ucwords(strtolower($jurusan)) ?> | <span class="text-primary">SIMAS</span></h6>
          </div>
          <div class="col-12 col-xl-4">
            <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <?= $data['kelas'] ?>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                  <?php foreach ($kelas[$jurusan] as $list) : ?>
                    <a class="dropdown-item" href="<?= BASEURL; ?>/pkl/penempatan&kelas=<?= str_replace(" ", "_", $list) ?>"><?= $list ?></a>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
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
      <div class="col-md-12 grid-margin">
        <div class="template-demo">
          <button type="button" class="tombolTambahData btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">Tambah Data</button>
          <button type="button" class="btn btn-primary tampilModalImport" data-bs-toggle="modal" data-bs-target="#modalImport">
            Import Data Dari Excel
          </button>
        </div>
      </div>

      <!-- Import Modal -->
      <div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modalLabel">Import Data</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= BASEURL ?>/pkl/importDataPenempatan&kelas=<?= $_GET['kelas'] ?>" method="post" enctype="multipart/form-data">
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

      <!-- Form Modal -->
      <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="formModalLabel">Tambah Data</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= BASEURL; ?>/PKL/tambahDataPenempatan&kelas=<?= $_GET['kelas'] ?>" method="post">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                  <label for="nisn" class="col-form-label">NISN</label>
                  <input type="number" class="form-control" id="nisn" name="nisn">
                </div>
                <div class="form-group">
                  <label for="namasiswa" class="col-form-label">Nama</label>
                  <input type="text" class="form-control" id="namasiswa" name="namasiswa">
                </div>
                <div class="form-group">
                  <label for="kelas" class="col-form-label">Kelas</label>
                  <input type="text" value="<?= $data['kelas'] ?>" class="form-control" id="kelassiswa" name="kelassiswa" readonly>
                </div>
                <div class="form-group">
                  <label for="namaperusahaan" class="col-form-label">Nama Perusahaan</label>
                  <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary btn-fw" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan Data</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive ">
              <table class="table table-hover" id="table">
                <thead>
                  <tr>
                    <th>Aksi</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Nama Perusahaan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['siswa'] as $siswa) : ?>
                    <tr>
                      <td>
                        <a href="<?= BASEURL; ?>/PKL/ubahDataPenempatan/<?= $siswa['id']; ?>&kelas=<?= $_GET['kelas'] ?>" class="tombolUbahData" data-bs-toggle="modal" data-bs-target="#formModal" data-id=<?= $siswa['id']; ?>>
                          <label class="badge badge-success">
                            <i class="mdi mdi-lead-pencil"></i>
                          </label>
                        </a>
                        <a href="<?= BASEURL; ?>/PKL/hapusDataPenempatan/<?= $siswa['id']; ?>&kelas=<?= $_GET['kelas'] ?>" onclick="return confirm('Apakah anda sudah yakin?');">
                          <label class="badge badge-danger">
                            <i class="mdi mdi-delete"></i>
                          </label>
                        </a>
                      </td>
                      <td><?= $siswa['nisn'] ?></td>
                      <td><?= $siswa['namasiswa'] ?></td>
                      <td><?= $siswa['kelassiswa'] ?></td>
                      <td><?= $siswa['namaperusahaan'] ?></td>
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
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. SIMAS. All rights reserved.</span>
    </div>
  </footer>
  <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<script>
  $(function() {
    $('.tombolTambahData').on('click', function() {
      $('#formModalLabel').html('Tambah Data Penempatan')
      $('#formModal button[type=submit]').html('Tambah Data');
      $("#formModal form").attr("action", `http://localhost/SIMAS/public/pkl/tambahDataPenempatan&kelas=<?= $_GET['kelas'] ?>`);

      if ($("#formModal").hasClass("edit")) {
        $('#id').val('');
        $('#nisn').val('');
        $('#namasiswa').val('');
        $('#kelas').val('');
        $('#namaperusahaan').val('');
      }

      $("#formModal").removeClass("edit")
    });

    $(".tombolUbahData").click(function() {
      $("#formModal").addClass("edit");
      $("#formModalLabel").html("Ubah Data Penempatan");
      $("#formModal button[type=submit]").html("Ubah Data");
      $("#formModal form").attr("action", `http://localhost/SIMAS/public/pkl/ubahDataPenempatan&kelas=<?= $_GET['kelas'] ?>`);

      const id = $(this).data("id");
      console.log(id);

      $.ajax({
        url: `http://localhost/SIMAS/public/pkl/getUbahPenempatan`,
        data: {id: id},
        method: "post",
        dataType: "json",
        success: function(data) {
          // console.log(data);
          $('#id').val(data.id);
          $('#nisn').val(data.nisn);
          $('#namasiswa').val(data.namasiswa);
          $('#kelas').val(data.kelas);
          $('#namaperusahaan').val(data.namaperusahaan);
        },
      })
    })
  });
</script>