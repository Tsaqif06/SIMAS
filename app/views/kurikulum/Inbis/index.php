<style>
    .button-arounder {
    background: white;
    font-size: 4px;
    border: solid 2px #4B49AC;
    padding: .375em 1.125em;
    font-weight: bold;
    border-radius: 10px;
    color: #4B49AC;
    // width: 50%;
  }
  
  .button-arounder:hover,
  .button-arounder:focus {
    box-shadow: 0 4px 8px hsla(190deg, 15%, 5%, .2);
    transform: translateY(-4px);
    background:#4B49AC;
    border-top-left-radius: var(--radius);
    border-top-right-radius: var(--radius);
    border-bottom-left-radius: var(--radius);
    border-bottom-right-radius: var(--radius);
    color:white;
    border-radius: 10px;
    // width: 50%;
  }
   td {
    word-break: break-all;
    width: 100px;
   }
   </style>
   <div class="content-wrapper">
   <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">DATA KEGIATAN INKUBATOR BISNIS</h3>
                  <h6 class="font-weight-normal mb-0"> SMKN 4 MALANG</span></h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
        <div class="col-lg-6">
            <?php Flasher ::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <a class="btn btn-primary mb-4" role="button" data-toggle="modal" data-target="#exampleModalLong">Tambah Kegiatan </a>
        </div>
              <!-- </div> -->
              <div class="modal fade" id="exampleModalLong" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fs-5" id="modalLabel">Tambah Data</h1>
                        <button style="border: none; background: none;" data-dismiss="modal">
                        <span class="material-symbols-outlined close"> close </span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL; ?>/Inbis/tambah" method="post">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Kegiatan </label>
                      <input type="text" class="form-control" id="jeniskegiatan" name="jeniskegiatan" placeholder="Jenis Kegaiatan" required />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tujuan</label>
                      <input type="text" class="form-control" id="Tujuan" name="Tujuan" placeholder="Tujuan" required/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Strategi</label>
                      <input type="text" class="form-control" id="Strategi" name="Strategi" placeholder="Strategi" required/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Indikator</label>
                      <input type="text" class="form-control" id="Indikator" name="Indikator" placeholder="Indikator" required/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pelaksanaan</label>
                      <input type="text" class="form-control" id="Pelaksanaan" name="Pelaksanaan" placeholder="Pelaksanaan" required/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Waktu</label>
                      <input type="text" class="form-control" id="Waktu" name="Waktu" placeholder="Waktu" required/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Target</label>
                      <input type="text" class="form-control" id="Target_" name="Target_" placeholder="Target_" required/>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                        <button type="button" class="btn btn-default batal" data-dismiss="modal"
                            aria-label="Close">Tutup</button>
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
                  <table id="demo" class="table table-striped table-bordered">
                    <thead> 
                    <tr>
                        <th style="width: 30%;">Jenis Kegiatan</th>
                        <th style="width: 28%;">Tujuan</th>
                        <th style="width: 15%;">Strategi</th>
                        <th style="width: 15%;">Indikator</th>
                        <th style="width: 15%;">Pelaksanaan</th>
                        <th style="width: 15%;">Waktu</th>
                        <th style="width: 15%;">Target</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
              <?php foreach( $data['tbl_inbisunggul'] as $GLS ) : ?>
                <tr>
                  <td><?=$GLS['jeniskegiatan']?></td>
                  <td><?=$GLS['Tujuan']?></td>
                  <td><?=$GLS['Strategi']?></td>
                  <td><?=$GLS['Indikator']?></td>
                  <td><?=$GLS['Pelaksanaan']?></td>
                  <td><?=$GLS['Waktu']?></td>
                  <td><?=$GLS['Target_']?></td>
                  <td>
                    <a href="<?= BASEURL;?>/Inbis/ubah/<?=$GLS['id']?>" data-toggle="modal" data-target="#exampleModalLong" class="tampilModalUbahh" data-id="<?= $GLS['id']; ?>">
                      <button class="button-arounder">
                          <span class="material-symbols-outlined"> edit </span>
                      </button>
                    </a>
                    <a href="<?= BASEURL; ?>/Inbis/hapus/<?= $GLS['id'] ?>"
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
      </div>

      <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
      <script>
        $(document).ready(function () {
          $('#demo').DataTable();
        });
        </script>
<script>
    $(function() {
    const BASEURL = window.location.href;
    console.log(BASEURL)
    $('.tombolTambahData').on('click', function(){
        $('formModalLabel').html('Tambah Data Struktur Organisasi')
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });

    $(".tampilModalUbahh").click(function () {
				$("#modal").addClass("edit");
				$("#modalLabel").html("Ubah Data Sruktur Organisasi");
				$(".modal-footer button[type=submit]").html("Ubah Data");
				$(".modal-body form").attr("action", `${BASEURL}/ubah`);

				const id = $(this).data("id");

				$.ajax({
					url: `${BASEURL}/getubah`,
					data: { id: id },
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
                        console.log(data);
					},
				})
            })
		}
	);
</script>