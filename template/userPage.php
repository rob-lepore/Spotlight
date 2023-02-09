<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/sliding_bar.css">
    <link rel="stylesheet" href="css/profile-page.css">
    <link rel="stylesheet" href="css/gradients.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title><?php echo $templateParams["title"] ?></title>
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
            z-index:1;
        }
        .dropdown-content {
            display: none;
            position: absolute;
        }
        .dropdown:hover .dropdown-content {display: block;}

        .profile-pic{
            margin-top:1rem;
            border-radius: 100%;
            width:9rem;
            height:9rem;
        }

        @media screen and (max-width: 500px) {
            .profile-pic{
                border-radius: 100%;
                max-width: 3rem;
                max-height: 3rem;
            }
        }

        .select-file{
            font-size: smaller;
            visibility: hidden;
        }

        .create-btn{
            min-width: 60px;
            min-height:60px;
            border-radius: 30%;
            border:none;
            box-shadow: 0.1rem 0.1rem 0.1rem 0.1rem rgba(0,0,0,0.15);
            color:#6750a4;
            background:#f8f4fa2f;
            position:fixed;
            bottom: 5rem;
            left: 1rem;
        }

        .name-holder{
            border:none;
            width: 10rem;
            background: transparent;
        }

        .save-btn{
            visibility:hidden;
        }
    </style>
</head>

