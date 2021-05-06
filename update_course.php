<?php
  include "update.php";

  if(!isset($_SESSION['user_id'])){
    header("location:./logout.php");
  }

  $_SESSION['user_id'];
  $_SESSION['course_id']  = $_GET['id'];

  $id  =  $_GET['id'];
  $course_name = $_GET['course'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Course</title>
  <link rel="stylesheet" href="css/dashboard.css">  
</head>
<body>
<div id="app">
  <div class="side-bar">
    <li><a href="dashboard.php">Update Course</a></li>
    <li><a href="add_course.php">Add Course</a></li>
    <li><a href="logout.php">Logout</a></li>
  </div>
  <div class="main">
    <div class="nav-bar"> 
      <h5>Hello <?php echo  $_SESSION['first_name']  ?></h5>
    </div>
    <div class="content">
      <form id="contact" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <fieldset>
      <label for="course" class="label">Selected Course</label><br>
      <input value  = "<?php echo $course_name?>" type="text" name="course"  tabindex="1" autofocus disabled><br>
    </fieldset>
      <fieldset>
      <label for="course" class="label">Edit Selected Course</label><br>
      <input placeholder="Please Enter New Course Name" type="text" name="course"  tabindex="1" autofocus><br>
      <span class="error"><?php echo $error_course ?></span>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Update</button>
    </fieldset>
    </form>
    </div>
  </div>

</div>
</body>
</html>