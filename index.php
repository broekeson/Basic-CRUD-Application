<?php
  include "form_process.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/code.css">
</head>
<body> 
<div class="container">  
  <form id="contact" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <h3>Sign in</h3>
    <h4>Quick & Easy to use</h4>
    <fieldset>
      <input placeholder="Username" type="text" name="username"  value="<?php echo $username  ?>" tabindex="1" autofocus><br>
      <span class="error"><?php echo $error_username ?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Password" type="password" name="password" tabindex="2" >
      <span class="error"><?php echo $error_password  ?></span>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Login</button>
      <a href="forgetton-password.php"  class="pass"  id="pass">Forgotten Password?</a><br>
      <a href="registration.php"  class="pass"  id="pass">Sign Up</a>
    </fieldset>
  </form>
</div>
</body>
</html>