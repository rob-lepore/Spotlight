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
    <style>
    .profile-pic {
        width: 2rem;
        border-radius: 50%;
    }
    </style>
</head>
<body theme="light" class="container">
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