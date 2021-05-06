<?php
  session_start();
  
  if(!isset($_SESSION['user_id'])){
    header("location:./logout.php");
  }

  require_once  "db_connect.php";
  $user = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/dashboard.css">  
</head>
<body>
<div id="app">
  <div class="side-bar">
    <li>Dashboard</li>
    <li><a href="add_course.php">Add Course</a></li>
    <li><a href="logout.php">Logout</a></li>
  </div>
  <div class="main">
    <div class="nav-bar"> 
      <h5>Hello <?php echo $_SESSION["first_name"];?>! </h5>
    </div>
    <div class="content">
      <h2>Available Courses</h2>
      <table  style = "width: 75%">
      <thead>
            <tr>
              <th>#</th>
              <th>Course Name</th>
              <th>Edit Course</th>
              <th>Delete Course</th>
            </tr>
          <tbody>
            <?php 
              $counter  = 1;
              $courses = mysqli_query($conn, "SELECT * FROM courses WHERE user_id  = '$user';");
              // $user_courses  = mysqli_fetch_assoc($courses);
              if (mysqli_num_rows($courses)>0) {
                while ($user_courses = mysqli_fetch_assoc($courses)){?>
                <tr>
                <td><?php echo $counter++  ?></td>
                <td><?php echo $user_courses['course_name']; ?></td>
                <td><a href="update_course.php?id=<?php  echo  $user_courses['id'];?>&course=<?php echo  $user_courses['course_name'];?>">Edit</a></td>
                <td><a href="delete.php?id=<?php  echo  $user_courses['id'];?>">Delete</a></td>
                </tr>
                <?php
                }
              }
             ?>
          </tbody>
        </thead>
        </table>
    </div>
  </div>

</div>
</body>
</html>