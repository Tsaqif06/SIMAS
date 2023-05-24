      <!-- partial -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 grid-margin">
                  <h3 class="font-weight-bold">STUDI TIRU</h3>
                  <h6 class="font-weight-normal mb-0">Laman Laporan Studi Tiru | <span class="text-primary">SIMAS</span></h6>
                </div>
              </div>
            </div>

              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive ">
                        <table id="table" class="table table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Instansi</th>
                              <th>Peserta</th>
                              <th>Tanggal</th>
                              <th>Tujuan</th>
                              <th>Tempat</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1;
                            foreach ($data['stiru'] as $stiru) : ?>
                              <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $stiru['instansi']; ?></td>
                                <td><?= $stiru['peserta']; ?></td>
                                <td><?= $stiru['tanggal']; ?></td>
                                <td><?= $stiru['tujuan']; ?></td>
                                <td><?= $stiru['tempat']; ?></td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>

                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>