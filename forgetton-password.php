<?php
  include "reset.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="stylesheet" href="css/code.css">
</head>
<body> 
<div class="container">  
  <form id="contact" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <h4>Password Reset</h4>
    <fieldset>
      <input placeholder="Username" type="text" name="username"  value="<?php echo $username  ?>" tabindex="1" autofocus><br>
      <span class="error"><?php echo $error_username ?></span>
    </fieldset>
    <fieldset>
      <input placeholder="New Password" type="password" name="Newpword" tabindex="2" >
      <span class="error"><?php echo $error_password  ?></span>
    </fieldset>
        <fieldset>
      <input placeholder="Confirm New Password" type="password" name="Repword" tabindex="2" >
      <span class="error"><?php echo $error_confirmP  ?></span>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Login</button>
      <a href="index.php">Go Back</a> <br>
      <span class="success"><?php echo $success_msg ?></span>
    </fieldset>
  </form>
</div>
</body>
</html>