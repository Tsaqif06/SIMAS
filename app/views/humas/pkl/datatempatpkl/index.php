<div class="container mt-5">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tomboltambahdata2" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah data
            </button>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/PKL/caritempat" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari data.." name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolcari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h4>DATA TEMPAT PKL SISWA</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Nisn</th>
                        <th>Nama Siswa</th>
                        <th>Kelas Siswa</th>
                        <th>Nama Perusahaan</th>
                    </tr>
                </thead>
                <?php
                foreach ($data['tpt'] as $tpt) {
                ?>
                    <tr>

                        <td>
                            <div class="mt-3">
                                <a href="<?= BASEURL; ?>/pkl/ubahtempat/<?= $tpt['id']; ?>" class="btn btn-warning float-right tampildataubah2" data-bs-toggle="modal" data-bs-target="#formModal" data-id=<?= $tpt['id']; ?>>Ubah</a>
                                <div class="mt-3">
                                    <a href="<?= BASEURL; ?>/pkl/hapustp/<?= $tpt['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda sudah yakin?');">Hapus</a>
                        </td>
        </div>

        <td>
            <?= $tpt['nisn'] ?>
        </td>
        <td>
            <?= $tpt['namasiswa'] ?>
        </td>
        <td>
            <?= $tpt['kelassiswa'] ?>
        </td>
        <td>
            <?= $tpt['namaperusahaan'] ?>
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
                    <h1 class="modal-title fs-5" id="judulModallabel2">Tambah data siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="<?= BASEURL; ?>/PKL/tambahdatatempat" method="post">



                        <input type="hidden" name="id" id="id">

                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn">
                        </div>


                        <div class="form-group">
                            <label for="namasiswa">Nama Siswa</label>
                            <input type="text" class="form-control" id="namasiswa" name="namasiswa">
                        </div>

                        <div class="mt-3"></div>

                        <div class="form-group">
                            <label for="kelassiswa">Kelas </label>
                            <input type="text" class="form-control" id="kelassiswa" name="kelassiswa">
                        </div>


                        <div class="form-group">
                            <label for="namaperusahaan">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan">
                        </div>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>