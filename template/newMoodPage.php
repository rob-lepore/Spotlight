<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <title>Document</title>

    <style>
        body {
            background-color: var(--list-item-bg);
            margin: 0;
            height: 50vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        [id^=emo]{
            border-radius: 50%;
            aspect-ratio: 1;
            width: fit-content;
            height: auto;
            
        }

        main {
            max-width: 700px;
        }
    </style>
</head>

<body theme="<?php echo $_COOKIE["theme"]?>" >

    <header class="m-3">
        <a href="./" style="color:inherit">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
        </a>
    </header>

    <main class="overlayBackground elevation-1 w-75 mx-auto p-3 d-flex flex-column" style="border-radius: 10px;">
        <?php
        $templateParams["searchType"] = "track"; // oppure "album"
        require("template/modal.php");
        ?>
        <section>
            <label for="">How do you feel</label>
            <div class="d-flex flex-column mx-2 mt-3">
                <div class="d-flex justify-content-around mb-2" >
                    <span class="title-large" id="emo0">😂</span>
                    <span class="title-large" id="emo1">😍</span>
                    <span class="title-large" id="emo2">😄</span>
                    <span class="title-large" id="emo3">🥲</span>
                    <span class="title-large" id="emo4">😭</span>
                </div>
                <div class="d-flex justify-content-around" >
                    <span class="title-large" id="emo5">😤</span>
                    <span class="title-large" id="emo6">😵‍💫</span>
                    <span class="title-large" id="emo7">🤬</span>
                    <span class="title-large" id="emo8">🤡</span>
                    <span class="title-large" id="emo9">🤠</span>
                </div>
            </div>
        </section>
        <hr>
        <section>
            <a data-bs-toggle="modal" data-bs-target="#selectionModal" >
                <?php 
                if(isset($track)){
                    $albumCover = $track->album->images[0]->url;
                    $artist = $track->artists[0]->name;
                    echo "
                        <div class='d-flex my-2 align-items-center' id='selectedSong'>
                            <img class='album-cover' src=$albumCover>
                            <div class='overflow-hidden d-block'>
                                <span class='text-truncate'>$track->name</span>
                                <br>
                                <span class='text-truncate'>$artist</span>
                            </div>
                        </div>
                    
                    ";
                }else{
                    echo '
                        <div class="d-flex align-items-baseline" style="gap: 0.5rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                            Choose a song
                        </div>';
                }
                ?>
            </a>
        </section>

        <footer class="d-flex flex-row-reverse mt-3">

            <span class="text-secondary" id="nextArrow" onclick="goToConfirm()"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                </svg></span>
        </footer>

    </main>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="js/moodPage.js"></script>

</body>

</html>