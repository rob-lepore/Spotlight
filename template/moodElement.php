<div class="<?php echo 'my-2 d-flex align-items-center elevation-1 p-3 gradient-' . $moodData["gradient"] ?>" style="border-radius: 10px">
    <img class='album-cover' src=<?php echo $moodData["track"]->album->images[0]->url ?>>
    <div class="overflow-hidden d-block">
        <span><?php echo $moodData["username"] ?> is feeling <?php echo $moodData["emo"] ?></span>
        <br>
        <span class="text-truncate headline-large"><?php echo $moodData["track"]->name ?></span class="text-truncate">
        <br>
        <span class="text-truncate title-large"><?php echo $moodData["track"]->artists[0]->name ?></span class="text-truncate">
    </div>
</div>