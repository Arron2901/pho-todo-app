<?php 
require "./login/functions.php";

for ($x = 0; $x < count($finalTodosNotCompleted); $x++): ?>
    <div class= 'todoContainer2'>

        <div class= 'todoContent'>

         <form action = "changeStatus.php" method = "post" style = "display: inline-block;">
            <input type="hidden" name = "todo_name" value = "<?php echo $finalTodosNotCompleted[$x][0] ?>">
            <input type = 'checkbox'>
        </form>

        <?php echo $finalTodosNotCompleted[$x][0]; ?>
        <br>
        <?php echo $finalDueDates[$x][0]; ?>
        <br>
        <?php echo $finalAllCategoryNC[$x][0] ?>

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
            <br>
            <?php echo $finalAllCategoryC[$x][0] ?>
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