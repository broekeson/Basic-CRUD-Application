<?php
session_start();
require_once  "db_connect.php";

//Declaring empty variables
$error_password = $error_username = $error_fname  = $error_lname  = $error_email  = $error_retype = "";
$first_name = $last_name  = $email = $username = "";

//Initiating Post method
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $retype = cleaning($_POST['retype']);
  //Check if username is empty
  if (empty($_POST['username'])){
    //Error to display after check
    $error_username = 'Username is required';
   } else {
     //Cleaning data using customize function
     $username  = cleaning($_POST["username"]);
     }
    //Check if password-field is empty
   if (empty($_POST['password'])) {
     //Error to display after empty-check
     $error_password  = 'Password is required';
   } else {
     //Cleaning data using customize function
     $password  = cleaning($_POST["password"]);
   }

   if (empty($_POST['fname'])) {
     $error_fname = 'First name is required';
   } else {
     $first_name  = cleaning($_POST['fname']);

     if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)){
      $error_fname  = 'Only letters and white space allowed';
     }
   }
    if (empty($_POST['lname'])) {
     $error_lname = 'Last name is required';
   }else {
     $last_name = cleaning($_POST['lname']);
     if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)){
      $error_fname  = 'Only letters and white space allowed';
     }
   }

   if (empty($_POST['email'])) {
     $error_email = 'Email is required';
   } else {
     $email = cleaning($_POST['email']);
     if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
       $error_email = "Please provide a valid email";
     }
   }

   if ($retype  !=  $password) {
     $error_retype  = 'Password do not match!';
   }

   //Checking if user existing
   if (empty($error_username) && empty($error_password) &&  empty($error_retype)  && empty($error_fname)  && empty($error_lname)  && empty($error_email)) {
    $sql = "SELECT * FROM user_info WHERE Username='$username';";

    $get_user = mysqli_query($conn, $sql);

    if (mysqli_num_rows($get_user)<1) {
      $sq0 = "SELECT * FROM user_info WHERE Email ='$email';";
      $get_user1  = mysqli_query($conn, $sq0);

      if (mysqli_num_rows($get_user1)<1) {
          $insert_query = "INSERT INTO user_info  (First_name, Last_name, Username, Email,  Password)  VALUES ('$first_name', '$last_name','$username', '$email', md5('$password'));";

          $insert_user  = mysqli_query($conn, $insert_query);

          if ($insert_user) {
            $sql = "SELECT * FROM user_info WHERE Username='$username';";

            $get_user = mysqli_query($conn, $sql);

            if (mysqli_num_rows($get_user)>0) {
            //If user existing fetch all user information
            $user = mysqli_fetch_assoc($get_user);
            $first_name = $user['First_name'];
            $last_name  = $user['Last_name'];
            $email  = $user['Email'];
            $db_username = $user['Username'];
            $db_password = $user['Password'];
            $user_id    = $user['ID'];

            $_SESSION["first_name"]=$first_name;
            $_SESSION["last_name"]=$last_name;
            $_SESSION["email"]=$email;
            $_SESSION["username"]=$username;
            $_SESSION["user_id"] = $user_id;

            header("location: ./dashboard.php");
          }
        }

      }else {
        $error_email  = "Email already exist";
      }

      } else {
        $error_username = "Username already exist.";
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