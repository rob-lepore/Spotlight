<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title><?php echo $templateParams["title"] ?></title>
</head>

<body theme="light" class="container">
    <style>
        .album-image {
            width: 9rem;
        }
    </style>
    <header class="py-2 d-flex surface">
        <div class="mx-2">
            <img class="album-image" src=<?php echo $templateParams["albumImage"] ?> alt="">
        </div>
        <div>
            <h1><?php echo $templateParams["albumName"]?></h1>
            <h4>
                <?php foreach($templateParams["artists"] as $artist){
                    echo $artist->name;
                   if($templateParams["artists"][count($templateParams["artists"]) -1] != $artist){
                       echo ", ";
                    }
                }?>
            </h4>
            <div class="d-flex flex-row justify-content-between">
                <h4><?php echo substr($templateParams["releaseDate"],0,4)?></h4>
                <h4><?php echo $templateParams["likes"] ?> likes
                    <a><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                    </svg></a>
                </h4>
            </div>
        </div>
    </header>
    <section class="mt-3">
        <div class="d-flex flex-row justify-content-between">
            <div class="d-flex">
                <input type="button" id="tracklist" class="btn btn-sm primary elevation-1 align-self-start" value="v"/>
                <h2>Tracklist</h2>
            </div>
            <input type="button" id="review" class="btn btn-sm primary elevation-1 align-self-center" value="Write a reveiw about this album"/>
        </div> 
        <div id="tracklistDiv">
            <?php foreach ($templateParams["tracks"]->items as $track) {
                $templateParams["trackName"] = $track->name;
                $templateParams["trackUrl"] = $track->external_urls->spotify;
                require("songListElement.php");
            } ?>
        </div>
    </section>
    <section class="mt-3">
        <h2>Popular Reviews</h2>
    </section>

    <script src="js/albumPage.js"></script>
</body>
</html>