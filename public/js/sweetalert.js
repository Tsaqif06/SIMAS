$(document).ready(function () {
	$(".delete").click(function (e) {
		const form = this;

		e.preventDefault();

		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this data!",
			icon: "warning",
			buttons: ["No, cancel it!", "Yes, I am sure!"],
			dangerMode: true,
		}).then(function (isConfirm) {
			if (isConfirm) {
				swal({
					title: "Shortlisted!",
					text: "Candidates are successfully shortlisted!",
					icon: "success",
				}).then(function () {
					form.submit();
				});
			} else {
				swal("Cancelled", "Your imaginary file is safe :)", "error");
			}
		});
	});
});
