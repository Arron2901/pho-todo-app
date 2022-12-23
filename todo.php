<?php

require "./login/functions.php";

$id = $_SESSION['info']['id'];

$getTodosNotCompleted = "SELECT * FROM `todos` WHERE `userid` = '$id' AND `completed` = 0;";
$allTodosNotCompleted = mysqli_query($con, $getTodosNotCompleted);
$finalTodosNotCompleted = mysqli_fetch_all($allTodosNotCompleted);

$getTodosCompleted = "SELECT * FROM `todos` WHERE `userid` = '$id' AND `completed` = 1;";
$allTodosCompleted = mysqli_query($con, $getTodosCompleted);
$finalTodosCompleted = mysqli_fetch_all($allTodosCompleted);


$getCategory = "SELECT DISTINCT `category` FROM `todos` WHERE `userid` = '$id';";;
$allCategories = mysqli_query($con, $getCategory);
$finalCategory = mysqli_fetch_all($allCategories);


$getIndividualCategories = "SELECT `category` FROM `todos` WHERE `userid` = '$id' and `completed` = 0  ";;
$allIndividualCategories = mysqli_query($con, $getIndividualCategories);
$finalIndividualCategories = mysqli_fetch_all($allIndividualCategories);

 $todoName = $_POST['to-dos'];

  $query = "SELECT date, category FROM todos where todo = '$todoName' AND `userid` = '$id'";
  $result = $con -> query($query);

  if($result ->num_rows > 0){
    while($row = $result ->fetch_assoc()){
      $date = $row["date"];
      $category = $row["category"];
    } 
  } else {
      echo "no results";
    };
 ?>

<?php require  "./css/html.php";?>
<body>

<?php require "./login/header.php";?>

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
            <form  action = 'addTodo.php' class = 'addContainer' method="post">
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
        <section class = 'updateContainer'>
          <form action = '' method="post">
           <div class = 'categoryContainer'>
                <label for="to-dos">Choose a To-do to edit:</label>
                <select name="to-dos" id="to-dos">
                    <?php for ($x = 0; $x < count($finalTodosNotCompleted); $x++): ?>
                        <option value= '<?php echo $finalTodosNotCompleted[$x][1] ?>'><?php echo $finalTodosNotCompleted[$x][1] ?></option>
                    <?php endfor ?>
                </select>
                <button> select <button>
                </form>
                <div class = 'featureContainer'>
            <form action = "editTodo.php" method="post">
            
            <div class = 'dateContainer'>
              <p> Due Date </p>
              <input class = 'dateDropdown' value = '<?php echo "$date"?>' type="date" name="dueDate">
            </div>

            <div class = 'categoryContainer'>
              <p>Category</p>
              <input class = 'categoryDropdown' value = '<?php echo "$category"?>' type="text" name="categoryName">
            </div>
            </div>
                <input class = 'updateInputContainer' type="text" name = "updatedTodo" 
                placeholder = 'Enter your updated Todo here '>
                <button class="updateBtn">Update</button>
            </form>
          </section>
      </div>
    </div>
  </div>
</div>


<section class = 'bodyContainer'>
<div class = 'anotherContainer' >
<h1 class= 'pageTitle' >Echo your To-do's</h1>
    <section class='addContainer'>
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
                    </div>

    <section class = 'topContainer'>
    <!-- <section class='addContainer'> -->
        <!-- <form method="post">
            <input class = 'inputBox' type="text" name="todoName" placeholder="Enter your to do">
            <button class = 'submitBtn'>+</button>
            <button type="button" class = 'updateBtn' data-toggle="modal" data-target="#exampleModal"> Update </button>
        </form> -->
        <!-- <form method = "post">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Add</button>

                    <button type="button" class = "btn btn-secondary" data-toggle="modal" data-target="#exampleModal1">Update </button>
                    </form>
    </section> -->

    <section class='filterContainer'>
        <p class = 'filterStyle' >Filter by:</p>
        <div class = 'filterOptions'>

    <form class = 'filterOptions' action="" method = "GET">
        <select name="sortOption" class="form-control">
                <option value="" disabled selected>--Select Filter--</option>
                <option value="DueDate" <?php if(isset($_GET['sortOption']) && $_GET['sortOption'] == "DueDate") { echo "selected"; } ?> >Due Date</option>
                <option value="" disabled >Categories</option>

                <?php for ($x = 0; $x < count($finalCategory); $x++): ?>
                    <option value= '<?php echo $finalCategory[$x][0] ?>' <?php if(isset($_GET['sortOption']) && $_GET['sortOption'] == $finalCategory[$x][0]) { echo "selected"; } ?>><?php echo $finalCategory[$x][0] ?></option>
                <?php endfor ?>

            </select>
            <button type="submit" class="btn btn-secondary" id="basic-addon2">Filter</button>

    </form>
    
    <form>
      <button type="submit" class="btn btn-secondary" id="basic-addon2">Reset</button>
    </form>
            
        </div>



    </section>
                </section>


<section class = 'todoSection' >
    <div class = 'container'>
    <p class = 'subheading'>Not Completed</p>



<div class= 'notcompletedContainer'>

<?php 

    $chosenSort = "";

    if (isset($_GET['sortOption'])) {
        if ($_GET['sortOption'] == "DueDate") {
            $chosenSort = 'DueDate';
            require 'sortbyDate.php';
        } else if ($_GET['sortOption'] !== "DueDate" && $_GET['sortOption'] !== "") {
            $chosenSort = $_GET['sortOption'];
            
            $getTodosNotCompleted = "SELECT * FROM `todos` WHERE `userid` = '$id' AND `completed` = 0 AND `category` = '$chosenSort';";
            $allTodosNotCompleted = mysqli_query($con, $getTodosNotCompleted);
            $finalTodosNotCompleted = mysqli_fetch_all($allTodosNotCompleted);
          
            // $getDueDates = "SELECT `date` FROM `todos` WHERE `userid` = '$id' AND `category` = '$chosenSort';";;
            // $allDueDates = mysqli_query($con, $getDueDates);
            // $finalDueDates = mysqli_fetch_all($allDueDates);

            $getTodosCompleted = "SELECT * FROM `todos` WHERE `userid` = '$id' AND `completed` = 1 AND `category` = '$chosenSort';";
            $allTodosCompleted = mysqli_query($con, $getTodosCompleted);
            $finalTodosCompleted = mysqli_fetch_all($allTodosCompleted);
          
            // $getCompletedValues = "SELECT `completed` FROM `todos` WHERE `userid` = '$id' AND `category` = '$chosenSort';";;
            // $allCompleted = mysqli_query($con, $getCompletedValues);
            // $finalCompleted = mysqli_fetch_all($allCompleted);

            require "categoryFilter.php";


        } 
    } else {
        require 'UnorderedTodos.php' ;
    }

?>

   
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


<!-- <p>?php require "./todoPage.php" ?></p> -->

  
</body>
</html>







