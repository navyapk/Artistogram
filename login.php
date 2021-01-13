<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Log In</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
	 
  <form method="post" action="login.php" class="container">
  <div class="header">
  	<h2>Login</h2>
  </div>
  	<?php include('errors.php'); ?>
  	<div class="form-group row">
		  <label class="col-md-2 col-form-label"><b>Username</b></label>
		  <div class="col-md-6">
		  <input type="text" class="form-control" name="username" >
</div>
  	</div>
  	<div class="form-group row">
		  <label class="col-md-2 col-form-label"><b>Password</b></label>
		  <div class="col-md-6">
		  <input type="password" class="form-control" name="password">
</div>
  	</div>
  	<div class="form-group row">
	  <div class="offset-md-2 col-md-10">
		  <button type="submit" class="btn btn-success button" name="login_user">Login</button>
</div>
	  </div>
	  <div class="form-group row">
  	<p><b>
	  <div class="offset-md-2 col-md-10">
		  Not yet a member?</b> <a href="register.php">Sign up</a>
</div>
	  </p>
</div>
  </form>
</body>
</html>