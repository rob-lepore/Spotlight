<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title><?php echo $templateParams["title"] ?></title>

    <style>
        .profile-pic {
            width: 3rem;
            height: 3rem;
            max-width: 3rem;
            max-height: 3rem;

            border-radius: 50%;
            margin-right: 0.5rem;
        }

        .album-cover {
            width: 40%;
            max-width: 250px;
        }

        .track-card {
            border-radius: 10px;
            overflow: hidden;
        }

        .comment {
            padding: 0.3rem 1rem;
            border-radius: 5px;
        }
    </style>
</head>

<body theme="<?php echo $_COOKIE["theme"]?>">

    <header class="d-flex justify-content-between mt-2 container">
        <div class="d-flex">
            <img class="profile-pic" src=<?php echo $templateParams["profilePic"] ?> alt="">
            <div class="d-flex flex-column">
                <span class="label-large"><?php echo $templateParams["username"] ?></span>
                <span><i>Following</i></span>
            </div>
        </div>
        <span><?php echo $templateParams["date"] ?></span>

    </header>
    <main class="mt-3 container">
        <header class="mb-3">
            <div class="d-flex surface track-card">
                <img class="album-cover" src=<?php echo $templateParams["albumCover"] ?> alt="">
                <div class="d-flex flex-column justify-content-evenly" style="margin-left: 0.5rem;">
                    <h1 class="headline-medium"><?php echo $templateParams["trackName"] ?> </h1>
                    <div>
                        <span class="text-medium"><?php echo $track->album->name ?></span>
                        <br>
                        <span class="text-medium"><?php echo $track->artists[0]->name ?></span>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <div class="d-flex" style="gap: 1rem">
                    <div>
                        <a onclick="toggleLike(<?php echo $_GET['id'] ?>)" id=<?php echo "heartIcon" . $_GET["id"] ?>>
                            <?php echo (!$postIsLiked ?  '
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg>'
                                :
                                '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg>'
                            )
                            ?>
                        </a>
                        <span id=<?php echo "likesNumber" . $_GET["id"] ?>><?php echo count($likes) ?></span>
                    </div>
                    <a onclick="toggleForm()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                            <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                        </svg>
                    </a>
                </div>
                <a href=<?php echo $track->external_urls->spotify ?> class=" btn text-spotify elevation-1" target="_blank">
                    listen on Spotify
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-spotify" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.669 11.538a.498.498 0 0 1-.686.165c-1.879-1.147-4.243-1.407-7.028-.77a.499.499 0 0 1-.222-.973c3.048-.696 5.662-.397 7.77.892a.5.5 0 0 1 .166.686zm.979-2.178a.624.624 0 0 1-.858.205c-2.15-1.321-5.428-1.704-7.972-.932a.625.625 0 0 1-.362-1.194c2.905-.881 6.517-.454 8.986 1.063a.624.624 0 0 1 .206.858zm.084-2.268C10.154 5.56 5.9 5.419 3.438 6.166a.748.748 0 1 1-.434-1.432c2.825-.857 7.523-.692 10.492 1.07a.747.747 0 1 1-.764 1.288z" />
                    </svg>
                </a>
            </div>
        </header>
        <section>
            <p><?php echo $data["text"] ?></p>
        </section>
        <section style="margin-bottom: 4rem">
            <p><?php
                foreach ($templateParams["comments"] as $comment) {
                    $commentData = $comment;
                    require("commentElement.php");

                    foreach ($comment["replies"] as $reply) {
                        $commentData = $reply;
                        require("replyElement.php");
                    }
                }

                ?></p>
        </section>
    </main>

    <footer class="fixed-bottom p-2 d-none" style="background-color: var(--bg-color)">
        <span class="text-large d-none" id="replyUsername" name="userReply"></span>

        <form class="input-group input-group-lg" action=<?php echo "newComment.php?id=" . $_GET["id"] ?> method="POST">
            <input type="hidden" name="userReply" value="" id="userReply"></input>
            <input type="hidden" name="commentId" value="" id="commentId"></input>


            <input type="text" class="form-control" placeholder="Write a comment!" name="commentText" id="commentText" autocomplete="off">
            <button class="btn primary" type="submit" id="button-addon2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg>
            </button>
        </form>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="js/postPage.js"></script>
</body>

</html>