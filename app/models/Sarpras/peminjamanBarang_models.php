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
                <?php Flasher ::flash(); ?>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <!-- <a id="example" class="btn btn-primary" role="button" data-toggle="modal" data-target="#exampleModalLong">ISI FORM PEMINJAMAN</a> -->
            
          <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport"
                    data-url="<?= BASEURL ?>/peminjamanBarang" data-bs-toggle="modal" data-bs-target="#modalImport">
                    Import Data Dari Excel
                </button>
            </div>
        </div>
          <!-- <div id="exampleModalLong" class="modal fade" role="dialog" data-backdrop="static">
          
            <div class="modal-dialog">
  
              <div class="modal-content">
                <div class="modal-header">
                  <h3 id="modalLabel">Tambah Data Peminjaman Barang</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form action="<?= BASEURL; ?>/peminjamanBarang/tambah" method="post">
                      <input type="hidden" name="id" id="id">
                       
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama lengkap" required />
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Kelas</label>
                      <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas berapa" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Barang</label>
                      <input type="text" class="form-control" name="namabarang" id="namabarang" placeholder="Barang yang dipinjam" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Pinjam</label>
                      <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal pinjam barang" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Pengembalian</label>
                      <input type="date" class="form-control" name="tglpengembalian" id="tglpengembalian" placeholder="Tanggal barang akan dikembalikan" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Jangka Waktu</label>
                      <div class="input-group mb-3">
                        <input type="number" class="form-control" name="jangkawaktu" id="jangkawaktu" placeholder="Jangka waktu peminjaman" required>
                        <span class="input-group-text">Hari</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Digunakan untuk keperluan apa" required/>
                    </div>

                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                  </div>
              </form>
              </div>
            </div>
          </div> -->
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
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Jangka Waktu</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach( $data['peminjaman'] as $peminjaman ) : ?>
                    <tr>
                      <td><?= $i++;?></td>
                      <td><?=$peminjaman['nama']?></td>
                      <td><?=$peminjaman['kelas']?></td>
                      <td><?=$peminjaman['namabarang']?></td>
                      <td><?=$peminjaman['tanggal']?></td>
                      <td><?=$peminjaman['tglpengembalian']?></td>
                      <td><?=$peminjaman['jangkawaktu']?></td>
                      <td><?=$peminjaman['keterangan']?></td>
                      <td>
                        <a href="<?= BASEURL;?>/peminjamanGuru/ubah/<?=$peminjaman['id']?>" data-bs-toggle="modal" data-bs-target="#exampleModalLong" class="tampilModalUbah" data-id="<?= $peminjaman['id'];?>">
                          <button class="button-arounder"> 
                            <span class="material-symbols-outlined"> edit </span>
                          </button>
                        </a>
                        <a href="<?= BASEURL;?>/peminjamanBarang/hapus/<?=$peminjaman['id']?>" onclick="return confirm ('Hapus data?') ">
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

        
        <!-- <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>

        </footer> -->
        <!-- <script src="<?=BASEURL;?>/js/peminjamanBarang.js"></script> -->
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
        $('formModalLabel').html('Tambah Data Prestasi')
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });

			$(".tampilModalUbah").click(function () {
				$("#modal").addClass("edit");
				$("#modalLabel").html("Ubah Data Peminjaman Barang");
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
				})
            })
		}
	);
  </script>
