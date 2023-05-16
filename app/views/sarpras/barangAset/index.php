<!-- <div class="main-panel"> -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">DATA STOK BARANG ASET</h3>
                  <h6 class="font-weight-normal mb-0">Data stok barang aset SMKN 4 Malang</span></h6>
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
            <div class="col">
              <a class="btn btn-primary " role="button" data-toggle="modal" data-target="#exampleModalLong">Tambah Data Barang Aset</a>
            <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport"
                    data-url="<?= BASEURL ?>/barangAset" data-bs-toggle="modal" data-bs-target="#modalImport">
                    Import Data Dari Excel
                </button>
            </div>
        </div>
          <div id="exampleModalLong" class="modal fade" role="dialog" data-backdrop="static" >
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h3 id="modalLabel"> Tambah Data Barang Aset</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form action="<?= BASEURL; ?>/barangAset/tambah" method="post">
                      <input type="hidden" name="id" id="id">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Barang</label>
                      <input type="text" class="form-control" id="namabarang" name="namabarang" placeholder="" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">NO. Aset</label>
                      <input type="text" class="form-control" id="nomor" name="nomor" placeholder="" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah</label>
                      <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Sumber Dana</label>
                      <input type="text" class="form-control" id="sumberdana" name="sumberdana" placeholder="" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Tempat</label>
                      <input type="text" class="form-control" id="tempat" name="tempat" placeholder="" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Waktu Penyerahan</label>
                      <input type="date" class="form-control" id="waktu" name="waktu" placeholder="" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Penerima</label>
                      <input type="text" class="form-control" id="penerima" name="penerima" placeholder="" required/>
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
                        <h1 class="modal-title fs-5" id="modalLabel">Import Data Barang Aset</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL ?>/barangAset/importData" method="post" enctype="multipart/form-data">
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
                  <table id="print" id="demo" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama Barang</th>
                        <th>NO. Aset</th>
                        <th>Jumlah</th>
                        <th>Sumber Dana</th>
                        <th>Tempat</th>
                        <th>Waktu Penyerahan</th>
                        <th>Penerima</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                        <?php foreach( $data['barang_aset'] as $aset ) : ?>
                        <tr>
                        <td><?= $i++;?></td>
                        <td><?=$aset['namabarang']?></td>
                        <td><?=$aset['nomor']?></td>
                        <td><?=$aset['jumlah']?></td>
                        <td><?=$aset['sumberdana']?></td>
                        <td><?=$aset['tempat']?></td>
                        <td><?=$aset['waktu']?></td>
                        <td><?=$aset['penerima']?></td>
                        <td>
                            <a href="<?= BASEURL;?>/barangAset/ubah/<?=$aset['id']?>" data-bs-toggle="modal" data-bs-target="#exampleModalLong" class="tampilModalUbah" data-id="<?= $aset['id'];?>">
                            <button class="button-arounder"> 
                                <span class="material-symbols-outlined"> edit </span>
                            </button>
                            </a>
                            <a href="<?= BASEURL;?>/barangAset/hapus/<?=$aset['id']?>" onclick="return confirm ('Hapus data?') ">
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
        

      <!-- tabel -->

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!-- <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer> -->
        <!-- partial -->
      </div>

      <!-- <script src="<?=BASEURL;?>/js/barangAset.js"></script> -->
      <script>
      $(document).ready(function () {
        $('#demo').DataTable();
      });
    </script>
        <script>
    $(document).ready(function() {
    $('#print').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    } );
  } );
  </script>
  <script>
    $(function() {
    const BASEURL = window.location.href;
    console.log(BASEURL)
    $('.tombolTambahData').on('click', function(){
        $('formModalLabel').html('Tambah Data Barang Aset')
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });

	$(".tampilModalUbah").click(function () {
				$("#modal").addClass("edit");
				$("#modalLabel").html("Ubah Data Barang Aset");
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
						$('#namabarang').val(data.namabarang);
                        $('#nomor').val(data.nomor);
                        $('#jumlah').val(data.jumlah);
                        $('#sumberdana').val(data.sumberdana);
                        $('#tempat').val(data.tempat);
                        $('#waktu').val(data.waktu);
                        $('#penerima').val(data.penerima);
                        $('#id').val(data.id);
                        console.log(data);
					},
				})
            })
		}
	);
  </script>
