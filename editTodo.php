<?php
    require "./login/functions.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //print_r($todoName);
        $id = $_SESSION['info']['id'];
        $todoName = $_POST['to-dos'];
        $updatedTodo = $_POST['updatedTodo'];
        $updatedTodo = trim($updatedTodo);
        
        $todoCategory = addslashes($_POST['categoryName']);
        $todoCategory = trim($todoCategory);

        $dueDate = $_POST['dueDate'];

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
        } else if(!$todoCategory) {
            $updateQuery = "UPDATE `todos` SET `todo` = '$updatedTodo', `date` = '$dueDate' WHERE `todo` = '$todoName' ";
            $sqliRun = mysqli_query($con, $updateQuery);
            header('Location: todo.php');
        } else{
            $updateQuery = "UPDATE `todos` SET `todo` = '$updatedTodo', `date` = '$dueDate', `category` = '$todoCategory' WHERE `todo` = '$todoName' ";
            $sqliRun = mysqli_query($con, $updateQuery);
            header('Location: todo.php');
        }
    };
    
?>