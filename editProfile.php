<?php

require './login/functions.php';

 $id = $_SESSION['info']['id'];

  $getName = "SELECT name FROM `users` WHERE `id` = '$id';";
  $nameResult = mysqli_query($con, $getName);
  $nameResult = mysqli_fetch_all($nameResult);

  $getEmail = "SELECT email FROM `users` WHERE `id` = '$id';";
  $emailResult = mysqli_query($con, $getEmail);
  $emailResult = mysqli_fetch_all($emailResult);

  // $updated = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $name = $_POST['name'];
  $email = $_POST['email'];

  $validationQuery = "SELECT * FROM `users` WHERE `email` = '$email'";
  $runValidation = mysqli_query($con, $validationQuery);
  $validationResult = mysqli_fetch_all($runValidation);

  // checks for an account with the email user has entered
  if(mysqli_num_rows($runValidation)> 0){

    // compare the id of the inputted email is not the same as id currently logged in as
    if($validationResult[0][0] !== $id){
    echo "<script>";
    echo 'alert("Account already exists with that email");';
    echo "window.location = 'profile.php';";
    echo "</script>";

  } else{
    $query = "UPDATE `users` set `name` = '$name', `email` ='$email' where `id` = '$id'";
    $result = mysqli_query($con, $query);
    echo "<script>";
    echo 'alert("Account successfully updated");';
    echo "window.location = 'profile.php';";
    echo "</script>";
    }
} else{
  $query = "UPDATE `users` set `name` = '$name', `email` ='$email' where `id` = '$id'";
    $result = mysqli_query($con, $query);
    echo "<script>";
    echo 'alert("Account successfully updated");';
    echo "window.location = 'profile.php';";
    echo "</script>";
}

}



?>