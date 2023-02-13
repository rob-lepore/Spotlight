<a title="Go to album" style="text-decoration:none; color: var(--text-on-surface);" href=<?php echo $templateParams["albumUrl"] ?>  >
    <div class='d-flex my-2 align-items-center'>
        <img class='album-cover' src=<?php echo $templateParams["imgUrl"] ?> alt="album cover"> 
        <div class="overflow-hidden d-block">
            <span class="text-truncate"><?php echo $templateParams["albumName"] ?></span class="text-truncate">
            <br>
            <span class="text-truncate"><?php echo $templateParams["year"] ?></span class="text-truncate">
        </div>
    </div>
</a>