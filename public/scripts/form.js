$(document).ready(function () {
    $('form').submit(function (event) {
        var json;
        event.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (result) {
                json = jQuery.parseJSON(result);
                if (json.url) {
                    window.location.href = '/' + json.url;
                } else {
                    alert(json.status + ' - ' + json.message);
                }
            },
        });
    });

    function load_data(page) {
		$.ajax({
            url: "/list",
            method:"POST",
            data:{page:page},
            success:function (data) {
                $("#pagination_data").html(data);
            }
        });
    }

    load_data(2);
});