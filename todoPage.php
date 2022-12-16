<?php 

require 'addTodo.php';

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
            <form  id = 'addForm' class = 'addContainer' method="post">
            <h2>Add a new to-do</h2>
            <div class = 'featureContainer'>
            
            <div class = 'dateContainer'>
              <p> Due Date </p>
              <input class = 'dateDropdown' value = '<?php echo date("d/m/Y") ?>' type="date" name="dueDate">
            </div>

            <div class = 'categoryContainer'>
              <p>Category</p>
              <input class = 'categoryDropdown' type="text" name="categoryName">
            </div>
            </div>

            <div class = 'userInputContainer'>
              <input class = 'updateInputContainer' type="text" name="todoName" placeholder="Add a To-do">
            </div>
            
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
              <div class = 'categoryContainer'>
                <label for="to-dos">Choose a To-do to edit:</label>
                <select name="to-dos" id="to-dos">
                    <?php for ($x = 0; $x < count($finalTodosNotCompleted); $x++): ?>
                        <option value= '<?php echo $finalTodosNotCompleted[$x][0] ?>'><?php echo $finalTodosNotCompleted[$x][0] ?></option>
                    <?php endfor ?>
                </select>
                    </div>
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

        <select name="categoryName" id="categoryName" class = 'btn btn-secondary dropdown-toggle'>
            <option value="" placeholder = 'Filters'></option>
            <option value = "DueDate">Due Date</option>
            <option value="" disabled selected>--Categories--</option>
                
                    <?php for ($x = 0; $x < count($finalCategory); $x++): ?>
                        <option value= '<?php echo $finalCategory[$x][0] ?>'><?php echo $finalCategory[$x][0] ?></option>
                    <?php endfor ?>
        </select>

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