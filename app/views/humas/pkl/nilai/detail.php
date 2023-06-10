<?php
$kelas = [
    'Teknik Grafika' => ['XI DG A', 'XI DG B', 'XI DG C', 'XI PD A', 'XI PD B', 'XI PD C', 'XI PD D'],
    'Logistik' => ['XI TL A', 'XI TL B'],
    'Mekatronika' => ['XI TM A', 'XI TM B'],
    'Perhotelan' => ['XI PH A', 'XI PH B'],
    'Animasi' => ['XI ANI A', 'XI ANI B', 'XI ANI C'],
    'Desain Komunikasi Visual' => ['XI DKV A', 'XI DKV B', 'XI DKV C'],
    'Teknik Komputer dan Jaringan' => ['XI TKJ A', 'XI TKJ B'],
    'Rekayasa Perangkat Lunak' => ['XI RPL A', 'XI RPL B', 'XI RPL C']
];

$jurusan = '';

foreach ($kelas as $key => $list) {
    if (in_array($data['kelas'], $list)) {
        $jurusan = $key;
        break;
    }
}
?>

<?php if ($jurusan == '') : ?>
    <script>
        location.replace("http://localhost/SIMAS/public/NotFound");
    </script>
<?php endif; ?>

<!-- partial -->
<!-- <div class="main-panel"> -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">DATA NILAI PKL <?= strtoupper($jurusan) ?></h3>
                    <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<?= BASEURL; ?>/pkl/index"> Laman
                            PKL</a> | <a class="text-dark" href="<?= BASEURL; ?>/pkl/nilai"> Nilai </a> | <span class="text-primary"> <?= strtoupper($jurusan) ?> </span></h6>
                </div>

                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <?= $data['kelas'] ?>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                <?php foreach ($kelas[$jurusan] as $list) : ?>
                                    <a class="dropdown-item" href="<?= BASEURL; ?>/pkl/nilai&kelas=<?= str_replace(" ", "_", $list) ?>"><?= $list ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
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
        <div class="col-md-12 grid-margin stretch-card">
            <div class="template-demo">
                <button type="button" class="btn btn-primary" class="tombolTambahDatanilaipkl" data-toggle="modal" data-target="#modalnilai">Tambah
                    Data</button>
            </div>
            <!-- <div class="template-demo">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalubahAT">Ubah Aspek
                    Teknis</button>
            </div> -->
        </div>
    </div>

    <!-- Import Modal -->
    <div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel">Import Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL ?>/pkl/importDataNilai&kelas=<?= $_GET['kelas'] ?>" method="post" enctype="multipart/form-data">
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

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered table-main">
                            <thead>
                                <tr>
                                    <th rowspan="2">No.</th>
                                    <th rowspan="2">Aksi</th>
                                    <th rowspan="2">Nama</th>
                                    <th rowspan="2">Kelas</th>
                                    <th rowspan="2">L/P</th>
                                    <th rowspan="2">NIS</th>
                                    <th rowspan="2">Nama Perusahaan</th>
                                    <th colspan="<?= count($data['namaaspek']) ?>">Aspek Teknis</th>
                                    <th colspan="9">Aspek Non Teknis</th>
                                    <th rowspan="2">Rata - rata</th>
                                    <th rowspan="2">Keterangan</th>
                                </tr>
                                <tr>
                                    <!--Aspek Teknis-->
                                    <?php foreach ($data['namaaspek'] as $row) : ?>
                                        <th><?= $row['nama_aspek'] ?></th>
                                    <?php endforeach ?>
                                    <!--Aspek Non Teknis-->
                                    <th>Religius</th>
                                    <th>Kejujuran</th>
                                    <th>Disiplin</th>
                                    <th>Kerja Sama</th>
                                    <th>Inisiatif</th>
                                    <th>Tanggung Jawab</th>
                                    <th>Kebersihan</th>
                                    <th>Kesantunan</th>
                                    <th>Mutu Pekerjaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($data['siswa'] as $nilai) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td>
                                            <a href="<?= BASEURL; ?>/PKL/ubahDataNilaiDGA/<?= $nilai['id']; ?>&kelas=<?= $_GET['kelas'] ?>" class="tombolUbahDatanilaipkl" data-bs-toggle="modal" data-bs-target="#modalnilai" data-id=<?= $nilai['id']; ?>>
                                                <label class="badge badge-success" title="Edit Teknis">
                                                    <i class="mdi mdi-lead-pencil"></i>
                                                </label>
                                            </a>
                                            <a href="<?= BASEURL; ?>/PKL/hapusDataNilai/<?= $nilai['id']; ?>&kelas=<?= $_GET['kelas'] ?>" onclick="return confirm('Apakah anda sudah yakin?');">
                                                <label class="badge badge-danger">
                                                    <i class="mdi mdi-delete"></i>
                                                </label>
                                            </a>
                                        </td>
                                        <td><?= $nilai['namasiswa'] ?></td>
                                        <td><?= $nilai['kelas'] ?></td>
                                        <td><?= $nilai['jeniskelamin'] ?></td>
                                        <td><?= $nilai['nis'] ?></td>
                                        <td><?= $nilai['namaindustri'] ?></td>
                                        <?php foreach ($data['aspek'] as $row) : ?>
                                            <?php if ($row['siswa_id'] == $nilai['id']) : ?>
                                                <td><?= $row['nilai'] ?></td>
                                            <?php endif; ?>
                                        <?php endforeach ?>
                                        <td><?= $nilai['religius'] ?></td>
                                        <td><?= $nilai['kejujuran'] ?></td>
                                        <td><?= $nilai['disiplin'] ?></td>
                                        <td><?= $nilai['kerjasama'] ?></td>
                                        <td><?= $nilai['inisiatif'] ?></td>
                                        <td><?= $nilai['tanggungjawab'] ?></td>
                                        <td><?= $nilai['kebersihan'] ?></td>
                                        <td><?= $nilai['kesantunan'] ?></td>
                                        <td><?= $nilai['mutupekerjaan'] ?></td>
                                        <td><?= $nilai['ratarata'] ?></td>
                                        <td><?= $nilai['keterangan'] ?></td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalnilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Tambah Data</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= BASEURL; ?>/PKL/tambahDataNilai&kelas=<?= $_GET['kelas'] ?>" method="post">
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="id" name="id">
                            <div class="form-group">
                                <label for="namasiswa">Nama</label>
                                <input type="text" class="form-control" id="namasiswa" name="namasiswa" required>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $data['kelas'] ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" name="jeniskelamin" id="jeniskelamin" required>
                                    <option selected disabled>Open this select menu</option>
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nis">NIS</label>
                                <input type="number" class="form-control" id="nis" name="nis" required>
                            </div>

                            <div class="form-group">
                                <label for="namaindustri">Nama Industri</label>
                                <input type="text" class="form-control" id="namaindustri" name="namaindustri" required>
                            </div>
                        </div>