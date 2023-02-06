<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/sliding_bar.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title><?php echo $templateParams["title"] ?></title>
    <style>
    .profile-pic {
        width: 2rem;
        border-radius: 50%;
    }
    main{
        margin-bottom:15%;
        margin-top:40%;
    }
    @media only screen and (min-width: 395px){
        main {
            margin-top: 30%;
        }
    }
    @media only screen and (min-width: 900px){
        main {
            margin-top: 20%;
        }
    }
    @media only screen and (min-width: 1100px){
        main {
            margin-top: 15%;
        }
    }
    @media only screen and (min-width: 1500px){
        main {
            margin-top: 12%;
        }
    }
    </style>
</head>
<body theme="<?php echo $_COOKIE["theme"]?>" class="container">
    <header class="fixed-top overlayBackground py-2 elevation-1">
        <?php require ("headerElement.php");?>
        <div class="top-navigation">
            <div class="active-link"></div>
                <a class = "top-links active" data-value = "Posts" href="#">Posts</a> 
                <a class = "top-links" data-value = "Reviews" href="#">Reviews</a>
        </div>
    </header>
    <main>
        <div class="content">
            <div class="Posts" style="display:block;visibility:visible">
                <div id="postList">
                    <?php
                        $postsNumber = $dbh->getTotalPosts($_COOKIE["username"]);
                        $_SESSION["offset"] = 0;
                        require("processNewPosts.php");
                    ?>
                </div>
                <?php if(count($postsNumber)>$_SESSION["offset"]): ?>
                    <button class="btn secondary" id="loadMorePosts">Load more posts</button>
                <?php endif?>
            </div>
            <div class="Reviews" style="visibility:hidden;display:none">
                <div id="reviewList">
                    <?php
                        $reviewsNumber = $dbh->getTotalReviews($_COOKIE["username"]);
                        $_SESSION["offset"] = 0;
                        require("processNewReviews.php");
                    ?>
                </div>
                <?php if(count($reviewsNumber)>$_SESSION["offset"]): ?>
                    <button class="btn secondary" id="loadMoreReviews">Load more reviews</button>
                <?php endif?>
            </div>
        </div>
    </main>
    <?php require("footerElement.php"); ?>
    <script src="js/sliding_bar.js"></script>
    <script src="js/home.js"></script>
</body>
</html>