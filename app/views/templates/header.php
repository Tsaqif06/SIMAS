<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $data['judul'] ?></title>
    <!-- plugins:css -->
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cd-themify-icons/index.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/js/select.dataTables.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= BASEURL ?>/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Editor -->
    <link href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css" rel="stylesheet" type="text/css" />
    <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
    <!-- Buttons -->
    <link href="https://nightly.datatables.net/buttons/css/buttons.dataTables.css?_=c6b24f8a56e04fcee6105a02f4027462.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/buttons/js/dataTables.buttons.js?_=c6b24f8a56e04fcee6105a02f4027462">
    </script>
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/scroll.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png" />
</head>

<body>
    <div class="container-spinner">
        <div class="spinner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <div class="main">
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo mr-5" href="<?= BASEURL ?>"><img src="<?= BASEURL ?>/images/logosimas.png" class="mr-2" alt="SIMAS" /></a>
                    <a class="navbar-brand brand-logo-mini" href="<?= BASEURL ?>"><img src="<?= BASEURL ?>/images/logosaja.png" alt="SIMAS" /></a>
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
                                <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown" id="notification">
                            <a class="nav-link count-indicator dropdown-toggle" href="#" data-toggle="dropdown">
                                <i class="icon-bell mx-0"></i>
                                <span class="count d-none"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                                <!-- <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-success">
                                            <i class="ti-info-alt mx-0"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                        <p class="font-weight-light small-text mb-0 text-muted">
                                            Just now
                                        </p>
                                    </div>
                                </a>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-warning">
                                            <i class="ti-settings mx-0"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <h6 class="preview-subject font-weight-normal">Settings</h6>
                                        <p class="font-weight-light small-text mb-0 text-muted">
                                            Private message
                                        </p>
                                    </div>
                                </a> -->
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-info">
                                            <i class="ti-email mx-0"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <h6 class="preview-subject font-weight-normal">Pengajuan Surat Baru</h6>
                                        <p class="font-weight-light small-text mb-0 text-muted">
                                            2 surat baru sedang diajukan
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" data-toggle="modal" data-target="#profil">
                                    <i class="ti-user text-primary"></i>
                                    Profil
                                </a>
                                <a class="dropdown-item" href="<?= BASEURL ?>/logout">
                                    <i class="ti-power-off text-primary"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>
                        <li class="nav-item nav-settings d-none d-lg-flex">
                            <a class="nav-link" href="#">
                                <i class="icon-ellipsis"></i>
                            </a>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
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
                            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="setting-content">
                        <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                            <div class="add-items d-flex px-3 mb-0">
                                <form class="form w-100">
                                    <div class="form-group d-flex">
                                        <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                        <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
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
                            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
                            <div class="events pt-4 px-3">
                                <div class="wrapper d-flex mb-2">
                                    <i class="ti-control-record text-primary mr-2"></i>
                                    <span>Feb 11 2018</span>
                                </div>
                                <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                                <p class="text-gray mb-0">The total number of sessions</p>
                            </div>
                            <div class="events pt-4 px-3">
                                <div class="wrapper d-flex mb-2">
                                    <i class="ti-control-record text-primary mr-2"></i>
                                    <span>Feb 7 2018</span>
                                </div>
                                <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                                <p class="text-gray mb-0 ">Call Sarah Graves</p>
                            </div>
                        </div>
                        <!-- To do section tab ends -->
                        <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                            <div class="d-flex align-items-center justify-content-between border-bottom">
                                <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                                <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                                    All</small>
                            </div>
                            <ul class="chat-list">
                                <li class="list active">
                                    <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                                    <div class="info">
                                        <p>Thomas Douglas</p>
                                        <p>Available</p>
                                    </div>
                                    <small class="text-muted my-auto">19 min</small>
                                </li>
                                <li class="list">
                                    <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                                    <div class="info">
                                        <div class="wrapper d-flex">
                                            <p>Catherine</p>
                                        </div>
                                        <p>Away</p>
                                    </div>
                                    <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                                    <small class="text-muted my-auto">23 min</small>
                                </li>
                                <li class="list">
                                    <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                                    <div class="info">
                                        <p>Daniel Russell</p>
                                        <p>Available</p>
                                    </div>
                                    <small class="text-muted my-auto">14 min</small>
                                </li>
                                <li class="list">
                                    <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                                    <div class="info">
                                        <p>James Richardson</p>
                                        <p>Away</p>
                                    </div>
                                    <small class="text-muted my-auto">2 min</small>
                                </li>
                                <li class="list">
                                    <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                                    <div class="info">
                                        <p>Madeline Kennedy</p>
                                        <p>Available</p>
                                    </div>
                                    <small class="text-muted my-auto">5 min</small>
                                </li>
                                <li class="list">
                                    <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                                    <div class="info">
                                        <p>Sarah Graves</p>
                                        <p>Available</p>
                                    </div>
                                    <small class="text-muted my-auto">47 min</small>
                                </li>
                            </ul>
                        </div>
                        <!-- chat tab ends -->
                    </div>
                </div>
                <!-- partial -->
                <!-- partial:partials/_sidebar.html -->
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASEURL ?>/">
                                <i class="icon-grid menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>


                        <?php if ($data['user']['role'] == 'admin') : ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#masterdata" aria-expanded="false" aria-controls="masterdata">
                                    <i class="icon-folder menu-icon"></i>
                                    <span class="menu-title">Master Data</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="masterdata">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL ?>/guru">Guru</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL ?>/karyawan">Karyawan</a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL ?>/siswa">Siswa</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL ?>/kelas">Kelas</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL ?>/walikelas">Wali
                                                Kelas</a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL ?>/mapel">Mata
                                                Pelajaran</a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL ?>/jabatan">Jabatan</a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL ?>/kompkeahlian">Kompetensi
                                                Keahlian</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL ?>/progkeahlian">Program
                                                Keahlian</a></li>
                                    </ul>
                                </div>
                            </li>
                        <?php endif ?>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#tu" aria-expanded="false" aria-controls="tu">
                                <i class="icon-mail menu-icon"></i>
                                <span class="menu-title">Tata Usaha</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="tu">
                                <ul class="nav flex-column sub-menu">
                                    <?php if ($data['user']['role'] == 'admin' && ($data['user']['hak_akses'] == 'all' || $data['user']['hak_akses'] == 'mastertu')) : ?>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL ?>/suratmasuk">Surat
                                                Masuk</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL ?>/suratkeluar">Surat
                                                Keluar</a></li>
                                    <?php endif ?>
                                    <?php if ($data['user']['role'] == 'admin' || $data['user']['role'] == 'user') : ?>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL ?>/suratpengajuan">Surat
                                                Pengajuan</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL ?>/nopetunjuk">Nomor
                                                Petunjuk</a></li>
                                    <?php endif ?>
                                </ul>
                            </div>
                        </li>

                        <?php if ($data['user']['role'] == 'admin' || ($data['user']['role'] == 'user' && ($data['user']['hak_akses'] == '' || $data['user']['hak_akses'] == 'industri' || $data['user']['hak_akses'] == 'kabeng'))) : ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#pkl" aria-expanded="false" aria-controls="pkl">
                                    <i class="icon-columns menu-icon"></i>
                                    <span class="menu-title">Humas</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="pkl">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= BASEURL; ?>/pkl/index">
                                                PKL
                                            </a>
                                        </li>
                                        <ul style="list-style-type: none;">
                                            <?php if ($data['user']['role'] == 'admin' && ($data['user']['hak_akses'] == 'all' || $data['user']['hak_akses'] == 'humas')) : ?>
                                                <li><a class="navsubitem text-white" href="<?= BASEURL; ?>/pkl/rekap">Rekap
                                                        PKL</a></li>
                                                <li><a class="navsubitem text-white" href="<?= BASEURL; ?>/pkl/pembekalan">Pembekalan
                                                        PKL</a></li>
                                                <li><a class="navsubitem text-white" href="<?= BASEURL; ?>/pkl/prakerin">Prakerin</a></li>
                                                <li><a class="navsubitem text-white" href="<?= BASEURL; ?>/pkl/dtampung">Daya
                                                        Tampung</a></li>
                                            <?php endif ?>

                                            <?php if ($data['user']['role'] == 'admin' || ($data['user']['role'] == 'user' && ($data['user']['hak_akses'] == '' || $data['user']['hak_akses'] == 'kabeng'))) : ?>
                                                <li><a class="navsubitem text-white" href="<?= BASEURL; ?>/pkl/pemberkasan">Pemberkasan</a></li>
                                            <?php endif ?>
                                            <?php if ($data['user']['role'] == 'admin' || ($data['user']['role'] == 'user' && $data['user']['hak_akses'] == 'industri')) : ?>
                                                <li><a class="navsubitem text-white" href="<?= BASEURL; ?>/pkl/nilai">Nilai
                                                        PKL</a></li>
                                            <?php endif ?>
                                        </ul>
                                        <?php if ($data['user']['role'] == 'admin' || ($data['user']['role'] == 'user' && ($data['user']['hak_akses'] == '' || $data['user']['hak_akses'] == 'industri'))) : ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?= BASEURL; ?>/bkk/index">
                                                    BKK
                                                </a>
                                            </li>
                                        <?php endif ?>
                                        <ul style="list-style-type: none;">
                                            <?php if ($data['user']['role'] == 'admin' && ($data['user']['hak_akses'] == 'all' || $data['user']['hak_akses'] == 'humas')) : ?>
                                                <li><a class="navsubitem text-white" href="<?= BASEURL ?>/bkk/das">Alumni Sukses</a></li>
                                                <li><a class="navsubitem text-white" href="<?= BASEURL; ?>/bkk/mou">MoU</a></li>
                                                <li><a class="navsubitem text-white" href="<?= BASEURL; ?>/bkk/workshop">Workshop</a></li>
                                                <li><a class="navsubitem text-white" href="<?= BASEURL; ?>/bkk/kebekerjaan">Kebekerjaan</a></li>
                                                <li><a class="navsubitem text-white" href="<?= BASEURL; ?>/bkk/lomba">Lomba</a>
                                                </li>
                                            <?php endif ?>

                                            <?php if ($data['user']['role'] == 'admin' || ($data['user']['role'] == 'user' && $data['user']['hak_akses'] == 'industri')) : ?>
                                                <li><a class="navsubitem text-white" href="<?= BASEURL; ?>/bkk/loker">Lowongan
                                                        Kerja</a></li>
                                            <?php endif ?>
                                            <?php if ($data['user']['role'] == 'admin' || ($data['user']['role'] == 'user' && $data['user']['hak_akses'] == '')) : ?>
                                                <li><a class="navsubitem text-white" href="<?= BASEURL; ?>/bkk/peminatan">Peminatan</a></li>
                                                <li><a class="navsubitem text-white" href="<?= BASEURL; ?>/bkk/spw">SPW</a></li>
                                            <?php endif ?>
                                        </ul>
                                        <?php if ($data['user']['role'] == 'admin' && ($data['user']['hak_akses'] == 'all' || $data['user']['hak_akses'] == 'humas')) : ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?= BASEURL; ?>/ict/index">ICT</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?= BASEURL; ?>/stiru/index">Studi Tiru</a>
                                            </li>
                                        <?php endif ?>
                                    </ul>
                                </div>
                            </li>
                        <?php endif ?>

                        <?php if ($data['user']['role'] == 'admin' && ($data['user']['hak_akses'] == 'all' || $data['user']['hak_akses'] == 'kesiswaan')) : ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#kesiswaan" aria-expanded="false" aria-controls="kesiswaan">
                                    <i class="ti-user menu-icon"></i>
                                    <span class="menu-title">Kesiswaan</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="kesiswaan">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item">
                                            <a class="nav-link">
                                                Data
                                            </a>
                                        </li>
                                        <ul style="list-style-type: none;">
                                            <li><a class="navsubitem text-white" href="<?= BASEURL ?>/siswa">Siswa</a></li>
                                            <li><a class="navsubitem text-white" href="<?= BASEURL ?>/kompkeahlian">Kompetensi
                                                    Keahlian</a>
                                            </li>
                                            <li><a class="navsubitem text-white" href="<?= BASEURL ?>/progkeahlian">Program
                                                    Keahlian</a>
                                            </li>
                                            <li><a class="navsubitem text-white" href="<?= BASEURL ?>/kelas">Kelas</a></li>
                                        </ul>
                                        <li class="nav-item">
                                            <a class="nav-link">
                                                Absensi
                                            </a>
                                        </li>
                                        <ul style="list-style-type: none;">
                                            <li><a class="navsubitem text-white" href="<?= BASEURL ?>/kehadiran">Kehadiran</a></li>
                                            <li><a class="navsubitem text-white" href="<?= BASEURL ?>/izin">Izin</a></li>
                                        </ul>
                                        <li class="nav-item">
                                            <a class="nav-link">
                                                Pelanggaran
                                            </a>
                                        </li>
                                        <ul style="list-style-type: none;">
                                            <li><a class="navsubitem text-white" href="<?= BASEURL ?>/pelanggaran">Pelanggaran</a></li>
                                            <li><a class="navsubitem text-white" href="<?= BASEURL ?>/poinpelanggaran">Poin</a></li>
                                        </ul>
                                        <li class="nav-item">
                                            <a class="nav-link">
                                                Asuransi
                                            </a>
                                        </li>
                                        <ul style="list-style-type: none;">
                                            <li><a class="navsubitem text-white" href="<?= BASEURL ?>/asuransi">Asuransi</a>
                                            </li>
                                            <li><a class="navsubitem text-white" href="<?= BASEURL ?>/kecelakaan">Asuransi
                                                    Kecelakaan</a>
                                            </li>
                                            <li><a class="navsubitem text-white" href="<?= BASEURL ?>/ortumeninggal">Asuransi Ortu
                                                    Meninggal</a></li>
                                        </ul>
                                        <li class="nav-item">
                                            <a class="nav-link">
                                                Informasi
                                            </a>
                                        </li>
                                        <ul style="list-style-type: none;">
                                            <li><a class="navsubitem text-white" href="<?= BASEURL ?>/infokesiswaan">Informasi
                                                    Kesiswaan</a></li>
                                            <li><a class="navsubitem text-white" href="<?= BASEURL ?>/kegiatanosis">Kegiatan
                                                    Osis</a>
                                            </li>
                                        </ul>
                                        <ul style="list-style-type: none;">
                                            <li><a class="navsubitem text-white" href="<?= BASEURL ?>/waguru">Whatsapp
                                                    Guru</a></li>
                                        </ul>
                                    </ul>
                                </div>
                            </li>
                        <?php endif ?>

                        <?php if ($data['user']['role'] == 'admin' && ($data['user']['hak_akses'] == 'all' || $data['user']['hak_akses'] == 'kurikulum')) : ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#kurikulum" aria-expanded="false" aria-controls="kurikulum">
                                    <i class="icon-grid-2 menu-icon"></i>
                                    <span class="menu-title">Kurikulum</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="kurikulum">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL; ?>/StrukturKurikulum">Struktur Kurikulum </a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL; ?>/KalenderKegiatan">Kalender Kegiatan </a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL; ?>/PerangkatAjar">Perangkat Ajar </a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL; ?>/PJBL">PJBL</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL; ?>/P5">P5 </a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL; ?>/GKP">Gelar Karya
                                                <br>Pembelajaran </a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL; ?>/Rapor">Rapor </a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL; ?>/DaftarHadir">Daftar
                                                Hadir Siswa </a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL; ?>/walikelas">Wali
                                                Kelas </a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL; ?>/KonsideranAturan">Konsideran/Aturan</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL; ?>/JadwalPelajaran">Jadwal Pelajaran</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL; ?>/KegiatanGLS">Gerakan
                                                Literasi<br>Sekolah</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL; ?>/Inbis">Inkubator
                                                Bisnis </a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL; ?>/LMS">Learning
                                                Manajemen<br>System </a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= BASEURL; ?>/Penilaian">Penilaian
                                            </a></li>
                                    </ul>
                                </div>
                            </li>
                            </li>
                        <?php endif ?>

                        <?php if ($data['user']['role'] == 'admin' && ($data['user']['hak_akses'] == 'all' || $data['user']['hak_akses'] == 'psdm')) : ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                                    <i class="icon-bar-graph menu-icon"></i>
                                    <span class="menu-title">PSDM</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="charts">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item">
                                            <a class="nav-link spa-load" href="<?= BASEURL; ?>/profilGuru">Profil Guru</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link spa-load" href="<?= BASEURL; ?>/profilPegawai">Profil
                                                Pegawai</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link spa-load" href="<?= BASEURL; ?>/strukturOrganisasi">Struktur
                                                Organisasi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link spa-load" href="<?= BASEURL; ?>/prestasiGuru">Prestasi
                                                Guru</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link spa-load" href="<?= BASEURL; ?>/galeriKegiatan">Galeri
                                                Kegiatan</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        <?php endif ?>

                        <?php if ($data['user']['role'] == 'admin' && ($data['user']['hak_akses'] == 'all' || $data['user']['hak_akses'] == 'sarpras')) : ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                                    <i class="icon-grid-2 menu-icon"></i>
                                    <span class="menu-title">SARPRAS</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="tables">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link spa-load" href="<?= BASEURL; ?>/fasilitas">Fasilitas</a></li>
                                        <li class="nav-item"> <a class="nav-link spa-load" href="<?= BASEURL; ?>/peminjamanBarang">Peminjaman Barang</a></li>
                                        <li class="nav-item"> <a class="nav-link spa-load" href="<?= BASEURL; ?>/pengajuanBarang">Pengajuan Barang</a></li>
                                        <li class="nav-item"> <a class="nav-link spa-load" href="<?= BASEURL; ?>/barangMasuk">Barang Masuk</a></li>
                                        <li class="nav-item"> <a class="nav-link spa-load" href="<?= BASEURL; ?>/barangKeluar">Barang Keluar</a></li>
                                        <li class="nav-item"><a class="nav-link spa-load" href="<?= BASEURL; ?>/barangAset">Stok Barang Aset</a></li>
                                        <li class="nav-item"><a class="nav-link spa-load" href="<?= BASEURL; ?>/stokBarang">Stok Barang</a></li>
                                        <li class="nav-item"><a class="nav-link spa-load" href="<?= BASEURL; ?>/dataRuang">Data Ruang</a></li>
                                        <li class="nav-item"><a class="nav-link spa-load" href="<?= BASEURL; ?>/perbaikan">Perbaikan</a></li>
                                    </ul>
                                </div>
                            </li>
                        <?php endif ?>

                        <?php if ($data['user']['role'] == 'admin') : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= BASEURL ?>/riwayat">
                                    <i class="ti-time menu-icon"></i>
                                    <span class="menu-title">Riwayat</span>
                                </a>
                            </li>
                        <?php endif ?>
                    </ul>
                </nav>

                <!-- PROFIL KONTEN-->
                <div id="profil" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">PROFIL</h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="info">
                                        <div class="info_data">
                                            <div class="data">
                                                <h4>Nama Pengguna</h4>
                                                <p><?= $data['user']['username'] ?></p>
                                            </div>
                                            <br>
                                            <div class="data">
                                                <h4>Email</h4>
                                                <p><?= $data['user']['email'] ?></p>
                                            </div>
                                            <br>
                                            <div class="data">
                                                <h4>Kata Sandi</h4>
                                                <span data-hidden-value="<?= $data['user']['password'] ?>">
                                                    <?php $pwLength = strlen($data['user']['password']) ?>
                                                    <span class="display">
                                                        <?php for ($i = 0; $i < $pwLength; $i++) {
                                                            echo "*";
                                                        } ?>
                                                    </span><br>
                                                    <a class="toggle" style="cursor: pointer;">Lihat
                                                        Sandi</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <a href="<?= BASEURL ?>/logout">
                                    <div class="btn btn-primary text-white">
                                        Keluar
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-panel">