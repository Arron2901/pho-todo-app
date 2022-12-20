<?php
// processing is done at the top 
require 'functions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // just to check input has been received 
  // print_r($_POST);

  // saving the data sent from user into variables 
  // addslashes helps prevent problems if username contains an apostrophe
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $validationQuery = "SELECT * FROM `users` WHERE `email` = '$email'";
  $runValidation = mysqli_query($con, $validationQuery);

  if(mysqli_num_rows($runValidation)> 0){
    echo "<script>";
    echo 'alert("Account already exists with that email");';
    // echo "window.location = 'signup.php';";
    echo "</script>";
  } else {
      $query = "insert into users (name,email,password) values('$name','$email','$password')";

  $result = mysqli_query($con, $query);


  // redirects you to login page 
  header("Location: login.php");
  die;

  }
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
    <input class = 'inputBox' type = 'text' placeholder = "Full Name" name = 'name' required ><br>
  <input class = 'inputBox' type = 'email' placeholder = "E-mail" name = 'email' required ><br>
  <input class = 'inputBox' type = 'password' placeholder = "Password" name = 'password' required><br>

  <button class = 'submitBtn'>SignUp</button>

</form>

<section class = 'otherOptions'>
  <a href= '/login/login.php'>Already a User ?</a>

</section>


  
</body>
</html>
