$(document).ready(function () {
	$(".tampilModalTambah").click(function () {
		$("#modalLabel").html("Tambah Data");
		$("button[type=submit]").html("Tambah Data");
    $(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/tambahData/mapel"
		);

		$("#id_mapel").val("");
		$("#kode_mapel").val("");
		$("#nama_mapel").val("");
		$("input[name='kurikulum']").val("");
	});

	$(".tampilModalUbah").click(function () {
		$("#modalLabel").html("Edit Data Mapel");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/master/ubahData/mapel"
		);

    const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/SIMAS/public/master/getUbahData/mapel",
			data: { id_mapel: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id_mapel").val(data.id_mapel);
				$("#kode_mapel").val(data.kode_mapel);
				$("#nama_mapel").val(data.nama_mapel);
				$("input[name='kurikulum']").val(data.kurikulum);
			},
		});
	});
});
