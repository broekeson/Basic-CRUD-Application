<?php 
  session_start();

  if(!isset($_SESSION['user_id'])){
    header("location:./logout.php");
  }
  
  require_once  "db_connect.php";


  $error_course = "";
  $course_name  = "";

    if ($_SERVER["REQUEST_METHOD"]=="POST"){
      $user = $_POST["user_id"];
    //Check if course is empty
    if (empty($_POST['course'])){
      //Error to display after check
      $error_course = 'Please enter course name';
     } else {
       //Cleaning data using customize function
       $course_name  = cleaning($_POST["course"]);

       if (!preg_match("/^[a-zA-Z-' ]*$/",$course_name)){
        $error_course  = 'Only letters and white space allowed';
       }
     }

     if (empty($error_course)) {
      $sql = "SELECT * FROM courses WHERE user_id = '$user' AND course_name = '$course_name';";
      $get_course = mysqli_query($conn, $sql);

      if (mysqli_num_rows($get_course)<1) {
        $insert_query = "INSERT INTO courses  (user_id, course_name)  VALUES  ('$user','$course_name');";
        $insert_course  = mysqli_query($conn, $insert_query);

        if ($insert_course) {
          $error_course =  "success";
        }
      }else {
        $error_course = "Course already exist!";
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