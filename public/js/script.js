$(document).ready(function () {
	$(".tampilModalTambah").click(function () {
		$("#modalLabel").html("Tambah Data");
		$("button[type=submit]").html("Tambah Data");

		$("#nip").val('');
		$("#nama").val('');
		$("#kelamin").val('');
		$("#alamat").val('');
		$("#mapel").val('');

		$("#nisn").val('');
		$("#nama").val('');
		$("#kelamin").val('');
		$("#alamat").val('');
		$("#ibu").val('');
		$("#ayah").val('');
		$("#jurusan").val('');
		$("#kelas").val('');

		$("#id").val('');
		$("#nip").val('');
		$("#nama").val('');
		$("#telepon").val('');
		$("#jenisKelamin").val('');
		$("#alamat").val('');
		$("#jabatan").val('');
	});

	$(".tampilModalTambah.siswa").click(function () {
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/tambahData/Siswa"
		);
	});

	$(".tampilModalTambah.guru").click(function () {
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/tambahData/Guru"
		);
	});

	$(".tampilModalTambah.karyawan").click(function () {
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/tambahData/Karyawan"
		);
	});

	$(".tampilModalUbahGuru").click(function () {
		$("#modalLabel").html("Edit Data Guru");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/ubahDataGuru"
		);

		const nip = $(this).data("nip");
		$.ajax({
			url: "http://localhost/SIMAS/public/master/getUbahDataGuru",
			data: { nip: nip },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#nip").val(data.nip);
				$("#nama").val(data.nama);
				$("#kelamin").val(data.kelamin);
				$("#alamat").val(data.alamat);
				$("#mapel").val(data.mapel);
			},
		});
	});

	$(".tampilModalUbahSiswa").click(function () {
		$("#modalLabel").html("Edit Data Siswa");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/ubahDataSiswa"
		);

		const nisn = $(this).data("nisn");
		$.ajax({
			url: "http://localhost/SIMAS/public/master/getUbahDataSiswa",
			data: { nisn: nisn },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#nisn").val(data.nisn);
				$("#nama").val(data.nama);
				$("#kelamin").val(data.kelamin);
				$("#alamat").val(data.alamat);
				$("#ibu").val(data.ibu);
				$("#ayah").val(data.ayah);
				$("#jurusan").val(data.jurusan);
				$("#kelas").val(data.kelas);
			},
		});
	});

	$(".tampilModalUbahKaryawan").click(function () {

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/SIMAS/public/master/getUbahDataKaryawan",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id").val(data.id);
				$("#nip").val(data.nip);
				$("#nama").val(data.nama);
				$("#telepon").val(data.telepon);
				$("#jenisKelamin").val(data.jenisKelamin);
				$("#alamat").val(data.alamat);
				$("#jabatan").val(data.jabatan);
			},
		});
		$("#modalLabel").html("Edit Data Karyawan");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/ubahDataKaryawan"
		);
	});
});
