<div class="container mt-5">


    <h1>LOWONGAN KERJA</h1>

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-4 ">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahDataLoker" data-bs-toggle="modal"
                data-bs-target="#formModal">
                Tambah Lowongan Kerja
            </button>
            <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-toggle="modal"
                data-target="#modalImport">
                Import Data Dari Excel
            </button>
        </div>
    </div>

    <!-- <div class="row mb-3">
      <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/bkk/cariloker" method="post">
          <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari siswa berdasarkan nama perusahaan" aria-label="Recipient's username" aria-describedby="button-addon2" id="keyword" name="keyword" autocomplete="off">
          <button class="btn btn-primary" type="submit" id="tombolCariloker">Cari</button>
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
                <th>Untuk Jurusan</th>
                <th>Profesi yang Dibutuhkan</th>
                <th>Kriteria Profesi</th>
                <th>Kontak Perusahaan</th>
                <th>Foto Loker</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
      foreach ($data['siswa'] as $siswa) : ?>
            <tr>
                <td>
                    <a href="<?= BASEURL; ?>/bkk/ubahloker/<?= $siswa['id']; ?>"
                        class="badge text-bg-warning tampilModalEditLoker" style="text-decoration: none;"
                        data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $siswa['id']; ?>"> Edit</a>
                    <a href="<?= BASEURL; ?>/bkk/hapusloker/<?= $siswa['id']; ?>" class="badge text-bg-danger"
                        style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus?');"> Hapus</a>
                </td>
                <td><?= $i++; ?></td>
                <td><?= $siswa['namaperusahaan']; ?></td>
                <td><?= $siswa['untukjurusan']; ?></td>
                <td><?= $siswa['profesiygdibutuhkan']; ?></td>
                <td><?= $siswa['kriteriaprofesi']; ?></td>
                <td><?= $siswa['kontakperusahaan']; ?></td>
                <td><?= $siswa['upfotoloker']; ?></td>

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
                <form action="<?= BASEURL ?>/bkk/importDataloker" method="post" enctype="multipart/form-data">
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
                <h1 class="modal-title fs-5" id="formModalLabelLoker">Tambah Data Loker</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/bkk/tambahloker" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="namaperusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan"
                            placeholder="Masukkan nama" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="untukjurusan" class="form-label">Untuk Jurusan</label>
                        <select class="form-select" aria-label="Default select example" id="untukjurusan"
                            name="untukjurusan">
                            <option selected>--Pilih Jurusan--</option>
                            <option value="Teknik Grafika">Teknik Grafika</option>
                            <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                            <option value="Animasi">Animasi</option>
                            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                            <option value="Logistik">Logistik</option>
                            <option value="Mekatronika">Mekatronika</option>
                            <option value="Perhotelan">Perhotelan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="profesiygdibutuhkan" class="form-label">Profesi yang Dibutuhkan</label>
                        <input type="text" class="form-control" id="profesiygdibutuhkan" name="profesiygdibutuhkan"
                            placeholder="Masukkan profesi" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="kriteriaprofesi" class="form-label">Kriteria Profesi</label>
                        <input type="text" class="form-control" id="kriteriaprofesi" name="kriteriaprofesi"
                            placeholder="Masukkan kriteria" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="kontakperusahaan" class="form-label">Kontak Perusahaan</label>
                        <input type="text" class="form-control" id="kontakperusahaan" name="kontakperusahaan"
                            placeholder="Masukkan kontak perusahaan" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="upfotoloker" class="form-label">Foto Loker</label>
                        <input type="text" class="form-control" id="upfotoloker" name="upfotoloker"
                            placeholder="Masukkan foto loker" autocomplete="off">
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