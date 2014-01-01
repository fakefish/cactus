<?php
  session_start();
  if($_SESSION["uid"]!='1'){
    header("Location:../index.php");
  }
  include("header.php");
  include("conn.php");

  if(isset($_POST["uid"])){
    $uid=$_POST["uid"];
    $query="UPDATE `".$userTable."` SET `level`=1 WHERE `uid`=".$uid;
    if($mysqli->query($query)){
      echo "更新成功";
    }else{
      echo "更新失败";
    }
  }
?>
<form method="post">
  <label for="uid">输入用户id提升为部门管理员</label>
  <br>
  <input type="text" name="uid" id="uid">
  <input type="submit" >
</form>
<table>
  <tr>
    <th>用户id</th>
    <th>用户名</th>
    <th>所在部门</th>
    <th>是否为部门管理员</th>
  </tr>
  <?php 
    include("conn.php");
    $query="
    SELECT * FROM `".$userTable."` U
    LEFT JOIN `".$dpidTable."` D
    ON U.department_id = D.dpid
    ";
    if($result=$mysqli->query($query)){
      while($row=$result->fetch_object()){
        echo "<tr>";
        echo "<td>".$row->uid."</td>";
        echo "<td>".$row->name."</td>";
        echo "<td>".$row->dpname."</td>";
        if($row->level=="2"){
          echo "<td>不是</td>";
        }else if($row->level=="1"){
          echo "<td>是</td>";
        }
        echo "<tr>";
      }
    }
  ?>
</table>