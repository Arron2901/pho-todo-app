<?php

// whenever this file is required a session will start automatically. 
session_start();
// establish a connection with the database 
$con = mysqli_connect('localhost','root','','project_db');