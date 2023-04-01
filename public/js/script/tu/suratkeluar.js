$(document).ready(function () {
	$(".tampilModalTambah").click(function () {
		$("#modalLabel").html("Tambah Data");
		$("button[type=submit]").html("Tambah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/tu/tambahData/suratkeluar"
		);
		$("#id").val("");
		$("#nomor_berkas").val("");
		$("#alamat_penerima").val("");
		$("#tanggal").val("");
		$("#perihal").val("");
		$("#no_petunjuk").val("");
	});

	$(".tampilModalUbah").click(function () {
		$("#modalLabel").html("Edit Data Surat Masuk");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/tu/ubahData/suratkeluar"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/SIMAS/public/tu/getUbahData/suratkeluar",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
        console.log(data)
				$("#id").val(data.id);
				$("#nomor_berkas").val(data.nomor_berkas);
				$("#alamat_penerima").val(data.alamat_penerima);
				$("#tanggal").val(data.tanggal);
				$("#perihal").val(data.perihal);
				$("#no_petunjuk").val(data.no_petunjuk);
			},
		});
	});
});
