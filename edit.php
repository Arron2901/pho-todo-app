<?php
    require "./login/functions.php";

    
    //
    // $selectedTodo = "DELETE FROM `todos` WHERE `todo` = '$todoName';";
    // $sqlQuery = mysqli_query($con, $selectedTodo);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //print_r($todoName);
        $todoName = $_POST['to-dos'];
        $updatedTodo = $_POST['updatedTodo'];
        $updatedTodo = trim($updatedTodo);
        

        // $updateQuery = "UPDATE `todos` SET `todo` = '$updatedTodo' WHERE `todo` = '$todoName'";
        // $sqliRun = mysqli_query($con, $updateQuery);
        // header('Location: todo.php');

        $validationQuery = "SELECT * FROM todos where todo = '$updatedTodo'";
        $runValidation = mysqli_query($con, $validationQuery);

        if (mysqli_num_rows($runValidation) > 0) {
            echo "<script>";
            echo 'alert("To-do already exists!");';
            echo "window.location = 'todo.php';";
            echo "</script>";
        } else if (!$updatedTodo) {
            echo "<script>";
            echo 'alert("Cannot have blank To-do!");';
            echo "window.location = 'todo.php';";
            echo "</script>";
        } else {
            $updateQuery = "UPDATE `todos` SET `todo` = '$updatedTodo' WHERE `todo` = '$todoName'";
            $sqliRun = mysqli_query($con, $updateQuery);
            header('Location: todo.php');
        }
    };
    
?>