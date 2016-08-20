$(".post-like-button").on("click", function (event) {
    var button = $(event.target);

    if(button.prop("tagName") == "SPAN"){
        button = button.parent();
    }

    var post = button.data("post");

    if(button.hasClass("liked")){
        $.ajax("/api/1.0/post/dislike?token=" + SECURITY_TOKEN + "&post=" + post)
        .done(function (response) {
            button.find(".badge").text("" + response.count);
            button.removeClass("liked");
        });
    }else{
        $.ajax("/api/1.0/post/like?token=" + SECURITY_TOKEN + "&post=" + post)
        .done(function (response) {
            button.find(".badge").text("" + response.count);
            button.addClass("liked");
        });
    }
});

$(".search-dropdown-button").on("click", function () {
    if($(".search-dropdown-button").find(".badge").length){
        $.ajax("/api/1.0/notifications/read/dropdown?token=" + SECURITY_TOKEN)
        .done(function () {
            $(".search-dropdown-button").find(".badge").remove();
        });
    }
});