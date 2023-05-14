<?php 
$kelas = [
  'TEKNIK GRAFIKA' => ['XI DG A', 'XI DG B', 'XI DG C', 'XI PD A', 'XI PD B', 'XI PD C', 'XI PD D'],
  'LOGISTIK' => ['XI TL A', 'XI TL B'],
  'MEKATRONIKA' => ['XI Mekatronika A', 'XI Mekatronika B'],
  'PERHOTELAN' => ['XI PH A', 'XI PH B'],
  'ANIMASI' => ['XI ANI A', 'XI ANI B', 'XI ANI C'],
  'DESAIN KOMUNIKASI VISUAL' => ['XI DKV A', 'XI DKV B', 'XI DKV C'],
  'TEKNIK KOMPUTER DAN JARINGAN' => ['XI TKJ A', 'XI TKJ B'],
  'REKAYASA PERANGKAT LUNAK' => ['XI RPL A', 'XI RPL B', 'XI RPL C']
];

$query = str_replace("_", " ", strtoupper($_GET['kelas']));
$namaKelas = '';

foreach ($kelas as $key => $list) {
  if (in_array($query, $list)) {
    $namaKelas = $key;
    break;
  }
}

if ($namaKelas == '') {
  header("Location: " . BASEURL . "/NotFound");
  exit;
}

?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">DATA NILAI PKL <?= $namaKelas ?></h3>
            <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/pkl"> Laman PKL</a> | <a class="text-dark" href="<?= BASEURL; ?>/pkl/nilai"> Nilai </a> | <span class="text-primary"> Teknik Grafika </span></h6>
          </div>

          <div class="col-12 col-xl-4">
            <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  DG A
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                  <?php foreach ($kelas[$namaKelas] as $list) : ?>
                    <a class="dropdown-item" href="<?= BASEURL; ?>/pkl/nilai?kelas=<?= str_replace(" ", "_", $list) ?>"><?= $list ?></a>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">LOG
      <div class="col-lg-6">
        <?php Flasher::flash(); ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="template-demo">
          <button type="button" class="tombolTambahData btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>
        </div>
      </div>


      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= BASEURL; ?>/PKL/tambahDataNilaiDGA" method="post">
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
                  <input type="text" value="XI DG A" class="form-control" id="kelas" name="kelas" readonly>
                </div>
                <div class="form-group">
                  <label for="jeniskelamin">Jenis Kelamin</label>
                  <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                    <option value="Laki-laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="perusahaan" class="col-form-label">Nama Perusahaan</label>
                  <input type="text" class="form-control" id="namaindustri" name="namaindustri">
                </div>
                <div class="form-group">
                  <label for="nilai" class="col-form-label">Nilai</label>
                  <input type="text" class="form-control" id="nilaisiswa" name="nilaisiswa">
                </div>
                <div class="form-group">
                  <label for="ketnilai">Keterangan Nilai</label>
                  <select class="form-control" id="keterangannilai" name="keterangannilai">
                    <option value="Lulus">Lulus</option>
                    <option value="Belum Lulus">Belum Lulus</option>
                  </select>
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
                    <th>Jenis Kelamin</th>
                    <th>Nama Perusahaan</th>
                    <th>Nilai</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['siswa'] as $nilai) : ?>
                    <tr>
                      <td>
                        <a href="<?= BASEURL; ?>/PKL/ubahDataNilaiDGA/<?= $nilai['id']; ?>" class="ndga" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id=<?= $nilai['id']; ?>>
                          <label class="badge badge-success">
                            <i class="mdi mdi-lead-pencil"></i>
                          </label>
                        </a>
                        <a href="<?= BASEURL; ?>/PKL/hapusDataNilaiDGA/<?= $nilai['id']; ?>" onclick="return confirm('Apakah anda sudah yakin?');">
                          <label class="badge badge-danger">
                            <i class="mdi mdi-delete"></i>
                          </label>
                        </a>
                      </td>
                      <td><?= $nilai['nisn'] ?></td>
                      <td><?= $nilai['namasiswa'] ?></td>
                      <td><?= $nilai['jeniskelamin'] ?></td>
                      <td><?= $nilai['namaindustri'] ?></td>
                      <td><?= $nilai['nilaisiswa'] ?></td>
                      <td><?= $nilai['keterangannilai'] ?></td>
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
    // const BASEURL = window.location;
    // console.log(BASEURL)
    $('.tombolTambahData').on('click', function() {
      $('#exampleModalLabel').html('Tambah Data Struktur Organisasi')
      $('.modal-footer button[type=submit]').html('Tambah Data');

      document.querySelector('.modal-body form').reset();
    });

    $(".ndga").click(function() {
      $("#modal").addClass("edit");
      $("#exampleModalLabel").html("Ubah Data Industri");
      $(".modal-footer button[type=submit]").html("Ubah Data");
      $(".modal-body form").attr("action", `http://localhost/SIMAS/public/pkl/ubahDataNilaiDGA`);

      const id = $(this).data("id");
      console.log(id);

      $.ajax({
        url: `http://localhost/SIMAS/public/pkl/getUbahNilaiDGA`,
        data: {
          id: id
        },
        method: "post",
        dataType: "json",
        success: function(data) {
          $('#nisn').val(data.nisn);
          $('#namasiswa').val(data.namasiswa);
          $('#kelas').val(data.kelas);
          $('#jeniskelamin').val(data.jeniskelamin);
          $('#namaindustri').val(data.namaindustri);
          $('#nilaisiswa').val(data.nilaisiswa);
          $('#keterangannilai').val(data.keterangannilai);
          $('#id').val(data.id);
          console.log(data);
        },
      })
    })
  });
</script>