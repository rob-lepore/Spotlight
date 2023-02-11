<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/sha512.js"></script>
    <script src="js/form.js"></script>
    <title><?php echo $templateParams["title"]; ?></title>
</head>

<body theme="<?php echo $_COOKIE["theme"]?>" class="container">
    <header class="container">
        <h1 class="mt-5 text-center">Spotlight</h1>
    </header>
    <main>
        <section class="row">
            <h2 class="my-3 text-center">Login</h2>
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <?php if(isset($templateParams["loginTries"])): ?>
                            <p class ="text-danger"><?php echo $templateParams["loginTries"]; ?></p>
                        <?php endif;?>
                    </div>
                </div>
		    	<form action="login_process.php" method="POST" name="login_form" class="mb-4">
			    	<div class="row mb-2">
				    	<div class="col-1"></div>
                        <div class="col-10">
                            <label for="email">Email</label><input type="text" id="email" name="email" class="form-control" required maxlength="40">
                        </div>
			    		<div class="col-1"></div>
				    </div>
				    <div class="row mb-2">
					    <div class="col-1"></div>
                        <div class="col-10">
                            <label for="password">Password</label><input type="password" id="password" name="p" class="form-control" maxlength="20">
                        </div>
			    		<div class="col-1"></div>
				    </div>
				    <div class="row">
					    <div class="col-11 text-end"> 
                            <button class="btn sl-btn primary elevation-1" onclick="formHashLogin(this.form, this.form.password);">Sign-in</button>
		    			</div>
			    		<div class="col-1"></div>
				    </div>
    			</form>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <?php if(isset($templateParams["loginError"])): ?>
                            <p class="text-warning"><?php echo $templateParams["loginError"]; ?></p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="container text-center">
        <label>New user?</label><a href="./signup.php?id=1">Sign-up</a>
    </footer>
</body>
</html>
