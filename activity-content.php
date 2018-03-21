<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>澎湖在地博物館-活動公告</title>
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
            <li class="active"><a href="activity.php">活動公告</a></li>
            <li><a href="attractions.php">景點介紹</a></li>
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
        <div class="col-md-12  content">          
          <div class="blog-post">
<?php
		   $dbhost = 'localhost';
     $dbuser = 'admin';
     $dbpass = 'admin';
     $dbname = 'test';
     $ID=$_GET["A"];
     
$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);

 $sql = "select * from news where postID='$ID';";//查詢整個表單
  $result = mysql_query($sql);

while($row = mysql_fetch_array($result)){
	echo "<h1>".$row['title']."</h1><p>";
	echo "<label class='tag'>#".$row['class']."</label>";
	echo "<span style='float: right'>".$row['date']."</span></p>";
	echo "<div class='entry'><p><pre>".$row['content']."</pre></p></div>";
  }

    // echo mysql_error();
mysql_close($conn);
?>
			</div>
          </div>   
        </div>
      </div>     
    </div>
  </div>  
</body>
</html>