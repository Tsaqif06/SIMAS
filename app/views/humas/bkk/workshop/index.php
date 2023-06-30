<div class="container mt-5">

    <h1>DAFTAR + JADWAL WORKSHOP</h1>

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-4 ">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahDataWorkshop" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Siswa
            </button>
            <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-toggle="modal" data-target="#modalImport">
                Import Data Dari Excel
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/bkk/cariworkshop" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari siswa berdasarkan penyelenggara" aria-label="Recipient's username" aria-describedby="button-addon2" id="keyword" name="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolCariworkshop">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <table id="table" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Aksi</th>
                <th>No</th>
                <th>Penyelenggara</th>
                <th>Tujuan</th>
                <th>Peserta</th>
                <th>Tanggal Persiapan</th>
                <th>Tanggal Dilakukan</th>
                <th>Tempat</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($data['siswa'] as $siswa) : ?>
                <tr>
                    <td>
                        <a href="<?= BASEURL; ?>/bkk/ubahworkshop/<?= $siswa['id']; ?>" class="badge text-bg-warning tampilModalEditWorkshop" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $siswa['id']; ?>"> Edit</a>
                        <a href="<?= BASEURL; ?>/bkk/hapusworkshop/<?= $siswa['id']; ?>" class="badge text-bg-danger" style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus?');"> Hapus</a>
                    </td>
                    <td><?= $i++; ?></td>
                    <td><?= $siswa['penyelenggara']; ?></td>
                    <td><?= $siswa['tujuan']; ?></td>
                    <td><?= $siswa['peserta']; ?></td>
                    <td><?= $siswa['tanggalpersiapan']; ?></td>
                    <td><?= $siswa['tanggaldilakukan']; ?></td>
                    <td><?= $siswa['tempat']; ?></td>
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
                <form action="<?= BASEURL ?>/bkk/importDataworkshop" method="post" enctype="multipart/form-data">
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
                <h1 class="modal-title fs-5" id="formModalLabelWorkshop">Tambah Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/bkk/tambahworkshop" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="penyelenggara" class="form-label">Penyelenggara</label>
                        <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Masukkan penyelenggara" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="kegiatan" class="form-label">Kegiatan</label>
                        <input type="text" class="form-control" id="kegiatan" name="kegiatan" placeholder="Masukkan penyelenggara" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="tujuan" class="form-label">Tujuan</label>
                        <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Masukkan tujuan" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="peserta" class="form-label">Peserta</label>
                        <input type="text" class="form-control" id="peserta" name="peserta" placeholder="Masukkan peserta" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="tanggalpersiapan" class="form-label">Tanggal Persiapan</label>
                        <input type="text" class="form-control" id="tanggalpersiapan" name="tanggalpersiapan" placeholder="Masukkan tgl persiapan" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="tanggaldilakukan" class="form-label">Tanggal Dilakukan</label>
                        <input type="text" class="form-control" id="tanggaldilakukan" name="tanggaldilakukan" placeholder="Masukkan tgl acara" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="tempat" class="form-label">Tempat</label>
                        <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Masukkan tempat" autocomplete="off">
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