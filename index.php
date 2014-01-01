<!doctype html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <title>信息共享平台</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
  <link href="app/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Loading Flat UI -->
  <link href="css/flat-ui.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

</head>
<body>
  
<?php
  session_start();
  if(!isset($_SESSION["uid"])){
    header("Location:app/login.php");
  }
?>
<div class="navbar navbar-fixed-top">123</div>
<article>
  <?php
    include("app/conn.php");
    if(!isset($_GET['p'])){
      echo "<ul>";
      $query="SELECT * 
        FROM  `".$postTable."` P
        JOIN  `".$dpidTable."` D ON D.`dpid` = P.`department_id`
        JOIN  `".$userTable."` U ON U.`uid` = P.`author`
        WHERE P.department_id='".$dpid."'
        ";
      if($result=$mysqli->query($query)){
        while($row=$result->fetch_object()){
          ?>
            <li>
              <a href="?p=<?php echo $row->pid ?>"><?php echo $row->title ?></a>
              <small>By <?php echo $row->name ?>
              <?php echo $row->time ?></small>
              <div><?php 
                $content=strip_tags($row->content);
                if(strlen($content)>20){
                  echo substr($content,20);
                }else{
                  echo $content;
                }
              ?></div>
            </li>
          <?php
        }
      }
    echo "</ul>";
    }else{
      $query="SELECT * 
        FROM  `".$postTable."` P
        JOIN  `".$dpidTable."` D ON D.`dpid` = P.`department_id`
        JOIN  `".$userTable."` U ON U.`uid` = P.`author`
        WHERE P.department_id='".$dpid."'
        AND P.pid=".$_GET['p']."
        ";
      if($result=$mysqli->query($query)){
        while($row=$result->fetch_object()){
          ?>
            <h1><?php echo $row->title ?></h1>
            <span>作者：<?php echo $row->name ?></span>
            <small><?php echo $row->time ?></small>
            <div><?php echo $row->content ?></div>
          <?php
        }
      }
    }
  ?>
</article>
</body>
</html>