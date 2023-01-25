<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php echo $templateParams["title"]; ?></title>
</head>

<body theme="light" class="container">
<style>
        .album-image {
            width: 4rem;
        }
        .post_text{
            width: 100%;
            height: 150px;
            padding: 0.5rem 0.5rem;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            resize: none;
        }
    </style>
    <header class="py-2 d-flex">
        <div class="mx-2 align-self-center">
            <img class="album-image" src=<?php echo $templateParams["albumImage"] ?> alt="..">
        </div>
        <div>
            <h1><?php echo $templateParams["trackName"]?></h1>
            <h4>
                <?php foreach($templateParams["artists"] as $artist):?>
                   <a class ="text-decoration-none text-reset" href="./artist.php?id=<?php echo $artist->id?>"><?php echo "$artist->name";?><a>
                   <?php if($templateParams["artists"][count($templateParams["artists"]) -1] != $artist){
                       echo ", ";
                    }?>
                <?php endforeach;?>
            </h4>
        </div>
    </header>
    <div class="topnav mt-3">
        <form id="search-track-form" class="mb-1 d-flex">
            <input type="text" id="queryTracks" value="" class="form-control" placeholder="Search..." />
            <button type="submit" id="search" class="btn primary mt-1" value="Search"><i class="fa fa-search"></i></button>
        </form>
        <form id="new-track-form" method="POST" class="d-flex flex-row-reverse" action="">
            <input type="submit" class="btn btn-sm primary mt-1" value="Update"/>
            <select class="results align-self-center col-9" id="results" data-mdb-filter="true">
                <option value=<?php echo $templateParams["trackId"]?>><?php echo $templateParams["trackName"]?> --- <?php echo $templateParams["artists"][0]->name?></option>
            </select>
        </form>
    </div>
    <main class="mt-3">
        <form id="create-post-form" method="POST" name="post_form">
            <textarea id="post_text" class="post_text" name="post_text" placeholder="Write here..."></textarea>
            <div class="col-12 text-end">
                <input type="submit" class="btn btn-sm primary elevation-1" value="Post"/>
            </div>
        </form>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="js/writePost.js"></script>
</body>
</html>