<?php


// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'artistogram');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$categ='Artist';
$sql = "SELECT fname,lname,phno,email,photo,cate,address,details FROM register where category='Artist' and cate='Singer'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $fname = $row["fname"]; 
    $lname = $row["lname"];
    $phno = $row["phno"];
    $email = $row["email"];
    $photo = $row["photo"];
    $cate = $row["cate"];
    $address = $row["address"];
    $details = $row["details"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="display.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artist display</title>
    <style>
      .nav-item{
    float: right;
    }
    nav{
    background-color: black;
    }
    .row{
      padding-top: 60px;
    }
    html , body{
    overflow-x: hidden;
}

body{
    position: relative;
}
.card {
    /* Add shadows to create the "card" effect */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
  }
  
  /* On mouse-over, add a deeper shadow */
  .card:hover {
    box-shadow: 0 8px 16px 0 rgba(3, 1, 3, 0.979);
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
                        <li class="nav-item"><a class="nav-link" href="./home.php" >Home</a></li>
                        <li class="nav-item active"><a class="nav-link" href="./category.html">Artist</a></li>
                        <li class="nav-item"><a class="nav-link" href="./about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?logout='1'">Logout</a></li>
                    </ul>
                </div>            
            </div>
        </nav>
<div class="row offset-md-4">

    <div class="column col-md-6">
    <div class="card">
            <img src="images/my photo.jpg"  alt="banner" style="width:100%"></a>
       <div class="container">
         <center>
          <h5><b>Name : <?php echo $fname." ".$lname ?></b></h5>
          <p><b>Phone : </b><a href="<?php echo $phno ?>"><?php echo $phno ?></a></p>
          <p><b>Email: </b><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
          <p><b>category :</b> <?php echo $cate ?> </p>
          <p><b>Details:</b> <?php echo $details ?></p>
</center>
       </div>
      </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>   
</body>
</html>
  <?php
}
} else {
  echo "0 results";
}
$conn->close();
?>

