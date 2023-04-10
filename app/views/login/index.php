	<body>
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
								<form class="pt-3 needs-validation" novalidate>
									<div class="form-group">
										<input type="text" class="form-control form-control-lg" id="inputNama" placeholder="Nama" required />
										<div class="invalid-feedback">Mohon isi nama anda.</div>
									</div>
									<div class="form-group">
										<input type="email" class="form-control form-control-lg" id="inputEmail" placeholder="Email" required />
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-lg" id="inputPass" placeholder="Sandi" required />
										<div class="invalid-feedback">Mohon isi sandi anda.</div>
										<br />
										<label class="form-check-label text-muted">
											<input type="checkbox" onclick="showPass()" />
											Lihat Sandi
										</label>
									</div>
									<div class="mt-3">
										<button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" onClick="goToIndex()">
											Masuk
										</button>
									</div>
								</form>
								<div class="my-2 d-flex justify-content-between align-items-center">
									<div class="form-check">
										<label class="form-check-label text-muted">
											<input type="checkbox" class="form-check-input" />
											Ingat Saya
										</label>
									</div>
									<a href="<?= BASEURL ?>lupasandi" class="auth-link text-black">Lupa Sandi?</a>
								</div>
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