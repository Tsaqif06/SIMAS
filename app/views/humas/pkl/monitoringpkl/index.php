<div class="container mt-5">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tomboltambahdata3" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah data
            </button>
            <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-toggle="modal" data-target="#modalImport">
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
                    <form action="<?= BASEURL ?>/pkl/importDatamon" method="post" enctype="multipart/form-data">
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

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/PKL/caridtmonitoring" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari data.." name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolcari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h4>DATA Monitoring</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Nama Perusahaan</th>
                        <th>Nama Guru</th>
                        <th>Tanggal Monitroing</th>
                    </tr>
                </thead>
                <?php
                foreach ($data['mp'] as $mp) {
                ?>
                    <tr>

                        <td>
                            <div class="mt-3">
                                <a href="<?= BASEURL; ?>/pkl/ubahDTAMonitoring/<?= $mp['id']; ?>" class="btn btn-warning float-right tampildataubah3" data-bs-toggle="modal" data-bs-target="#formModal" data-id=<?= $mp['id']; ?>>Ubah</a>
                                <div class="mt-3">
                                    <a href="<?= BASEURL; ?>/pkl/hapusdatamonitoring/<?= $mp['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda sudah yakin?');">Hapus</a>
                        </td>
        </div>

        <td>
            <?= $mp['namaperusahaan_monitoringpkl'] ?>
        </td>
        <td>
            <?= $mp['namaguru_monitoringpkl'] ?>
        </td>
        <td>
            <?= $mp['tanggal_monitoringpkl'] ?>
        </td>

        </tr>
    <?php
                }
    ?>
    </table>

    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="judulModallabel3">Tambah data siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="<?= BASEURL; ?>/PKL/tambahdataMonitoring" method="post">



                        <input type="hidden" name="id" id="id">

                        <div class="form-group">
                            <label for="namaperusahaan_monitoringpkl">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="namaperusahaan_monitoringpkl" name="namaperusahaan_monitoringpkl">
                        </div>

                        <div class="mt-3"></div>

                        <div class="form-group">
                            <label for="namaguru_monitoringpkl">Nama Guru </label>
                            <input type="text" class="form-control" id="namaguru_monitoringpkl" name="namaguru_monitoringpkl">
                        </div>


                        <div class="form-group">
                            <label for="tanggal_monitoringpkl">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal_monitoringpkl" name="tanggal_monitoringpkl">
                        </div>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>