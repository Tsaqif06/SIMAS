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
                                <label for="ppl">Permodelan Perangkat Lunak</label>
                                <input type="number" class="form-control" id="ppl" name="ppl">
                            </div>
                            <div class="form-group">
                                <label for="basisdata">Basis Data</label>
                                <input type="number" class="form-control" id="basisdata" name="basisdata">
                            </div>
                            <div class="form-group">
                                <label for="webdinamis">Pemrograman Web Dinamis</label>
                                <input type="number" class="form-control" id="webdinamis" name="webdinamis">
                            </div>
                            <div class="form-group">
                                <label for="dekstop">Pemrograman Dekstop</label>
                                <input type="number" class="form-control" id="dekstop" name="desktop">
                            </div>
                            <div class="form-group">
                                <label for="pbo">Pemrograman Berorientasi Objek</label>
                                <input type="number" class="form-control" id="pbo" name="pbo">
                            </div>
                            <div class="form-group">
                                <label for="mobile">Pemrograman Mobile</label>
                                <input type="number" class="form-control" id="mobile" name="mobile">
                            </div>
                            <div class="form-group">
                                <label for="grafik">Pemrograman Grafik</label>
                                <input type="number" class="form-control" id="grafik" name="grafik">
                            </div>
                            <div class="form-group">
                                <label for="produkkreatif">Pemrograman Produk Kreatif</label>
                                <input type="number" class="form-control" id="produkkreatif" name="produkkreatif">
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