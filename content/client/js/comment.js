$(document).ready(function() {
    load_comment();

    function load_comment() {
        $.ajax({
            type: "POST",
            url: "comment.php",
            data: {
                comment_load_data: true
            },
            success: function(response) {
                $(".comment-container").html("");
                // console.log(response)
                $.each(response, function(key, value) {
                    $(".comment-container").append(
                        '<div class="comment">\
                        <div class="d-flex flex-row p-3 ">\
                        <img src="../uploads/' +
                        value.user["avatar"] +
                        '" class="rounded-circle mr-3 cc">\
                            <div class="w-100">\
                                <div class="d-flex justify-content-between align-items-center">\
                                    <div class="d-flex flex-row align-items-center">\
                                        <span class="mr-2"> ' +
                        value.user["ten_kh"] +
                        ' </span>\
                                        <small class="c-badge">Top Comment</small>\
                                    </div>\
                                    <small>' +
                        value.cmt["ngay_bl"] +
                        '</small>\
                                </div>\
                                <p class="text-justify comment-text mb-0">' +
                        value.cmt["noi_dung"] +
                        '</p>\
                                <div class="d-flex flex-row user-feed">\
                                <button value="' +
                        value.cmt["ma_bl"] +
                        '"  class="ml-3 view_reply"><i class="fa fa-heartbeat mr-2"></i> View Reply</button>\
                                <button value="' +
                        value.cmt["ma_bl"] +
                        '"   class="ml-3 reply_btn"><i class="fa fa-comments-o mr-2"></i>Reply</button>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="p-3 reply_section"></div>\
                    </div>'
                    );
                });
            }
        });
    }

    $(document).on("click", ".reply_btn", function() {
        var thisClicked = $(this);
        var cmt_id = thisClicked;
        $(".reply_section").html("");
        thisClicked.closest(".comment").find(".reply_section").html(
            '<input type="text" placeholder="Reply...." class="form-control reply_msg">\
                        <div class="text-end mt-2">\
                            <button class="btn btn-sm btn-primary reply_add_btn">Reply</button>\
                            <button class="btn btn-sm btn-danger reply_cancel_btn">Cancel</button>\
                        </div>\
                        '
        );
    });

    $(document).on("click", ".reply_cancel_btn", function() {
        $(".reply_section").html("");
    });

    $(document).on("click", ".reply_add_btn", function(e) {
        e.preventDefault();

        var thisClicked = $(this);
        var cmt_id = thisClicked.closest(".comment").find(".reply_btn").val();
        var reply = thisClicked.closest(".comment").find(".reply_msg").val();

        var data = {
            ma_bl: cmt_id,
            reply_msg: reply,
            add_reply: true
        };
        $.ajax({
            type: "POST",
            url: "comment.php",
            data: data,
            success: function(a) {
                if (a == "true") {
                    location.reload();
                } else {
                    window.location = "form/login.php";
                }
            }
        });
    });

    $(document).on("click", ".view_reply", function(e) {
        e.preventDefault();

        var thisClicked = $(this);
        var cmt_id = thisClicked.val();
        $.ajax({
            type: "POST",
            url: "comment.php",
            data: {
                cmt_id: cmt_id,
                view_comment_data: true
            },
            success: function(response) {
                // console.log(response);
                $(".reply_section").html("");

                $.each(response, function(key, value) {
                    thisClicked
                        .closest(".comment")
                        .find(".reply_section")
                        .append(
                            '<div class="sub_comment ml-5">\
                             <input type="hidden" class="get_username" value="' +
                            value.user["ma_kh"] +
                            '">\
                        <div class="d-flex flex-row p-3">\
                        <img src="../uploads/' +
                            value.user["avatar"] +
                            '"class="rounded-circle mr-3 cc">\
                            <div class="w-50">\
                                <div class="d-flex justify-content-between align-items-center">\
                                    <div    class="d-flex flex-row align-items-center">\
                                        <span class="mr-2">' +
                            value.user["ten_kh"] +
                            "</span>\
                                    </div>\
                                    <small>" +
                            value.cmt["ngay_ph"] +
                            '</small>\
                                </div>\
                                <p class="text-justify comment-text mb-0">' +
                            value.cmt["noi_dung_ph"] +
                            '</p>\
                                <div class="d-flex flex-row user-feed">\
                                    <button  value="' +
                            value.cmt["ma_bl"] +
                            '" class="ml-3 sub_reply_btn"><i class="fa fa-comments-o mr-2"></i>Reply</button>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="p-3 sub_reply_section"></div>\
                    </div>'
                        );
                });
            }
        });
    });

    $(document).on("click", ".sub_reply_btn", function(e) {
        e.preventDefault();

        var thisClicked = $(this);
        var cmt_id = thisClicked.val();
        var username = thisClicked
            .closest(".sub_comment")
            .find(".get_username")
            .val();
        $(".sub_reply_section").html("");
        thisClicked
            .closest(".sub_comment")
            .find(".sub_reply_section")
            .html(
                '<input type="text" value="@' +
                username +
                '  " placeholder="Reply...." class="form-control sub_reply_msg">\
                        <div class="text-end mt-2">\
                            <button class="btn btn-sm btn-primary sub_reply_add_btn">Reply</button>\
                            <button class="btn btn-sm btn-danger sub_reply_cancel_btn">Cancel</button>\
                        </div>\
                        '
            );
    });
    $(document).on("click", ".sub_reply_cancel_btn", function() {
        $(".sub_reply_section").html("");
    });

    $(document).on("click", ".sub_reply_add_btn", function(e) {
        var thisClicked = $(this);
        e.preventDefault();
        var cmt_id = thisClicked
            .closest(".sub_comment")
            .find(".sub_reply_btn")
            .val();
        var reply = thisClicked
            .closest(".sub_comment")
            .find(".sub_reply_msg")
            .val();

        var data = {
            cmt_id: cmt_id,
            reply_msg: reply,
            add_subreply: true
        };
        $.ajax({
            type: "POST",
            url: "comment.php",
            data: data,
            success: function(a) {
                if (a == "true") {
                    location.reload();
                } else {
                    window.location = "form/login.php";
                }
            }
        });
    });

    $(".add_comment_btn").click(function(e) {
        e.preventDefault();
        var msg = $(".comment_textbox").val();
        if ($.trim(msg).length == 0) {
            error_msg = "Please fill your feedback !";
            $("#error_status").text(error_msg);
        } else {
            error_msg = "";
            $("#error_status").text(error_msg);
        }

        if (error_msg != "") {
            return false;
        } else {
            var data = {
                msg: msg,
                add_comment: true
            };
            $.ajax({
                type: "POST",
                url: "comment.php",
                data: data,
                success: function(a) {
                    if (a == "true") {
                        location.reload();
                    } else {
                        window.location = "form/login.php";
                    }
                }
            });
        }
    });
});