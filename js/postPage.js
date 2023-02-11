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
                $("#heartIcon" + id).html(() => 
                        `<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16" id="heartIcon">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg>`)

                $("#likesNumber" + id).text(Number($("#likesNumber" + id).text()) - 1);
            } else { // il like è stato aggiunto
                $("#heartIcon" + id).html(() => 
                        `<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16" id="heartIcon">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                    </svg>`)
                $("#likesNumber" + id).text(Number($("#likesNumber" + id).text()) + 1);
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