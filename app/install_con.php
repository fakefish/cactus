<?php
include("check_post.php");


$url=$_POST['url'];
$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['name'];
$pre=$_POST['pre'];

$mysqli=new mysqli($url, $username, $password);
$createDB="CREATE DATABASE ".$name;
if($mysqli->query($createDB)){
  echo "create database success!<br>";
}else{
  echo "create database error!<br>";
}

$mysqli->select_db($name);
$createUser="CREATE TABLE `".$pre."users` (
    uid int(10) not null auto_increment primary key,
    username varchar(40) UNIQUE not null,
    name varchar(40) not null,
    pwd varchar(80) not null,
    department_id varchar(10) not null,
    level int(10) not null
  )";
$createPost="CREATE TABLE `".$pre."post` (
    pid int(30) not null auto_increment primary key,
    title text not null,
    content text not null,
    time date not null,
    author varchar(10) not null,
    department_id varchar(10) not null
  )";
$createDI="CREATE TABLE `".$pre."dpid` (
    dpid int(10) not null auto_increment primary key,
    dpname varchar(30) not null UNIQUE
  )";

if($mysqli->query($createUser)){
  echo "create user tabel success!<br>";
}else{
  echo "create user tabel error!<br>";
}

if($mysqli->query($createPost)){
  echo "create post tabel success!<br>";
}else{
  echo "create post tabel error!<br>";
}

if($mysqli->query($createDI)){
  echo "create dpid tabel success!<br>";
}else{
  echo "create dpid tabel error!<br>";
}


$file=fopen("config.php","w");
$conn="<?php 
\$mysqli = new mysqli('".$url."', '".$username."', '".$password."', '".$name."'); 
\$userTable = '".$pre."users';
\$postTable = '".$pre."post';
\$dpidTable = '".$pre."dpid';
?>";
if(fwrite($file, $conn)){
  echo "file write success<br>";
}else{
  echo "file write error<br>";
}
fclose($file);


// insert the admin
$pwd=md5('admin');
$query="INSERT INTO `".$pre."users` 
(uid,username, name, pwd, department_id, level) VALUES
(1,'admin', '系统管理员', '".$pwd."', -1, 0)
";
if($mysqli->query($query)){
  echo "管理员账号创建成功，管理员用户名和密码均为admin，请及时修改！";  
}else{
  echo "管理员账号失败。";
}
?>
<a href="login.php?username=admin&password=admin">点击去首页</a>