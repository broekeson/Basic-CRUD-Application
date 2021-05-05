<?php
  require_once "db_connect.php";

  $error_username = $error_password =  $error_confirmP = "";
  $username = $password = $success_msg  = "";

  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $username = $_POST['username'];
    $NewPass  = $_POST['Newpword'];
    $ConfirmPass  = $_POST['Repword'];
  
    if (empty($username)) {
      $error_username = "Username is required";
    } else {
      $username = cleaning($username);
    }

    if (empty($NewPass)) {
      $error_password = "New Password is required";
    } else {
      $NewPass = cleaning($NewPass);
    }

    if (empty($ConfirmPass)) {
      $error_confirmP = "Please enter password again";
    } else {
      $ConfirmPass = cleaning($ConfirmPass);
    }

    if (empty($error_password) && empty($error_confirmP)) {
      if ($NewPass == $ConfirmPass) {
      
    } else {
      $error_confirmP = "Passwords do not match";
    }
    }
    $sql  = "SELECT * FROM user_info WHERE Username = '$username';";
      $get_user = mysqli_query($conn, $sql);

      if (mysqli_num_rows($get_user)>0) {
        $update_query = "UPDATE user_info SET Password  = md5('$NewPass') WHERE Username = '$username';";
        $update = mysqli_query($conn, $update_query);
        if ($update) {
          $success_msg  = "You have successfully change your password";
        }
      }else {
        $error_username = "Username does not exist";
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