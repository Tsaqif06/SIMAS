

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">DATA INDUSTRI</h3>
            <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/pkl/index"> Laman PKL</a> | <a class="text-dark" href="<?= BASEURL; ?>/pkl/rekap"> Rekapitulasi </a> | <span class="text-primary"> Data Industri </span></h6>
          </div>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive ">
            <table class="table table-hover" id="table">
              <thead>
                <tr>
                  <th>Kompetensi Keahlian</th>
                  <th>Nama Perusahaan</th>
                  <th>Alamat</th>
                  <th>Kota</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($data['dta'] as $dta) {
                ?>
                  <tr>
          <td>
            <?= $dta['kompetensikeahlian'] ?>
          </td>
          <td>
            <?= $dta['namaperusahaan'] ?>
          </td>
          <td>
            <?= $dta['alamat'] ?>
          </td>
          <td>
            <?= $dta['kota'] ?>
          </td>
          </tr>
        <?php
                }
        ?>
        </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
