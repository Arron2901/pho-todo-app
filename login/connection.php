<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
// whenever this file is required a session will start automatically. 
session_start();

// establish a connection with the database 
// $con = mysqli_connect('localhost','root','','todoprojectdb');
$con = new mysqli('localhost','root','','todoprojectdb');