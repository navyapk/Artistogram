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
</head>
<body >
<div class="row">
    <div class="column col-md-3">
    <div class="card">
            <img src="images/my photo.jpg"  alt="artist photo" style="width:100%"></a>
       <div class="container">
       <table>
            <tr>
            <td rowspan = "3"><?php echo $photo ?></td><td colspan='2'><?php echo $address ?></td>
            </tr>
            <tr>
            <td ><?php echo $phno ?></td><td ><?php echo $email ?></td>
            </tr>
            <tr>
            <td colspan='2'><?php echo $cate ?></td>
            </tr>
            <tr>
            <td><h4><b><?php echo $fname." ".$lname ?></b></h4></td><td  colspan='2'><?php echo $details ?></td>
            </tr>
        </table>

          
       </div>
      </div>
    </div>
    </div>   
</body>
</html>
  <?php
}
} else {
  echo "0 results";
}
$conn->close();
?>

