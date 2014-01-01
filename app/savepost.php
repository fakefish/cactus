<?php
  include("check_post.php");
  include("conn.php");
  session_start();

  $title=$_POST["title"];
  $content=$_POST["content"];
  $uid=$_SESSION["uid"];
  $dpid=$_SESSION["dpid"];
  $create_time=date("Y-m-d H:i:s");
  $query="INSERT INTO `".$postTable."` 
  (title, content, time, author, department_id) VALUES 
  ('$title', '$content', '$create_time', '$uid', '$dpid')";
  if($mysqli->query($query)){
    echo "成功";
    echo "<script>setTimeout(function(){location='../index.php'},3000)</script>";
  }else{
    echo "失败";
    echo "<script>setTimeout(function(){location='addpost.php'},3000)</script>";
  }
?>