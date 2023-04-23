<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DATA ASURANSI</h3>
                        <h6 class="font-weight-normal mb-0">WEB DEV | SIMAS</h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Hari ini (11 Mar 2023)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
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
                            <table id="table" class="table table-striped table-main">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Aksi</th>
                                        <th>Email</th>
                                        <th>JenisKlaim</th>
                                        <th>Nama</th>
                                        <th>NIS</th>
                                        <th>ProgramKeahlian</th>
                                        <th>kelas</th>
                                        <th>Jurusan</th>
                                        <th>kodeKelas</th>
                                        <th>NoHP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['asuransi'] as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td class="font-weight-medium">
                                                <a href="" class="badge text-bg-success tampilModalUbah" style="cursor: pointer;" data-url="<?= BASEURL ?>/asuransi/ubahData" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $row['id'] ?>">
                                                    <i class="ti ti-pencil"></i>
                                                </a>
                                                <a href="<?= BASEURL ?>/asuransi/hapusData/<?= $row['id'] ?>">
                                                    <div class=" font-weight-medium pt-2">
                                                        <div class="badge badge-danger delete" onclick="return confirm('Apakah Anda Yakin Mau Menghapus Data?')"><i class="ti ti-trash"></i></div>
                                                </a>
                                            </td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['jenisKlaimAsuransi']; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['NIS']; ?></td>
                                            <td><?= $row['programKeahlian']; ?></td>
                                            <td><?= $row['kelas']; ?></td>
                                            <td><?= $row['jurusan']; ?></td>
                                            <td><?= $row['kodeKelas']; ?></td>
                                            <td><?= $row['noHP']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>