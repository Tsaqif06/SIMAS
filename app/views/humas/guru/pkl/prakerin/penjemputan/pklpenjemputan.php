
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">PENJEMPUTAN PKL</h3>
            <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/pkl"> Laman PKL</a> | <a class="text-dark" href="<?= BASEURL; ?>/pkl/prakerin"> Prakerin </a> | <span class="text-primary"> Penjemputan </span></h6>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 stretch-card grid-margin">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Dokumentasi Penjemputan PKL</p>
            <div id="lightgallery" class="row lightGallery">
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>


  <div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalLabel">Import Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= BASEURL ?>/bkk/importDatadas" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="file">Pilih file Excel (.xlsx)</label>
              <input type="file" name="file" id="file">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary batal" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
        </form>
      </div>
    </div>
  </div>