<?php 
  session_start();

  require_once  "db_connect.php";

  $error_course = "";
  $new_name  = "";

    if ($_SERVER["REQUEST_METHOD"]=="POST"){
      $user = $_SESSION['user_id'];
      $course = $_SESSION['course_id'];
    //Check if course is empty
    if (empty($_POST['course'])){
      //Error to display after check
      $error_course = 'Please enter course name';
     } else {
       //Cleaning data using customize function
       $new_name  = cleaning($_POST["course"]);

       if (!preg_match("/^[a-zA-Z-' ]*$/",$new_name)){
        $error_course  = 'Only letters and white space allowed';
       }
     }

     if (empty($error_course)) {
      $sql = "SELECT * FROM courses WHERE user_id = '$user';";
      $get_course = mysqli_query($conn, $sql);

      if ($get_course){
        $update_query = "UPDATE courses SET course_name = '$new_name' WHERE id = '$course' AND user_id = '$user';";
        $update_course  = mysqli_query($conn, $update_query);

        if ($update_course) {
          header("location:dashboard.php");
        }
      }else {
        $success = "Course already exist!";
      }

     }

  }

     //Creating customize function
     function cleaning($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>