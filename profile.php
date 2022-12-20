<?php

require './login/functions.php';
// require 'editProfile.php';

 $id = $_SESSION['info']['id'];

  $getName = "SELECT name FROM `users` WHERE `id` = '$id';";
  $nameResult = mysqli_query($con, $getName);
  $nameResult = mysqli_fetch_all($nameResult);

  $getEmail = "SELECT email FROM `users` WHERE `id` = '$id';";
  $emailResult = mysqli_query($con, $getEmail);
  $emailResult = mysqli_fetch_all($emailResult);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
  <link rel = 'stylesheet' href = '/css/login.css'>
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Alata&family=Assistant:wght@500&family=Concert+One&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>

<?php require "./login/header.php";?>

<section class = 'loginContainer'>

<form  action= 'editProfile.php' id = 'profileform' method = 'post' >

  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" name = 'name' class="form-control" id="exampleFormControlInput1" value = '<?php echo $nameResult[0][0] ?>' >
  </div>


  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" name = 'email' class="form-control" id="exampleFormControlInput1" value = '<?php echo $emailResult[0][0] ?>' required>
  </div>

    <div class="form-group">
    <label for="exampleFormControlInput1">Add/Edit profile pic</label>
    <input name = 'profilePic' type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>

    <button class = 'submitBtn'>Save Changes</button>



</form>

</section>


  
</body>
</html>