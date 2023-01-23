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
                $("#heartIcon").attr("fill", "currentColor");
                $("#likesNumber").text(Number($("#likesNumber").text()) - 1); 
            } else { // il like è stato aggiunto
                $("#heartIcon").attr("fill", "red");
                $("#likesNumber").text(Number($("#likesNumber").text()) + 1); 
            }
        }
    });
}