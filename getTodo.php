<?php

require './login/functions.php';

 $id = $_SESSION['info']['id'];
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
      </div>
    </div>
  </div>
</div>


