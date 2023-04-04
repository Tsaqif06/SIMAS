<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">SURAT PENGAJUAN</h3>
                        <h6 class="font-weight-normal mb-0">WEB DEV | SIMAS</h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Hari ini (11 Mar 2023)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <a href="../assets/LAMPIRAN_Permendagri_NO_78_Th_2012.pdf"><button class="btn btn-primary font-weight-bold">Bantuan Kode Nomor Petunjuk</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <form action="<?= BASEURL ?>suratpengajuan/ajukanSurat" method="post">
                <div class="form-content">
                    <div class="col-lg-8 col-12 form-body">
                        <div class="mb-3">
                            <label for="no_surat" class="form-label">Nomor Surat</label>
                            <input type="text" class="form-control" name="no_surat" id="no_surat" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_pengirim" class="form-label">Alamat Pengirim</label>
                            <input type="text" class="form-control" name="alamat_pengirim" id="alamat_pengirim" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="text" class="form-control" name="tanggal" id="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                            <input type="text" class="form-control" name="tanggal_surat" id="tanggal_surat" required>
                        </div>
                        <div class="mb-3">
                            <label for="perihal" class="form-label">Perihal</label>
                            <input type="text" class="form-control" name="perihal" id="perihal" required>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_petunjuk" class="form-label">Nomor Petunjuk</label>
                            <input type="text" class="form-control" name="nomor_petunjuk" id="nomor_petunjuk" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <?php Flasher::flash(); ?>
                    </div>
                    <div class="modal-footer justify-content-start">
                        <button type="submit" class="btn btn-primary">Ajukan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="form.reset()">Reset</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>