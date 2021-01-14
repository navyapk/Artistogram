<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
  body{
	  padding-top:5%;
  }
  </style>
</head>
<body>
<script>      
  function checkIfYes() {
      if (document.getElementById('defect').value == 'Artist') {
        document.getElementById('extra').style.display = '';
        document.getElementById('address').disabled = false;
        document.getElementById('image').disabled = false;
		document.getElementById('details').disabled = false;
		document.getElementById('type').disabled = false;
      } else {
        document.getElementById('extra').style.display = 'none';
  }
}
</script>	
<body class="offset-md-3">
  <form method="post" action="register.php" class="container">
  <div class="header">
  	<h2>Registration</h2>
  </div>
  	<?php include('errors.php'); ?>
  	<div class="form-group row ">
  	  <label class="col-md-2 col-form-label"><b>Username</b></label>
		<div class="col-md-6">
		<input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
		</div>  
	</div>
      <div class="form-group row">
		<label class="col-md-2 col-form-label"><b>FirstName</b></label>
		<div class="col-md-6">
		<input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">
		</div>
  	</div>
      <div class="form-group row">
		<label class="col-md-2 col-form-label"><b>LastName</b></label>
		<div class="col-md-6">
		<input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
		</div>
  	</div> 
      <div class="form-group row">
		<label class="col-md-2 col-form-label"><b>Phone No.</b></label>
		<div class="col-md-6">
		<input type="text" class="form-control" name="phno" value="<?php echo $phno; ?>">
		</div>
  	</div>
  	<div class="form-group row">
		<label class="col-md-2 col-form-label"><b>Email</b></label>
		<div class="col-md-6">
		<input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
		</div>
  	</div>
  	<div class="form-group row">
		<label class="col-md-2 col-form-label"><b>Password</b></label>
		<div class="col-md-6">
		<input type="password" name="password_1" class="form-control">
		</div>
  	</div>
  	<div class="form-group row">
		<label class="col-md-2 col-form-label"><b>Confirm password</b></label>
		<div class="col-md-6">
		<input type="password" name="password_2" class="form-control">
		</div>
  	</div>
      <div class="form-group row">
		<label class="col-md-2 col-form-label"><b>Category</b></label>
		<div class="col-md-6">
		<select onchange='checkIfYes()' type="text" id="defect" name="category" class="select form-control" value="<?php echo $category; ?>">
		
      <option id="User" value="User">User</option>
	  <option id="Artist" value="Artist">Artist</option>
	  <option id="Organizer" value="Organizer">Organizer</option>
    </select>
		</div>
	  </div>
	  
<div id="extra" name="extra" style="display: none">
	<div class="form-group row">
		<label class="col-md-2 col-form-label" for="desc"><b>Profile Photo</b></label>
		<div class="col-md-6">
			<input  type="file" id="image" name="photo" required disabled>
		</div>
	</div>
	<div class="form-group row">
    <label for="cate" class="col-md-2 col-form-label"><b>Field</b></label>
      <div class="col-md-6">
        <select type="text" class="form-control" id="type" placeholder="Enter categories" name="cate" required disabled>
          
          <option value="Dancer">Dancer</option>
          <option value="Singer">Singer</option>
          <option value="Instrument">Instrument</option>
        </select>
      </div>
    </div>
	<div class="form-group row">
		<label class="col-md-2 col-form-label"><b>Address</b> </label>
		<div class="col-md-6">
		<input type="text" class="form-control" id="address" name="address" required disabled>
		</div>
  	</div>

	<div class="form-group row">
	  <label class="col-md-2 col-form-label"><b>Other Details </b></label>
	  <div class="col-md-6">
		<input type="text" class="form-control" id="details" name="details" required disabled>
		</div>
  	</div>

</div>

  	<div class="form-group row">
	  <div class="offset-md-2 col-md-10">
		<button type="submit" class="btn btn-success button" name="reg_user">Register</button>
	</div>
	  </div>
	  <div class="form-group row">
  	<p><b>
	  <div class="offset-md-2 col-md-10">
		  Already a member? </b><a href="login.php">Sign in</a>
	</div>
	  </p>
</div>
  </form>
</body>
</html>