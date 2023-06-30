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
                                <label for="P&TK">Perakitan & Troubleshooting Komputer</label>
                                <input type="number" class="form-control" id="P&TK" name="P&TK">
                            </div>
                            <div class="form-group">
                                <label for="PPKJ">Perakitan / Perawatan Komputer dan
                                    Jaringan</label>
                                <input type="number" class="form-control" id="PPKJ" name="PPKJ">
                            </div>
                            <div class="form-group">
                                <label for="IASJ">Instalasi, Administrasi SOD & JBS</label>
                                <input type="number" class="form-control" id="IASJ" name="IASJ">
                            </div>
                            <div class="form-group">
                                <label for="lanwan">LAN & WAN</label>
                                <input type="number" class="form-control" id="lanwan" name="lanwan">
                            </div>
                            <div class="form-group">
                                <label for="jaringannirkabel">Jaringan Nirkabel</label>
                                <input type="number" class="form-control" id="jaringannirkabel" name="jaringannirkabel">
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