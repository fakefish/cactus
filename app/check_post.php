<?php
if($_POST==NULL){
  header("HTTP/1.1 404 Not Found");
  header("Status: 404 Not Found");
  exit();
}
header("Content-type: text/html; charset=utf-8");
?>