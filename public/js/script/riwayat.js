$(document).ready(function () {
	const BASEURL = window.location.href;

    $(".btnSelengkapnya").click(function (e) {
        e.preventDefault();
        const index = $(this).data("index");
        $.ajax({
            url: `${BASEURL}/getDataByIndex`,
            data: { index: index},
            method: "post",
            dataType: "json",
            success: function(data) {
                for (let key of Object.keys(data)) {
                    if (key == "foto") {
                        continue;
                    }
                    $(`#${key}`).val(data[key]);
                }
                console.log(data.row.uuid);
                let modalContent = "";
    
                if (data.row.nisn) {
                    modalContent = `
                        <div class="modal-header">
                            <h5 class="modal-title">Data Siswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>NISN: ${data.row.nisn}</p>
                            <p>Nama: ${data.row.nama}</p>
                            <p>Alamat: ${data.row.alamat}</p>
                            <p>Kelas: ${data.row.kelas}</p>
                        </div>`;
                } else {
                    modalContent = `
                        <div class="modal-header">
                            <h5 class="modal-title">Data Lainnya</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Data: ${data.row.data}</p>
                        </div>`;
                }
    
                $(".modal-content").html(modalContent);
            },
        });          
    });    
});