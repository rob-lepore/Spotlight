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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title><?php echo $templateParams["title"] ?></title>
</head>

<body theme="light" class="container">
    <nav class ="">
    <div class ="d-flex flex-row-reverse">
        <button class=" btn-profile follow <?php echo $templateParams["is_follower"]?"following":"not_follow"?>" type="button"><?php echo $templateParams["is_follower"]?"Unfollow":"Follow"?></button>
        <button class=" btn-profile friend <?php echo $templateParams["is_friend"]?"friends":"not_friend"?>" type="button">Friend Request</button>
    </div>

        <div class="row d-flex justify-content-between m-3">
            <div class="col-3"><img class="profile-pic" alt='<?php UPLOAD_DIR . "default.jpg"?>' src='<?php echo $templateParams["profilePicPath"] == ""? UPLOAD_DIR . "default.jpg": UPLOAD_DIR . $templateParams["profilePicPath"]?>' /></div>
            <div class = "col-9">
                <input class="name-holder username" id="user" value="<?php echo $templateParams["username"];?>" type="text" disabled/>

                <label class="edit" for="user"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                </svg></label>
            <input class="name-holder realname" value="<?php echo $templateParams["firstname"]; echo " ";echo $templateParams["lastname"];?>" disabled/>

            </div>    
        </div>

        <input class="select-file" name="propic" type="file"/>
        <button class="save-btn">save</button>
        <div class = "d-flex justify-content-center">
            <?php echo $templateParams["is_friend"] || $templateParams["username"] == $_COOKIE["username"]?"<a class='info'>". $templateParams['FriendsCount']. " Friends</a>":""?>
            <a class=" info"><?php  echo $templateParams["FollowerCount"];?> Followers</a>
            <a class=" info"><?php echo $templateParams["FollowingCount"]?> Following</a>
        </div>
        <div class="">
        <div class="top-navigation">
            <div class="active-link"></div>
                <a class = "top-links active" data-value = "Posts" href="#">Posts</a> 
                <a class = "top-links" data-value = "Reviews" href="#">Reviews</a>
                <a class = "top-links" href="#">Artists</a>
                <a class = "top-links" href="#">Albums</a> 
        </div>
        </div>
    </nav>

    <main>
    <?php
        foreach ($userPosts as $post) {
            $templateParams = $post;
            require("postPage.php");

           //la versione di post senza i commenti che cliccandoci sopra ti porta alla postPage
           //ripetere la stessa cosa per le reviews
        }

    ?>

        <div class="content">
        <p>Line 1</p>
    <p>Line 2</p>
    <p>Line 3</p>
    <p>Line 4</p>
    <p>Line 5</p>
    <p>Line 6</p>
    <p>Line 7</p>
    <p>Line 8</p>
    <p>Line 9</p>
    <p>Line 10</p>
    <p>Line 11</p>
    <p>Line 12</p>
    <p>Line 13</p>
    <p>Line 14</p>
    <p>Line 15</p>
    <p>Line 1</p>
    <p>Line 2</p>
    <p>Line 3</p>
    <p>Line 4</p>
    <p>Line 5</p>
    <p>Line 6</p>
    <p>Line 7</p>
    <p>Line 8</p>
    <p>Line 9</p>
    <p>Line 10</p>
    <p>Line 11</p>
    <p>Line 12</p>
    <p>Line 13</p>
    <p>Line 14</p>
    <p>Line 15</p>
    <p>Line 1</p>
    <p>Line 2</p>
    <p>Line 3</p>
    <p>Line 4</p>
    <p>Line 5</p>
    <p>Line 6</p>
    <p>Line 7</p>
    <p>Line 8</p>
    <p>Line 9</p>
    <p>Line 10</p>
    <p>Line 11</p>
    <p>Line 12</p>
    <p>Line 13</p>
    <p>Line 14</p>
    <p>Line 15</p>
            <button class="create-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
            </svg>
            </button>
        </div>
    </main>

    <footer></footer>

    <script src="./js/sliding_bar.js"></script>
    <script src="./js/profilePage.js"></script>
</body>

</html>