// Buat fungsi untuk memuat konten dari halaman lain
function loadContent(url) {
    $.ajax({
      url: url,
      data: {contentOnly : true},
      method: 'post',
      success: function(response) {
        $('.main-panel').html(response);
      }
    });
  }
  
// function loadContent(url) {
//   fetch(url)
//     .then(response => response.text())
//     .then(data => {
//       $('.main-panel').html(data);
//     })
//     .catch(error => console.log(error));
// }

  // Inisialisasi aplikasi
  $(document).ready(function() {
    // Tambahkan handler untuk klik pada tautan navigasi
    $('.spa-load').click(function(event) {
      event.preventDefault();
      const url = $(this).attr('href');
      window.history.pushState(null, null, url);
      loadContent(url);
    });
  });