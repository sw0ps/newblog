$(document).ready(function () {

    function get_posts_id() {
        var pathname = window.location.pathname;
        var pieces = pathname.split("/#!/");
        pieces = pieces[0].split("/");
        return pieces[pieces.length - 1];
    }

    function load_comment(){
        var posts_id = get_posts_id();
        $.ajax({
            url:"/comments/show",
            method: "post",
            data: {posts_id : posts_id},
            success: function (data) {
                var json = jQuery.parseJSON(data);
                $("#comment_block").html(json);

            }
        });
    }

    load_comment();

    $("#add_comment").submit(function () {
        var json;
        event.preventDefault();
        $.ajax({
            type: "post",
            url: "/comments/add",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (result) {
                load_comment();
            },
        });
    });

    $('.form_std').submit(function (event) {
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


    $('.posts_form').submit(function (event) {
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

});