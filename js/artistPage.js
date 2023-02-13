let albumsBtn = document.querySelector("#albumsBtn");
let singlesBtn = document.querySelector("#singlesBtn");
let tracksBtn = document.querySelector("#tracksBtn");


let albumsDiv = document.querySelector("#albumsDiv");
let singlesDiv = document.querySelector("#singlesDiv");
let tracksDiv = document.querySelector("#tracksDiv");


albumsBtn.addEventListener("click", e => {
    e.preventDefault();
    albumsBtn.classList.add("primary");
    albumsBtn.classList.remove("secondary");
    singlesBtn.classList.add("secondary");
    singlesBtn.classList.remove("primary");
    tracksBtn.classList.add("secondary");
    tracksBtn.classList.remove("primary");

    albumsDiv.classList.remove("d-none");
    singlesDiv.classList.add("d-none");
    tracksDiv.classList.add("d-none");
})

singlesBtn.addEventListener("click", e => {
    e.preventDefault();
    albumsBtn.classList.add("secondary");
    albumsBtn.classList.remove("primary");
    singlesBtn.classList.add("primary");
    singlesBtn.classList.remove("secondary");
    tracksBtn.classList.add("secondary");
    tracksBtn.classList.remove("primary");

    singlesDiv.classList.remove("d-none");
    albumsDiv.classList.add("d-none");
    tracksDiv.classList.add("d-none");
})

tracksBtn.addEventListener("click", e => {
    e.preventDefault();
    albumsBtn.classList.add("secondary");
    albumsBtn.classList.remove("primary");
    singlesBtn.classList.remove("primary");
    singlesBtn.classList.add("secondary");
    tracksBtn.classList.remove("secondary");
    tracksBtn.classList.add("primary");

    singlesDiv.classList.add("d-none");
    albumsDiv.classList.add("d-none");
    tracksDiv.classList.remove("d-none");
})


function toggleLike(id) {
    $.ajax({
        url: 'toggleArtistLike.php',
        type: 'POST',
        data: {
            artistId: id,
        },
        success: function(response) {
            if(response == 0) { // il like è stato rimosso
                $("#heartIcon").html(() => 
                `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16" id="heartIcon">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                </svg>`)
                $("#likesNumber").text(Number($("#likesNumber").text()) - 1); 
            } else { // il like è stato aggiunto
                $("#heartIcon").html(() => 
                        `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16" id="heartIcon">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                    </svg>`)
                $("#likesNumber").text(Number($("#likesNumber").text()) + 1); 
            }
        }
    });
}