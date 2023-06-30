

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">DATA PERIZINAN PKL</h3>
            <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/pkl/index"> Laman PKL</a> | <a class="text-dark" href="<?= BASEURL; ?>/pkl/rekap"> Rekapitulasi </a> | <span class="text-primary"> Perizinan PKL </span></h6>
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
          <button type="button" class="btn btn-primary tomboltambahdata8" data-toggle="modal" data-target="#formmodal">Tambah Data</button>
           <button type="button" class="btn btn-primary tampilModalImport" data-bs-toggle="modal" data-bs-target="#modalImport">
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
                <form action="<?= BASEURL ?>/PKL/importDataiz" method="post" enctype="multipart/form-data">
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


      <div class="modal fade" id="formmodal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judulModallabel8">Tambah Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= BASEURL; ?>/PKL/TambahDTAIZ" method="post">



                <input type="hidden" name="id" id="id">


                <div class="mt-3"></div>

                <div class="form-group">
                  <label for="nisn">Nisn</label>
                  <input type="text" class="form-control" id="nisn" name="nisn">
                </div>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <input type="text" class="form-control" id="kelas" name="kelas">
                </div>
                <div class="form-group">
                  <label for="namaperusahaan">Nama Perusahaan</label>
                  <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan">
                </div>
                <div class="form-group">
                  <label for="halizin">Hal Izin</label>
                  <input type="text" class="form-control" id="halizin" name="halizin">
                </div>
                <div class="form-group">
                  <label for="drtanggal">Dari Tanggal</label>
                  <input type="text" class="form-control" id="drtanggal" name="drtanggal">
                </div>
                <div class="form-group">
                  <label for="hgtanggal">Hingga Tanggal</label>
                  <input type="text" class="form-control" id="hgtanggal" name="hgtanggal">
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
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Nama Perusahaan</th>
                    <th>Hal Izin</th>
                    <th>Dari Tanggal</th>
                    <th>Hingga Tanggal</th>
                  </tr>
                </thead>
                <?php
                foreach ($data['iz'] as $iz) {
                ?>
                  <tr>

                    <td>

                      <a class="badge badge-success tampildataubah8" data-url="<?= BASEURL ?>/PKL/ubahDTAIZ/<?= $iz['id']; ?>" data-toggle="modal" data-target="#formmodal" data-id="<?= $iz['id'] ?>"><i class="mdi mdi-pencil"></i></a>
                      <a href="<?= BASEURL; ?>/PKL/HapusDTIZ/<?= $iz['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda sudah yakin?');"><i class="mdi mdi-delete"></i></a>
                    </td>

                    <td>
                      <?= $iz['nisn'] ?>
                    </td>
                    <td>
                      <?= $iz['nama'] ?>
                    </td>
                    <td>
                      <?= $iz['kelas'] ?>
                    </td>
                    <td>
                      <?= $iz['namaperusahaan'] ?>
                    </td>
                    <td>
                      <?= $iz['halizin'] ?>
                    </td>
                    <td>
                      <?= $iz['drtanggal'] ?>
                    </td>
                    <td>
                      <?= $iz['hgtanggal'] ?>
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