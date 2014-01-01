<?php
  session_start();
  if($_SESSION["uid"]!='1'){
    header("Location:../index.php");
  }
  include("header.php");
  include("conn.php");
  if(isset($_POST["department"])){
    $dpname=$_POST["department"];
    $query="INSERT INTO `".$dpidTable."` (dpname) 
    VALUES ('".$dpname."')";
    if($mysqli->query($query)){
      echo "添加成功";
    }else{
      echo "添加失败";
    }
  }
?>
<form method="post">
  <input type="text" name="department">
  <input type="submit" value="添加">
</form>
<table>
  <tr>
    <th>部门编号</th>
    <th>部门</th>
  </tr>
  <?php 
    include("conn.php");
    $query="SELECT * FROM `".$dpidTable."` ";
    if($result=$mysqli->query($query)){
      while($row=$result->fetch_object()){
        echo "<tr>";
        echo "<td>".$row->dpid."</td>";
        echo "<td>".$row->dpname."</td>";
        echo "<tr>";
      }
    }
  ?>
</table>