<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title><?php echo $templateParams["title"]; ?></title>
</head>

<body theme="light" class="container">
    <h1>Prova richieste a Spotify</h1>
    <div class="container">
        <h3 class="mt-5">Search for an Album</h3>
        <form id="search-album-form" class="mb-5">
            <input type="text" id="queryAlbum" value="" class="form-control" placeholder="Type an album Name" />
            <input type="submit" id="search" class="btn btn-primary mt-1" value="Search" />
        </form>
        <h3>Search for the tracklist of an album</h3>
        <form id="search-tracks-form">
            <input type="text" id="queryTracks" value="" class="form-control" placeholder="Type an album ID" />
            <input type="submit" id="search" class="btn btn-primary mt-1" value="Search" />
        </form>

        <div id="results" class="surface mt-3 p-3"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        
        
        document.querySelector("#search-album-form").addEventListener("submit", e => {
            e.preventDefault();
            document.querySelector("#results").innerHTML = "";

            $.ajax({
                url: 'fetchAlbums.php',
                type: 'POST',
                data: {
                    query: document.querySelector("#queryAlbum").value,
                },
                success: function(response) {
                    console.log(response);
                    response.albums.items.forEach(album => {
                        let line = document.createElement("p");
                        line.textContent = album.name + " " + album.id;
                        document.querySelector("#results").appendChild(line)
                    })
                }
            });
        })

        document.querySelector("#search-tracks-form").addEventListener("submit", e => {
            e.preventDefault();
            document.querySelector("#results").innerHTML = "";

            $.ajax({
                url: 'fetchTracks.php',
                type: 'POST',
                data: {
                    query: document.querySelector("#queryTracks").value,
                },
                success: function(response) {
                    console.log(response);
                    response.items.forEach(track => {
                        let line = document.createElement("p");
                        line.textContent = track.name;
                        document.querySelector("#results").appendChild(line)
                    })
                }
            });
        })
    </script>
</body>

</html>