<?php
    require "./login/functions.php";

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //print_r($todoName);
        $todoName = $_POST['todo_name'];
        $updatedTodo = $_POST['updatedTodo'];

        $validationQuery = "SELECT * FROM todos where todo = '$updatedTodo'";
        $runValidation = mysqli_query($con, $validationQuery);

        if (mysqli_num_rows($runValidation) > 0) {
            echo "<script>";
            echo 'alert("To-do already exists!");';
            echo "window.location = 'todo.php';";
            echo "</script>";
        } else {
            $updateQuery = "UPDATE `todos` SET `todo` = '$updatedTodo' WHERE `todo` = '$todoName'";
            $sqliRun = mysqli_query($con, $updateQuery);
            header('Location: todo.php');
        }
    };
    
?>