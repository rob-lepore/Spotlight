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

<body theme="light" class="container">
    <header class="container">
        <a class ="text-decoration-none text-reset" href="./login.php?id=1"><h1 class="mt-5 text-center">Spotlight</h1></a>
    </header>
    <main>
        <section class="row">
            <h2 class="my-3 text-center">Sign up</h2>
            <div class="col-md-1"></div>
            <div class="col-md-10">
		    	<form action="signUp_process.php" method="POST" name="signup_form" class="mb-4" enctype="multipart/form-data">
			    	<div class="row mb-2">
				    	<div class="col-1"></div>
                        <div class="col-10">
                            <label for="username">Username</label><input type="text" id="username" name="username" class="form-control" required maxlength="15">
                        </div>
			    		<div class="col-1"></div>
				    </div>
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
                    <div class="row mb-2">
				    	<div class="col-1"></div>
                        <div class="col-10">
                            <label for="first_name">First name</label><input type="text" id="first_name" name="first_name" class="form-control" required maxlength="20">
                        </div>
			    		<div class="col-1"></div>
				    </div>
                    <div class="row mb-3">
				    	<div class="col-1"></div>
                        <div class="col-10">
                            <label for="last_name">Last name</label><input type="text" id="last_name" name="last_name" class="form-control" required maxlength="20">
                        </div>
			    		<div class="col-1"></div>
				    </div>
                    <div class="row mb-2">
				    	<div class="col-1"></div>
                        <div class="col-10">
                            <label for="propic">Profile Picture</label><input type="file" name="propic" id="propic">
                        </div>
			    		<div class="col-1"></div>
				    </div>
				    <div class="row">
					    <div class="col-11 text-end">
                            <input type="submit" id="submit" class="btn btn-sm primary elevation-1" value="Create a new account" onclick="formHashSignup(this.form, this.form.password);">
		    			</div>
			    			<div class="col-1"></div>
				    </div>
                </form>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <?php if(isset($templateParams["signupError"])): ?>
                            <p class="text-warning"><?php echo $templateParams["signupError"]; ?></p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>