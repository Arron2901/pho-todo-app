<?php
// processing is done at the top 
require 'functions.php';

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // just to check input has been received 
  // print_r($_POST);

  // saving the data sent from user into variables 
  // addslashes helps prevent problems if username contains an apostrophe
  // $name = $_POST['name'];
  // $email = $_POST['email'];
  // $password = $_POST['password'];

  // $validationQuery = "SELECT * FROM `users` WHERE `email` = '$email'";
  // $runValidation = mysqli_query($con, $validationQuery);

  // if(mysqli_num_rows($runValidation)> 0){
  //   echo "<script>";
  //   echo 'alert("Account already exists with that email");';
  //   // echo "window.location = 'signup.php';";
  //   echo "</script>";
  // } else {
  //     $query = "insert into users (name,email,password) values('$name','$email','$password')";
    // $result = mysqli_query($con, $query);
      //  header("Location: login.php");
      //  die;}


  if($_SERVER['REQUEST_METHOD'] == 'POST'){

  // before inserting into db, validate to see if account exists. 
  $validationQuery = "SELECT * FROM `users` WHERE `email` = ?";
  // Prepare an insert statement
  $selectStmt = $con ->prepare($validationQuery);

  // Bind variables to the prepared statement as parameters
  $selectStmt ->bind_param("s", $email);

  //set parameters
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  //execute the prepared statement
  $selectStmt-> execute();
  $validationResult = $selectStmt-> get_result();

    if(mysqli_num_rows($validationResult)> 0){
    echo "<script>";
    echo 'alert("Account already exists with that email");';
    // echo "window.location = 'signup.php';";
    echo "</script>";
  } else {

       $insertQuery = "INSERT INTO users (name, email, password) VALUES (?,?,?)";
       $insertStmt= $con->prepare($insertQuery);
       $insertStmt->bind_param("sss", $name,  $email, $password);
       $result = $insertStmt->execute();
      //  $resultStore = $result->fetch_assoc();
       header("Location: login.php");
       die;}

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