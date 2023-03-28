$(document).ready(function () {
	$(".tampilModalTambah").click(function () {
		$("#modalLabel").html("Tambah Data");
		$("button[type=submit]").html("Tambah Data");
    $(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/tambahData/Progkeahlian"
		);

		$("#id_programkeahlian").val("");
		$("#nama_jurusan").val("");
		$("#program_keahlian").val("");
	});

	$(".tampilModalUbah").click(function () {
		$("#modalLabel").html("Edit Data Program Keahlian");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/ubahData/Progkeahlian"
		);

    const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/SIMAS/public/master/getUbahData/Progkeahlian",
			data: { id_progkeahlian: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id_programkeahlian").val(data.id_programkeahlian);
				$("#nama_jurusan").val(data.nama_jurusan);
				$("#program_keahlian").val(data.program_keahlian);
			},
		});
	});
});
