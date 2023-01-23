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

reviewBtn.addEventListener("click", e => {
    e.preventDefault();
    if(reviewsDiv.classList.contains("d-none")){
        reviewsDiv.classList.remove("d-none");
    } else{
        reviewsDiv.classList.add("d-none");
    }
});