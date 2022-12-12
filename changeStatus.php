<?php
    require "./login/functions.php";

    $todoName = $_POST['todo_name'];

    $selectedTodo = "SELECT completed FROM `todos` WHERE `todo` = '$todoName';";
    $sqlQuery = mysqli_query($con, $selectedTodo);
    $final = mysqli_fetch_assoc($sqlQuery);


    if ($final['completed'] == 0) {
        $completedQuery = "UPDATE `todos` SET `completed`= 1 WHERE `todo` = '$todoName'";
        $sqlCompletedQuery = mysqli_query($con, $completedQuery);
    } else {
        $uncompletedQuery = "UPDATE `todos` SET `completed`= 0 WHERE `todo` = '$todoName'";
        $sqlUncompletedQuery = mysqli_query($con, $uncompletedQuery);
    }

    header('Location: todo.php')
?>