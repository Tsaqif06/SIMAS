$(document).ready(() => {
	$(".tampilModalTambah").click(function () {
		$("#modalLabel").html("Tambah Data Siswa");
	});

	$(".tampilModalUbah").click(function () {
		$("#modalLabel").html("Edit Data Siswa");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/belajarMVC/10searching/public/siswa/ubah"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/belajarMVC/10searching/public/siswa/getUbah",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#nama").val(data.nama);
				$("#email").val(data.email);
				$("#jurusan").val(data.jurusan);
				$("#id").val(data.id);
			},
		});
	});
});
