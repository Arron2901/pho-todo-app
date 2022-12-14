<?php
    require "./login/functions.php";

    
    //
    // $selectedTodo = "DELETE FROM `todos` WHERE `todo` = '$todoName';";
    // $sqlQuery = mysqli_query($con, $selectedTodo);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //print_r($todoName);
        $todoName = $_POST['to-dos'];
        $updatedTodo = $_POST['updatedTodo'];
        

        $updateQuery = "UPDATE `todos` SET `todo` = '$updatedTodo' WHERE `todo` = '$todoName'";
        $sqliRun = mysqli_query($con, $updateQuery);
        header('Location: todo.php');
    };
    
?>