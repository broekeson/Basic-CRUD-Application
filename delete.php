<?php 
  require_once  'db_connect.php';

  $id  =  $_GET['id'];

  $del  = mysqli_query($conn, "DELETE FROM  courses WHERE id  = '$id';");

  if ($del) {
    mysqli_close($conn);
    header("location: dashboard.php");
  }else {
    echo  "error delete";
  }
?>