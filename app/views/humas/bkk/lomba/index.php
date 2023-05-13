<div class="container mt-5">


    <h1>LOMBA</h1>

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>


    <div class="row mb-4 ">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahDataLomba" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Lomba
            </button>
            <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-toggle="modal" data-target="#modalImport">
                Import Data Dari Excel
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/bkk/carilomba" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari siswa berdasarkan penyelenggara" aria-label="Recipient's username" aria-describedby="button-addon2" id="keyword" name="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolCarilomba">Cari</button>
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
                <th>Peserta</th>
                <th>Tanggal Daftar</th>
                <th>Tanggal Lomba</th>
                <th>Tempat Lomba</th>
                <th>Kontak Penyelenggara</th>
                <th>Pamflet Lomba</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($data['siswa'] as $siswa) : ?>
                <tr>
                    <td>
                        <a href="<?= BASEURL; ?>/bkk/ubahlomba/<?= $siswa['id']; ?>" class="badge text-bg-warning tampilModalEditLomba" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $siswa['id']; ?>"> Edit</a>
                        <a href="<?= BASEURL; ?>/bkk/hapuslomba/<?= $siswa['id']; ?>" class="badge text-bg-danger" style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus?');"> Hapus</a>
                    </td>
                    <td><?= $i++ ?></td>
                    <td><?= $siswa['penyelenggara']; ?></td>
                    <td><?= $siswa['peserta']; ?></td>
                    <td><?= $siswa['tanggaldaftar']; ?></td>
                    <td><?= $siswa['tanggallomba']; ?></td>
                    <td><?= $siswa['tempatlomba']; ?></td>
                    <td><?= $siswa['kontakpenyelenggara']; ?></td>
                    <td><?= $siswa['pamfletlomba']; ?></td>

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
                <form action="<?= BASEURL ?>/bkk/importDatalomba" method="post" enctype="multipart/form-data">
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
                <h1 class="modal-title fs-5" id="formModalLabelLomba">Tambah Data Lomba</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/bkk/tambahlomba" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="penyelenggara" class="form-label">Penyelenggara</label>
                        <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Masukkan nama penyelenggara" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="peserta" class="form-label">Peserta</label>
                        <input type="text" class="form-control" id="peserta" name="peserta" placeholder="Masukkan peserta" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="tanggaldaftar" class="form-label">Tanggal Daftar</label>
                        <input type="text" class="form-control" id="tanggaldaftar" name="tanggaldaftar" placeholder="Masukkan tanggal" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="tanggallomba" class="form-label">Tanggal Lomba</label>
                        <input type="text" class="form-control" id="tanggallomba" name="tanggallomba" placeholder="Masukkan tanggal lomba" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="tempatlomba" class="form-label">Tempat Lomba</label>
                        <input type="text" class="form-control" id="tempatlomba" name="tempatlomba" placeholder="Masukkan tempat lomba" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="kontakpenyelenggara" class="form-label">Kontak Penyelenggara</label>
                        <input type="text" class="form-control" id="kontakpenyelenggara" name="kontakpenyelenggara" placeholder="Masukkan kontak" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="pamfletlomba" class="form-label">Pamflet Lomba</label>
                        <input type="text" class="form-control" id="pamfletlomba" name="pamfletlomba" placeholder="Masukkan pamflet lomba" autocomplete="off">
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