<body theme="<?php echo $_COOKIE["theme"]?>" class="container">
    <nav class ="surface mb-3">
    <div class ="d-flex flex-row-reverse">
        <?php if($_COOKIE["username"] != $_GET["user"]):?>
        <button class="primary sl-btn follow <?php echo $templateParams["is_follower"]?"following":"not_follow"?>" type="button"><?php echo $templateParams["is_follower"]?"Unfollow":"Follow"?></button>
        <button class="primary sl-btn friend" type="button" data-type="<?php 
            if($templateParams["is_friend"]){
                echo "friend";
            }elseif($templateParams["sent_request"]){
                echo "wait-acceptance";
            }elseif($templateParams["received_request"]){
                echo "request-received";
            }else{
                echo "not_friend";
            }
        ?>"><?php
        if($templateParams["is_friend"]){
            echo "Remove friend";
        }elseif($templateParams["sent_request"]){
            echo "Cancel request";
        }elseif($templateParams["received_request"]){
            echo "Accept request";
        }else{
            echo "Send request";
        }
        ?></button>
        <?php endif;?>
        <?php if($templateParams["received_request"]){
            echo '<button class="sl-btn primary" data-type="received-request-decline" type="button">Decline request</button>';
        }?>
    </div>

        <div class="d-flex justify-content-between m-3">
            <img class="profile-pic me-2" alt="profile picture" src='<?php echo UPLOAD_DIR . $templateParams["profilePicPath"]?>' />
            <div class = "d-flex flex-column me-auto">
                <input class="name-holder username mb-0 mt-2 surface label-large text-on-primary" id="user" value="<?php echo $templateParams["username"];?>" type="text" disabled/>
                <input class="name-holder realname surface" value="<?php echo $templateParams["firstname"]; echo " ";echo $templateParams["lastname"];?>" disabled/>
            </div>
            <?php if($_COOKIE["username"] == $_GET["user"]):?>
            <div class="dropdown">
                <button class="btn primary btn-lg elevation-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                    </svg>
                </button>
                <div class="dropdown-content">
                    <button class="btn edit ml-btn">Edit Profile</button>
                    <button class="btn ml-btn" onclick="changeTheme()">Change theme</button>
                    <form action="logout.php">
                        <button class="btn ml-btn">Logout</button>
                    </form>
                </div>
            </div>
            <?php endif;?>
            <div class="col-1"></div>
        </div>
        <input class="select-file" name="propic" type="file"/>
        <button class="save-btn primary sl-btn">save</button>
        <div class = "d-flex justify-content-center">
            <?php echo $templateParams["is_friend"] || $templateParams["username"] == $_COOKIE["username"]?"<a class='info text-on-primary text-reset text-decoration-none mx-3' href='search_users.php?user=" . $templateParams["username"] . "'>". $templateParams['FriendsCount']. " Friends</a>":""?>
            <a class=" info text-on-primary text-reset text-decoration-none mx-3" href=<?php echo "search_users.php?user=" . $templateParams["username"]?>><?php  echo $templateParams["FollowerCount"];?> Followers</a>
            <a class=" info text-on-primary text-reset text-decoration-none mx-3" href=<?php echo "search_users.php?user=" . $templateParams["username"]?>><?php echo $templateParams["FollowingCount"]?> Following</a>
        </div>
        <div class="top-navigation">
            <div class="active-link"></div>
                <a class = "top-links active" data-value = "Posts" href="#">Posts</a> 
                <a class = "top-links " data-value = "Reviews" href="#">Reviews</a>
                <a class = "top-links " data-value = "Artists" href="#">Artists</a>
                <a class = "top-links " data-value = "Albums" href="#">Albums</a> 
        </div>
    </nav>

    <main class="pb-5">
        <div class="content">
            <?php if($templateParams['is_follower'] || $templateParams['is_friend'] || $templateParams["username"] == $_COOKIE["username"]):?>
                <div class="Posts">
                    <?php if(($templateParams['is_friend'] || $templateParams["username"] == $_COOKIE["username"]) && isset($userLastMood["song"])):?>
                        <?php
                            $trackId = $userLastMood['song'];
                            require("fetchTrackData.php");
                            $moodData["track"] = $track;
                            $moodData["username"] = $userLastMood["username"];
                            $moodData["emo"] = $userLastMood["emoji"];
                            $moodData["gradient"] = $userLastMood["gradient"];
                            require('template/moodElement.php');
                        ?>
                    <?php endif;?>
                    <?php
                        foreach($userPosts as $userPost){
                            $postData["profilePic"] = $templateParams["profilePicPath"];
                            $postData["username"] = $templateParams["username"];
                            $postData["likes"] = $userPost["number_of_likes"];
                            $postData["friendship"] = $templateParams["is_friend"];
                            $postData["id"] = $userPost["post_id"];
                            $trackId = $userPost["song"];
                            require('fetchTrackData.php');
                            $postData["track"] = $track;
                            $likes = $dbh->getPostLikes($userPost["post_id"]);
                            $postData['likes'] = $likes;
                            $likes = array_map("mapToUsernames", $likes);
                            $postData['isLiked'] = (in_array($_COOKIE["username"],array_values($likes)));
                            $postData['date'] = $userPost['date'];
                            $postData['text'] = $userPost['text'];
                            require('postElement.php');
                        }
                    ?> 
                </div>
                <div class="Reviews" style="visibility:hidden;display:none">
                    <?php
                        foreach($userReviews as $userReview){
                            $templateParams['text'] = $userReview['text'];
                            $templateParams['number_of_likes'] = $userReview['number_of_likes'];
                            $templateParams['number_of_dislikes'] = $userReview['number_of_dislikes'];
                            $templateParams['date'] = $userReview['date'];
                            $templateParams['score'] = $userReview["score"];
                            $templateParams['id'] = $userReview["album"];
                            $templateParams["max-chars"] = 1000;
                            $templateParams["review_id"] = $userReview["review_id"];
                            //$templateParams["is_friend"]
                            //$templateParams["is_follower"]
                            //$templateParams["username"]
                            require('reviewPage.php');
                        }
                    ?>
                </div>
                <div class="Albums" style="visibility:hidden;display:none">
                        
                </div>
                <div class="Artists" style="visibility:hidden;display:none">
                </div>
            <?php endif;?>
        </div>
    </main>

    <?php require("footerElement.php"); ?>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="./js/sliding_bar.js"></script>
    <script src="./js/profilePage.js"></script>
    <script src="/Spotlight/js/reviewPage.js"></script>
    <script src="/Spotlight/js/postPage.js"></script>
</body>

</html>