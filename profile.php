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

<?php require  "./css/html.php";?>
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

    <button class = 'submitBtn'>Save Changes</button>

</form>

</section>
 
</body>
</html>