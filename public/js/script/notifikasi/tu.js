let notification = {
  clear: function() {
    let all_notif = document.querySelectorAll('#notification .dropdown-item');
    for (let notif of all_notif) {
      notif.remove();
    }
  },
  add: function(title, content, icon = 'ti-email') {
    // Create and append the element
    $('#notification .dropdown-menu').append(`
      <a class="dropdown-item preview-item">
        <div class="preview-thumbnail">
          <div class="preview-icon bg-info">
            <i class="${icon} mx-0"></i>
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
  }
}

$(document).ready(function() {
  setInterval(function() {
    $.ajax({
      url : 'http://localhost/SIMAS/public/tu/notifikasi',
      data : {user : 'admin', method : 'get'},
      method : 'post',
      dataType : 'json',
      success : function(data) {
        notification.clear();
        if (parseInt(data) == 0) {
          $('#notification .count').addClass('d-none');
        } else {
          $('#notification .count').removeClass('d-none');
          notification.add('Pengajuan Baru', `${data} Pengajuan Surat Telah Diajukan`);
        }
      }
    });
  }, 1000);
});