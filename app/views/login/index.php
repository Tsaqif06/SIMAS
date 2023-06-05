<body>
	<?php Flasher::flash(); ?>
	    <div class="container-scroller">
	        <div class="container-fluid page-body-wrapper full-page-wrapper">
	            <div class="content-wrapper d-flex align-items-center auth px-0">
	                <div class="row w-100 mx-0">
	                    <div class="col-lg-4 mx-auto">
	                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
	                            <div class="brand-logo">
	                                <img src="images/logosimas.png" alt="logo" />
	                            </div>
	                            <h4>Halo, Selamat Datang!</h4>
	                            <h6 class="font-weight-light">Masuk terlebih dahulu</h6>
	                            <form class="pt-3 needs-validation" action="<?= BASEURL ?>/login/logProccess" method="post"
	                                novalidate>
	                                <div class="form-group">
	                                    <input type="text" class="form-control form-control-lg" id="username"
	                                        name="username" placeholder="Nama" required />
	                                    <div class="invalid-feedback">Mohon isi nama anda.</div>
	                                </div>
	                                <div class="form-group">
	                                    <input type="password" class="form-control form-control-lg" id="password"
	                                        name="password" placeholder="Sandi" required />
	                                    <div class="invalid-feedback">Mohon isi sandi anda.</div>
	                                    <br />
	                                    <label class="form-check-label text-muted">
	                                        <input type="checkbox" onclick="showPass()" />
	                                        Lihat Sandi
	                                    </label>
	                                </div>
	                                <div class="mt-3">
	                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
	                                        type="submit">
	                                        Masuk
	                                    </button>
	                                </div>
	                            </form>
	                            <div class="mb-2"></div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <!-- content-wrapper ends -->
	        </div>
	        <!-- page-body-wrapper ends -->
	    </div>
	    <!-- container-scroller -->