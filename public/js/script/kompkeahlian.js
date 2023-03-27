$(document).ready(function () {
	$(".tampilModalTambah").click(function () {
		$("#modalLabel").html("Tambah Data");
		$("button[type=submit]").html("Tambah Data");

		$("#id_kompkeahlian").val("");
		$("#kode_kompkeahlian").val("");
		$("#nama_kompkeahlian").val("");
	});

	$(".tampilModalTambah").click(function () {
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/tambahData/Kompkeahlian"
		);
	});

	$(".tampilModalUbahKompkeahlian").click(function () {
		const id_kompkeahlian = $(this).data("id");

		$("#modalLabel").html("Edit Data Kompetensi Keahlian");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/ubahData/Kompkeahlian"
		);
		$.ajax({
			url: "http://localhost/SIMAS/public/master/getUbahData/Kompkeahlian",
			data: { id_kompkeahlian: id_kompkeahlian },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id_kompkeahlian").val(data.id_kompkeahlian);
				$("#kode_kompkeahlian").val(data.kode_kompkeahlian);
				$("#nama_kompkeahlian").val(data.nama_kompkeahlian);
			},
		});
	});
});
