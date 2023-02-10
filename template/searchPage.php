<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>Document</title>

    <style>
        button {
            font-size: 0.8rem;
        }

        .album-cover {
            width: 10%;
            min-width: 80px;
            height: auto;
            margin-right: 0.5rem;
        }

        .profile-pic {
            border-radius: 50%;
            width: 60px;
            height: 60px;
            object-fit: cover;
            margin-right: 1rem;
        }

        @media screen and (min-width: 600px) {

            main {
                max-width: 600px;
                margin: 0 auto;
            }

        }
    </style>
</head>

<body theme="<?php echo $_COOKIE["theme"]?>">
    <main>
        <header class="m-4">
            <form action="">
                <input type="text" class="form-control" placeholder="Search">
            </form>
            <div class="d-flex justify-content-around py-3 border-bottom">
                <button class="sl-btn primary elevation-1" onclick="setSearch('user',this)">users</button>
                <button class="sl-btn secondary elevation-1" onclick="setSearch('album', this)">albums</button>
                <button class="sl-btn secondary elevation-1" onclick="setSearch('artist', this)">artists</button>
                <button class="sl-btn secondary elevation-1" onclick="setSearch('track', this)">songs</button>

            </div>
        </header>

        <section>
            <div id="results" class="mx-3"></div>
        </section>
    </main>

    <?php require("template/footerElement.php") ?>

    <script src="js/searchPage.js"></script>
</body>

</html>