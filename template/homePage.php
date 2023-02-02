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
    <title><?php echo $templateParams["title"] ?></title>
</head>
<body theme="light" class="container">
    <style>
        .profile-pic {
            width: 2rem;
            border-radius: 50%;
        }
    </style>
    <header class="fixed-top overlayBackground py-2 elevation-1">
    <div class="mx-2 d-flex flex-row justify-content-between">
        <a href="profile.php?user=<?php echo $templateParams["username"]?>" class="btn">
            <img class="profile-pic" src='<?php echo UPLOAD_DIR .  $templateParams["profilePic"]?>' alt="profilePic">
        </a>
        <h1>Spotlight</h1>
        <a href="search.php" class="btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </a>
    </div>
    <div class="top-navigation">
        <div class="active-link"></div>
            <a class = "top-links active" data-value = "Posts" href="#">Posts</a> 
            <a class = "top-links" data-value = "Reviews" href="#">Reviews</a>
    </div>
    <main>
        <div class="content">
            <div class="Posts"></div>
            <div class="Reviews" style="visibility:hidden;display:none">
                <?php
                    foreach($templateParams["followersReviews"] as $review){
                        $templateParams['text'] = $review['text'];
                        $templateParams['number_of_likes'] = $review['number_of_likes'];
                        $templateParams['number_of_dislikes'] = $review['number_of_dislikes'];
                        $templateParams['date'] = $review['date'];
                        $templateParams['score'] = $review["score"];
                        $templateParams['id'] = $review["album"];
                        $templateParams['username'] = $review["username"];
                        $templateParams["is_follower"] = $dbh->isFollower($templateParams['username'], $_COOKIE["username"])[0]["COUNT(*)"] >= 1;
                        $templateParams["max-chars"] = 150;
                        $templateParams["review_id"] = $review["review_id"];
                        $templateParams["profilePicPath"] = $dbh->getUserData($templateParams['username'])[0]["profile_pic"];
                        require('reviewPage.php');
                    }
                ?>
            </div>
        </div>
    </main>

    <script src="js/sliding_bar.js"></script>
    <script src="js/home.js"></script>
    <?php require("footerElement.php"); ?>
</body>
</html>