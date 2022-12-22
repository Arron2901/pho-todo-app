<?php

require_once 'functions.php';


if($_SESSION){

     if(time()-$_SESSION["login_time_stamp"] > 1000 ) 
    {
        session_unset();
        session_destroy();
        header("Location: ../login/login.php");
    } else{
      echo "<header>
  <nav class = 'navBar'>
      <a class = 'siteName' href = './login/index.php'>Echo</a>

      <div class = 'navLinks'> 
        <a class = 'pageName' href = '../login/logout.php'>Logout </a>
        <a class = 'pageName' href = '../profile.php'>My Profile</a>
        <a class = 'pageName' href = '../todo.php'>Home</a>
      </div>
  </nav>
<header>";

    }
//   echo "<header>
//   <nav class = 'navBar'>
//       <a class = 'siteName' href = './login/index.php'>Echo</a>

//       <div class = 'navLinks'> 
//         <a class = 'pageName' href = '../login/logout.php'>Logout </a>
//         <a class = 'pageName' href = '../profile.php'>My Profile</a>
//         <a class = 'pageName' href = '../todo.php'>Home</a>
//       </div>
//   </nav>
// <header>";
} else{
  echo "<header>
  <nav class = 'navBar'>
      <a class = 'siteName' href = '/login/index.php'>Echo</a>

  <div class = 'navLinks'> 
    <a class = 'pageName' href = '/login/login.php'>Login </a>
    <a class = 'pageName' href = '/login/signup.php'>Sign Up</a>
    </div>
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