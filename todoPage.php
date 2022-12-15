<?php
    require "login/functions.php";
    $id = $_SESSION['info']['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $todo = addslashes($_POST['todoName']);
        $todo = trim($todo);
        $dueDate = $_POST['dueDate'];

        $checkTodosQuery = "select * from todos where todo = '$todo'";
        $runQuery = mysqli_query($con, $checkTodosQuery);

        if (mysqli_num_rows($runQuery) > 0) {
            echo '<script type="text/javascript">';
            echo 'alert ("To-do already exists!")';
            echo '</script>';
        } else if (!$todo) {
            echo '<script type="text/javascript">';
            echo 'alert ("Cannot have a blank to-do!")';
            echo '</script>';
        } else {
            $query = "insert into todos (todo, userid, date) values ('$todo', '$id', '$dueDate')";
            $result = mysqli_query($con, $query);
        }
    }

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

<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add To-do</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form class = 'addContainer' method="post">
            <h2>Add a new to-do</h2>
            <input class = 'updateInputContainer' type="text" name="todoName" placeholder="Enter your to do">
            <h2>Choose Date</h2>
            <input class = 'updateInputContainer' type="date" name="dueDate" placeholder="Enter your to do">
            
            <button class = 'submitBtn'>Add</button>
            </form>
      </div>
    </div>
  </div>
</div>


<!-- UPDATE Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Update To-do</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form class = 'updateContainer' action = "edit.php" method="post">
            <!-- have the current to do as a place holder -->
                <label for="to-dos">Choose a To-do to edit:</label>
                <select name="to-dos" id="to-dos">
                    <?php for ($x = 0; $x < count($finalTodosNotCompleted); $x++): ?>
                        <option value= '<?php echo $finalTodosNotCompleted[$x][0] ?>'><?php echo $finalTodosNotCompleted[$x][0] ?></option>
                    <?php endfor ?>
                </select>
                <input class = 'updateInputContainer' type="text" name = "updatedTodo" 
                placeholder = 'Enter your updated Todo here '>
                <button class="updateBtn">Update</button>
            </form>
      </div>
    </div>
  </div>
</div>

<section class = 'bodyContainer'>
    <section class = 'topContainer'>
    <section class='inputContainer'>
        <!-- <form method="post">
            <input class = 'inputBox' type="text" name="todoName" placeholder="Enter your to do">
            <button class = 'submitBtn'>+</button>
            <button type="button" class = 'updateBtn' data-toggle="modal" data-target="#exampleModal"> Update </button>
        </form> -->
        <form method = "post">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Add</button>

                    <button type="button" class = "btn btn-secondary" data-toggle="modal" data-target="#exampleModal1">Update </button>
                    </form>
    </section>

    <section class='filterContainer'>
        <p class = 'filterStyle' >Filter by:</p>
        <div class = 'filterOptions'>

            <button class="btn btn-secondary">Due Date</button>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
            </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">work</a></li>
                    <li><a class="dropdown-item" href="#">personal</a></li>
                    <li><a class="dropdown-item" href="#">finances</a></li>
                    </ul>
        </div>

    </section>
                </section>


<section class = 'todoSection' >
    <div class = 'container'>
    <p class = 'subheading'>Not Completed</p>



<div class= 'notcompletedContainer'>

<?php require 'displayTodos.php' ?>

   
    </div>
    </div>

            </section>
            </section>



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