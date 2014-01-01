<?php
  $username=$_GET["username"];
  $password=$_GET["password"];
  session_start();
  $_SESSION=array();
?>
<form action="login_check.php" method="post">
  <input type="text" name="username" placeholder="用户名" value="<?php echo $username ?>">
  <input type="password" name="password" value="<?php echo $password ?>">
  <input type="submit" value="登陆">
</form>