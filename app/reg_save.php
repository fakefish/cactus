<?php 
  include("check_post.php");
  include("conn.php");

  $username=$_POST['username'];
  $name=$_POST['name'];
  $pwd=$_POST['password'];
  $repwd=$_POST['repassword'];
  $dpid=$_POST['department'];

  if($pwd!=$repwd){
    echo "两次密码不一样";
    exit();
  }
  $pwd=md5($pwd);

  $query="INSERT INTO `".$userTable."` 
  (username, name, pwd, department_id, level) VALUES 
  ('$username', '$name', '$pwd', '$dpid', '2')";

  if($mysqli->query($query)){
    echo "注册成功";
    echo "<a href='login.php'>去登陆</a>";
  }else{
    echo "注册失败";
    echo "<a href='register.php'>去注册</a>";
  }
?>