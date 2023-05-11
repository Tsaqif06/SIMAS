$(document).ready(function () {
	const BASEURL = window.location.href;

	$(".tampilModalTambah").click(function () {
		if ($("#modal").hasClass("edit")) {
			$("#modal").removeClass("edit");
			document.querySelector("#modal form").reset();
		}
		$(".wrapFotoSekarang").hide();
		$("#modalLabel").html("Tambah Data");
		$("button[type=submit]").html("Tambah Data");
		$(".modal-body form").attr("action", `${BASEURL}/tambahData`);
	});

	// Menghancurkan tabel DataTable yang sudah ada
	if ($.fn.DataTable.isDataTable('#table')) {
		$('#table').DataTable().destroy();
	}

	$("#table").DataTable({
		drawCallback: function (settings) {
			$(".tampilModalUbah").click(function () {
				$("#modal").addClass("edit");
				$("#modalLabel").html("Edit Data");
				$(".modal-footer button[type=submit]").html("Ubah Data");
				$(".modal-body form").attr("action", `${BASEURL}/ubahData`);
				$(".wrapFotoSekarang").show();
				$("label.foto").html("Update Foto");
				
				const data_id = $(this).data("id");

				$.ajax({
					url: `${BASEURL}/getUbahData`,
					data: { id: data_id },
					method: "post",
					dataType: "json",
					success: function (data) {
						$("#fotoSekarang").attr("src", `images/datafoto/${data.foto}`);
						$("#fotoLama").val(data.foto);
						for (let key of Object.keys(data)) {
							if (key == "foto") {
								continue;
							}
							$(`#${key}`).val(data[key]);
						}
					},
				});
			});
		},
	});

	$(".batal").click(function () {
		document.querySelector("#modal form").reset();
	});
});
