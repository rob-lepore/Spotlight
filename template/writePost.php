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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title><?php echo $templateParams["title"]; ?></title>
    <style>
    .album-image {
        width: 4rem;
    }
    .post_text{
        width: 98%;
        height: 150px;
        padding: 0.5rem 0.5rem;
        box-sizing: border-box;
        border: 1.2% solid #ccc;
        border-radius: 0.4rem;
        margin: 0% 1%;
        resize: none;
    }
    </style>
</head>
<body theme="<?php echo $_COOKIE["theme"]?>" class="container">
    <div class="topnav mx-2 mt-3 d-flex justify-content-between">
        <button id="backBtn" class="btn ov-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
            </svg>
        </button>
        <button data-bs-toggle="modal" data-bs-target="#selectionModal" class="btn primary"><em class="fa fa-search"> Search a song </em></button>
        <?php
            $templateParams["searchType"] = "track";
            require("template/modal.php");
        ?>
    </div>
    <?php if(isset($templateParams["albumImage"])):?>
    <header class="py-2 d-flex">
        <div class="mx-2 align-self-center">
            <img class="album-image" src=<?php echo $templateParams["albumImage"] ?> alt="Album Image">
        </div>
        <div>
            <h1><?php echo $templateParams["trackName"]?></h1>
            <h4>
                <?php foreach($templateParams["artists"] as $artist):?>
                   <?php echo "$artist->name";?>
                   <?php if($templateParams["artists"][count($templateParams["artists"]) -1] != $artist){
                       echo ", ";
                    }?>
                <?php endforeach;?>
            </h4>
        </div>
    </header>
    <?php endif; ?>
    <main class="mt-3">
        <form <?php if(isset($_GET["id"])):?>action="post_creation.php?id=<?php echo $_GET["id"]?>" <?php endif; ?>id="create-post-form" method="POST" name="post_form">
            <label for="post_text" class="mx-2">Tell everyone what you think of this song!</label><textarea id="post_text" class="post_text" name="post_text" placeholder="Write here..." required maxlength="200"></textarea>
            <div class="col-12 text-end">
                <input type="submit" class="btn btn-sm primary elevation-1 mx-2" value="Post"/>
            </div>
        </form>
    </main>
    <?php require("footerElement.php"); ?>
    <script>
        document.querySelector("#backBtn").addEventListener("click", e => {
            e.preventDefault();
            history.back();
        })
    </script>
</body>
</html>