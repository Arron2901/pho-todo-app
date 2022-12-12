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
</head>
<body>
    <div>
        <form method="post">
            <input type="text" name="todoName" placeholder="Enter your todo">
            <button>Submit</button>
        </form>
    </div>

    <?php
        $getTodos = "SELECT todo FROM `todos` WHERE `userid` = '$id';";
        $allTodos = mysqli_query($con, $getTodos);
        $finalTodos = mysqli_fetch_all($allTodos);

        $getCompletedValues = "SELECT `completed` FROM `todos` WHERE `userid` = '$id';";;
        $allCompleted = mysqli_query($con, $getCompletedValues);
        $finalCompleted = mysqli_fetch_all($allCompleted);
        // $finalTodos[$x][0]
        
        for ($x = 0; $x < count($finalTodos); $x++): ?>
            <div style = "margin-bottom: 20px;">
                <form action = "changeStatus.php" method = "post" style = "display: inline-block;">
                    <input type="hidden" name = "todo_name" value = "<?php echo $finalTodos[$x][0] ?>">
                    <input type = 'checkbox' <?php echo $finalCompleted[$x][0] ? 'checked' : '' ?>>
                </form>

                <?php echo $finalTodos[$x][0]; ?>

                <form action = "delete.php" method="post" style="display: inline-block;">
                    <input type="hidden" name = "todo_name" value = "<?php echo $finalTodos[$x][0] ?>">
                    <button>Delete</button>
                </form>

                <form action = "edit.php" method="post" style="display: inline-block;">
                    <input type="hidden" name = "todo_name" value = "<?php echo $finalTodos[$x][0] ?>">
                    <input type="text" name = "updatedTodo" placeholder = 'Updated Todo'>
                    <button>Update</button>
                </form>

            </div>

    <?php endfor ?>  

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