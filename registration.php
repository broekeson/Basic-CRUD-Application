<?php
  include "reg_process.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="css/code.css">
</head>
<body>
<div class="container">  
  <form id="contact" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <h3>Sign Up</h3>
    <h4>Quick & Easy to use</h4>
    <fieldset>
      <input placeholder="First Name" type="text"  value="<?php echo  $first_name ?>" name="fname"  tabindex="1"  autofocus >
      <span class="error"><?php echo $error_fname?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Last Name" type="text" value="<?php echo  $last_name ?>" name="lname"   autofocus >
      <span class="error"><?php echo $error_lname?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Enter Your Email Address" type="email" name="email"  value="<?php echo $email?>" tabindex="3">
      <span class="error"><?php echo $error_email?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Enter Your Preferred Username" type="text"  name="username" value="<?php echo  $username;?>" tabindex="1" autofocus  >
      <span class="error"><?php echo $error_username?></span>
    </fieldset>
    <fieldset>
      <input placeholder="New Password" type="password" name="password" tabindex="1" autofocus>
      <span class="error"><?php echo $error_password?></span>
    </fieldset> 
    <fieldset>
      <input placeholder="Comfirm New Password" type="password" name="retype" tabindex="1" autofocus>
      <span class="error"><?php echo $error_retype?></span>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Sign Up</button>
      <a href="./index.php"  name="new" class="new form-group"  id="new">Existing User? Sign In</a><br>
    </fieldset>
  </form>
</div>
</body>
</html>