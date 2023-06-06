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
                                <label for="letterpress">Letter Press</label>
                                <input type="number" class="form-control" id="letterpress" name="letterpress">
                            </div>
                            <div class="form-group">
                                <label for="cetakoffset">Cetak Ofset</label>
                                <input type="number" class="form-control" id="cetakoffset" name="cetakoffset">
                            </div>
                            <div class="form-group">
                                <label for="sablon">Sablon</label>
                                <input type="number" class="form-control" id="sablon" name="sablon">
                            </div>
                            <div class="form-group">
                                <label for="rotogravure">Rotogravure</label>
                                <input type="number" class="form-control" id="rotogravure" name="rotogravure">
                            </div>
                            <div class="form-group">
                                <label for="jilidkemas">Jilid / Kemas</label>
                                <input type="number" class="form-control" id="jilidkemas" name="jilidkemas">
                            </div>
                            <div class="form-group">
                                <label for="digitalprinting">Digital Printing</label>
                                <input type="number" class="form-control" id="digitalprinting" name="digitalprinting">
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