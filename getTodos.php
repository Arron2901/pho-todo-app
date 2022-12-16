<?php
    require "./login/functions.php";
        $id = $_SESSION['info']['id'];
     
        $getTodosNotCompleted = "SELECT todo FROM `todos` WHERE `userid` = '$id' AND `completed` = 0;";
        $allTodosNotCompleted = mysqli_query($con, $getTodosNotCompleted);
        $finalTodosNotCompleted = mysqli_fetch_all($allTodosNotCompleted);



        $getTodosCompleted = "SELECT todo FROM `todos` WHERE `userid` = '$id' AND `completed` = 1;";
        $allTodosCompleted = mysqli_query($con, $getTodosCompleted);
        $finalTodosCompleted = mysqli_fetch_all($allTodosCompleted);

        $getCompletedValues = "SELECT `completed` FROM `todos` WHERE `userid` = '$id';";;
        $allCompleted = mysqli_query($con, $getCompletedValues);
        $finalCompleted = mysqli_fetch_all($allCompleted);

        
        

        for ($x = 0; $x < count($finalTodosNotCompleted); $x++): ?>
            <div class= 'todoContainer2'>

                <div class= 'todoContent'>

                 <form action = "changeStatus.php" method = "post" style = "display: inline-block;">
                    <input type="hidden" name = "todo_name" value = "<?php echo $finalTodosNotCompleted[$x][0] ?>">
                    <input type = 'checkbox'>
                </form>

                <?php echo $finalTodosNotCompleted[$x][0]; ?>

        </div>

                <div class = 'todoActionsContainer'>

                <form action = "delete.php" method="post" class = 'todoActions'>
                    <input type="hidden" name = "todo_name" value = "<?php echo $finalTodosNotCompleted[$x][0] ?>">
                    <button class = 'deleteBtn'>Delete</button>
                </form>

                <form class = 'todoActions' action = "edit.php" method="post" >
                    <input type="hidden" name = "todo_name" value = "<?php echo $finalTodosNotCompleted[$x][0] ?>">
                    <input type="text" name = "updatedTodo" placeholder = 'Updated Todo'>
                    <button class = 'updateBtn'>Update</button>

                </form>
        </div>
        </div>

        <?php endfor ?>
</div> 
        
        <h2>Completed</h2>
    <div class= 'todoContainer1'>
        <?php
            for ($x = 0; $x < count($finalTodosCompleted); $x++): ?>
            <!-- <div style = "margin-bottom: 20px;"> -->
                <div class= 'todoContainer2'>
                <form action = "changeStatus.php" method = "post" style = "display: inline-block;">
                    <input type="hidden" name = "todo_name" value = "<?php echo $finalTodosCompleted[$x][0] ?>">
                    <input type = 'checkbox' checked="checked">
                </form>

                <?php echo $finalTodosCompleted[$x][0]; ?>

                <div class = 'todoActionsContainer'>
                <form action = "delete.php" method="post"class = 'todoActions'>
                    <input type="hidden" name = "todo_name" value = "<?php echo $finalTodosCompleted[$x][0] ?>">
                    <button class = 'deleteBtn'>Delete</button>
                </form>
            </div>
            </div>
        
        <?php endfor ?>

