let searchType = "user";
let input = document.querySelector("input");
let results = document.querySelector("#results");

function setSearch(value, btn) {
    results.innerHTML = "";
    input.value = "";

    searchType = value;
    document.querySelectorAll("button").forEach(b => {
        b.classList.remove("primary");
        b.classList.add("secondary");
    })
    btn.classList.remove("secondary");
    btn.classList.add("primary");

}

input.addEventListener("input", e => {
    e.preventDefault();


    if (input.value == "") {
        results.innerHTML = "";
        return;
    }

    if (searchType == "user") {
        $.ajax({
            url: 'searchUsers.php',
            type: 'POST',
            data: {
                username: input.value
            },
            success: (response) => {
                results.innerHTML = "";
                response.forEach(user => {
                    results.innerHTML += buildListElement(user.username, user.first_name + " " + user.last_name, "upload/" + user.profile_pic, user.username, "profile.php?user=")
                })
            }
        })
    } else {
        $.ajax({
            url: 'searchTracksOrAlbums.php',
            type: 'POST',
            data: {
                query: encodeURI(input.value),
                type: searchType,
            },
            success: (response) => {
                results.innerHTML = "";
                if (searchType == "album") {
                    response.albums.items.forEach(album => {
                        if (album.album_type == "album") {
                            results.innerHTML += buildListElement(album.name, album.artists[0].name, album.images[0].url, album.id, "album.php?id=")
                        }
                    });
                }
                if (searchType == "track") {
                    response.tracks.items.forEach(track => {
                        results.innerHTML += buildListElement(track.name, track.artists[0].name, track.album.images[0].url, track.id, "newPost.php?id=")
                    });
                }
                if (searchType == "artist") {
                    response.artists.items.forEach(artist => {
                        results.innerHTML += buildListElement(artist.name, "", artist.images[0].url, artist.id, "artist.php?id=")
                    });
                }
            }
        })
    }
})

function buildListElement(title, subtitle, imgUrl, id, baseURL) {
    return `
                <a style="text-decoration:none; color: var(--text-on-surface);" href=${baseURL + id}  >
                    <div class='d-flex my-2 align-items-center'>
                        <img class=${searchType == "user" ? "profile-pic" : 'album-cover'} src=${imgUrl}>
                        <div class="overflow-hidden d-block">
                            <span class="text-truncate">${title}</span class="text-truncate">
                            <br>
                            <span class="text-truncate">${subtitle}</span class="text-truncate">
                        </div>
                    </div>
                </a>
                `
}