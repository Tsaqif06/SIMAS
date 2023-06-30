
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">PERPANJANG MASA PKL</h3>
            <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/pkl/index"> Laman PKL</a> | <a class="text-dark" href="<?= BASEURL; ?>/pkl/rekap"> Rekapitulasi </a> | <span class="text-primary"> Perpanjang Masa PKL </span></h6>
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
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>NISN</th>
                    <th>Nama Perusahaan</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <?php
                foreach ($data['pp'] as $pp) {
                ?>
                  <tr>
                    <td>
                      <?= $pp['ppnama'] ?>
                    </td>
            <td>
              <?= $pp['ppkelas'] ?>
            </td>
            <td>
              <?= $pp['nisn'] ?>
            </td>
            <td>
              <?= $pp['namaperusahaan'] ?>
            </td>
            <td>
              <?= $pp['tanggalperpanjangpkl'] ?>
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
