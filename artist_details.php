<?php  
 $connect = mysqli_connect("localhost", "root", "", "artistogram");  
 if(isset($_POST["submit"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO tbl_images(name) VALUES ('$file')";  
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  
 }  
 ?>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Artist details</title>
</head>
<body>
<div class="bg-img offset-md-3">
  <form class="container">
    <h2>Artist Details</h2><br>
    <div class="form-group row">
    <label for="header" class="col-md-2 col-form-label "><b>  Profile Photo:</b></label>
        <div class="col-md-5">
            <input id="image"  type="file" name="profile_photo" placeholder="Photo" required="" capture>
        </div>
    </div>
    <div class="form-group row">
        <label for="cate" class="col-md-2 col-form-label"><b>Categories:</b></label>
          <div class="col-md-5">
          <select type="text" id="category" name="cat" class="select form-control" value="<?php echo $category; ?>">
		
        <option id="Dancer" value="User">Dancer</option>
        <option id="Singer" value="Artist">Singer</option>
        <option id="Instrument" value="Organizer">Instrument</option>
      </select>
            
          </div>
        </div>
    <div class="form-group row">
    <label for="addr" class="col-md-2 col-form-label"><b>Address:</b></label>
        <div class="col-md-5">
            <textarea class="form-control" placeholder="Enter Address" name="addr" rows="4"  required></textarea>
        </div>
    </div>
    
    

    <div class="form-group row">
    <label for="textarea" class="col-md-2 col-form-label"><b>Discription:</b></label>
      <div class="col-md-5">
        <textarea class="form-control" placeholder="Enter Discription" name="addr" rows="4"  required></textarea>
      </div>
    </div>  
    <div class="form-group row">
        <div class="offset-md-2 col-md-10">
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </div>
    </div>
  
  </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>