<div class="modal fade" id="modalubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                                <label for="ani23">Animator 2D / 3D</label>
                                <input type="number" class="form-control" id="ani23" name="ani23" required>
                            </div>
                            <div class="form-group">
                                <label for="characterdesign">Character Design</label>
                                <input type="number" class="form-control" id="characterdesign" name="characterdesign"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="inbetweener">Inbetweener</label>
                                <input type="number" class="form-control" id="Inbetweener" name="inbetweener" required>
                            </div>
                            <div class="form-group">
                                <label for="modeler">3D Modeler</label>
                                <input type="number" class="form-control" id="modeler" name="modeler" required>
                            </div>
                            <div class="form-group">
                                <label for="backgroundartist">Background Artist</label>
                                <input type="number" class="form-control" id="backgroundartist" name="backgroundartist"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="coloringartist">Coloring Artist</label>
                                <input type="number" class="form-control" id="coloringartist" name="coloringartist"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="compositor">Compositor</label>
                                <input type="number" class="form-control" id="compositor" name="compositor" required>
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