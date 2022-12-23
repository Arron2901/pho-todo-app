<?php 
require "./login/functions.php";

for ($x = 0; $x < count($finalTodosNotCompleted); $x++): ?>
    <div class= 'todoContainer2'>

        <div class= 'todoContent'>

         <form action = "changeStatus.php" method = "post" style = "display: inline-block;">
            <input type="hidden" name = "todo_name" value = "<?php echo $finalTodosNotCompleted[$x][1] ?>">
            <input type = 'checkbox'>
        </form>

                <?php echo $finalTodosNotCompleted[$x][1]; ?>
                <br>
                <?php if($finalTodosNotCompleted[$x][4] !== "0000-00-00"){
                    echo date_format(date_create($finalTodosNotCompleted[$x][4]),"d M Y");
                    echo "<br>";
                }; ?>
                <?php echo $finalTodosNotCompleted[$x][5];?>

</div>

        <div class = 'todoActionsContainer'>

        <form action = "delete.php" method="post" class = 'todoActions'>
            <input type="hidden" name = "todo_name" value = "<?php echo $finalTodosNotCompleted[$x][1] ?>">
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
            <input type="hidden" name = "todo_name" value = "<?php echo $finalTodosCompleted[$x][1] ?>">
            <input type = 'checkbox' checked="checked">
           
        </form>
        <?php echo $finalTodosCompleted[$x][1]; ?>
 <br>
                <?php if($finalTodosCompleted[$x][4] !== "0000-00-00"){
                    echo date_format(date_create($finalTodosCompleted[$x][4]),"d M Y");
                    echo "<br>";
                }; ?>
                <?php echo $finalTodosCompleted[$x][5];?>
        </div>

        <div class = 'todoActionsContainer'>
        <form action = "delete.php" method="post"class = 'todoActions'>
            <input type="hidden" name = "todo_name" value = "<?php echo $finalTodosCompleted[$x][1] ?>">
            <button class = 'deleteBtn'>Delete</button>
        </form>

        
    </div>
    
    </div>

<?php endfor ?>