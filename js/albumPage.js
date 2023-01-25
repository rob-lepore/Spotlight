let tracklistBtn = document.querySelector("#tracklist");
let reviewsBtn = document.querySelector("#showReviews");

let tracklistDiv = document.querySelector("#tracklistDiv");
let reviewsDiv = document.querySelector("#reviewsDiv");

tracklistBtn.addEventListener("click", e => {
    e.preventDefault();
    if(tracklistDiv.classList.contains("d-none")){
        tracklistDiv.classList.remove("d-none");
    } else{
        tracklistDiv.classList.add("d-none");
    }
});

reviewsBtn.addEventListener("click", e => {
    e.preventDefault();
    if(reviewsDiv.classList.contains("d-none")){
        reviewsDiv.classList.remove("d-none");
    } else{
        reviewsDiv.classList.add("d-none");
    }
});

function toggleLike(id) {
    $.ajax({
        url: 'toggleAlbumLike.php',
        type: 'POST',
        data: {
            albumId: id,
        },
        success: function(response) {
            if(response == 0) { // il like è stato rimosso
                $("#heartIcon").attr("fill", "currentColor");
                $("#likesNumber").text(Number($("#likesNumber").text()) - 1); 
            } else { // il like è stato aggiunto
                $("#heartIcon").attr("fill", "red");
                $("#likesNumber").text(Number($("#likesNumber").text()) + 1); 
            }
        }
    });
}