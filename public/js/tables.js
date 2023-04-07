$(document).ready(function () {
	const BASEURL = window.location.href;

	$("#table").DataTable({
		drawCallback: function (settings) {
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
		},
	});
});
