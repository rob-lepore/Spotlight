replyTo = null;

function toggleReply(username, commentId, thread) {
    $('footer').removeClass("d-none")

    let replyLabel = document.querySelector("#replyUsername");
    let replyField = document.querySelector("#userReply");
    let commentField = document.querySelector("#commentId");

    console.log(commentId);

    if (commentId == replyTo) {
        replyLabel.classList.add("d-none");
        document.body.classList.remove("pb-4");
        replyTo = null;

        replyField.setAttribute("value", "");
        commentField.setAttribute("value", "");

    } else {
        replyLabel.classList.remove("d-none");
        document.body.classList.add("pb-4");
        replyTo = commentId;
        replyLabel.textContent = "Reply to " + username;

        replyField.setAttribute("value", username);
        commentField.setAttribute("value", thread || commentId);

    }
}

function toggleLike(id) {
    $.ajax({
        url: 'togglePostLike.php',
        type: 'POST',
        data: {
            postId: id,
        },
        success: function (response) {
            console.log(response)
            if (response == 0) { // il like è stato rimosso
                $("#heartIcon").attr("fill", "currentColor");
                $("#heartIcon").attr("class", "bi bi-heart");

                $("#likesNumber").text(Number($("#likesNumber").text()) - 1);
            } else { // il like è stato aggiunto
                $("#heartIcon").attr("fill", "red");
                $("#heartIcon").attr("class", "bi bi-heart-fill");
                $("#likesNumber").text(Number($("#likesNumber").text()) + 1);
            }
        }
    });
}

function toggleForm() {
    $('footer').toggleClass("d-none")

    let replyLabel = document.querySelector("#replyUsername");
    let replyField = document.querySelector("#userReply");
    let commentField = document.querySelector("#commentId");

    replyLabel.classList.add("d-none");
    document.body.classList.remove("pb-4");
    replyTo = null;

    replyField.setAttribute("value", "");
    commentField.setAttribute("value", "");
}