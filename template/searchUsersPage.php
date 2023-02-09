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
    <title><?php echo $templateParams["title"]?></title>

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
    <button onclick="history.back()" class="btn overlayBackground ov-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
            </svg>
    </button>
    <main id="<?php echo $templateParams["user"]?>">
        <header class="m-4">
            <input type="text" class="form-control" placeholder="Search">
            <div class="d-flex justify-content-around py-3 border-bottom">
                <button class="sl-btn primary elevation-1" onclick="setSearch('Follower',this)">Follower</button>
                <button class="sl-btn secondary elevation-1" onclick="setSearch('Following', this)">Following</button>
                <?php if($templateParams["isfriend"] || $templateParams["user"] == $_COOKIE["username"]):?>
                <button class="sl-btn secondary elevation-1" onclick="setSearch('Friend', this)">Friend</button>
                <?php endif;?>
            </div>
        </header>

        <section>
            <div id="results" class="mx-3"></div>
        </section>
    </main>

    <?php require("template/footerElement.php") ?>

    <script src="js/searchUsersPage.js"></script>
</body>

</html>