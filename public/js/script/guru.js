$(document).ready(function () {
	$(".tampilModalTambah").click(function () {
		$("#modalLabel").html("Tambah Data");
		$("button[type=submit]").html("Tambah Data");

		$("#id_guru").val("");
		$("#nama_lengkap").val("");
		$("#jenis_kelamin").val("");
		$("#tempat_lahir").val("");
		$("#tanggal_lahir").val("");
		$("#alamat_lengkap").val("");
		$("#pendidikan_terakhir").val("");
		$("#jurusan_pendidikan_terakhir").val("");
		$("#nomor_hp").val("");
		$("#kategori").val("");
		$("#mapel_yg_diampu").val("");
		$("#kategori_mapel").val("");
		$("#nip").val("");
		$("#status_sertifikasi").val("");
		$("#keahlian_ganda").val("");
		$("#status_pernikahan").val("");
		$("#foto").val("");
	});

	$(".tampilModalTambah .guru").click(function () {
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/tambahData/guru"
		);
	});

	$(".tampilModalUbahguru").click(function () {
		const id_guru = $(this).data("id");

		$("#modalLabel").html("Edit Data guru");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/ubahData/guru"
		);
		$.ajax({
			url: "http://localhost/SIMAS/public/master/getUbahData/guru",
			data: { id_guru: id_guru },
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#id_guru").val(data.id_guru);
				$("#nama_lengkap").val(data.nama_lengkap);
				$("#jenis_kelamin").val(data.jenis_kelamin);
				$("#tempat_lahir").val(data.tempat_lahir);
				$("#tanggal_lahir").val(data.tanggal_lahir);
				$("#alamat_lengkap").val(data.alamat_lengkap);
				$("#pendidikan_terakhir").val(data.pendidikan_terakhir);
				$("#jurusan_pendidikan_terakhir").val(data.jurusan_pendidikan_terakhir);
				$("#nomor_hp").val(data.nomor_hp);
				$("#kategori").val(data.kategori);
				$("#mapel_yg_diampu").val(data.mapel_yg_diampu);
				$("#kategori_mapel").val(data.kategori_mapel);
				$("#nip").val(data.nip);
				$("#status_sertifikasi").val(data.status_sertifikasi);
				$("#keahlian_ganda").val(data.keahlian_ganda);
				$("#status_pernikahan").val(data.status_pernikahan);
				$("#foto").val(data.foto);
			}
		});
	});
});
