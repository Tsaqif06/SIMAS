<div class="container mt-5">

    <h1>MOU</h1>

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-4 ">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahDataMou" data-bs-toggle="modal"
                data-bs-target="#formModal">
                Tambah Data MoU
            </button>
            <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-toggle="modal"
                data-target="#modalImport">
                Import Data Dari Excel
            </button>
        </div>
    </div>

    <!-- <div class="row mb-3">
      <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/bkk/carimou" method="post">
          <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari siswa berdasarkan nama perusahaan" aria-label="Recipient's username" aria-describedby="button-addon2" id="keyword" name="keyword" autocomplete="off">
          <button class="btn btn-primary" type="submit" id="tombolCarimou">Cari</button>
          </div>
        </form>
      </div>
    </div> -->


    <table id="myTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Aksi</th>
                <th>No</th>
                <th>Nama Perusahaan</th>
                <th>Tanggal MoU</th>
                <th>Upload Draft MoU</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
      foreach ($data['siswa'] as $siswa) : ?>
            <tr>
                <td>
                    <a href="<?= BASEURL; ?>/bkk/ubahmou/<?= $siswa['id']; ?>"
                        class="badge text-bg-warning tampilModalEditdas" style="text-decoration: none;"
                        data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $siswa['id']; ?>"> Edit</a>
                    <a href="<?= BASEURL; ?>/bkk/hapusmou/<?= $siswa['id']; ?>" class="badge text-bg-danger"
                        style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus?');"> Hapus</a>
                </td>
                <td><?= $i++ ?></td>
                <td><?= $siswa['namaperusahaan']; ?></td>
                <td><?= $siswa['tanggalmou']; ?></td>
                <td><?= $siswa['updraftmou']; ?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
                <form action="<?= BASEURL ?>/bkk/importDatamou" method="post" enctype="multipart/form-data">
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


<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabelMou">Tambah Data MoU</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/bkk/tambahmou" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="namaperusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan"
                            placeholder="Masukkan nama perusahaan" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="tanggalmou" class="form-label">Tanggal MoU</label>
                        <input type="text" class="form-control" id="tanggalmou" name="tanggalmou"
                            placeholder="Masukkan tanggal" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="updraftmou" class="form-label">Upload Draft MoU</label>
                        <input type="text" class="form-control" id="updraftmou" name="updraftmou"
                            placeholder="Masukkan updraftmou" autocomplete="off">
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>