
let modal = document.querySelector("#selectionModal");
let input = document.querySelector("#searchInput");
let results = document.querySelector("#songsList")

function fillWithGlobal50() {
    $.ajax({
        url: 'getPopularTracks.php',
        type: 'GET',
        success: function (response) {
            results.innerHTML = "";
            response.items.slice(0, 20).forEach(i => {
                let track = i.track;
                if (input.getAttribute("search-type") == "track") {
                    results.innerHTML += buildListElement(track.name, track.artists[0].name, track.album.images[0].url, track.id)
                } else {
                    if(track.album.album_type == "album"){
                        results.innerHTML += buildListElement(track.album.name, track.artists[0].name, track.album.images[0].url, track.album.id)
                    }
                }
            });

        }
    });
}

fillWithGlobal50();

input.addEventListener("input", e => {
    e.preventDefault();
    $.ajax({
        url: 'searchTracksOrAlbums.php',
        type: 'POST',
        data: {
            query: encodeURI(input.value),
            type: input.getAttribute("search-type")
        },
        success: function (response) {
            results.innerHTML = "";
            if (input.getAttribute("search-type") == "track") {
                response.tracks.items.forEach(track => {
                    results.innerHTML += buildListElement(track.name, track.artists[0].name, track.album.images[0].url, track.id)
                });
            } else {
                response.albums.items.forEach(album => {
                    console.log(album)
                    if(album.album_type == "album"){
                        results.innerHTML += buildListElement(album.name, album.artists[0].name, album.images[0].url, album.id)
                    }
                });
            }

        }
    });
})




function buildListElement(title, artist, imgUrl, id) {
    return `
    <a style="text-decoration:none; color: var(--text-on-surface);" href=${location.pathname + "?id=" + id}  >
        <div class='d-flex my-2 align-items-center'>
            <img class='album-cover' src=${imgUrl}>
            <div class="overflow-hidden d-block">
                <span class="text-truncate">${title}</span class="text-truncate">
                <br>
                <span class="text-truncate">${artist}</span class="text-truncate">
            </div>
        </div>
    </a>
    `
}