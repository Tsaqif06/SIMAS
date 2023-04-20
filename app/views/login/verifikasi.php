<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/logosimas.png" alt="logo">
              </div>
              <h4>Masukkan Kode Verifikasi dan Sandi Baru</h4>
              <form class="pt-3" action="<?= BASEURL ?>/verifikasi/confirm" method="post">
                <div class="form-group">
                      <input type="text" class="form-control form-control-lg" id="inputKode" placeholder="Kode verifikasi dari email" name="otp" required autofocus>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="inputPass" placeholder="Sandi Baru"><br>
                  <label class="form-check-label text-muted">
                    <input type="checkbox" onclick="showPass()">
                    Lihat Sandi
                  </label>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Kirim</button>
                </div>

                <div class="mb-2">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->