$(document).ready(function () {
	$(".tampilModalTambah").click(function () {
		$("#modalLabel").html("Tambah Data");
		$("button[type=submit]").html("Tambah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/tambahData/jabatan"
		);

		$("#id_jabatan").val("");
		$("#jabatan").val("");
		$("#nama_yang_menjabat").val("");
	});

	$(".tampilModalUbah").click(function () {
		$("#modalLabel").html("Edit Data Jabatan");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/ubahData/jabatan"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/SIMAS/public/master/getUbahData/jabatan",
			data: { id_jabatan: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id_jabatan").val(data.id_jabatan);
				$("#jabatan").val(data.jabatan);
				$("#nama_yang_menjabat").val(data.nama_yang_menjabat);
			},
		});
	});
});
