<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Data Penempatan Perhotelan</h3>
            <h6 class="font-weight-normal mb-0">Laman Data Penempatan Perhotelan | <span class="text-primary">SIMAS</span></h6>
          </div>

          <div class="col-12 col-xl-4">
            <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  PH B
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                  <a class="dropdown-item" href="<?= BASEURL; ?>/pkl/penempatanpha">PH A</a>
                  <a class="dropdown-item" href="<?= BASEURL; ?>/pkl/penempatanphb">PH B</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="template-demo">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
        </div>
      </div>


      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= BASEURL; ?>/PKL/tambahDataPenempatanphb" method="post">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                  <label for="nisn" class="col-form-label">NISN</label>
                  <input type="number" class="form-control" id="nisn" name="nisn">
                </div>
                <div class="form-group">
                  <label for="nama" class="col-form-label">Nama</label>
                  <input type="text" class="form-control" id="namasiswa" name="namasiswa">
                </div>
                <div class="form-group">
                  <label for="kelas" class="col-form-label">Kelas</label>
                  <input type="text" value="XI PH B" class="form-control" id="kelassiswa" name="kelassiswa" readonly>
                </div>
                <div class="form-group">
                  <label for="perusahaan" class="col-form-label">Nama Perusahaan</label>
                  <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan Data</button>
              </form>
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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formmodal">Tambah
            Data</button>
          <button type="button" class="btn btn-primary tampilModalImport" data-toggle="modal" data-target="#modalImport">
            Import Data Dari Excel
          </button>
        </div>
      </div>

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
                <form action="<?= BASEURL ?>/pkl/importDataPNPHB" method="post" enctype="multipart/form-data">
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
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive ">
              <table class="table table-hover" id="tabledph">
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
                  <?php foreach ($data['ppphb'] as $ppdga) : ?>
                    <tr>
                      <td>
                        <a href="<?= BASEURL; ?>/PKL/ubahDataPenempatanPHB/<?= $ppdga['id']; ?>" class="ppphb" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id=<?= $ppdga['id']; ?>>
                          <label class="badge badge-success">
                            <i class="mdi mdi-lead-pencil"></i>
                          </label>
                        </a>
                        <a href="<?= BASEURL; ?>/PKL/hapusDataPenempatanPHB/<?= $ppdga['id']; ?>" onclick="return confirm('Apakah anda sudah yakin?');">
                          <label class="badge badge-danger">
                            <i class="mdi mdi-delete"></i>
                          </label>
                        </a>
                      </td>
                      <td><?= $ppdga['nisn'] ?></td>
                      <td><?= $ppdga['namasiswa'] ?></td>
                      <td><?= $ppdga['kelassiswa'] ?></td>
                      <td><?= $ppdga['namaperusahaan'] ?></td>
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
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
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
    // const BASEURL = window.location;
    // console.log(BASEURL)
    $('.tombolTambahData').on('click', function() {
      $('formModalLabel').html('Tambah Data Struktur Organisasi')
      $('.modal-footer button[type=submit]').html('Tambah Data');

    });

    $(".ppphb").click(function() {
      $("#modal").addClass("edit");
      $("#modalLabel").html("Ubah Data Industri");
      $(".modal-footer button[type=submit]").html("Ubah Data");
      $(".modal-body form").attr("action", `http://localhost/SIMAS/public/pkl/ubahDataPenempatanPHB`);

      const id = $(this).data("id");
      console.log(id);

      $.ajax({
        url: `http://localhost/SIMAS/public/pkl/getUbahPenempatanPHB`,
        data: {
          id: id
        },
        method: "post",
        dataType: "json",
        success: function(data) {
          $('#nisn').val(data.nisn);
          $('#namasiswa').val(data.namasiswa);
          $('#kelassiswa').val(data.kelassiswa);
          $('#namaperusahaan').val(data.namaperusahaan);
          $('#id').val(data.id);
          console.log(data);
        },
      })
    })
  });
</script>