    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">RIWAYAT HAPUS</h3>
                        <h6 class="font-weight-normal mb-0">Web Admin | <span class="text-primary">SIMAS</span></h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="riwayatTable" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Aksi</th>
                                        <th>Menu</th>
                                        <th>Submenu</th>
                                        <th>Delete by</th>
                                        <th>Delete at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['riwayat'] as $row) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><a href="">
                                                    <div data-toggle="modal" data-target="#infotabel" class="badge badge-info btnSelengkapnya" data-index="<?= $i - 1 ?>" title="Selengkapnya">
                                                        <i class="ti ti-info"></i>
                                                    </div>
                                                </a>
                                                <a href="<?= BASEURL ?>/riwayat/restoreData/<?= $row['row']['uuid'] ?>/<?= $row['database'] ?>.<?= $row['table'] ?>" onclick="return confirm('Yakin Ingin Mengembalikan Data?')">
                                                    <div class=" badge badge-success"><i class="ti ti-loop"></i>
                                                    </div>
                                                </a>
                                                <a href="<?= BASEURL ?>/riwayat/deletePermanentData/<?= $row['row']['uuid'] ?>/<?= $row['database'] ?>.<?= $row['table'] ?>" onclick="return confirm('Yakin Ingin Menghapus Permanen Data?')">
                                                    <div class="badge badge-danger"><i class="ti ti-trash"></i></div>
                                                </a>
                                            </td>
                                            <td><?= $row['database'] ?></td>
                                            <td><?= $row['table'] ?></td>
                                            <td><?= $row['row']['deleted_by'] ?></td>
                                            <td><?= $row['row']['deleted_at'] ?></td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>