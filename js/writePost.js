document.querySelector("#search-track-form").addEventListener("submit", e => {
    e.preventDefault();
    let q = document.querySelector("#queryTracks").value;
    document.querySelector("#results").innerHTML = "";

    $.ajax({
        url: 'searchTracks.php',
        type: 'POST',
        data: {
            query: q.replace(/\s+/g, ''),
        },
        success: function(response) {
            response.tracks.items.forEach(track => {
                let line = document.createElement("option");
                line.value = track.id;
                line.textContent = track.name.concat(" --- ", track.artists[0].name);
                document.querySelector("#results").appendChild(line);
            })
        }
    });
})

document.querySelector("#new-track-form").addEventListener("submit", e => {
    e.preventDefault();

    var select = document.getElementById('results');
    var value = select.options[select.selectedIndex].value;
    document.getElementById("new-track-form").action = "newPost.php?id=".concat(value);
    document.querySelector("#new-track-form").submit();

})

document.querySelector("#create-post-form").addEventListener("submit", e => {
    e.preventDefault();

    var select = document.getElementById('results');
    var value = select.options[select.selectedIndex].value;
    document.getElementById("create-post-form").action = "post_creation.php?id=".concat(value);
    document.querySelector("#create-post-form").submit();
})