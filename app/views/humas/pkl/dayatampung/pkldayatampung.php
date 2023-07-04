<!--
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">DAYA TAMPUNG</h3>
                  <h6 class="font-weight-normal mb-0">Laman Daya Tampung | <span class="text-primary">SIMAS</span></h6>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="template-demo">
              <button type="button" class="btn btn-primary tomboltambahdata3" data-toggle="modal" data-target="#formmodal">Tambah Data</button>
            </div>
            </div>



        <div class="modal fade" id="formmodal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="judulModallabel3">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                            


      <form action="<?= BASEURL; ?>/Pkl/TambahDTAPD" method="post">

                    

                                    <input type="hidden" name="id" id="id">


                                    <div class="form-group">
                                        <label for="namaperusahaan" >Nama Perusahaan</label>
                                        <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan">
                                    </div>

                                    <div class="form-group mb-3">
                                    <label for="jurusan">Jurusan</label>
                                    <select class="form-control" id="jurusan" name="jurusan">
                                    <option value="Tekhnik Grafika">Tekhnik Grafika</option>
                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                    <option value="Logistik">Logistik</option>
                                    <option value="Perhotelan">Perhotelan</option>
                                    <option value="Mekatronika">Mekatronika</option>
                                    <option value="Desain Komunikasi Visual">DKV</option>
                                    <option value="Tekhnik Komputer Jaringan">TKJ</option>
                                    <div>


                                    </select>

                                    


                                    <div class="form-group mb-3">
                                    <label for="jeniskelamin">Jenis kelamin</label>
                                    <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                    <option value="Laki Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <div>
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="text" class="form-control" id="jumlah" name="jumlah">
                                    </div>
                                      </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
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
                      <th>Nama Perusahaan</th h>
                      <th>Jurusan</th>
                      <th>Jenis Kelamin</th>
                      <th>Jumlah</th>
                    </tr>
                </thead>
                <?php
                foreach ($data['pd'] as $pd) {
                ?>
                    <tr>

                        <td>
                            <div class="mt-3">
                               
                                    <a class="badge badge-success tampildataubah3" data-url="<?= BASEURL ?>/PKL/ubahDTAPD/<?= $pd['id']; ?>" data-toggle="modal" data-target="#formmodal" data-id="<?= $pd['id'] ?>">Edit</a>
                                <div class="mt-3">
                                 <a href="<?= BASEURL; ?>/pkl/HapusDataPD/<?= $pd['id']; ?>" class="btn btn-danger"
                                    onclick="return confirm('Apakah anda sudah yakin?');">Hapus</a>
                        </td>
            </div>

           
                    <td><?= $pd['namaperusahaan'] ?></td>
                    <td><?= $pd['jurusan'] ?></td>
                    <td><?= $pd['jeniskelamin'] ?></td>
                    <td><?= $pd['jumlah'] ?></td>

            </tr>
            <?php
                }
            ?>
                </tbody>
                </table>
          </div>
          </div>
          </div>
          </div>
          </div>
                
       

    

             -->



