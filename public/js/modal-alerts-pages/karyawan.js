$(document).ready(function () {
	$(".tampilModalTambah").click(function () {
		$("#modalLabel").html("Tambah Data");
		$("button[type=submit]").html("Tambah Data");

		$("#id_karyawan").val("");
		$("#nama_lengkap").val("");
		$("#jenis_kelamin").val("");
		$("#tempat_lahir").val("");
		$("#tanggal_lahir").val("");
		$("#alamat_lengkap").val("");
		$("#pendidikan_terakhir").val("");
		$("#jurusan_pendidikan_terakhir").val("");
		$("#nomor_hp").val("");
		$("#kategori").val("");
		$("#status_pernikahan").val("");
		$("#foto").val("");
	});

	$(".tampilModalTambah .karyawan").click(function () {
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/tambahData/Karyawan"
		);
	});

	$(".tampilModalUbahKaryawan").click(function () {
		const id_karyawan = $(this).data("id");

		$("#modalLabel").html("Edit Data Karyawan");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/ubahData/karyawan"
		);
		$.ajax({
			url: "http://localhost/SIMAS/public/master/getUbahData/karyawan",
			data: { id_karyawan: id_karyawan },
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#id_karyawan").val(data.id_karyawan);
				$("#nama_lengkap").val(data.nama_lengkap);
				$("#jenis_kelamin").val(data.jenis_kelamin);
				$("#tempat_lahir").val(data.tempat_lahir);
				$("#tanggal_lahir").val(data.tanggal_lahir);
				$("#alamat_lengkap").val(data.alamat_lengkap);
				$("#pendidikan_terakhir").val(data.pendidikan_terakhir);
				$("#jurusan_pendidikan_terakhir").val(data.jurusan_pendidikan_terakhir);
				$("#nomor_hp").val(data.nomor_hp);
				$("#kategori").val(data.kategori);
				$("#status_pernikahan").val(data.status_pernikahan);
				$("#foto").val(data.foto);
			}
		});
	});
});
