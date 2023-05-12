<style>
.button-arounder {
    background: white;
    font-size: 4px;
    border: solid 2px #4B49AC;
    padding: .375em 1.125em;
    font-weight: bold;
    border-radius: 10px;
    color: #4B49AC;
    // width: 50%;
}

.button-arounder:hover,
.button-arounder:focus {
    box-shadow: 0 4px 8px hsla(190deg, 15%, 5%, .2);
    transform: translateY(-4px);
    background: #4B49AC;
    border-top-left-radius: var(--radius);
    border-top-right-radius: var(--radius);
    border-bottom-left-radius: var(--radius);
    border-bottom-right-radius: var(--radius);
    color: white;
    border-radius: 10px;
    // width: 50%;
}

td {
    word-break: break-all;
    width: 100px;
}
</style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">DATA USERNAME PASSWORD</h3>
                    <h6 class="font-weight-normal mb-0"> SMKN 4 MALANG</span></h6>
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
            <a class="btn btn-primary mb-4" role="button" data-toggle="modal" data-target="#exampleModalLong">Tambah
                Username Password </a>
        </div>
        <!-- </div> -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalLabel">Tambah Data</h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL; ?>/Username/tambahData" method="post">
                            <input type="hidden" name="id_usnpw" id="id_usnpw">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Guru</label>
                                <input type="text" class="form-control" id="Kodeguru" name="Kodeguru"
                                    placeholder="Kodeguru" required />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Guru</label>
                                <input type="text" class="form-control" id="NamaGuru" name="NamaGuru"
                                    placeholder="Nama Guru" required />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control" id="Username" name="Username"
                                    placeholder="Username" required />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="text" class="form-control" id="Password_" name="Password_"
                                    placeholder="Password" required />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mata Pelajaran</label>
                                <input type="text" class="form-control" id="mapel" name="mapel"
                                    placeholder="Mata Pelajaran" required />
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                        <button type="button" class="btn btn-default batal" data-dismiss="modal"
                            aria-label="Close">Tutup</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row py-10">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card rounded shadow border-0" style="width: fit-content;">
                    <div class="card-body p-10 bg-white rounded">
                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 15%;">No.</th>
                                        <th style="width: 30%;">Kode Guru</th>
                                        <th style="width: 28%;">Nama Guru</th>
                                        <th style="width: 15%;">Username</th>
                                        <th style="width: 15%;">Password</th>
                                        <th style="width: 15%;">Mata Pelajaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['tbl_usnpw'] as $Username) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $Username['Kodeguru'] ?></td>
                                        <td><?= $Username['NamaGuru'] ?></td>
                                        <td><?= $Username['Username'] ?></td>
                                        <td><?= $Username['Password_'] ?></td>
                                        <td><?= $Username['mapel'] ?></td>
                                        <td>
                                                <a href="" data-toggle="modal" data-target="#exampleModalLong" class="tampilModalUbah" data-id="<?= $Username['id_usnpw']; ?>">
                                                    <button class="button-arounder">
                                                        <span class="material-symbols-outlined"> edit </span>
                                                    </button>
                                                </a>
                                                <a href="<?= BASEURL; ?>/Username/hapusData/<?= $Username['id_usnpw'] ?>" onclick="return confirm ('Hapus data?') ">
                                                    <button class="button-arounder">
                                                        <span class="material-symbols-outlined"> delete </span>
                                                    </button>
                                                </a>
                                            </td>
                                    </tr>
                                    <?php $i++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>