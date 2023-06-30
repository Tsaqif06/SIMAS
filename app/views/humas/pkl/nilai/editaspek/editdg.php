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
                                <label for="setting">Setting</label>
                                <input type="text" class="form-control" id="setting">
                            </div>
                            <div class="form-group">
                                <label for="desaingrafis">Desain Grafis</label>
                                <input type="text" class="form-control" id="desaingrafis">
                            </div>
                            <div class="form-group">
                                <label for="fotoreproduksi">Foto Reproduksi</label>
                                <input type="text" class="form-control" id="fotoreproduksi">
                            </div>
                            <div class="form-group">
                                <label for="separasiwarna">Separasi Warna</label>
                                <input type="text" class="form-control" id="separasiwarna">
                            </div>
                            <div class="form-group">
                                <label for="layout">Lay Out</label>
                                <input type="text" class="form-control" id="layout">
                            </div>
                            <div class="form-group">
                                <label for="montase">Montase</label>
                                <input type="text" class="form-control" id="montase">
                            </div>
                            <div class="form-group">
                                <label for="platemaking">Plate Making</label>
                                <input type="text" class="form-control" id="platemaking">
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