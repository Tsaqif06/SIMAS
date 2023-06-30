$("[data-hidden-value] > .toggle").on("click", function () {
	var $wrapper = $(this).parent(),
		$display = $wrapper.find(".display"),
		revealed = $wrapper.data("revealed"),
		hiddenValue = String($wrapper.data("hidden-value"));

	$display.html(revealed ? hiddenValue.replace(/./g, "*") : hiddenValue);
	$wrapper.data("revealed", !revealed);
});
