<div class="container mt-5">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tomboltambahdata4" data-bs-toggle="modal" data-bs-target="#formModal">
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

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/PKL/caridtPB" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari data" name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolcari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h4>DATA Pembekalan</h4>
            <table class="table">
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
                                <a href="<?= BASEURL; ?>/pkl/ubahDTAPB/<?= $pbb['id']; ?>" class="badge badge-info tampildataubah4" data-bs-toggle="modal" data-bs-target="#formModal" data-id=<?= $pbb['id']; ?>><i class="mdi mdi-information-variant"></i></a>
                                <div class="mt-3">
                                    <a href="<?= BASEURL; ?>/pkl/hapusdataPB/<?= $pbb['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda sudah yakin?');"><i class="mdi mdi-delete"></i></a>
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
    </table>

    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="judulModallabel4">Tambah data siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>