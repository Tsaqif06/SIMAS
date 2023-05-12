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
                    <h3 class="font-weight-bold">DATA WALI KELAS</h3>
                    <h6 class="font-weight-normal mb-0"> SMKN 4 MALANG</span></h6>
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
            <a class="btn btn-primary mb-4" role="button" data-toggle="modal" data-target="#exampleModalLong">Tambah
                Data Wali Kelas</a>
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
                        <form action="<?= BASEURL; ?>/DataWalkel/tambah" method="post">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control" id="Nama" name="Nama"
                                    placeholder="Nama" required />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">NIP</label>
                                <input type="number" class="form-control" id="NIP" name="NIP"
                                    placeholder="NIP" required />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Gol</label>
                                <input type="text" class="form-control" id="Gol" name="Gol"
                                    placeholder="Gol" required />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pangkat</label>
                                <input type="text" class="form-control" id="Pangkat" name="Pangkat"
                                    placeholder="Pangkat" required />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jabatan</label>
                                <input type="text" class="form-control" id="Jabatan" name="Jabatan"
                                    placeholder="Jabatan" required />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telepon</label>
                                <input type="number" class="form-control" id="Telepon" name="Telepon"
                                    placeholder="Telepon" required />
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
                            <table id="table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 15%;">No.</th>
                                        <th style="width: 30%;">Nama</th>
                                        <th style="width: 28%;">NIP</th>
                                        <th style="width: 15%;">GOL</th>
                                        <th style="width: 15%;">Pangkat</th>
                                        <th style="width: 15%;">Jabatan</th>
                                        <th style="width: 15%;">Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['tbl_walikelasx'] as $Walkel) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $Walkel['Nama'] ?></td>
                                        <td><?= $Walkel['NIP'] ?></td>
                                        <td><?= $Walkel['Gol'] ?></td>
                                        <td><?= $Walkel['Pangkat'] ?></td>
                                        <td><?= $Walkel['Jabatan'] ?></td>
                                        <td><?= $Walkel['Telepon'] ?></td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#exampleModalLong"
                                                class="tampilModalUbahh" data-id="<?= $Walkel['id']; ?>">
                                                <button class="button-arounder">
                                                    <span class="material-symbols-outlined"> edit </span>
                                                </button>
                                            </a>
                                            <a href="<?= BASEURL; ?>/DataWalkel/hapus/<?= $Walkel['id'] ?>"
                                                onclick="return confirm ('Hapus data?') ">
                                                <button class="button-arounder">
                                                    <span class="material-symbols-outlined"> delete </span>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                    <?php endforeach; ?>
                                </tbody>
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
    $('.tombolTambahData').on('click', function(){
        $('formModalLabel').html('Tambah Data Wali Kelas')
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });

    $(".tampilModalUbahh").click(function () {
				$("#modal").addClass("edit");
				$("#modalLabel").html("Ubah Data Wali Kelas");
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
						$('#Nama').val(data.Nama);
						$('#NIP').val(data.NIP);
                        $('#Gol').val(data.Gol);
                        $('#Pangkat').val(data.Pangkat);
                        $('#Jabatan').val(data.Jabatan);
                        $('#Telepon').val(data.Telepon);
                        $('#id').val(data.id);
                        console.log(data);
					},
				})
            })
});
    </script>