<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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
        <button data-bs-toggle="modal" data-bs-target="#selectionModal" class="btn primary">Search track</button>
        <?php
            $templateParams["searchType"] = "track"; // oppure "album"
            require("template/modal.php");
        ?>
    </div>
    <main class="mt-3">
        <form action="post_creation.php?id=<?php echo $_GET["id"]?>" id="create-post-form" method="POST" name="post_form">
            <textarea id="post_text" class="post_text" name="post_text" placeholder="Write here..."></textarea>
            <div class="col-12 text-end">
                <input type="submit" class="btn btn-sm primary elevation-1" value="Post"/>
            </div>
        </form>
    </main>
    <?php require("footerElement.php"); ?>
</body>
</html>