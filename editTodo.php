<?php
    require "./login/functions.php";

    
    //
    // $selectedTodo = "DELETE FROM `todos` WHERE `todo` = '$todoName';";
    // $sqlQuery = mysqli_query($con, $selectedTodo);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //print_r($todoName);
        $id = $_SESSION['info']['id'];
        $todoName = $_POST['to-dos'];
        $updatedTodo = $_POST['updatedTodo'];
        $updatedTodo = trim($updatedTodo);
        
        $todoCategory = addslashes($_POST['categoryName']);
        $todoCategory = trim($todoCategory);

        $dueDate = $_POST['dueDate'];

        // $updateQuery = "UPDATE `todos` SET `todo` = '$updatedTodo' WHERE `todo` = '$todoName'";
        // $sqliRun = mysqli_query($con, $updateQuery);
        // header('Location: todo.php');

        $validationQuery = "SELECT * FROM todos where todo = '$updatedTodo' AND `userid` = '$id'";
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
            $updateQuery = "UPDATE `todos` SET `todo` = '$updatedTodo', `date` = '$dueDate', `category` = '$todoCategory' WHERE `todo` = '$todoName' ";


            $sqliRun = mysqli_query($con, $updateQuery);
            // print_r($todoName);
            // print_r($updatedTodo);
            header('Location: todo.php');
        }
    };
    
?>