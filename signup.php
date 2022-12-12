<?php
// processing is done at the top 
require 'functions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // just to check input has been received 
  // print_r($_POST);

  // saving the data sent from user into variables 
  // addslashes helps prevent problems if username contains an apostrophe
  $email = $_POST['email'];
  $password = $_POST['password'];

  //query into the db
  $query = "insert into users (email,password) values('$email','$password')";

  $result = mysqli_query($con, $query);


  // redirects you to login page 
  header("Location: login.php");
  die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Page</title>
</head>
<body>

<?php require "header.php";?>

<h1> SIGN UP </h1>
<form method ='post'>
  <input type = 'email' name = 'email' required ><br>
  <input type = 'password' name = 'password' required><br>

  <button>SignUp</button>

</form>


  
</body>
</html>
