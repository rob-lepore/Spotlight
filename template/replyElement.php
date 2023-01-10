
<div class="d-flex my-3 ms-auto" style="width: calc(100% - 3.5rem)">
    <div style="padding-top: 0.4rem;">
        <img class="profile-pic" src=<?php echo $commentData["profilePic"] ?>  alt="Profile picture not found">
    </div>
    <div class="comment surface w-100">
        <span class="label-large"><?php echo $commentData["username"] ?></span>
        <span class="text-small"><?php echo " > ", $commentData["comment"] ?></span>
        <p><?php echo $commentData["text"] ?></p>
        <div class="d-flex justify-content-end">
            <span class="text-small ml-auto" onclick=<?php echo "toggleReply('", $commentData["username"], "',", $commentData["id"], ")" ?>>reply</span>
        </div>
    </div>
    
</div>