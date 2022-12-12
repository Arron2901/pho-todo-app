<?php
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
    header("Location: todo.php");
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
</head>
<body>

<?php require "header.php";?>

<h1>LOGIN </h1>
<form method ='post'>
  <input type = 'text' name = 'email' required><br>
  <input type = 'password' name = 'password' required><br>

  <button>Log In</button>

  <?php 
// if the error variable isnt empty then print the error on screen 
if(!empty($error)){
  echo "<div>".$error."</div>";
}
?>


</form>


  
</body>
</html>