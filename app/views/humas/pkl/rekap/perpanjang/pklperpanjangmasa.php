
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">PERPANJANG MASA PKL</h3>
            <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/pkl/index"> Laman PKL</a> | <a class="text-dark" href="<?= BASEURL; ?>/pkl/rekap"> Rekapitulasi </a> | <span class="text-primary"> Perpanjang Masa PKL </span></h6>
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
          <button type="button" class="btn btn-primary tomboltambahdata7" data-toggle="modal" data-target="#formmodal">Tambah Data</button>
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
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>NISN</th>
                    <th>Nama Perusahaan</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <?php
                foreach ($data['pp'] as $pp) {
                ?>
                  <tr>

                    <td>

                      <a class="badge badge-success tampildataubah7" data-url="<?= BASEURL ?>/PKL/ubahDTAPP/<?= $pp['id']; ?>" data-toggle="modal" data-target="#formmodal" data-id="<?= $pp['id'] ?>"><i class="mdi mdi-pencil"></i></a>

                      <a href="<?= BASEURL; ?>/pkl/HapusDataPP/<?= $pp['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda sudah yakin?');"><i class="mdi mdi-delete"></i></a>
                    </td>
                    <td>
                      <?= $pp['ppnama'] ?>
                    </td>
            <td>
              <?= $pp['ppkelas'] ?>
            </td>
            <td>
              <?= $pp['nisn'] ?>
            </td>
            <td>
              <?= $pp['namaperusahaan'] ?>
            </td>
            <td>
              <?= $pp['tanggalperpanjangpkl'] ?>
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


  <div class="modal fade" id="formmodal" tabindex="-1" role="dialog" aria-labelledby="f" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= BASEURL; ?>/Pkl/TambahDTAPP" method="post">

            <input type="hidden" name="id" id="id">


            <div class="mt-3"></div>

            <div class="form-group">
              <label for="ppnama">Masukan nama:</label>
              <input type="text" class="form-control" id="ppnama" name="ppnama">
            </div>


            <div class="form-group">
              <label for="ppkelas">Kelas</label>
              <input type="text" class="form-control" id="ppkelas" name="ppkelas">
            </div>
            <div class="form-group">
              <label for="nisn">Nisn</label>
              <input type="text" class="form-control" id="nisn" name="nisn">
            </div>
            <div class="form-group">
              <label for="namaperusahaan">Nama Perusahaan</label>
              <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan">
            </div>
            <div class="form-group">
              <label for="tanggalperpanjangpkl">Tanggal</label>
              <input type="Date" class="form-control" id="tanggalperpanjangpkl" name="tanggalperpanjangpkl">
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