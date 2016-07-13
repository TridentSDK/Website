function like(id, element) {
    $.ajax("https://tridentsdk.net/api/1.0/post/like?token=" + SECURITY_TOKEN + "&post=" + id)
        .done(function () {
            updateCount(id, element, true);
        });
}

function dislike(id, element) {
    $.ajax("https://tridentsdk.net/api/1.0/post/dislike?token=" + SECURITY_TOKEN + "&post=" + id)
        .done(function () {
            updateCount(id, element, false);
        });
}

function updateCount(id, element, like){
    $.ajax("https://tridentsdk.net/api/1.0/post/likes?post=" + id)
        .done(function (a) {
            $(element.parentElement).html('<span class="badge">' + a.response.count + '</span> <span style="color: ' +
                (like ? "orange" : "green") +
                '; cursor: pointer" onclick="' +
                (like ? "dislike" : "like") +
                '(' + id + ', this)"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></span>');
        });
}