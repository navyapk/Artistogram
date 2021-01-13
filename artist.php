<?php 
session_start();

// initializing variables
$photo    = "";
$address  = "";
$details  = "";
$cate     = "";

$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'artistogram');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $photo = mysqli_real_escape_string($db, $_POST['image']);
  $cate = mysqli_real_escape_string($db, $_POST['cate']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $details = mysqli_real_escape_string($db, $_POST['details']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($photo)) { array_push($errors, "Please attach a photo"); }
  if (empty($cate)) { array_push($errors, "Category is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($details)) { array_push($errors, "Details are required"); }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  if (count($errors) == 0) {//encrypt the password before saving in the database

$query = "INSERT INTO artist (photo,cate,address,details) 
  			  VALUES('$photo','$cate','$address', '$details')";
  	mysqli_query($db, $query);
  	$_SESSION['success'] = "Profile Successfully added ";
  	header('location: home.php');
  }
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Artist Details</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
  
	
  <form method="post" action="artist.php" class="container">
  <div class="header">
  	<h2>Artist Details</h2>
  </div>
  	<?php include('errors.php'); ?>
    <div class="form-group row">
		<label class="col-md-2 col-form-label">Profile Photo</label>
		<div class="col-md-6">
		<input type="file"  name="image" placeholder="Photo" value="<?php echo $photo; ?>">
</div>
  	</div>
    <div class="form-group row">
		<label class="col-md-2 col-form-label">Category</label>
		<div class="col-md-6">
		<select type="text" class="form-control selectpicker"multiple  name="cate" value="<?php echo $cate; ?>">
		
                <option value="one">one</option>
                <option value="two">two</option>
                <option value="three">three</option>
            </select>
</div>
  	</div>
    <div class="form-group row">
		<label class="col-md-2 col-form-label">Address </label>
		<div class="col-md-6">
		<input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
</div>
  	</div>   
    <div class="form-group row">
	  <label class="col-md-2 col-form-label">Other Details </label>
	  <div class="col-md-6">
		<input type="text" class="form-control" name="details"value="<?php echo $details; ?>">
</div>
  	</div>
  	<div class="form-group row">
	  <div class="offset-md-2 col-md-10">
		<button type="submit" class="btn btn-success button" name="reg_user">Submit</button>
</div>
  	</div>
  </form>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
</body>
</html>