<div class="alert alert-dismissible fade show surface" id="<?php echo $templateParams["id"]?>" style="border-radius:1rem;" role="alert">
    <div class="d-flex flex-row align-items-center">    
    <button type="button" class="btn-close ms-auto close" data-bs-dismiss="alert" aria-albel="Close"></button>
        <a  class="d-flex flex-row align-items-center text-decoration-none text-reset " href="<?php echo "/Spotlight/profile.php?user=".$templateParams["source_username"]?>">
        <img src="<?php echo UPLOAD_DIR.$templateParams["source_profile_pic"]?>" style="border-radius:100%;width:4rem;" alt="profile foto of the user"/>
        <p class="ms-2 label-large username"><?php echo $templateParams["source_username"]?></p>
        </a>
        <a href="<?php 
            if($templateParams["type"] == "Post"){
                echo '/Spotlight/post.php?id=' . $templateParams["post_id"]; 
            }elseif($templateParams["type"] == "Review"){
                echo '/Spotlight/profile.php?user=' . $_COOKIE["username"] .'#' . $templateParams["review_id"];
            }elseif($templateParams["type"] == "Follow"){
                echo '/Spotlight/profile.php?user=' . $templateParams["source_username"];
            }elseif($templateParams["type"] == "Friend_request"){
                echo '/Spotlight/profile.php?user=' . $templateParams["source_username"];
            }
        ?>" class="text-decoration-none text-reset"><p class="ms-3 text-medium" ><?php 
            if($templateParams["type"] == "Mood"){
                echo 'has reacted to your mood';
            }elseif($templateParams["type"] == "Follow"){
                echo 'has followed you';
            }elseif($templateParams["type"] == "Friend_request"){
                echo 'has sent you a friend request';
            }elseif($templateParams["type"] == "Review"){
                echo $templateParams["isLike"]?'has liked your review':'has disliked your review';
            }elseif($templateParams["type"] == "Post"){
                echo "has reacted to your post";
            }
        ?></p></a>
    </div>
    <?php if($templateParams["type"] == "Friend_request"):?>
        <div class="d-flex flex-row-reverse ">
            <button class="sl-btn primary decline-btn">Decline request</button>
            <button class="sl-btn primary accept-btn">Accept Request</button>
        </div>
    <?php endif;?>
</div>
