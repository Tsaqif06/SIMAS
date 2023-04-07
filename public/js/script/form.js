$(document).ready(function () {
	const BASEURL = window.location.href;

	$(".tampilModalTambah").click(function () {
		if ($("#modal").hasClass("edit")) {
			$("#modal").removeClass("edit");
			document.querySelector("#modal form").reset();
		}
		$("#modalLabel").html("Tambah Data");
		$("button[type=submit]").html("Tambah Data");
		$(".modal-body form").attr("action", `${BASEURL}/tambahData`);
	});

	function initEditEvent() {
		$(".tampilModalUbah").click(function () {
			$("#modal").addClass("edit");
			$("#modalLabel").html("Edit Data");
			$(".modal-footer button[type=submit]").html("Ubah Data");
			$(".modal-body form").attr("action", `${BASEURL}/ubahData`);

			const data_id = $(this).data("id");

			$.ajax({
				url: `${BASEURL}/getUbahData`,
				data: { id: data_id },
				method: "post",
				dataType: "json",
				success: function (data) {
					Object.keys(data).forEach((key) => {
						$(`#${key}`).val(data[key]);
					});
				},
			});
		});
	}

	initEditEvent();

	document.querySelectorAll(".paginate_button").forEach((btn) => {
		btn.addEventListener("click", (e) => {
			initEditEvent();
		});
	});

	$(".batal").click(function () {
		document.querySelector("#modal form").reset();
	});
});
