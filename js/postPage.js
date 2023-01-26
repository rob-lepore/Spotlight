replyTo = null;

function toggleReply(username, commentId) {
    let replyLabel = document.querySelector("#replyUsername");
    console.log(commentId);
    if(commentId == replyTo){
        replyLabel.classList.add("d-none");
        document.body.classList.remove("pb-4");
        replyTo = null;
    } else {
        replyLabel.classList.remove("d-none");
        document.body.classList.add("pb-4");
        replyTo = commentId;
        replyLabel.textContent = "Reply to " + username;
    }
}