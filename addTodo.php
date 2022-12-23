 <?php
    require "login/functions.php";
    $id = $_SESSION['info']['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $todo = addslashes($_POST['todoName']);
        $todo = trim($todo);

        $todoCategory = addslashes($_POST['categoryName']);
        $todoCategory = trim($todoCategory);

        $dueDate = $_POST['dueDate'];

        $checkTodosQuery = "select * from todos where todo = '$todo' AND `userid` = '$id'";
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
            header("Location: todo.php");
        }
    }
?>