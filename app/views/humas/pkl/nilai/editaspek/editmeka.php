<div class="modal fade" id="modalubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Ubah Aspek Teknis</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-12">
                    <div class="modal-body">
                        <form action="<?= BASEURL ?>/pkl/ubahDataTeknis&kelas=<?= $_GET['kelas'] ?>" method="post">
                            <div class="form-group">
                                <label for="tkb">Teknik Kerja Bengkel</label>
                                <input type="number" class="form-control" id="tkb" name="tkb">
                            </div>
                            <div class="form-group">
                                <label for="gambarteknik">Gambar Teknik</label>
                                <input type="number" class="form-control" id="gambarteknik" name="gambarteknik">
                            </div>
                            <div class="form-group">
                                <label for="pekerjadasar">Pekerja Dasar Listrik dan
                                    Elektronika</label>
                                <input type="number" class="form-control" id="pekerjadasar" name="pekerjadasar">
                            </div>
                            <div class="form-group">
                                <label for="pmm">Pemrograman Mikroproposesor Mikrokontroles</label>
                                <input type="number" class="form-control" id="pmm" name="pmm">
                            </div>
                            <div class="form-group">
                                <label for="tksm">Teknik Kontrol Sistem Mekatronik</label>
                                <input type="number" class="form-control" id="tksm" name="tksm">
                            </div>
                            <div class="form-group">
                                <label for="cae">Sistem Mekatronik berbasis CAE</label>
                                <input type="number" class="form-control" id="cae" name="cae">
                            </div>
                            <div class="form-group">
                                <label for="robotik">Sistem Robotik</label>
                                <input type="number" class="form-control" id="robotik" name="robotik">
                            </div>
                            <div class="form-group">
                                <label for="ppm">Perawatan & Perbaikan Mekatronik</label>
                                <input type="number" class="form-control" id="ppm" name="ppm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary mr-2">Ubah</button>
            </div>
        </div>
    </div>
</div>