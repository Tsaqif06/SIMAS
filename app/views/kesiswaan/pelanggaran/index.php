    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DATA PELANGGARAN</h3>
                        <h6 class="font-weight-normal mb-0">WEB DEV | SIMAS</h6>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <?php Flasher::flash(); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary my-3 tampilModalTambah" data-url="<?= BASEURL ?>/mapel/tambahData" data-bs-toggle="modal" data-bs-target="#modal">
                    Tambah Data Pelanggaran
                </button>
                <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-bs-toggle="modal" data-bs-target="#modalImport">
                    Import Data Dari Excel
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Aksi</th>
                                        <th>NIS</th>
                                        <th>Nama Pelanggar</th>
                                        <th>Data Pelanggaran</th>
                                        <th>Poin Data Pelanggaran</th>
                                        <th>Total Poin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['pelanggaran'] as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td class="font-weight-medium">
                                                <a href="" class="badge text-bg-success tampilModalUbah" style="cursor: pointer;" data-url="<?= BASEURL ?>/pelanggaran/ubahData" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $row['id'] ?>">
                                                    <i class="ti ti-pencil"></i>
                                                </a>
                                                <a href="<?= BASEURL ?>/pelanggaran/hapusData/<?= $row['id'] ?>">
                                                    <div class=" font-weight-medium pt-2">
                                                        <div class="badge badge-danger delete" onclick="return confirm('Apakah Anda Yakin Mau Menghapus Data?')">
                                                            <i class="ti ti-trash"></i>
                                                        </div>
                                                </a>
                                            </td>
                                            <td><?= $row['NIS']; ?></td>
                                            <td><?= $row['namaPelanggar']; ?></td>
                                            <td><?= $row['namaDataPelanggaran']; ?></td>
                                            <td><?= $row['poinDataPelanggaran']; ?></td>
                                            <td><?= $row['totalPoin']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL ?>/pelanggaran/importData" method="post" enctype="multipart/form-data">
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

        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalLabel">Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">