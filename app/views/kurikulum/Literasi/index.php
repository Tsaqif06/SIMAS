<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">DATA KEGIATAN GERAKAN LITERASI SEKOLAH</h3>
          <h6 class="font-weight-normal mb-0"> Kurikulum | <span class="text-primary">SIMAS</span></h6>
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
    <div class="col-lg-6">
      <a class="tombolTambahData btn btn-primary mb-4" role="button" data-toggle="modal"
        data-target="#exampleModalLong">Tambah Kegiatan</a>
    </div>
    <!-- </div> -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title fs-5" id="modalLabel">Tambah Data</h1>
              <button style="border: none; background: none;" data-dismiss="modal">
                <span class="material-symbols-outlined close"> close </span>
              </button>
          </div>
          <div class="modal-body">
            <form action="<?= BASEURL; ?>/KegiatanGLS/tambah" method="post">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="exampleInputEmail1">Jenis Kegiatan</label>
                <input type="text" class="form-control" id="jeniskegiatan" name="jeniskegiatan"
                  placeholder="Jenis Kegiatan" required />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Tujuan</label>
                <input type="text" class="form-control" id="Tujuan" name="Tujuan" placeholder="Tujuan" required />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Strategi</label>
                <input type="text" class="form-control" id="Strategi" name="Strategi" placeholder="Strategi" required />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Indikator</label>
                <input type="text" class="form-control" id="Indikator" name="Indikator" placeholder="Indikator"
                  required />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Pelaksanaan</label>
                <input type="text" class="form-control" id="Pelaksanaan" name="Pelaksanaan" placeholder="Pelaksanaan"
                  required />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Waktu</label>
                <input type="text" class="form-control" id="Waktu" name="Waktu" placeholder="Waktu" required />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Target</label>
                <input type="text" class="form-control" id="Target_" name="Target_" placeholder="Target" required />
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

    <div class="row py-10">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card rounded shadow border-0" style="width: fit-content;">
          <div class="card-body p-10 bg-white rounded">
            <div class="table-responsive">
              <table id="table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Jenis Kegiatan</th>
                    <th>Tujuan</th>
                    <th>Strategi</th>
                    <th>Indikator</th>
                    <th>Pelaksanaan</th>
                    <th>Waktu</th>
                    <th>Target</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['tbl_glsunggul'] as $GLS): ?>
                    <tr>
                      <td>
                        <?= $GLS['jeniskegiatan'] ?>
                      </td>
                      <td>
                        <?= $GLS['Tujuan'] ?>
                      </td>
                      <td>
                        <?= $GLS['Strategi'] ?>
                      </td>
                      <td>
                        <?= $GLS['Indikator'] ?>
                      </td>
                      <td>
                        <?= $GLS['Pelaksanaan'] ?>
                      </td>
                      <td>
                        <?= $GLS['Waktu'] ?>
                      </td>
                      <td>
                        <?= $GLS['Target_'] ?>
                      </td>
                      <td>
                        <a href="" data-toggle="modal" data-target="#exampleModalLong" class="tampilModalUbahh"
                          data-id="<?= $GLS['id']; ?>">
                          <button class="button-arounder">
                            <span class="material-symbols-outlined"> edit </span>
                          </button>
                        </a>
                        <a href="<?= BASEURL; ?>/KegiatanGLS/hapus/<?= $GLS['id'] ?>"
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
    $(function () {
      const BASEURL = window.location.href;
      console.log(BASEURL)
      $('.tombolTambahData').on('click', function () {
        $('#modalLabel').html('Tambah Data GLS')
        $('.modal-footer button[type=submit]').html('Tambah Data');

        $('#jeniskegiatan').val('');
        $('#Tujuan').val('');
        $('#Strategi').val('');
        $('#Indikator').val('');
        $('#Pelaksanaan').val('');
        $('#Waktu').val('');
        $('#Target_').val('');
        $('#id').val('');
      });

      $(".tampilModalUbahh").click(function () {
        $("#modal").addClass("edit");
        $("#modalLabel").html("Ubah Data GLS");
        $(".modal-footer button[type=submit]").html("Ubah Data");
        $(".modal-body form").attr("action", `${BASEURL}/ubahData`);

        const id = $(this).data("id");
        console.log(id)

        $.ajax({
          url: `${BASEURL}/getUbahData`,
          data: {
            id: id
          },
          method: "post",
          dataType: "json",
          success: function (data) {
            $('#jeniskegiatan').val(data.jeniskegiatan);
            $('#Tujuan').val(data.Tujuan);
            $('#Strategi').val(data.Strategi);
            $('#Indikator').val(data.Indikator);
            $('#Pelaksanaan').val(data.Pelaksanaan);
            $('#Waktu').val(data.Waktu);
            $('#Target_').val(data.Target_);
            $('#id').val(data.id);
          },
        })
      })
    });
  </script>