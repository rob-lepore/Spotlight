<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title><?php echo $templateParams["title"]; ?></title>
</head>

<body theme="light" class="container">
    <header class="container">
        <h1 class="mt-5 text-center">Spotlight</h1>
    </header>
    <main>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-12 col-md-6">
		    	<form action="#" method="POST" id="login" class="mb-4">
			    	<div class="row mb-2">
				    	<div class="col-1"></div>
                        <div class="col-10">
                            <input type="text" id="username" name="username" class="form-control" placeholder="username/email" />
                        </div>
			    		<div class="col-1"></div>
				    </div>
				    <div class="row mb-2">
					    <div class="col-1"></div>
                        <div class="col-10">
                            <input type="password" id="password" name="password" class="form-control" placeholder="password" />
                        </div>
			    		<div class="col-1"></div>
				    </div>
				    <div class="row">
					    <div class="col-11 text-end">
                            <input type="submit" id="submit" class="btn btn-sm primary elevation-1" value="Sign-in" />
		    			</div>
			    			<div class="col-1"></div>
				    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <?php if(isset($templateParams["loginError"])): ?>
                            <div class="col-10">
                                <p><?php echo $templateParams["loginError"]; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
    			</form>
            </div>
            <div class="container">
                <div class="text-center">
                    <label>New user?</label><a href="signup.php">Sign-up</a>
                </div>
            </div>
        </div>
    </main>
</body>