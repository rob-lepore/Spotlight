<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <link rel="stylesheet" href="css/styles.css">
        <title><?php echo $templateParams["title"]?></title>

    </head>


    <body theme="<?php echo $_COOKIE["theme"]?>">
        <div class="d-flex flex-row justify-content-center mb-3 elevation-1">
            <h1>Notifications</h1>
        </div>
        <main class="container">
        <?php 
            foreach($data as $templateParams){
                require('notificationElement.php');
            }
            $templateParams["title"] = "notifications";
        ?>
        </main>
        <?php require("template/footerElement.php") ?>
        <script src="/Spotlight/js/notificationPage.js"></script>
    </body>

</html>