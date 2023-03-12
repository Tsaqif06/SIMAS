<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <img src="<?= BASEURL ?>img/tsaqif.jpg" alt="Tsaqif" width="250" class="rounded-circle shadow mt-lg-5 pt-lg-4" style="position: relative; top: 60px; left: 140px;">
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="mb-4 bg-light rounded-3 my-5 py-5">
                <div class="py-5">
                    <h1 class="display-5 fw-bold">About Me</h1>
                    <p class="col-md-8 fs-4">Halo, nama saya <?= $data['nama'] ?>, umur saya <?= $data['umur'] ?> tahun, saya adalah seorang <?= $data['profesi'] ?>.</p>
                    <a href="<?= BASEURL ?>about/page">
                        <div class="btn btn-primary btn-lg">My Pages</div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>