<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary my-3 tampilModalTambah" data-bs-toggle="modal" data-bs-target="#modal">
                Tambah Data Siswa
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="<?= BASEURL ?>siswa/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword" placeholder="Cari siswa..." aria-label="Cari siswa..." aria-describedby="button-addon2" autocomplete="off">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari!</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-6">

            <h3>Daftar Siswa</h3>
        </div>
    </div>
    <ul class="list-group d-flex" style="width: 400px">
        <?php foreach ($data['siswa'] as $row) : ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $row['nama'] ?>
                <div class="badge">
                    <a href="<?= BASEURL ?>siswa/detail/<?= $row['id'] ?>" class="badge text-bg-primary">Detail</a>
                    <!-- <a class="my-3 badge text-bg-danger" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#delete">
                        Hapus
                    </a> -->
                    <a href="<?= BASEURL ?>siswa/edit" class="badge text-bg-success tampilModalUbah" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $row['id'] ?>">
                        Edit
                    </a>
                    <a href="<?= BASEURL ?>siswa/hapus/<?= $row['id'] ?>" class="badge text-bg-danger" onclick="return confirm('Yakin?')">Hapus</a>
                </div>
            </li>
        <?php endforeach ?>
    </ul>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Tambah Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>siswa/tambah" method="post">
                    <input type="text" name="id" value="<?= $row['id'] ?>" style="display: none;" id="id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Darren Watkins Jr.">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">

                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="RPL">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                <form action="<?= BASEURL ?>siswa/tambah" method="post">

            </div>
            </form>
        </div>
    </div>
</div>