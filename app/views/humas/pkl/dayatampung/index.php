<div class="container mt-5">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tomboltambahdata6" data-bs-toggle="modal" data-bs-target="#formModal">
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
                <form action="<?= BASEURL ?>/bkk/importDatadas" method="post" enctype="multipart/form-data">
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
            <form action="<?= BASEURL; ?>/PKL/caridtPD" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari data.." name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolcari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h4>DAya tampung</h4>
            <table class="table">
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
                                <a href="<?= BASEURL; ?>/pkl/ubahDTAPD/<?= $pd['id']; ?>" class="btn btn-warning float-right tampildataubah6" data-bs-toggle="modal" data-bs-target="#formModal" data-id=<?= $pd['id']; ?>>Ubah</a>
                                <div class="mt-3">
                                    <a href="<?= BASEURL; ?>/pkl/HapusDataPD/<?= $pd['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda sudah yakin?');">Hapus</a>
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
    </table>

    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="judulModallabel6">Tambah data siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="<?= BASEURL; ?>/Pkl/TambahDTAPD" method="post">



                        <input type="hidden" name="id" id="id">


                        <div class="form-group">
                            <label for="namaperusahaan">Nama Perusahaan</label>
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

                            <!-- <div class="mt-3"></div> -->


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





                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>