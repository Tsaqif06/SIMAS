<!-- <div class="main-panel"> -->
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">PEMBEKALAN PKL</h3>
            <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/pkl/index"> Laman
                PKL</a> | <span class="text-primary"> Pembekalan </span></h6>
          </div>
        </div>
      </div>
    </div>

    
    <div class="row">
      <div class="col-lg-6">
        <?php Flasher::flash(); ?>
      </div>
    </div>

    <div class="col-md-12 grid-margin">
      <div class="template-demo">
        <button type="button" class="btn btn-primary tomboltambahdata4" data-toggle="modal" data-target="#formmodal">Tambah Data</button>
        <button type="button" class="btn btn-primary tampilModalImport" data-toggle="modal" data-target="#modalImport">
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
            <form action="<?= BASEURL ?>/pkl/importDatapb" method="post" enctype="multipart/form-data">
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


    <!-- Modal -->
    <div class="modal fade" id="formmodal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="judulModallabel4">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= BASEURL; ?>/PKL/tambahdataPB" method="post">

              <input type="hidden" name="id" id="id">

              <div class="mt-3"></div>

              <div class="form-group">
                <label for="dilakukanoleh">Dilakukan OLeh</label>
                <input type="text" class="form-control" id="dilakukanoleh" name="dilakukanoleh">
              </div>


              <div class="form-group">
                <label for="tanggalpersiapan">Tanggal</label>
                <input type="date" class="form-control" id="tanggalpersiapan" name="tanggalpersiapan">
              </div>
              <div class="form-group">
                <label for="jadwal">Jadwal</label>
                <input type="date" class="form-control" id="jadwal" name="jadwal">
              </div>
              <div class="form-group">
                <label for="peserta">Peserta</label>
                <input type="text" class="form-control" id="peserta" name="peserta">
              </div>
              <div class="form-group">
                <label for="tempat">Tempat</label>
                <input type="text" class="form-control" id="tempat" name="tempat">
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
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
                  <th>Dilakukan Oleh</th>
                  <th>Tanggal</th>
                  <th>Jadwal</th>
                  <th>Peserta</th>
                  <th>Tempat</th>

                </tr>
              </thead>
              <?php
              foreach ($data['pbb'] as $pbb) {
              ?>
                <tr>

                  <td>
                    <div class="mt-3">


                      <a class="badge badge-success tampildataubah4" data-url="<?= BASEURL ?>/PKL/ubahDTAPB/<?= $pbb['id']; ?>" data-toggle="modal" data-target="#formmodal" data-id="<?= $pbb['id'] ?>"><i class="mdi mdi-lead-pencil"></i></a>
                      <a href="<?= BASEURL; ?>/pkl/hapusdataPB/<?= $pbb['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda sudah yakin?');"><i class="mdi mdi-delete"></i></a>
                  </td>
          </div>
          <td>
            <?= $pbb['dilakukanoleh'] ?>
          </td>
          <td>
            <?= $pbb['tanggalpersiapan'] ?>
          </td>
          <td>
            <?= $pbb['jadwal'] ?>
          </td>
          <td>
            <?= $pbb['peserta'] ?>
          </td>
          <td>
            <?= $pbb['tempat'] ?>
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
