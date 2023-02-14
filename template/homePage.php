<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/sliding_bar.css">
    <link rel="stylesheet" href="css/gradients.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/footerElement.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title><?php echo $templateParams["title"] ?></title>
</head>

<body theme="<?php echo $_COOKIE["theme"] ?>" class="container">
    <header class="fixed-top overlayBackground py-2 elevation-1">
        <?php require("headerElement.php"); ?>
        <div class="top-navigation">
            <div class="active-link"></div>
            <a class="top-links active" data-value="Posts" href="#">Posts</a>
            <a class="top-links" data-value="Reviews" href="#">Reviews</a>
        </div>
    </header>
    <main>
        <div class="content">
            <div class="Posts" style="display:block;visibility:visible">
                <div class="mb-5">
                    <?php
                    $moods = $dbh->getFriendsMoods($_COOKIE["username"]);
                    require("processNewMoods.php");
                    ?>
                </div>
                <div id="postList">
                    <?php
                    $_SESSION["postOffset"] = 0;
                    require("processNewPosts.php");
                    ?>
                </div>
                <div class="d-flex">
                    <button class="btn secondary mx-auto" id="loadMorePosts">Load more posts</button>
                </div>
            </div>
            <div class="Reviews" style="visibility:hidden;display:none">
                <div id="reviewList">
                    <?php
                    $_SESSION["reviewOffset"] = 0;
                    require("processNewReviews.php");
                    ?>
                </div>
                <div class="d-flex">
                    <button class="btn secondary mx-auto" id="loadMoreReviews">Load more reviews</button>
                </div>
            </div>
        </div>
    </main>
    <?php require("footerElement.php"); ?>
    <script src="js/sliding_bar.js"></script>
    <script src="js/home.js"></script>
    <script src="js/postPage.js"></script>
    <script src="js/reviewPage.js"></script>

</body>

</html>