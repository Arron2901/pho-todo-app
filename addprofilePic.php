 <?php
    require "login/functions.php";
    $id = $_SESSION['info']['id'];

    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      print_r($_FILES);

      if (isset($_POST['submit']) && isset($_FILES['profilePic'])) {
        print_r($_FILES['profilePic']);
      } else {
        echo 'no pic found';

      }

//     $filename = $_FILES["profilePic"]["name"];
//     $tempname = $_FILES["profilePic"]["tmp_name"];
//     $folder = "./image/" . $filename;

// //Insert the image name and image content in image_table
// $query= "update `users` SET  `profilePic` = '$filename' where `id` = '$id' ";
// $result = mysqli_query($con, $query);



//     $filename = $_FILES["profilePic"]["name"];
//     $tempname = $_FILES["profilePic"]["tmp_name"];
//     $folder = "./image/" . $filename;
    

//     if (move_uploaded_file($tempname, $folder)) {
//             $query = "insert into users (profilePic) values ('$filename') where `id` = '$id' ";
//             $result = mysqli_query($con, $query);
//             if($result){
//                 echo "<h3>  Image uploaded successfully!</h3>";
//             } else {
//                echo "<h3>  Failed to upload image!</h3>";
//     }
// }
        // }