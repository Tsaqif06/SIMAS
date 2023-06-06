let notification = {
	clear: function () {
		let all_notif = document.querySelectorAll("#notification .dropdown-item");
		for (let notif of all_notif) {
			notif.remove();
		}
	},
	add: function (title, content, href = '', icon = ["bg-info", "ti-email"]) {
		// Create and append the element
		$("#notification .dropdown-menu").append(`
      <a ${href == '' ? '' : `href="${href}" `}class="dropdown-item preview-item">
        <div class="preview-thumbnail">
          <div class="preview-icon ${icon[0]}">
            <i class="${icon[1]} mx-0"></i>
          </div>
        </div>
        <div class="preview-item-content">
          <h6 class="preview-subject font-weight-normal notif-title">${title}</h6>
          <p class="font-weight-light small-text mb-0 text-muted notif-content">
            ${content}
          </p>
        </div>
      </a>
    `);
	},
};

$(document).ready(function () {
	let get_notif = setInterval(function () {
		$.ajax({
			url: "http://localhost/SIMAS/public/notification",
			data: { get_notification : true },
			method: "post",
			dataType: "json",
			success: function (data) {
				if (data !== false) {
					notification.clear();
					data.forEach(notif => {
						if (notif[0] != 0) {
							notification.add(notif[1], notif[2], notif[3], notif[4]);
						}
					});
					if ($('#notification .dropdown-item').length == 0) {
						$("#notification .count").addClass("d-none");
					} else {
						$("#notification .count").removeClass("d-none");
					}
				} else {
					clearInterval(get_notif);
				}
			},
		});
	}, 1000);
});
