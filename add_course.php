<?php

  include "new_course.php";
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Course</title>
  <link rel="stylesheet" href="css/dashboard.css">  
</head>
<body>
<div id="app">
  <div class="side-bar">
    <li><a href="dashboard.php">Dashboard</a></li>
    <li>Add Course</li>
    <li><a href="logout.php">Logout</a></li>
  </div>
  <div class="main">
    <div class="nav-bar"> 
      <h5>Hello <?php echo $_SESSION["first_name"];?>!</h5>
    </div>
    <div class="content">
      <form id="contact" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <input type="text" name="user_id" id=""  value= "<?php echo $_SESSION['user_id'] ?>" hidden>
      <fieldset>
      <label for="course" class="label">Add Course</label><br>
      <input placeholder="Please Enter Course Name" type="text" name="course"  tabindex="1" autofocus><br>
      <span class="error"><?php echo $error_course ?></span>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Add Course</button>
    </fieldset>
    </form>
    </div>
  </div>

</div>
</body>
</html>