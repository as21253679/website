
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>澎湖在地博物館-景點介紹</title>
<script src="bootstrap-3.3.7-dist/js/jquery.js"></script>
  <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <link rel=stylesheet type="text/css" href="css/style.css"> 
  <link rel=stylesheet type="text/css" href="css/attractions.css">
</head>
<body>
  <header>
      <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">澎湖縣在地博物館</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">首頁</a></li>
            <li><a href="activity.php">活動公告</a></li>
            <li class="active"><a href="attractions.php">景點介紹</a></li>
            <li><a href="farmer.php">小農專區</a></li>
            <li><a target="_new" href="login.php">[管理者入口]</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  </header>
  
  <div class="container">
        <div class="wrap">
      <div class="row">
      <!--content start-->
        <div class="col-md-8 content">          
          <div class="blog-post">
          <?php
		       $dbhost = 'localhost';
     $dbuser = 'admin';
     $dbpass = 'admin';
     $dbname = 'test';
     
$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);
		   if(!empty($_GET["A"]))
		   	  $ID=$_GET['A'];
		   else
		      $ID=1;                      //點近來出現的文章ID
		   $sql = "select * from post where postID='$ID';";//查詢整個表單
  $result = mysql_query($sql);

while($row = mysql_fetch_array($result)){
	echo "<h1>".$row['title']."</h1>";
	if($row['image']!='')
		echo "<img src='images/".$row['image']."' width='80%'style='display:block; margin:auto;'>";
	echo "<div class='entry'><p>".str_replace("\r","<br>",$row['content'])."</p></div><hr>";
	if($row['infor']!='')     
	echo "<div class='info'><label>聯絡方式</label><pre>".$row['infor']."</pre></div>";
  }
    // echo mysql_error();
mysql_close($conn);
			?>
          </div>   
        </div>
        <!--content end-->
        <!--sidebar start-->
        <div class="col-md-3  col-md-offset-1 sidebar">

<?php
     $dbhost = 'localhost';
     $dbuser = 'admin';
     $dbpass = 'admin';
     $dbname = 'test';
     
$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);
 $sql = "select * from post";//查詢整個表單
  $result = mysql_query($sql);
while($row = mysql_fetch_array($result)){//印出資料
     if($row['enable']=='啟用中')
	{
	echo "<div class='attractions-title'><a href='attractions.php?A=".$row['postID']."'>".$row['title']."</a></div>";
  }
}
    // echo mysql_error();
mysql_close($conn);

?>          
        </div>
        <!--sidebar end-->
      </div>
      
    </div>

  </div>  
</body>
</html>


