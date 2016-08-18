$(".post-like-button").on("click", function (event) {
    var button = $(event.target);

    if(button.prop("tagName") == "SPAN"){
        button = button.parent();
    }

    var post = button.data("post");

    if(button.hasClass("liked")){
        $.ajax("/api/1.0/post/dislike?token=" + SECURITY_TOKEN + "&post=" + post)
        .done(function () {
            updateLikeCount(button, post);
            button.removeClass("liked");
        });
    }else{
        $.ajax("/api/1.0/post/like?token=" + SECURITY_TOKEN + "&post=" + post)
        .done(function () {
            updateLikeCount(button, post);
            button.addClass("liked");
        });
    }
});

function updateLikeCount(button, post){
    $.ajax("/api/1.0/post/likes?post=" + post)
    .done(function (a) {
        button.find(".badge").text("" + a.count);
    });
}