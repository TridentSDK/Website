$(".post-like-button").on("click", function (event) {
    var button = $(event.target);

    if(button.prop("tagName") == "SPAN"){
        button = button.parent();
    }

    var post = button.data("post");

    if(button.hasClass("liked")){
        $.ajax("/api/v1/post/dislike?token=" + SECURITY_TOKEN + "&post=" + post)
        .done(function (response) {
            button.find(".badge").text("" + response.count);
            button.removeClass("liked");
        });
    }else{
        $.ajax("/api/v1/post/like?token=" + SECURITY_TOKEN + "&post=" + post)
        .done(function (response) {
            button.find(".badge").text("" + response.count);
            button.addClass("liked");
        });
    }
});

$(".search-dropdown-button").on("click", function () {
    if($(".search-dropdown-button").find(".badge").length){
        $.ajax("/api/v1/notifications/read/dropdown?token=" + SECURITY_TOKEN)
        .done(function () {
            $(".search-dropdown-button").find(".badge").remove();
        });
    }
});

$("#plugin-primary-category").find("input").on("click", function (e) {
    $("#plugin-primary-category").find("input").each(function (i, el) {
        $(el).parent().removeClass("active")
    });

    $(e.target).parent().addClass("active")
});

$("#plugin-secondary-category").find("input").on("click", function (e) {
    $(e.target).parent().toggleClass("active")
});