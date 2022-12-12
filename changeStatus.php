<?php
    require "functions.php";

    $todoName = $_POST['todo_name'];

    $selectedTodo = "SELECT completed FROM `todo` WHERE `Todo` = '$todoName';";
    $sqlQuery = mysqli_query($con, $selectedTodo);
    $final = mysqli_fetch_assoc($sqlQuery);


    if ($final['completed'] == 0) {
        $completedQuery = "UPDATE `todo` SET `completed`= 1 WHERE `Todo` = '$todoName'";
        $sqlCompletedQuery = mysqli_query($con, $completedQuery);
    } else {
        $uncompletedQuery = "UPDATE `todo` SET `completed`= 0 WHERE `Todo` = '$todoName'";
        $sqlUncompletedQuery = mysqli_query($con, $uncompletedQuery);
    }

    header('Location: index.php')
?>