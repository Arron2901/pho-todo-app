<?php

require_once 'functions.php';

if($_SESSION){
  echo "<header>
  <nav class = 'navBar'>
    <a class = 'pageName' href = '../todo.php'>Home </a>
    <a class = 'pageName' href = 'login/logout.php'>Logout </a>
    </nav>
<header>";
} else{
  echo "<header>
  <nav class = 'navBar'>
    <a class = 'pageName' href = '../todo.php'>Home </a> 
    <a class = 'pageName' href = '/login/login.php'>Login </a>
    <a class = 'pageName' href = '/login/signup.php'>Sign Up</a>
</nav>
<header>";
}
?>


<!-- <header>
  <nav class = 'navBar'>
    <a class = 'pageName' href = '../todo.php'>Home </a> 
    <a class = 'pageName' href = '/login/login.php'>Login </a>
    <a class = 'pageName' href = '/login/signup.php'>Sign Up</a>
</nav>
<header> -->