<?php
  include("config.php");
  if(mysqli_connect_errno()){
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }
  $mysqli->set_charset("UTF8");
?>