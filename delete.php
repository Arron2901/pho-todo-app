<?php
    require "functions.php";

    $todoName = $_POST['todo_name'];

    $selectedTodo = "DELETE FROM `todo` WHERE `Todo` = '$todoName';";
    $sqlQuery = mysqli_query($con, $selectedTodo);
    

    header("Location: index.php");
?>