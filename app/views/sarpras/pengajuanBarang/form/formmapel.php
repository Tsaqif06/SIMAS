<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">PENGAJUAN MATA PELAJARAN</h3>
          <h6 class="font-weight-normal mb-0">WEB DEV | SIMAS</span></h6>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="modal-body">
    <form action="<?= BASEURL; ?>/pengajuanMapel/tambah" method="post">
      <input type="hidden" name="id" id="id">

      <div class="form-group">
        <label for="exampleInputEmail1">Mata Pelajaran</label>
        <select id="mapel" name="mapel" class="form-control">
          <option>Matematika</option>
          <option>Agama</option>
          <option>Informatika</option>
          <option>B.Indonesia</option>
          <option>B.Inggris</option>
          <option>B.Daerah</option>
          <option>Seni</option>
          <option>Pendidikan Pancasila</option>
          <option>IPAS</option>
          <option>PJOK</option>
          <option>Sejarah</option>
        </select>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Nama Barang</label>
        <input type="text" class="form-control" id="barang" name="barang" placeholder="" required />
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Spesifikasi</label>
        <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" placeholder="" required />
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Kebutuhan Bulan Ke-</label>
        <input class="form-control" id="bulan" name="bulan" required />
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Jumlah</label>
        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="" required />
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Satuan</label>
        <input type="text" class="form-control" id="satuan" name="satuan" placeholder="" required />
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Perkiraan Harga Satuan (Termasuk Pajak)</label>
        <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="" required />
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Perkiraan Total Harga</label>
        <input type="text" class="form-control" id="harga_total" name="harga_total" placeholder="" required />
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Digunakan Untuk</label>
        <input type="text" class="form-control" id="digunakan_untuk" name="digunakan_untuk" placeholder="" required />
      </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Tambah Data</button>
    <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
  </div>
  </form>
</div>
</div>
</div>