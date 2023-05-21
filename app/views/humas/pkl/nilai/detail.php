<?php
$kelas = [
  'Teknik Grafika' => ['XI DG A', 'XI DG B', 'XI DG C', 'XI PD A', 'XI PD B', 'XI PD C', 'XI PD D'],
  'Logistik' => ['XI TL A', 'XI TL B'],
  'Mekatronika' => ['XI MEKA A', 'XI MEKA B'],
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
                                PKL</a> | <a class="text-dark" href="<?= BASEURL; ?>/pkl/nilai"> Nilai </a> | <span
                                class="text-primary"> <?= strtoupper($jurusan) ?> </span></h6>
                    </div>

                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                    id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="true">
                                    <?= $data['kelas'] ?>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <?php foreach ($kelas[$jurusan] as $list) : ?>
                                    <a class="dropdown-item"
                                        href="<?= BASEURL; ?>/pkl/nilai&kelas=<?= str_replace(" ", "_", $list) ?>"><?= $list ?></a>
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
            <div class="col-md-12 grid-margin">
                <div class="template-demo">
                    <button type="button" class="tombolTambahData btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#formModal">Tambah Data</button>
                    <button type="button" class="btn btn-primary tampilModalImport" data-bs-toggle="modal"
                        data-bs-target="#modalImport">
                        Import Data Dari Excel
                    </button>
                </div>
            </div>

            <!-- Import Modal -->
            <div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalLabel">Import Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL ?>/pkl/importDataNilai&kelas=<?= $_GET['kelas'] ?>" method="post"
                                enctype="multipart/form-data">
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


            <!-- Form Modal -->
            <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModalLabel">Tambah Data</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL; ?>/PKL/tambahDataNilai&kelas=<?= $_GET['kelas'] ?>"
                                method="post">
                                <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label for="nisn" class="col-form-label">NISN</label>
                                    <input type="number" class="form-control" id="nisn" name="nisn">
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="col-form-label">Nama</label>
                                    <input type="text" class="form-control" id="namasiswa" name="namasiswa">
                                </div>
                                <div class="form-group">
                                    <label for="kelas" class="col-form-label">Kelas</label>
                                    <input type="text" value="<?= $data['kelas'] ?>" class="form-control" id="kelas"
                                        name="kelas" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jeniskelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                        <option value="Laki-laki">Laki - Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="perusahaan" class="col-form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="namaindustri" name="namaindustri">
                                </div>
                                <div class="form-group">
                                    <label for="nilai" class="col-form-label">Nilai</label>
                                    <input type="text" class="form-control" id="nilaisiswa" name="nilaisiswa">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-fw"
                                data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </form>
                        </div>
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
                                        <th>Aksi</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Nilai</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['siswa'] as $nilai) : ?>
                                    <tr>
                                        <td>
                                            <a href="<?= BASEURL; ?>/PKL/ubahDataNilaiDGA/<?= $nilai['id']; ?>&kelas=<?= $_GET['kelas'] ?>"
                                                class="tombolUbahData" data-bs-toggle="modal"
                                                data-bs-target="#formModal" data-id=<?= $nilai['id']; ?>>
                                                <label class="badge badge-success">
                                                    <i class="mdi mdi-lead-pencil"></i>
                                                </label>
                                            </a>
                                            <a href="<?= BASEURL; ?>/PKL/hapusDataNilai/<?= $nilai['id']; ?>&kelas=<?= $_GET['kelas'] ?>"
                                                onclick="return confirm('Apakah anda sudah yakin?');">
                                                <label class="badge badge-danger">
                                                    <i class="mdi mdi-delete"></i>
                                                </label>
                                            </a>
                                        </td>
                                        <td><?= $nilai['nisn'] ?></td>
                                        <td><?= $nilai['namasiswa'] ?></td>
                                        <td><?= $nilai['jeniskelamin'] ?></td>
                                        <td><?= $nilai['namaindustri'] ?></td>
                                        <td><?= $nilai['nilaisiswa'] ?></td>
                                        <td><?= $nilai['keterangannilai'] ?></td>
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


   

<script>
$(function() {
    $('.tombolTambahData').on('click', function() {
        $('#formModalLabel').html('Tambah Data Struktur Organisasi')
        $('#formModal button[type=submit]').html('Tambah Data');
        $("#formModal form").attr("action",
            `http://localhost/SIMAS/public/pkl/tambahDataNilai&kelas=<?= $_GET['kelas'] ?>`);

        if ($("#formModal").hasClass("edit")) {
            $('#id').val('');
            $('#nisn').val('');
            $('#namasiswa').val('');
            $('#jeniskelamin').val('');
            $('#namaindustri').val('');
            $('#nilaisiswa').val('');
            $('#keterangannilai').val('');
        }

        $("#formModal").removeClass("edit")
    });

    $(".tombolUbahData").click(function() {
        $("#formModal").addClass("edit");
        $("#formModalLabel").html("Ubah Data Industri");
        $("#formModal button[type=submit]").html("Ubah Data");
        $("#formModal form").attr("action",
            `http://localhost/SIMAS/public/pkl/ubahDataNilai&kelas=<?= $_GET['kelas'] ?>`);

        const id = $(this).data("id");
        console.log(id);

        $.ajax({
            url: `http://localhost/SIMAS/public/pkl/getUbahNilai`,
            data: {
                id: id
            },
            method: "post",
            dataType: "json",
            success: function(data) {
                // console.log(data);
                $('#id').val(data.id);
                $('#nisn').val(data.nisn);
                $('#namasiswa').val(data.namasiswa);
                $('#kelas').val(data.kelas);
                $('#jeniskelamin').val(data.jeniskelamin);
                $('#namaindustri').val(data.namaindustri);
                $('#nilaisiswa').val(data.nilaisiswa);
                $('#keterangannilai').val(data.keterangannilai);
            },
        })
    })
});
</script>