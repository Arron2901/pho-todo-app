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
  <link rel = 'stylesheet' href = '/css/login.css'>
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Alata&family=Assistant:wght@500&family=Concert+One&display=swap" rel="stylesheet">
</head>
<body>

<?php require "header.php";?>
<section class = 'loginContainer'>

<h1> SIGN UP </h1>
<form  class ='inputContainer' method ='post'>
  <input class = 'inputBox' type = 'email' placeholder = "E-mail" name = 'email' required ><br>
  <input class = 'inputBox' type = 'password' placeholder = "Password" name = 'password' required><br>

  <button class = 'submitBtn'>SignUp</button>

</form>
</section>


  
</body>
</html>
