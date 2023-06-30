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
                                <label for="pmsm">Penanganan Material Secara Manual</label>
                                <input type="number" class="form-control" id="pmsm" name="pmsm">
                            </div>
                            <div class="form-group">
                                <label for="papm">Penggunaan Alat Penangaan Material</label>
                                <input type="number" class="form-control" id="papm" name="papm">
                            </div>
                            <div class="form-group">
                                <label for="adb">Administrasi Dokumen Barang</label>
                                <input type="number" class="form-control" id="adb" name="adb">
                            </div>
                            <div class="form-group">
                                <label for="gambarteknik">Gambar Teknik</label>
                                <input type="number" class="form-control" id="gambarteknik" name="gambarteknik">
                            </div>
                            <div class="form-group">
                                <label for="penanganandistribusi">Penanganan Distribusi</label>
                                <input type="number" class="form-control" id="penanganandistribusi" name="penanganandistribusi">
                            </div>
                            <div class="form-group">
                                <label for="administrasitransportasi">Administrasi
                                    Transportasi</label>
                                <input type="number" class="form-control" id="administrasitransportasi" name="administrasitransportasi">
                            </div>
                            <div class="form-group">
                                <label for="pi">Pengelolaan Inventory</label>
                                <input type="number" class="form-control" id="pi" name="pi">
                            </div>
                            <div class="form-group">
                                <label for="ppkk">Penerapan Produk Kreatif & Kewirausahaan</label>
                                <input type="number" class="form-control" id="ppkk" name="ppkk">
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