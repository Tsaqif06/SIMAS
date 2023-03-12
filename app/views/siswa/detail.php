<div class="container my-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $data['siswa']['nama'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $data['siswa']['jurusan'] ?></h6>
            <p class="card-text"><?= $data['siswa']['email'] ?></p>
        </div>
    </div>
    <a href="<?= BASEURL ?>siswa">&larr; Kembali</a>
</div