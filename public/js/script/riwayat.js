$(document).ready(function () {
	const BASEURL = window.location.href;

    $(".btnSelengkapnya").click(function (e) {
        e.preventDefault();
        const index = $(this).data("index");
        console.log(BASEURL)
        console.log(index)
        $.ajax({
            url: `${BASEURL}`,
            data: { index: index},
            method: "post",
            dataType: "json",
            success: function(data) {
                console.log(data);
            },
        });          
    });    
});