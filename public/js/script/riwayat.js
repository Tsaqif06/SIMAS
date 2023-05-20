$(document).ready(function () {
    const BASEURL = window.location.href;
    $('#riwayatTable').DataTable({
        "columnDefs": [
            {
                "render": function(data, type, row, meta) {
                    return moment(data).unix(); // pengaturan waktu UNIX
                }
            }
        ],
        "order": [
            [5, "asc"] // kolom ke-5 atau indeks kolom "deleted_at" diurutkan secara descending
        ],
        drawCallback: function (settings) {
			$(".btnSelengkapnya").click(function (e) {
                e.preventDefault();
                const i = $(this).data("index");
                console.log(i);
            
                $.ajax({
                    url: `${BASEURL}/getDataByIndex`,
                    data: {index: i},
                    method: "post",
                    dataType: "json",
                    success: function(result) {
                        $("#infotabel .modal-body .img-cta").html("");
                        $("#infotabel .modal-body ul").html("");
                        const data = {...result.row};
                        console.log(data)
                        for (let key of Object.keys(data)) {
                            if (
                                key == 'id' || key == 'uuid' || key == 'foto' ||
                                key == 'note' || key == 'created_at' || key == 'created_by' ||
                                key == 'modified_at' || key == 'modified_by' || key == 'deleted_at' ||
                                key == 'deleted_by' || key == 'is_deleted' || key == 'is_restored' ||
                                key == 'restored_at' || key == 'restored_by' || key == 'status'
                            ) {continue;}
            
                            if (data.foto) {
                                const imgSrc = "images/datafoto/" + data.foto;
                                const img = new Image();
                                img.onerror = function() {
                                    $("#infotabel .modal-body .img-cta").html(`
                                        <div style="text-align: center;">
                                            <p><img src="images/datafoto/pp.png" class="data-img" width="150px"
                                                style="border-radius: 100px; -moz-border-radius: 100px;"></p>
                                        </div>
                                    `);
                                }
                                img.onload = function() {
                                    $("#infotabel .modal-body .img-cta").html(`
                                        <div style="text-align: center;">
                                            <p><img src="${imgSrc}" class="data-img"
                                                width="150px" style="border-radius: 100px; -moz-border-radius: 100px;"></p>
                                        </div>
                                    `);
                                }
                                img.src = imgSrc;
                            }
                            $("#infotabel .modal-body ul").append(`<li>${key.replace("_", " ")} : ${data[key]}</li>`);
                        }
                    },
                });          
            });    
		},
    });
});