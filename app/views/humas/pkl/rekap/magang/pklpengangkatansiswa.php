
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
            <div class="col-lg-6">
                <?php Flasher::flash(); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="template-demo">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formmodal">Tambah
                        Data</button>
                    <button type="button" class="btn btn-primary  tampilModalImport" data-toggle="modal"
                        data-target="#modalImport">
                        Import Data Dari Excel
                    </button>
                </div>
            </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="formmodal" tabindex="-1" role="dialog" aria-labelledby="judulModal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="judulModallabel">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL; ?>/Pkl/tambahdata" method="post">



                                <input type="hidden" name="id" id="id">


                                <div class="form-group">
                                    <label for="nisn"> Nisn</label>
                                    <input type="text" class="form-control" id="nisn" name="nisn">
                                </div>
                                <div class="form-group">
                                    <label for="namasiswa">Nama Siswa</label>
                                    <input type="text" class="form-control" id="namasiswa" name="namasiswa">
                                </div>

                                

                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" class="form-control" id="kelas" name="kelas">
                                </div>



                                <div class="form-group mb-3">
                                    <label for="Jurusan">Jurusan</label>
                                    <select class="form-control" id="jurusan" name="jurusan">
                                        <?php foreach ($data['kompkeahlian'] as $row) : ?>
                                        <option value="<?= $row['kode_kompkeahlian'] ?>">
                                            <?= $row['kode_kompkeahlian'] ?></option>
                                        <?php endforeach ?>



                                    </select>
                                    <div class="form-group mt-3" style="margin-top : 10px">
                                        <label for="namaperusahaan">Nama Perusahaan</label>
                                        <input type="text" class="form-control" id="namaperusahaan"
                                            name="namaperusahaan"> 
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
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
                                        
                                            <a class="badge badge-success tampildataubah"
                                                data-url="<?= BASEURL ?>/PKL/ubah/<?= $row['id']; ?>"
                                                data-toggle="modal" data-target="#formmodal"
                                                data-id="<?= $row['id'] ?>"><i class="mdi mdi-pencil"></i></a>
                                            <a href="<?= BASEURL; ?>/pkl/hapus/<?= $row['id']; ?>"
                                                class="badge badge-danger"
                                                onclick="return confirm('Apakah anda sudah yakin?');"><i
                                                    class="mdi mdi-delete"></i>
                                            </a>
                                    </td></i>
                                    
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



