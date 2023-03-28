$(document).ready(function () {
	$(".tampilModalTambah").click(function () {
		$("#modalLabel").html("Tambah Data");
		$("button[type=submit]").html("Tambah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/tambahData/Siswa"
		);
		$("#id").val("");
		$("#nomor_berkas").val("");
		$("#alamat_pengirim").val("");
		$("#tanggal").val("");
		$("#tanggal_surat").val("");
		$("#nomor_surat").val("");
		$("#perihal").val("");
		$("#nomor_petunjuk").val("");
	});

	$(".tampilModalUbah").click(function () {
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
			},
		});
	});
});
