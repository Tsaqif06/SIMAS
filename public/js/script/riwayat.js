$(document).ready(function () {
	const BASEURL = window.location.href;

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
                $("#infotabel .modal-body ul").html("");

                const data = {...result.row};
                for (let key of Object.keys(data)) {
                    if (
                        key == 'id' || key == 'uuid' || key == 'foto' ||
                        key == 'note' || key == 'created_at' || key == 'created_by' ||
                        key == 'modified_at' || key == 'modified_by' || key == 'deleted_at' ||
                        key == 'deleted_by' || key == 'is_deleted' || key == 'is_restored' ||
                        key == 'restored_at' || key == 'restored_by' || key == 'status'
                    ) {continue;}

                    $("#infotabel .modal-body ul").append(`<li>${key.replace("_", " ")} : ${data[key]}</li>`);
                }
            },
        });          
    });    
});