<!--  -->
<!-- partial -->
<!-- <div class="main-panel"> -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">DAYA TAMPUNG</h3>
                    <h6 class="font-weight-normal mb-0">Laman Daya Tampung | <span class="text-primary">SIMAS</span>
                    </h6>
                </div>

                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <?= (isset($_GET['perusahaan'])) ? str_replace("_", " ", $_GET['perusahaan']) : "Semua" ?>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                <a class="dropdown-item" href="<?= BASEURL; ?>/pkl/dtampung">Semua</a>
                                <?php foreach ($data['perusahaan'] as $list) : ?>
                                    <a class="dropdown-item" href="<?= BASEURL; ?>/pkl/dtampung&perusahaan=<?= str_replace(" ", "_", $list['namaperusahaan']) ?>">
                                        <?= $list['namaperusahaan'] ?>
                                    </a>
                                <?php endforeach ?>
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
                <button type="button" class="btn btn-primary tomboltambahdata3" data-toggle="modal" data-target="#formmodal">Tambah Data</button>
                <button type="button" class="btn btn-primary tampilModalImport" data-toggle="modal" data-target="#modalImport">
                    Import Data Dari Excel
                </button>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel">Import Data</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL ?>/pkl/importDatadt" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="file">Pilih file Excel (.xlsx)</label>
                            <input type="file" name="file" id="file">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary batal" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="formmodal" tabindex="-1" role="dialog" aria-labelledby="judulModal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judulModalDT">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL; ?>/Pkl/TambahDTAPD" method="post">



                            <input type="hidden" name="id" id="id">


                            <div class="form-group">
                                <label for="namaperusahaan">Nama Perusahaan</label>
                                <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan">
                            </div>

                            <div class="form-group">
                                <label for="jumlahlakilaki">Jumlah Laki-laki</label>
                                <input type="text" class="form-control" id="jumlahlakilaki" name="jumlahlakilaki">
                            </div>

                            <div class="form-group">
                                <label for="jumlahperempuan">Jumlah Perempuan</label>
                                <input type="text" class="form-control" id="jumlahperempuan" name="jumlahperempuan">
                            </div>

                            <div class="form-group">
                                <label for="kota">kota</label>
                                <input type="text" class="form-control" id="kota" name="kota">
                            </div>

                                <div class="form-group">
                                    <label for="mulaitahun">Mulai Tahun</label>
                                    <input type="text" class="form-control" id="mulaitahun" name="mulaitahun">
                                </div>
                            

                            <div class="form-group">
                                    <label for="sampaitahun">Sampai Tahun</label>
                                    <input type="text" class="form-control" id="sampaitahun" name="sampaitahun">
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary btn-fw"
                                    data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
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
                                    <th>Nama Perusahaan</th h>
                                    <th>Jumlah Laki-Laki</th>
                                    <th>Jumlah perempuan</th>
                                    <th>Kota</th>
                                    <th>Mulai Tahun</th>
                                    <th>Sampai Tahun</th>

                                </tr>
                            </thead>
                           
              
              <tbody>
              <?php
              foreach ($data['pd'] as $pd) {
                ?>
                            <tr>

                                <td>
                                            <a class="badge badge-success ubahDataDT"
                                            data-url="<?= BASEURL ?>/PKL/ubahDTAPD/<?= $pd['id']; ?>"
                                            data-toggle="modal" data-target="#formmodal" data-id="<?= $pd['id'] ?>"><i
                                                class="mdi mdi-pencil"></i></a>
                                        <a href="<?= BASEURL; ?>/pkl/HapusDataPD/<?= $pd['id']; ?>"
                                            class="badge badge-danger"
                                            onclick="return confirm('Apakah anda sudah yakin?');"><i
                                                class="mdi mdi-delete"></i></a>
                                </td>
                    <td>
                        <?= $pd['namaperusahaan'] ?>
                    </td>
                    <td>
                        <?= $pd['jumlahlakilaki'] ?>
                    </td>
                    <td>
                        <?= $pd['jumlahperempuan'] ?>
                    </td>
                    <td>
                        <?= $pd['kota'] ?>
                    </td>
                    <td>
                        <?= $pd['mulaitahun'] ?>
                    </td>
                    <td>
                        <?= $pd['sampaitahun'] ?>
                    </td>
                    </tr>
                    <?php
              }
        ?>
        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
            //  daya tampung
$(function(){


$('.tambahDataDT').on('click', function() {
      

    $('#judulModalDT').html('Tambah Data ');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    
});
$('.ubahDataDT').on('click', function() {
    
    $('#judulModalDT').html('Ubah Data ');
    $('.modal-footer button[type=submit]').html('Ubah Data');
    $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/PKL/ubahDTAPD');


    const id = $(this).data('id');
    


    $.ajax({

        url: 'http://localhost/SIMAS/public/PKL/getUbahPD',
        data: {id : id},
        method: 'post',
        dataType: 'json',
        success: function(data) {
               $('#namaperusahaan').val(data.namaperusahaan);
               $('#jumlahlakilaki').val(data.jumlahlakilaki);
               $('#jumlahperempuan').val(data.jumlahperempuan);
               $('#kota').val(data.kota);
               $('#mulaitahun').val(data.mulaitahun);
               $('#sampaitahun').val(data.sampaitahun);
               $('#id').val(data.id);

        }
    });

});
});
        </script>