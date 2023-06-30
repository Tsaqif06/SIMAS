<!-- <div class="container mt-5">

    <div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-6">
        <button type="button" class="btn btn-primary tomboltambahdata1" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah data
            </button>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/PKL/cariind" method="post">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari data.." name="keyword" id="keyword" autocomplete="off" >
        <button class="btn btn-primary" type="submit" id="tombolcari">Cari</button>
        </div>
        </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h4>DATA INDUSTRI</h4>
<table class="table">
<thead>
    <tr>
        <th>Aksi</th>
        <th>Kompetensi Keahlian</th>
        <th>Nama Perusahaan</th>
        <th>Alamat</th>
        <th>Kota</th>
    </tr>
</thead>
<?php
    foreach($data['dta'] as $dta){
?>
<tr>
    
<td><div class="mt-3">
<a  href="<?= BASEURL; ?>/pkl/ubahind/<?= $dta['id'];?>"class="btn btn-warning float-right tampildataubah1" data-bs-toggle="modal" data-bs-target="#formModal" data-id=<?= $dta['id']; ?>>Ubah</a><div class="mt-3">
<a  href="<?= BASEURL; ?>/pkl/hapusind/<?= $dta['id'];?>"class="btn btn-danger" onclick="return confirm('Apakah anda sudah yakin?');">Hapus</a></td></div>

    <td><?=$dta['kompetensikeahlian']?></td>
    <td><?=$dta['namaperusahaan']?></td>
    <td><?=$dta['alamat']?></td>
    <td><?=$dta['kota']?></td>
    
</tr>
<?php
    }
?>
</table>
           
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModallabel1">Tambah data siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
      <form action="<?= BASEURL; ?>/Pkl/tambahdataiind" method="post">

                    

                    <input type="hidden" name="id" id="id">


                   
                    <div class="form-group mb-3">
                <label for="kompetensikeahlian">Kompetensi Keahlian</label>
                <select class="form-control" id="kompetensikeahlian" name="kompetensikeahlian">
                    <option value="Tekhnik Grafika">Tekhnik Grafika</option>
                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option value="Logistik">Logistik</option>
                    <option value="Perhotelan">Perhotelan</option>
                    <option value="Mekatronika">Mekatronika</option>
                    <option value="Desain Komunikasi Visual">DKV</option>
                    <option value="Tekhnik Komputer Jaringan">TKJ</option>
                    <div>
                    
                   
                </select>
                    <div class="form-group">
                        <label for="namaperusahaan" >Nama Perusahaan</label>
                        <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan">
                    </div>

                    <div class="mt-3"></div>
                    
                    <div class="form-group">
                        <label for="alamat" >Alamat</label>
                         <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>

                    

                    <div class="form-group">
                        <label for="kota" >KOTA</label>
                         <input type="text" class="form-control" id="kota" name="kota">
                    </div>
                  
                    </div>
                    </div>

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
      </div>
    </div>
  </div>
</div> -->







