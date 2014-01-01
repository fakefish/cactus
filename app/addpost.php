<?php include("header.php"); ?>
<script src="js/jquery-1.4.4.min.js"></script>
<script src="js/xheditor-1.1.14-zh-cn.min.js"></script> 
</head>
<form action="savepost.php" method="post" enctype="multipart/form-data">
  <input type="text" name="title" placeholder="title"><br>
  <textarea id="elm1" name="content" class="xheditor" rows="30" cols="80" style="width: 80%"></textarea><br>
  <input type="submit">
</form>
<script>
  $('#elm1').xheditor({tools:'mini',upLinkUrl:"upload.php",upLinkExt:"zip,rar,txt",upImgUrl:"upload.php",upImgExt:"jpg,jpeg,gif,png",upFlashUrl:"upload.php",upFlashExt:"swf",upMediaUrl:"upload.php",upMediaExt:"avi"});
</script>