<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">SURAT MASUK</h3>
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
                                    <th>Nomor Berkas</th>
                                    <th>Alamat Pengirim</th>
                                    <th>Tanggal</th>
                                    <th>Tanggal Surat</th>
                                    <th>Nomor Surat</th>
                                    <th>Perihal</th>
                                    <th>Nomor Petunjuk</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($data['suratmasuk'] as $row) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $row["nomor_berkas"] ?></td>
                                        <td><?= $row["alamat_pengirim"]; ?></td>
                                        <td><?= $row["tanggal"]; ?></td>
                                        <td><?= $row["tanggal_surat"]; ?></td>
                                        <td><?= $row["nomor_surat"]; ?></td>
                                        <td><?= $row["perihal"]; ?></td>
                                        <td><?= $row["nomor_petunjuk"]; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>