<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Humas</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../vendors/feather/feather.css">
    <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">

    <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/logosaja.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="../index.html"><img src="../images/logosimas.png"
                        class="mr-2" alt="SIMAS" /></a>
                <a class="navbar-brand brand-logo-mini" href="../index.html"><img src="../images/logosaja.png"
                        alt="SIMAS" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                <span class="input-group-text" id="search">
                                    <i class="icon-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                                aria-label="search" aria-describedby="search">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="../images/akunfix.png" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                    <li class="nav-item nav-settings d-none d-lg-flex">
                        <a class="nav-link" href="#">
                            <i class="icon-ellipsis"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                            aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                        aria-labelledby="todo-section">
                        <div class="add-items d-flex px-3 mb-0">
                            <form class="form w-100">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn"
                                        id="add-task">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="list-wrapper px-3">
                            <ul class="d-flex flex-column-reverse todo-list">
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Team review meeting at 3.00 PM
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Prepare for presentation
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Resolve all the low priority tickets due today
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Schedule meeting for next week
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Project review
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- To do section tab ends -->
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Humas</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="../1_PKL/pkl.html">PKL</a></li>
                                <div class="collapse" id="form-elements">
                                    <div class="navsubitem">
                                        <a class="nav-link" href="../1_PKL/pklrekapitulasi.html">Rekap PKL</a>
                                        <a class="nav-link" href="../1_PKL/pklpembekalan.html">Pembekalan PKL</a>
                                        <a class="nav-link" href="../1_PKL/pklpemberkasan.html">Pemberkasan</a>
                                        <a class="nav-link" href="../1_PKL/pklprakerin.html">Prakerin</a>
                                        <a class="nav-link" href="../1_PKL/pklnilai.html">Nilai PKL</a>
                                        <a class="nav-link" href="../1_PKL/pkldayatampung.html">Daya Tampung</a>
                                    </div>
                                    <li class="nav-item"><a class="nav-link" href="../2_BKK/bkk.html">BKK</a></li>
                                    <div class="navsubitem">
                                        <a class="nav-link" href="../2_BKK/bkkalumnisukses.html">Alumni Sukses</a>
                                        <a class="nav-link" href="../2_BKK/bkkmou.html">MoU</a>
                                        <a class="nav-link" href="../2_BKK/bkkpeminatan.html">Peminatan</a>
                                        <a class="nav-link" href="../2_BKK/bkkworkshop.html">Workshop</a>
                                        <a class="nav-link" href="../2_BKK/bkkkebekerjaan.html">Kebekerjaan</a>
                                        <a class="nav-link" href="../2_BKK/bkkspw.html">SPW</a>
                                        <a class="nav-link" href="../2_BKK/bkklomba.html">Lomba</a>
                                        <a class="nav-link" href="../2_BKK/bkkloker.html">Lowongan Kerja</a>
                                    </div>
                                    <li class="nav-item"><a class="nav-link" href="../3_ICT/ict.html">ICT</a></li>
                                    <li class="nav-item"><a class="nav-link" href="../4_STUDITIRU/studitiru.html">Studi
                                            Tiru</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">PKL MAGANG KARYAWAN</h3>
                                    <h6 class="font-weight-normal mb-0">Laman Data Siswa yang Diangkat sebagai Pegawai |
                                        <span class="text-primary">SIMAS</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="template-demo">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">Tambah Data</button>
                                <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport"
                                    data-toggle="modal" data-target="#modalImport">
                                    Import Data Dari Excel
                                </button>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="nisn" class="col-form-label">NISN</label>
                                                <input type="number" class="form-control" id="nisn">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama" class="col-form-label">Nama</label>
                                                <input type="text" class="form-control" id="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="kelas" class="col-form-label">Kelas</label>
                                                <input type="text" class="form-control" id="kelas">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary btn-fw"
                                            data-dismiss="modal">Tutup</button>
                                        <button type="button" class="btn btn-primary">Simpan Data</button>
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/bkk/importDatadas" method="post" enctype="multipart/form-data">
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
                                    <div class="table-responsive ">
                                        <table class="table table-hover" id="tablepengangkatan">
                                            <thead>
                                                <tr>
                                                    <th>Aksi</th>
                                                    <th>NISN</th>
                                                    <th>Nama</th>
                                                    <th>Kelas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><label class="badge badge-info"><i
                                                                class="mdi mdi-information-variant"></i></label>
                                                        <label class="badge badge-success"><i
                                                                class="mdi mdi-lead-pencil"></i></label>
                                                        <label class="badge badge-danger"><i
                                                                class="mdi mdi-delete"></i></label>
                                                    </td>
                                                    <td>009106839277</td>
                                                    <td>Raib Permata</td>
                                                    <td>XII DKV A</td>
                                                </tr>
                                                <tr>
                                                    <td><label class="badge badge-info"><i
                                                                class="mdi mdi-information-variant"></i></label>
                                                        <label class="badge badge-success"><i
                                                                class="mdi mdi-lead-pencil"></i></label>
                                                        <label class="badge badge-danger"><i
                                                                class="mdi mdi-delete"></i></label>
                                                    </td>
                                                    <td>0071789539</td>
                                                    <td>Andina Kurnia Winanda</td>
                                                    <td>XII DG A</td>
                                                </tr>
                                                <tr>
                                                    <td><label class="badge badge-info"><i
                                                                class="mdi mdi-information-variant"></i></label>
                                                        <label class="badge badge-success"><i
                                                                class="mdi mdi-lead-pencil"></i></label>
                                                        <label class="badge badge-danger"><i
                                                                class="mdi mdi-delete"></i></label>
                                                    </td>
                                                    <td>005176590</td>
                                                    <td>M. Fikri Maulana</td>
                                                    <td>XII ANI A</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023.
                            SIMAS. All rights reserved.</span>
                    </div>
                </footer>

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../vendors/chart.js/Chart.min.js"></script>
    <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../js/dataTables.select.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#tablepengangkatan').DataTable();
    });
    </script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/hoverable-collapse.js"></script>
    <script src="../js/template.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../js/dashboard.js"></script>
    <script src="../js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>