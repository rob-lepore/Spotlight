<style>
    .icon-button{
        position: relative;
        display:flex;
        align-items:center;
        justify-content:center;
        width:50px;
        height:50px;

    }
    .icon-button_badge{
        position: absolute;
        top:5px;
        right:5px;
        width:20px;
        height:20px;
        display:flex;
        justify-content:center;
        align-items:center;
        border-radius:50%;
    }

    .newPost {
        position: relative;
        display: inline-block;
    }

    .postTypes {
        display: none;
        position: absolute;
        left: -165%;
    }

    .newPost:hover .postTypes {
        display: block;
        bottom: 100%;
    } 
</style>
<footer class="fixed-bottom overlayBackground py-2 elevation-1">
    <div class="d-flex flex-row justify-content-around">
        <a href="<?php echo ($templateParams["title"] == "Spotlight - Home" ? "#" : "home.php")?>" class="btn ov-btn" title="Home page">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
            </svg>
        </a>
        <div class="newPost">
            <button class="btn ov-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                </svg>
            </button>
            <div class="postTypes">
                <div class="d-flex flex-row">
                <form action="newPost.php">
                    <button class="btn ov-btn">New Post</button>
                </form>
                <?php if(!empty($dbh->getLastMood($_COOKIE["username"])) && ((time() - strtotime($dbh->getLastMood($_COOKIE["username"])[0]["date"])) < (60 * 60 * 24))) :?>
                    <button class="btn ov-btn" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-container="body" data-bs-placement="top" title="You already posted your daily mood!" data-bs-content="Wait until midnight to let everyone know how you feel">Daily Mood</button>
                <?php else:?>
                    <form action="mood.php">
                        <button class="btn ov-btn">Daily Mood</button>
                    </form>
                <?php endif;?>
                <form action="newReview.php">
                    <button class="btn ov-btn">New Review</button>
                </form>
                </div>
            </div>
        </div>
        <a href="notification.php" class="btn icon-button ov-btn" title="Notifications">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
            </svg>
            <span class="icon-button_badge text-small primary "></span>
        </a>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="js/footerElement.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" crossorigin="anonymous"></script>