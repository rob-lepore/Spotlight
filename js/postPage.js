replyTo = null;

function toggleReply(username, commentId, thread) {
    let replyLabel = document.querySelector("#replyUsername");
    let replyField = document.querySelector("#userReply");
    let commentField = document.querySelector("#commentId");
    
    console.log(commentId);

    if(commentId == replyTo){
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