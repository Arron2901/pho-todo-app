<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require 'login.php';
    header("Location: ./login.php");
    session_destroy();
    // unset($_SESSION['info']);
    die;