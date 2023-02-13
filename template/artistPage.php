<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/footerElement.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title><?php echo $templateParams["title"] ?></title>

    <style>
        .artist-image {
            width: 3rem;
            border-radius: 50%;
        }

        .album-cover {
            width: 10%;
            min-width: 64px;
            height: auto;
            margin-right: 0.5rem;
        }

        .icon {
            width: 1.5rem;
            height: auto;
        }

        .buttons {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
        }

        @media only screen and (min-width: 600px) {
            .buttons {
                justify-content: left;
                gap: 1rem;
            }
        }
    </style>
</head>

<body theme="<?php echo $_COOKIE["theme"]?>" class="container">
    
    <header class="py-2 d-flex">
        <div class="mx-2">
            <img class="artist-image" src=<?php echo $templateParams["artistImage"] ?> alt="">
        </div>
        <div>
            <h1><?php echo $templateParams["artistName"] ?></h1>
            <span><?php echo $templateParams["followers"] ?> followers</span>
            <br>
            <span><span id="likesNumber"><?php echo $templateParams["likes"] ?></span> likes
                <a onclick="toggleLike('<?php echo $templateParams['artistId'] ?>')">
                    <?php
                        echo ($templateParams["isLiked"] ?
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16" id="heartIcon">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                    </svg>'
                        : 
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16" id="heartIcon">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                    </svg>'
                        )
                    ?>
                </a>
            </span>
        </div>
    </header>
    <section>
        <h2>About this artist</h2>
        <p><?php echo $templateParams["summary"] ?></p>
    </section>
    <section class="mt-3">
        <h2>Popular songs</h2>
        <?php foreach (array_slice($templateParams["topSongs"], 0, 5, true) as $track) {
            $templateParams["imgUrl"] = $track->album->images[1]->url;
            $templateParams["trackAlbum"] = $track->album->name;
            $templateParams["trackName"] = $track->name;
            $templateParams["trackUrl"] = $track->external_urls->spotify;
            $templateParams["trackId"] = $track->id;
            

            require("songListElement.php");
        } ?>
    </section>
    <section class="mt-3" style="margin-bottom:6rem">
        <header class="mb-3">
            <h2>
                Discography
            </h2>
            <div class="buttons">
                <button class="sl-btn primary elevation-1" id="albumsBtn">Albums</button>
                <button class="sl-btn secondary elevation-1" id="singlesBtn">EP and singles</button>
                <button class="sl-btn secondary elevation-1" id="tracksBtn">Songs</button>
            </div>
        </header>
        <div id="albumsDiv">
            <?php
            foreach ($templateParams["albums"] as $album) {
                if ($album->album_type == "album") {
                    $templateParams["imgUrl"] = $album->images[1]->url;
                    $templateParams["albumName"] = $album->name;
                    $templateParams["albumUrl"] = $templateParams["albumBaseUrl"] . $album->id;
                    $templateParams["year"] = substr($album->release_date, 0, 4);

                    require("albumListElement.php");
                }
            }
            ?>

        </div>
        <div id="singlesDiv" class="d-none">
            <?php
            foreach ($templateParams["albums"] as $album) {
                if ($album->album_type == "single") {
                    $templateParams["imgUrl"] = $album->images[1]->url;
                    $templateParams["albumName"] = $album->name;
                    $templateParams["albumUrl"] = $templateParams["albumBaseUrl"] . $album->id;
                    $templateParams["year"] = substr($album->release_date, 0, 4);

                    require("albumListElement.php");
                }
            }
            ?>

        </div>
        <div id="tracksDiv" class="d-none">
            <?php
            foreach ($templateParams["tracks"] as $album) {

                $name = $album["albumName"];
                $image = $album["albumImg"];
                echo "<h2 class='title-large mt-4'>$name</h2>";
                foreach ($album as $track) {
                    if (isset($track->name)) {
                        $templateParams["imgUrl"] = $image;
                        $templateParams["trackName"] = $track->name;
                        $templateParams["trackAlbum"] = $name;
                        $templateParams["trackUrl"] = $track->external_urls->spotify;
                        $templateParams["trackId"] = $track->id;

                        require("songListElement.php");
                    }
                }
            }
            ?>

        </div>
    </section>

    <?php require("template/footerElement.php") ?>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="js/artistPage.js"></script>
</body>

</html>