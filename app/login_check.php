<?php
  include("check_post.php");
  include("conn.php");

  $username=$_POST['username'];
  $pwd=$_POST['password'];

  $query="SELECT * FROM `".$userTable."` WHERE `username`='".$username."' AND `pwd`='".md5($pwd)."'";
  $result=$mysqli->query($query);
  if($result->num_rows==1){
    session_start();
    while($row=$result->fetch_object()){
      $_SESSION['uid']=$row->uid;
      $_SESSION['name']=$row->name;
      $_SESSION['dpid']=$row->department_id;
    }
    header("Location:../index.php");
  }else{
    echo "用户密码错误。";
    echo "<script>setTimeout(function(){location='login.php'},3000)</script>";
  }
  
?>