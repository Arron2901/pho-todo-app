<?php
    require "login/functions.php";
    $id = $_SESSION['info']['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $todo = addslashes($_POST['todoName']);

        $query = "insert into todos (todo, userid) values ('$todo', '$id')";

        $result = mysqli_query($con, $query);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

        <section class='loginContainer'>
        <form method="post">
            <input class = 'inputBox' type="text" name="todoName" placeholder="Enter your to do">
            <button class = 'submitBtn'>+</button>
        </form>
</section>


<div class= 'todoContainer1'>
    <?php
        $getTodos = "SELECT todo FROM `todos` WHERE `userid` = '$id';";
        $allTodos = mysqli_query($con, $getTodos);
        $finalTodos = mysqli_fetch_all($allTodos);

        $getCompletedValues = "SELECT `completed` FROM `todos` WHERE `userid` = '$id';";;
        $allCompleted = mysqli_query($con, $getCompletedValues);
        $finalCompleted = mysqli_fetch_all($allCompleted);
        // $finalTodos[$x][0]

        for ($x = 0; $x < count($finalTodos); $x++): ?>
            <div class= 'todoContainer2'>
                
                <div class= 'todoContent'>
                    <form action = "changeStatus.php" method = "post" style = "display: inline-block;">
                        <input type="hidden" name = "todo_name" value = "<?php echo $finalTodos[$x][0] ?>">
                        <input type = 'checkbox' <?php echo $finalCompleted[$x][0] ? 'checked' : '' ?>>
                    </form>

                    <?php echo $finalTodos[$x][0]; ?>
                </div>

                <div class = 'todoActionsConatiner' >
                <form class = 'todoActions' action = "delete.php" method="post">
                    <input type="hidden" name = "todo_name" value = "<?php echo $finalTodos[$x][0] ?>">
                    <button class = 'deleteBtn'>Delete</button>
                </form>

                <form   class = 'todoActions' action = "edit.php" method="post">
                     <input type="hidden" name = "updatedTodo" value = "<?php echo $finalTodos[$x][0] ?>">
                    <button class = 'updateBtn' >Update</button>
                </form>

            </div>
        </div>

    <?php endfor ?>  
        </div>
    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]')
        checkboxes.forEach(ch => {
            ch.onclick = function() {
                this.parentNode.submit()
            }
        })
    </script>

</body>
</html>