<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">LOWONGAN KERJA</h3>
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
        </div>
    </div>

    <div class="row">
        <form action="<?= BASEURL; ?>/bkk/tambahloker" method="post">
            <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label for="namaperusahaan" class="form-label">Nama Perusahaan</label>
                <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan" placeholder="Masukkan nama" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="untukjurusan" class="form-label">Untuk Jurusan</label>
                <select class="form-select" aria-label="Default select example" id="untukjurusan" name="untukjurusan">
                    <option selected>--Pilih Jurusan--</option>
                    <option value="Teknik Grafika">Teknik Grafika</option>
                    <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option value="Animasi">Animasi</option>
                    <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                    <option value="Logistik">Logistik</option>
                    <option value="Mekatronika">Mekatronika</option>
                    <option value="Perhotelan">Perhotelan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="profesiygdibutuhkan" class="form-label">Profesi yang Dibutuhkan</label>
                <input type="text" class="form-control" id="profesiygdibutuhkan" name="profesiygdibutuhkan" placeholder="Masukkan profesi" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="kriteriaprofesi" class="form-label">Kriteria Profesi</label>
                <input type="text" class="form-control" id="kriteriaprofesi" name="kriteriaprofesi" placeholder="Masukkan kriteria" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="kontakperusahaan" class="form-label">Kontak Perusahaan</label>
                <input type="text" class="form-control" id="kontakperusahaan" name="kontakperusahaan" placeholder="Masukkan kontak perusahaan" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="upfotoloker" class="form-label">Foto Loker</label>
                <input type="text" class="form-control" id="upfotoloker" name="upfotoloker" placeholder="Masukkan foto loker" autocomplete="off">
            </div>


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>

</div>
</div>