<form action="reg_save.php" method="post">
  <input type="text" name="username" placeholder="用户名">
  <input type="text" name="name" placeholder="姓名">
  <input type="password" name="password">
  <input type="password" name="repassword">
  <select name="department" id="dp">
    <?php
      include("conn.php");
      $query="SELECT * FROM `".$dpidTable."`";
      if($result=$mysqli->query($query)){
        while($row=$result->fetch_object()){
          echo "<option value=".$row->dpid.">".$row->dpname."</option>";
        }
      }     
    ?>
  </select>
  <input type="submit" value="注册">
</form>