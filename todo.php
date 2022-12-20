<?php

//require "./login/functions.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>to-do-list</title>
        <link rel = 'stylesheet' href = '/css/todo.css'>
        <link rel = 'stylesheet' href = '/css/login.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Alata&family=Assistant:wght@500&family=Concert+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php require "./login/header.php";?>

<h1 class= 'pageTitle' >To do list</h1>

<?php require "./todoPage.php" ?>

  
</body>
</html>







