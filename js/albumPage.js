let tracklistBtn = document.querySelector("#tracklist");
let tracklistDiv = document.querySelector("#tracklistDiv");

tracklistBtn.addEventListener("click", e => {
    e.preventDefault();
    if(tracklistDiv.classList.contains("d-none")){
        tracklistDiv.classList.remove("d-none");
    } else{
        tracklistDiv.classList.add("d-none");
    }
});