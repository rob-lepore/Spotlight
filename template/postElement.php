<div>
    <header class="d-flex justify-content-between">
        <div class="d-flex align-items-center">
            <img src=<?php echo UPLOAD_DIR . $postData["profilePic"] ?> alt="" style=" width: 4rem; height: 4rem; border-radius:50%" class="me-2">
            <div>
                <h1 class="title-large">
                <?php echo $postData["username"] ?>
                </h1>
                <h2 class="title-medium">
                <?php echo $postData["friendship"] ? "Friend" : "Following" ?>
                </h2>
            </div>
        </div>
        <span><?php echo $postData["date"] ?></span>
    </header>
    <article>
        <header>
            <div class='d-flex my-2 align-items-center mx-auto p-2 surface' style="width:95%; border-radius:10px">
                <img src=<?php echo $postData["track"]->album->images[0]->url ?> style="width: 3rem">
                <div class="overflow-hidden d-block ms-2">
                    <span class="text-truncate label-large"><?php echo $postData["track"]->name ?></span class="text-truncate">
                    <br>
                    <span class="text-truncate text-medium"><?php echo $postData["track"]->artists[0]->name ?></span class="text-truncate">
                    -
                    <span class="text-truncate text-medium"><?php echo $postData["track"]->album->name ?></span class="text-truncate">
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4 mx-2 mb-2">
                <div class="d-flex" style="gap: 1rem">
                    <div>
                        <a onclick=<?php echo "toggleLike(" . $postData["id"] . ")"?> id="heartIcon">
                            <?php echo (!$postData["isLiked"] ?  '
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg>'
                                :
                                '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg>'
                            )
                            ?>
                        </a>
                        <span id="likesNumber"><?php echo count($postData["likes"]) ?></span>
                    </div>
                    <a href=<?php echo"./post.php?id=" . $postData["id"] ?> style="color: inherit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                            <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                        </svg>
                    </a>
                </div>
                <a href=<?php echo $postData["track"]->external_urls->spotify ?> class="sl-btn text-spotify elevation-1 text-small" target="_blank" style="text-decoration:none;">
                    listen on Spotify
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-spotify" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.669 11.538a.498.498 0 0 1-.686.165c-1.879-1.147-4.243-1.407-7.028-.77a.499.499 0 0 1-.222-.973c3.048-.696 5.662-.397 7.77.892a.5.5 0 0 1 .166.686zm.979-2.178a.624.624 0 0 1-.858.205c-2.15-1.321-5.428-1.704-7.972-.932a.625.625 0 0 1-.362-1.194c2.905-.881 6.517-.454 8.986 1.063a.624.624 0 0 1 .206.858zm.084-2.268C10.154 5.56 5.9 5.419 3.438 6.166a.748.748 0 1 1-.434-1.432c2.825-.857 7.523-.692 10.492 1.07a.747.747 0 1 1-.764 1.288z" />
                    </svg>
                </a>
            </div>

        </header>

        <a href= <?php echo "./post.php?id=" . $postData["id"] ?> style="text-decoration: none; color:inherit">
            <p style="text-align: justify;"><?php echo $postData["text"] ?></p>
        </a>
    </article>
</div>