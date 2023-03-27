$(document).ready(function () {

  $(".tampilModalTambah").click(function () {
    $("#modalLabel").html("Tambah Data");
    $("button[type=submit]").html("Tambah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/SIMAS/public/master/tambahData/Siswa"
    );

    $("#id_siswa").val('');
    $("#nisn").val('');
    $("#nama_siswa").val('');
    $("#jalur").val('');
    $("#jurusan").val('');
    $("#alamat").val('');
    $("#nomor_hp_siswa").val('');
    $("#ayah").val('');
    $("#ibu").val('');
    $("#nomor_hp_orangtua").val('');
    $("#wali").val('');
    $("#nomor_hp_wali").val('');
    $("#tahun_diterima").val('');
    $("#agama").val('');
    $("#jenis_kelamin").val('');
    $("#tempat_lahir").val('');
    $("#kelas").val('');
    $("#tanggal_lahir").val('');
    $("#usia_sekarang").val('');
  });


  $(".tampilModalUbahSiswa").click(function () {
    $("#modalLabel").html("Edit Data Siswa");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/SIMAS/public/master/ubahData/Siswa"
    );

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/SIMAS/public/master/getUbahData/Siswa",
      data: { id_siswa: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id_siswa").val(data.id_siswa);
        $("#nisn").val(data.nisn);
        $("#nama_siswa").val(data.nama_siswa);
        $("#jalur").val(data.jalur);
        $("#jurusan").val(data.jurusan);
        $("#alamat").val(data.alamat);
        $("#nomor_hp_siswa").val(data.nomor_hp_siswa);
        $("#ayah").val(data.ayah);
        $("#ibu").val(data.ibu);
        $("#nomor_hp_orangtua").val(data.nomor_hp_orangtua);
        $("#wali").val(data.wali);
        $("#nomor_hp_wali").val(data.nomor_hp_wali);
        $("#tahun_diterima").val(data.tahun_diterima);
        $("#agama").val(data.agama);
        $("#jenis_kelamin").val(data.jenis_kelamin);
        $("#tempat_lahir").val(data.tempat_lahir);
        $("#kelas").val(data.kelas);
        $("#tanggal_lahir").val(data.tanggal_lahir);
        $("#usia_sekarang").val(data.usia_sekarang);
      }
    });
  });
});