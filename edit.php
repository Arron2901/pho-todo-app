<?php
    require "./login/functions.php";

    $todoName = $_POST['updatedTodo'];
    print_r($todoName)
    // $selectedTodo = "DELETE FROM `todos` WHERE `todo` = '$todoName';";
    // $sqlQuery = mysqli_query($con, $selectedTodo);
    

    // header("Location: todo.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <div>
        <form method="post">
            <input type="text" name="updatedTodo" placeholder="Enter your todo">
            <button>Submit Changes</button>
        </form>
    </div>
</body>
</html>