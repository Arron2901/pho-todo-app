<?php 

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

    $getDueDates = "SELECT `date` FROM `todos` WHERE `userid` = '$id';";;
    $allDueDates = mysqli_query($con, $getDueDates);
    $finalDueDates = mysqli_fetch_all($allDueDates);

    $getCategory = "SELECT DISTINCT `category` FROM `todos` WHERE `userid` = '$id';";;
    $allCategories = mysqli_query($con, $getCategory);
    $finalCategory = mysqli_fetch_all($allCategories);

    $newDatesArray = array();

    for ($x=0; $x < count($finalTodosNotCompleted); $x++) { 
        $newDatesArray[ strtotime($finalDueDates[$x][0]) ] = $finalDueDates[$x][0];
    }

    ksort($newDatesArray);
    $newDatesArray = array_values( $newDatesArray );

    for ($x=0; $x < count($finalTodosNotCompleted); $x++): ?>
        <?php if ($newDatesArray[$x]): ?>

        <?php endif ?>
    <div class= 'todoContainer2'>

        <div class= 'todoContent'>

            <form action = "changeStatus.php" method = "post" style = "display: inline-block;">
                <input type="hidden" name = "todo_name" value = "<?php echo $finalTodosNotCompleted[$x][0] ?>">
                <input type = 'checkbox'>
            </form>

            <?php echo $finalTodosNotCompleted[$x][0]; ?>
            <br>
            <?php echo $newDatesArray[$x]; ?>
            <br>
            <?php echo $finalAllCategory[$x][0] ?>

        </div>

        <div class = 'todoActionsContainer'>

            <form action = "delete.php" method="post" class = 'todoActions'>
                <input type="hidden" name = "todo_name" value = "<?php echo $finalTodosNotCompleted[$x][0] ?>">
                <button class = 'deleteBtn'>Delete</button>
            </form>

        </div>
    </div>

    <?php endfor ?>
    </div>
</div> 
    
<div class = 'container'>
<p class = 'subheading'>Completed</p>
<div class= 'completedContainer'>
<?php
    for ($x = 0; $x < count($finalTodosCompleted); $x++): ?>
    <!-- <div style = "margin-bottom: 20px;"> -->
        <div class= 'todoContainer2'>
         <div class= 'todoContent'>
        <form action = "changeStatus.php" method = "post" style = "display: inline-block;">
            <input type="hidden" name = "todo_name" value = "<?php echo $finalTodosCompleted[$x][0] ?>">
            <input type = 'checkbox' checked="checked">
            <?php echo $finalTodosCompleted[$x][0]; ?>
        </form>
        </div>


        <div class = 'todoActionsContainer'>
        <form action = "delete.php" method="post"class = 'todoActions'>
            <input type="hidden" name = "todo_name" value = "<?php echo $finalTodosCompleted[$x][0] ?>">
            <button class = 'deleteBtn'>Delete</button>
        </form>

        
    </div>
    
    </div>

<?php endfor ?>
