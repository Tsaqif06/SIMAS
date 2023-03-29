$(document).ready(function () {
	$(".tampilModalTambah").click(function () {
		$("#modalLabel").html("Tambah Data");
		$("button[type=submit]").html("Tambah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/tu/tambahData/suratmasuk"
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
		$("#modalLabel").html("Edit Data Surat Masuk");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/SIMAS/public/tu/ubahData/suratmasuk"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/SIMAS/public/tu/getUbahData/suratmasuk",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id").val(data.id);
				$("#nomor_berkas").val(data.nomor_berkas);
				$("#alamat_pengirim").val(data.alamat_pengirim);
				$("#tanggal").val(data.tanggal);
				$("#tanggal_surat").val(data.tanggal_surat);
				$("#nomor_surat").val(data.nomor_surat);
				$("#perihal").val(data.perihal);
				$("#nomor_petunjuk").val(data.nomor_petunjuk);
			},
		});
	});
});
