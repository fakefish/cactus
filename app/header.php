<header>
  <nav>
    <a href="../index.php">首页</a>
    <span>
      欢迎  
<?php
  include("conn.php");
  include("check_login.php");
  $name=$_SESSION['name'];
  $query="SELECT * FROM `".$userTable."` U
    LEFT JOIN `".$dpidTable."` D
    ON D.dpid = U.department_id
    WHERE U.uid=".$_SESSION['uid']."
  ";
  if($result=$mysqli->query($query)){
    while($row=$result->fetch_object()){
      $level=$row->level;
      $name=$row->name;
      $dpname=$row->dpname;
      $dpid=$row->dpid;
    }
  }
  echo $name;
  if($level=='0'){
    ?>
    <a href="dpmanage.php">部门管理</a>
    <a href="usermanage.php">用户管理</a>
    <?php
  }
  if($level=='1'){
    ?>
    <a href="postmanage.php">信息管理</a>
    <a href="addpost.php">添加信息</a>
    <?php
  }
?>

<a href="login.php">登出</a>
    </span>
  </nav>
  
</header>