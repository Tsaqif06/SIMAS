$(document).ready(function () {
	$(".tampilModalTambah").click(function () {
		$("#modalLabel").html("Tambah Data");
		$("button[type=submit]").html("Tambah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/tambahData/Karyawan"
		);

	});

	$(".tampilModalUbah").click(function () {
		$("#modalLabel").html("Edit Data Karyawan");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/ubahData/karyawan"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/SIMAS/public/master/getUbahData/karyawan",
			data: { id_karyawan: id },
			method: "post",
			dataType: "json",
			success: function (data) {
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
