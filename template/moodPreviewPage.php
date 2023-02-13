<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/gradients.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <title>Document</title>

    <style>
        body {
            background-color: var(--list-item-bg);
            margin: 0;
        }

        [id^=emo] {
            border-radius: 50%;
            aspect-ratio: 1;
            width: fit-content;
            height: auto;

        }

        .album-cover {
            width: 10%;
            min-width: 100px;
            height: auto;
            margin-right: 0.8rem;
        }
    </style>
</head>

<body theme="<?php echo $_COOKIE["theme"]?>" style="height:90vh; display:flex">

    <main style="margin: auto">
        <div class='d-flex my-2 align-items-center elevation-1 mx-auto p-3' id="card" style="border-radius: 10px;  width:90%" onclick="changeGradient()">
            <img class='album-cover' src=<?php echo $track->album->images[0]->url ?> alt="album cover">
            <div class="overflow-hidden d-block">
                <span>feeling <?php echo $emo ?></span>
                <br>
                <span class="text-truncate headline-large"><?php echo $track->name ?></span class="text-truncate">
                <br>
                <span class="text-truncate title-large"><?php echo $track->artists[0]->name ?></span class="text-truncate">
            </div>
        </div>

        <footer class="mt-5 mx-auto" style="width: fit-content;">
            <button class="sl-btn secondary me-2" onclick="cancel()">Cancel</button>
            <button class="sl-btn primary elevation-2" onclick="publishMood('<?php echo $_GET['id'] ?>','<?php echo $emo?>')">Publish!</button>
        </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        let currentGradient = 0;

        window.sessionStorage.clear();

        $("#card").addClass("gradient-0")

        function changeGradient() {
            $("#card").removeClass("gradient-" + currentGradient);
            currentGradient = (currentGradient + 1) % 5;
            $("#card").addClass("gradient-" + currentGradient);

        }

        function cancel() {
            location.href = "./";
        }

        function publishMood(song, emoji) {
            $.ajax({
                url: 'createMood.php',
                type: 'POST',
                data: {
                    song: song,
                    emoji: emoji,
                    gradient: currentGradient
                },
                success: function(response) {
                    location.href = "./";
                }
            });
        }
    </script>

</body>

</html>