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
<style>
        .album-image {
            width: 4rem;
        }
        .post_text{
            width: 100%;
            height: 150px;
            padding: 12px 20px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            resize: none;
}
    </style>
    <header class="py-2 d-flex">
        <div class="mx-2 align-self-center">
            <img class="album-image" src=<?php echo $templateParams["albumImage"] ?> alt="..">
        </div>
        <div>
            <h1><?php echo $templateParams["trackame"]?></h1>
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
    <main class="mt-3">
        <textarea id="post_text" class="post_text" name="post_text" placeholder="Write here"></textarea>
        <div class="col-12 text-end"> 
            <input type="submit" class="btn btn-sm primary elevation-1" value="Post"/>
        </div>
    </main>
</body>
</html>