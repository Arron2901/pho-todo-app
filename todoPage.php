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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update To-do</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form class = 'updateContainer' action = "edit.php" method="post">
            <input type="hidden" name = "todo_name" value = "<?php echo $finalTodosNotCompleted[$x][0] ?>">
            <!-- have the current to do as a place holder -->
            <input class = 'updateInputContainer' type="text" name = "updatedTodo" 
             placeholder = 'Enter your updated to here Updated Todo here '>
            <button class="updateBtn">Update</button>
       </form>
      </div>
    </div>
  </div>
</div>

    <section class='inputContainer'>
        <form method="post">
            <input class = 'inputBox' type="text" name="todoName" placeholder="Enter your to do">
            <button class = 'submitBtn'>+</button>
        </form>
    </section>



    <h2 class = 'subheading'>Not Completed</h2>



<div class= 'notcompletedContainer'>

    <?php
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

                <button type="button" class = 'updateBtn' data-toggle="modal" data-target="#exampleModal"> Update </button>

        </div>
        </div>

        <?php endfor ?>
</div> 
        
        <h2 class = 'subheading'>Completed</h2>
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

    </div>



    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]')
        checkboxes.forEach(ch => {
            ch.onclick = function() {
                this.parentNode.submit()
            }
        })
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>