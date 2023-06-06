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
                                <label for="frontoffice">Front Office</label>
                                <input type="number" class="form-control" id="frontoffice" name="frontoffice">
                            </div>
                            <div class="form-group">
                                <label for="housekeeping">Housekeeping</label>
                                <input type="number" class="form-control" id="housekeeping" name="housekeeping">
                            </div>
                            <div class="form-group">
                                <label for="laundry">Laundry</label>
                                <input type="number" class="form-control" id="laundry" name="laundry">
                            </div>
                            <div class="form-group">
                                <label for="gambarteknik">Gambar Teknik</label>
                                <input type="number" class="form-control" id="gambarteknik" name="gambarteknik">
                            </div>
                            <div class="form-group">
                                <label for="foodbeverage">Food & Beverage</label>
                                <input type="number" class="form-control" id="foodbeverage" name="foodbeverage">
                            </div>
                            <div class="form-group">
                                <label for="pusahap">Pengelolaan Usaha Perhotelan</label>
                                <input type="number" class="form-control" id="pusahap" name="pusahap">
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