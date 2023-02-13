let activeLinks = document.querySelector('.top-navigation');
activeLinks = activeLinks.querySelectorAll('a');

activeLinks.forEach(el=>{
    el.addEventListener("click", e=>{
        e.preventDefault();
        if(document.querySelector('a.active').getAttribute('data-value') == "Posts"){
            document.querySelector('.Posts').setAttribute('style', 'display:block;visibility:visible')
            document.querySelector('.Reviews').setAttribute('style', 'display:none;visibility:hidden')
        }else if(document.querySelector('a.active').getAttribute('data-value') == "Reviews"){
            document.querySelector('.Posts').setAttribute('style', 'display:none;visibility:hidden' )
            document.querySelector('.Reviews').setAttribute('style', 'display:block;visibility:visible')
        }
    })
})

let morePosts = document.querySelector("#loadMorePosts");
let moreReviews = document.querySelector("#loadMoreReviews");
//style="visibility:<?php echo (count($postsNumber)>$_SESSION["postOffset"] ? "visible" : "hidden")?>"
function postButton(){
    if(document.querySelector('a.active').getAttribute('data-value') == "Posts"){
        $.ajax({
            url: 'homePostButton.php',
            type: 'POST',
            data: {},
            success: (response) => {
                console.log(response)
                morePosts.setAttribute('style', 'visibility:'.concat(response));
            }
        })
    }
}

function reviewButton(){
    if(document.querySelector('a.active').getAttribute('data-value') == "Reviews"){
        $.ajax({
            url: 'homeReviewButton.php',
            type: 'POST',
            data: {},
            success: (response) => {
                moreReviews.setAttribute('style', 'visibility:'.concat(response));
            }
        })
    }
}

reviewButton()
window.setInterval(reviewButton, 500)
postButton()
window.setInterval(postButton, 500)

morePosts.addEventListener("click", e =>{
    e.preventDefault();
    $.ajax({
        url: 'processNewPosts.php',
        type: 'POST',
        data: {},
        success: (response) => {
            document.querySelector("#postList").innerHTML += response;
        }
    })
});

moreReviews.addEventListener("click", e =>{
    e.preventDefault();
    $.ajax({
        url: 'processNewReviews.php',
        type: 'POST',
        data: {},
        success: (response) => {
            document.querySelector("#reviewList").innerHTML += response;
        }
    })
});