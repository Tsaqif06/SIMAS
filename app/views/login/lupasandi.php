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
              <h4>Lupa Sandi?</h4>
              <h6 class="font-weight-light">Kode verifikasi akan dikirim melalui email untuk mengubah kata sandi Anda.</h6>
              <form class="pt-3" action="<?= BASEURL ?>verifikasi" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="inputNama" placeholder="Nama">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="inputEmail" placeholder="Email">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Kirim</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                  </div>
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