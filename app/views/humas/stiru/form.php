
      <!-- partial -->
      <div class="content-wrapper">

      <div class="row">
                <div class="col-lg-6">
                  <?php Flasher::flash(); ?>
                </div>
              </div>
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Pengajuan Studi Tiru</h4>
                  <form action="<?= BASEURL; ?>/stiru/tambahstiru/" method="post">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                  <label for="instansi" class="col-form-label">Nama Instansi</label>
                  <input type="text" class="form-control" id="instansi" name="instansi">
                </div>
                <div class="form-group">
                  <label for="peserta" class="col-form-label">Peserta</label>
                  <input type="text" class="form-control" id="peserta" name="peserta">
                </div>
                <div class="form-group">
                  <label for="tanggal" class="col-form-label">Tanggal</label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
                <div class="form-group">
                  <label for="tujuan" class="col-form-label">Tujuan</label>
                  <input type="text" class="form-control" id="tujuan" name="tujuan">
                </div>
                <div class="form-group">
                  <label for="tempat" class="col-form-label">Tempat</label>
                  <input type="text" class="form-control" id="tempat" name="tempat">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
              </form>
                </div>
              </div>
            </div>
            
          </div>
          <!-- content-wrapper ends -->
  
  
   
  
  