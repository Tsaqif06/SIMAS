
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DATA MAGANG KARYAWAN</h3>
                        <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/pkl/index"> Laman
                                PKL</a> | <a class="text-dark" href="<?= BASEURL; ?>/pkl/rekap"> Rekapitulasi </a> |
                            <span class="text-primary"> Magang Karyawan </span></h6>
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
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Nama Perusahaan</th>
                                    </tr>
                                </thead>
                                <?php
                foreach ($data['pg'] as $row) {
                ?>
                                <tr>                                   
                                    <td>
                            <?= $row['nisn'] ?>
                        </td>
                        <td>
                            <?= $row['namasiswa'] ?>
                        </td>
                        <td>
                            <?= $row['kelas'] ?>
                        </td>
                        <td>
                            <?= $row['jurusan'] ?>
                        </td>
                        <td>
                            <?= $row['namaperusahaan'] ?>
                        </td>

                        </tr>
                        <?php
                }
          ?>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>