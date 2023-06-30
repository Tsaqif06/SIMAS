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
        <h4 class="card-title">Form Peminatan</h4>
        <form action="<?= BASEURL ?>/bkk/tambahpeminatan" method="post" class="forms-sample" required>
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
          </div>
          <div class="form-group">
            <label for="jeniskelamin">Jenis Kelamin</label>
            <select class="form-control" id="jeniskelamin" name="jeniskelamin" required>
              <option>Laki - Laki</option>
              <option>Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" required>
          </div>
          <div class="form-group">
            <label for="domisili">Domisili</label>
            <input type="text" class="form-control" id="domisili" name="domisili" placeholder="Domisili" required>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
          </div>
          <div class="form-group">
            <label for="notelp">No. Telp</label>
            <input type="number" class="form-control" id="notelp" name="nohp" placeholder="No. Telp" required>
          </div>
          <div class="form-group">
            <label for="rencana">Rencana setelah lulus</label>
            <select class="form-control" id="rencana" name="rencanasetelahlulus" required>
              <option>Bekerja</option>
              <option>Kuliah</option>
              <option>Berwirausaha</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Kirim</button>
          <button class="btn btn-light">Batalkan</button>
        </form>
      </div>
    </div>
  </div>

</div>