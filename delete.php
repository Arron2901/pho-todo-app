<?php
    require "./login/functions.php";

    $todoName = $_POST['todo_name'];

    $selectedTodo = "DELETE FROM `todos` WHERE `todo` = '$todoName';";
    $sqlQuery = mysqli_query($con, $selectedTodo);
    

    header("Location: todo.php");
?>