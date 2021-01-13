<?php
session_start();

// initializing variables
$banner     = "";
$date       = "";
$venue      = "";
$time       = "";
$organizer  = "";
$others     = "";

$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'artistogram');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $banner     = mysqli_real_escape_string($db, $_POST['image']); 
  $date       = "";
  $venue      = "";
  $time       = "";
  $organizer  = "";
  $others     = "";

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
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Artist Details</h2>
  </div>
	
  <form method="post" action="artist.php">
  	<?php include('errors.php'); ?>
    <div class="input-group">
  	  <label>Profile Photo</label>
  	  <input type="file" name="image" placeholder="Photo" value="<?php echo $photo; ?>">
  	</div>
    <div class="input-group">
  	  <label>Category</label>
  	  <input type="text" name="cate" value="<?php echo $cate; ?>">
  	</div>
    <div class="input-group">
  	  <label>Address </label>
  	  <input type="text" name="address" value="<?php echo $address; ?>">
  	</div>   
    <div class="input-group">
      <label>Other Details </label>
  	  <input type="text" name="details"value="<?php echo $details; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Submit</button>
  	</div>
  </form>
</body>
</html>