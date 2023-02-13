<div class='d-flex my-2 surface align-items-center'>
    <?php if(isset($templateParams["imgUrl"])): ?>
        <img class='album-cover' src=<?php echo $templateParams["imgUrl"] ?> alt="">
    <?php endif; ?>
    <div style="width:65%" class="overflow-hidden d-block">
        <span class="text-truncate"><?php echo $templateParams["trackName"] ?></span>
        <br>
        <?php if(isset($templateParams["trackAlbum"])): ?>
            <span class="text-truncate"><?php echo $templateParams["trackAlbum"] ?></span>
        <?php endif; ?>
        <?php if(isset($templateParams["trackArtists"])): ?>
            <?php foreach($templateParams["trackArtists"] as $artist):?>
                <span class="text-truncate"><?php echo "$artist->name";
                    if($templateParams["trackArtists"][count($templateParams["trackArtists"]) -1] != $artist){
                        echo ", ";
                    }?>
                </span>
            <?php endforeach;?>
        <?php endif; ?>
    </div>
    <div class="d-flex flex-row justify-content-evenly w-25" style="min-width: 7rem;">
        <a title="Write a post with this track" href=<?php echo $templateParams["newPostUrl"];echo $templateParams["trackId"] ?> style="color: var(--text-on-surface)">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
            </svg>
        </a>
        <a title="open on spotify" href= <?php echo $templateParams["trackUrl"] ?> class="text-spotify" target="_blank">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-spotify" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.669 11.538a.498.498 0 0 1-.686.165c-1.879-1.147-4.243-1.407-7.028-.77a.499.499 0 0 1-.222-.973c3.048-.696 5.662-.397 7.77.892a.5.5 0 0 1 .166.686zm.979-2.178a.624.624 0 0 1-.858.205c-2.15-1.321-5.428-1.704-7.972-.932a.625.625 0 0 1-.362-1.194c2.905-.881 6.517-.454 8.986 1.063a.624.624 0 0 1 .206.858zm.084-2.268C10.154 5.56 5.9 5.419 3.438 6.166a.748.748 0 1 1-.434-1.432c2.825-.857 7.523-.692 10.492 1.07a.747.747 0 1 1-.764 1.288z" />
            </svg>
        </a>
    </div>
</div>