<?php
session_start();

// initializing variables
$username = "";
$fname    = "";
$lname    = "";
$phno     = "";
$email    = "";
$category = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'artistogram');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $phno = mysqli_real_escape_string($db, $_POST['phno']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $category=mysqli_real_escape_string($db, $_POST['category']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($fname)) { array_push($errors, "FirstName is required"); }
  if (empty($lname)) { array_push($errors, "Lastame is required"); }
  if (empty($phno)) { array_push($errors, "Phone No is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($category)) { array_push($errors, "Category is required"); }
  
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM register WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {//encrypt the password before saving in the database

  	$query = "INSERT INTO register (username,fname,lname,phno, email, password, category) 
  			  VALUES('$username','$fname','$lname','$phno', '$email', '$password_1', '$category')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {

    $cate1='User';
  	$query = "SELECT * FROM register WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);
  	if (mysqli_num_rows($results) == 1) {
      if($user['category']===$cate1){
      header('location: home.php');
      }
      else{
        header('location: home1.php');
      }
    }
    
    else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>