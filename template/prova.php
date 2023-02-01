<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/Spotlight/css/styles.css">
    <link rel="stylesheet" href="/Spotlight/css/sliding_bar.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title><?php echo $templateParams["title"] ?></title>
</head>

<body theme="light" class="container">
    <div class="top-navigation">
        <div class="active-link"></div>
            <a class = "top-links active" data-value = "Posts" href="#">Posts</a> 
            <a class = "top-links" data-value = "Reviews" href="#">Reviews</a>
    </div>


    <script src="/Spotlight/js/sliding_bar.js"></script>
</body>

</html>