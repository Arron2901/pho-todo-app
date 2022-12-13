<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
// processing is done at the top 
require 'functions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // just to check input has been received 
  // print_r($_POST);

  // saving the data sent from user into variables 
  // addslashes helps prevent problems if username contains an apostrophe
  $email = addslashes($_POST['email']);
  $password = $_POST['password'];

  //query that searches the database for user based on details given  
  $query = "select * from users where email = '$email' && password = '$password' limit 1";

  // storing the result of the query in a variable 
  $result = mysqli_query($con, $query);

  //if result is true (> 0, user exists) then redirect else error 
  if(mysqli_num_rows($result)> 0){

    // Fetches one row of data from the result set and returns it as an associative array
    $row = mysqli_fetch_assoc($result);

    // saves the users info, allows it to be used on allpages throughout the session.
    $_SESSION['info'] = $row;
    //print_r($row);
    header("Location: ../todo.php");
    die;
    
  } else {
    $error = "wrong email/password";
  }
}
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In Page</title>
  <link rel = 'stylesheet' href = '/css/login.css'>
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Alata&family=Assistant:wght@500&family=Concert+One&display=swap" rel="stylesheet">

</head>
<body>

<?php require "header.php";?>
<section class = 'loginContainer'>

<h1>LOGIN </h1>
  <form  class ='inputContainer' method ='post'>
  <input class = 'inputBox' type = 'text' placeholder = "E-mail:" name = 'email' required><br>
  <input class = 'inputBox' type = 'password' placeholder = "Password:" name = 'password' required><br>

  <button class = 'submitBtn'>Log In</button>

  <?php 
// if the error variable isnt empty then print the error on screen 
if(!empty($error)){
  echo "<div>".$error."</div>";
}
?>
</form>

</section>


  
</body>
</html>