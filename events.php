<?php
session_start();

// initializing variables
$banner    = "";
$ename  = "";
$date  = "";
$venue = "";
$time     = "";
$others = "";


$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'artistogram');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $banner = mysqli_real_escape_string($db, $_POST['banner']);
  $ename = mysqli_real_escape_string($db, $_POST['ename']);
  $date = mysqli_real_escape_string($db, $_POST['date']);
  $venue = mysqli_real_escape_string($db, $_POST['venue']);
  $time = mysqli_real_escape_string($db, $_POST['time']);
  $others = mysqli_real_escape_string($db, $_POST['others']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($banner)) { array_push($errors, "Please attach a Poster"); }
  if (empty($ename)) { array_push($errors, "Event name is required"); }
  if (empty($date)) { array_push($errors, "Date is required"); }
  if (empty($venue)) { array_push($errors, "Address are required"); }
  if (empty($time)) { array_push($errors, "Time is required"); }
  if (empty($others)) { array_push($errors, "Details are required"); }


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  if (count($errors) == 0) {//encrypt the password before saving in the database

$query = "INSERT INTO events (banner,ename,date,venue,time,others) 
  			  VALUES('$banner','$ename','$date', '$venue','$time','$others')";
  	mysqli_query($db, $query);
  	$_SESSION['success'] = "Profile Successfully added ";
  	header('location: home1.php');
  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Event Details</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
  .header{
	  padding-top:80px;
  }
  .nav-item{
    float: right;
    }
    nav{
    background-color: black;
    }

  </style>
</head>
<body >
<nav class="navbar navbar-dark navbar-expand-sm  fixed-top">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
               <a class="navbar-brand" href="#">Artistogram</a>
               <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="./home1.php" >Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="./category1.html">Artist</a></li>
                        <li class="nav-item active"><a class="nav-link" href="./events.php">New Event</a></li>
                        <li class="nav-item"><a class="nav-link" href="./about1.html">About</a></li>
                    </ul>
                </div>            
            </div>
        </nav>
  <form method="post" action="events.php" class="container offset-md-2">
  <div class="header">
  	<h2>Event Details</h2>
  </div>
  	<?php include('errors.php'); ?>
    <div class="form-group row">
      <label class="col-md-2 col-form-label"><b>Poster</b> </label>
      <div class="col-md-6">
      <input type="file" name="banner"  placeholder="Attach a Poster" value="<?php echo $banner; ?>">
</div>
  	</div>
    <div class="form-group row">
      <label class="col-md-2 col-form-label"><b>Event Name</b></label>
      <div class="col-md-6">
      <input type="text" name="ename" class="form-control" placeholder="Enter the Event name " value="<?php echo $ename; ?>">
</div>
  	</div>
    <div class="form-group row">
      <label class="col-md-2 col-form-label"><b>Date</b> </label>
      <div class="col-md-6">
      <input type="date" name="date" class="form-control" placeholder="Enter the Event Date" value="<?php echo $date; ?>">
</div>
  	</div>   
      <div class="form-group row">
      <label class="col-md-2 col-form-label"><b>Venue </b></label>
      <div class="col-md-6">
      <input type="text" name="venue" class="form-control" placeholder="Enter the Event Venue" value="<?php echo $venue; ?>">
</div>
  	</div>   
      <div class="form-group row">
      <label class="col-md-2 col-form-label"><b>Time</b> </label>
      <div class="col-md-6">
      <input type="time" name="time" class="form-control" placeholder="Enter the Event Time" value="<?php echo $time; ?>">
</div>
  	</div>   
    <div class="form-group row">
      <label class="col-md-2 col-form-label"><b>Other Details </b></label>
      <div class="col-md-6">
      <input type="text" name="others" class="form-control" placeholde="Payment,ticket booking details "value="<?php echo $others; ?>">
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
</body>
</html>