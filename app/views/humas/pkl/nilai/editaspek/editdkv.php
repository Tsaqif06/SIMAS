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
                                <label for="DesainGrafis">Desain Grafis</label>
                                <input type="number" class="form-control" id="DesainGrafis" name="desaingrafis">
                            </div>
                            <div class="form-group">
                                <label for="PengembanganMultimedia">Pengembangan Multimedia</label>
                                <input type="number" class="form-control" id="PengembanganMultimedia" name="pengembanganmultimedia">
                            </div>
                            <div class="form-group">
                                <label for="Animasi2D">Animasi2D</label>
                                <input type="number" class="form-control" id="Animasi2D" name="animasi2d">
                            </div>
                            <div class="form-group">
                                <label for="Animasi3D">Animasi 3D</label>
                                <input type="number" class="form-control" id="Animasi 3D" name="animasi3d">
                            </div>
                            <div class="form-group">
                                <label for="VideoShooting">Video Shooting</label>
                                <input type="number" class="form-control" id="VideoShooting" name="videoshooting">
                            </div>
                            <div class="form-group">
                                <label for="VideoEditing">Video Editing</label>
                                <input type="number" class="form-control" id="VideoEditing" name="videoediting">
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