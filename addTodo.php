 <?php
    require "login/functions.php";
    $id = $_SESSION['info']['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $todo = addslashes($_POST['todoName']);
        $todo = trim($todo);

        $todoCategory = addslashes($_POST['categoryName']);
        $todoCategory = trim($todoCategory);

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
            $query = "insert into todos (todo, userid, date, category) values ('$todo', '$id', '$dueDate', '$todoCategory')";
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

    $getCategory = "SELECT DISTINCT `category` FROM `todos` WHERE `userid` = '$id';";;
    $allCategories = mysqli_query($con, $getCategory);
    $finalCategory = mysqli_fetch_all($allCategories);
?>