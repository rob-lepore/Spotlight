let activeLinks = document.querySelector('.top-navigation');
activeLinks = activeLinks.querySelectorAll('a');

activeLinks.forEach(el=>{
    el.addEventListener("click", e=>{
        e.preventDefault();
        if(document.querySelector('a.active').getAttribute('data-value') == "Posts"){
            console.log("post")
            document.querySelector('.Posts').setAttribute('style', 'display:block;visibility:visible')
            document.querySelector('.Reviews').setAttribute('style', 'display:none;visibility:hidden')
        }else if(document.querySelector('a.active').getAttribute('data-value') == "Reviews"){
            console.log("reviews")
            document.querySelector('.Posts').setAttribute('style', 'display:none;visibility:hidden' )
            document.querySelector('.Reviews').setAttribute('style', 'display:block;visibility:visible')
        }
    })
})

let morePosts = document.querySelector("#loadMorePosts");
let moreReviews = document.querySelector("#loadMoreReviews");

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