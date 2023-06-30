

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">DATA SISWA BERMASALAH</h3>
            <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/pkl/index"> Laman PKL</a> | <a class="text-dark" href="<?= BASEURL; ?>/pkl/rekap"> Rekapitulasi </a> | <span class="text-primary"> Siswa Bermasalah </span></h6>
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
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Nama Perusahaan</th>
                    <th>Jenis Masalah</th>
                    <th>Solusi</th>
                  </tr>
                </thead>
                <?php
                foreach ($data['bm'] as $bm) {
                ?>
                  <tr>
            <td>
              <?= $bm['nisn'] ?>
            </td>
            <td>
              <?= $bm['nama'] ?>
            </td>
            <td>
              <?= $bm['kelas'] ?>
            </td>
            <td>
              <?= $bm['namaperusahaan'] ?>
            </td>
            <td>
              <?= $bm['jenismasalah'] ?>
            </td>
            <td>
              <?= $bm['solusi'] ?>
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