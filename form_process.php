<?php
session_start();
require_once  "db_connect.php";

//Declaring empty variables
$error_password = $error_username = "";
$password = $username = "";

//Initiating Post method
if($_SERVER["REQUEST_METHOD"]=="POST"){
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
   
   //Checking if user existing
   if (empty($error_username) && empty($error_password)) {
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
      
      //Checking if password is correct
      if (md5($password) == $db_password) {
       $_SESSION["first_name"]=$first_name;
       $_SESSION["last_name"]=$last_name;
       $_SESSION["email"]=$email;
       $_SESSION["username"]=$username;
       $_SESSION["user_id"] = $user_id;
   
       header("location: ./dashboard.php");
  
      } else {
        //if password is not correct display
        $error_password = "Incorrect password";
      }

    } else {
      //if user does not exist display
      $error_username = "$username is not a valid username";
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