<?php
$kelas = [
  'Teknik Grafika' => ['XI DG A', 'XI DG B', 'XI DG C', 'XI PD A', 'XI PD B', 'XI PD C', 'XI PD D'],
  'Logistik' => ['XI TL A', 'XI TL B'],
  'Mekatronika' => ['XI TM A', 'XI TM B'],
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
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">DATA PENEMPATAN <?= strtoupper($jurusan) ?></h3>
            <!-- <h6 class="font-weight-normal mb-0">Laman Data Penempatan | <a href=""><?= ucwords(strtolower($jurusan)) ?></a> | <span class="text-primary">SIMAS</span></h6> -->
            <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/pkl/index"> Laman PKL</a> | <a class="text-dark" href="<?= BASEURL; ?>/pkl/rekap"> Rekapitulasi </a> | <a class="text-dark" href="<?= BASEURL; ?>/pkl/penempatan"> Data Penempatan </a> | <span class="text-primary"> <?= ucwords(strtolower($jurusan)) ?> </span></h6>
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
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive ">
              <table class="table table-hover" id="table">
                <thead>
                  <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Nama Perusahaan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['siswa'] as $siswa) : ?>
                    <tr>
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