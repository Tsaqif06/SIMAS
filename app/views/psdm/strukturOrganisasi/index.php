<style>
  .button-arounder {
    background: white;
    font-size: 4px;
    border: solid 2px #4B49AC;
    padding: .375em 1.125em;
    font-weight: bold;
    border-radius: 10px;
    color: #4B49AC;
    /* width: 50%; */
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
    /* width: 50%; */
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
          <h3 class="font-weight-bold">DATA STRUKTUR ORGANISASI</h3>
          <h6 class="font-weight-normal mb-0">Data prestasi guru SMKN 4 Malang</span></h6>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col">
      <button type="button" class="btn btn-primary tampilModalTambah" data-bs-toggle="modal" data-bs-target="#exampleModalLong">Tambah Data Struktur Organisasi</button>
      <button type="button" class="btn btn-primary my-3 mx-3 tampilModalImport" data-bs-toggle="modal" data-bs-target="#modalImport">
        Import Data Dari Excel
      </button>
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
          <form action="<?= BASEURL ?>/strukturOrganisasi/importData" method="post" enctype="multipart/form-data">
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

  <div id="exampleModalLong" class="modal fade" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 id="modalLabel"> Tambah Data Struktur Organisasi </h3>
          <span type="button" data-bs-dismiss="modal" aria-label="Close" class="material-symbols-outlined">close</span>
        </div>
        <div class="modal-body">
          <form action="<?= BASEURL; ?>/strukturOrganisasi/tambah" method="post">
            <input type="hidden" name="id" id="id">

            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Nip</label>
              <input type="text" class="form-control" id="nip" name="nip" placeholder="Nip" required />
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Tambah Data</button>
          <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="row py-10">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card rounded shadow border-0" style="width: fit-content;">
        <div class="card-body p-10 bg-white rounded">
          <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No.</th>
                  <th style="width: 30%;">Nama</th>
                  <th style="width: 28%;">Jabatan</th>
                  <th style="width: 15%;">NIP</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ?>
                <?php foreach ($data['struktur_organisasi'] as $struktur) : ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $struktur['nama'] ?></td>
                    <td><?= $struktur['jabatan'] ?></td>
                    <td><?= $struktur['nip'] ?></td>
                    <td>
                      <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalLong" class="tampilModalUbah" data-id="<?= $struktur['id']; ?>">
                        <button class="button-arounder">
                          <span class="material-symbols-outlined"> edit </span>
                        </button>
                      </a>
                      <a href="<?= BASEURL; ?>/strukturOrganisasi/hapus/<?= $struktur['id'] ?>" onclick="return confirm ('Hapus data?') ">
                        <button class="button-arounder">
                          <span class="material-symbols-outlined"> delete </span>
                        </button>
                      </a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- <script src="<?= BASEURL ?>/js/script/form.js"></script> -->

<script>
  $(function() {
    const BASEURL = window.location.href;
    $('.tombolTambahData').on('click', function() {
      $('formModalLabel').html('Tambah Data Struktur Organisasi')
      $('.modal-footer button[type=submit]').html('Tambah Data');

    });

    // $("#table").DataTable({
    //   drawCallback: function(settings) {
    //     $(".tampilModalUbah").click(function() {
    //       $("#modal").addClass("edit");
    //       $("#modalLabel").html("Ubah Data Sruktur Organisasi");
    //       $(".modal-footer button[type=submit]").html("Ubah Data");
    //       $(".modal-body form").attr("action", `${BASEURL}/ubahData`);

    //       const id = $(this).data("id");

    //       $.ajax({
    //         url: `${BASEURL}/getubah`,
    //         data: {
    //           id: id
    //         },
    //         method: "post",
    //         dataType: "json",
    //         success: function(data) {
    //           $('#nama').val(data.nama);
    //           $('#jabatan').val(data.jabatan);
    //           $('#nip').val(data.nip);
    //           $('#id').val(data.id);
    //           console.log(data);
    //         },
    //       })
    //     })
    // }
    // });
  });
</script>