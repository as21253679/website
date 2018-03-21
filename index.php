<?php 	
     $dbhost = 'localhost';
     $dbuser = 'admin';
     $dbpass = 'admin';
     $dbname = 'test';
     $i=1;
$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);
  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>澎湖在地博物館</title>
  <script src="bootstrap-3.3.7-dist/js/jquery.js"></script>
  <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <link rel=stylesheet type="text/css" href="css/style.css"> 
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
            <li class="active"><a href="index.php">首頁</a></li>
            <li><a href="activity.php">活動公告</a></li>
            <li><a href="attractions.php">景點介紹</a></li>
            <li><a href="farmer.php">小農專區</a></li>
            <li><a target="_new" href="login.php">[管理者入口]</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  </header>
  
  <div class="container">
    <div class="col-md-12 photo">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
<?php

 $sql = "select * from farmer";//查詢整個表單
  $result = mysql_query($sql);
while($row = mysql_fetch_array($result)){//印出資料
if($i==1)
{
echo "<img src='images/".$row['image']."' width='130px' height='100px' alt='...'>";
$i=2;
}
          //<img src="images/slides1.jpg" alt="...">
}
?>
          <div class="carousel-caption">
         
          </div>
        </div>
        <div class="item">
          <img src="images/slides2.jpg" alt="...">
          <div class="carousel-caption">
        
          </div>
        </div>
        <div class="item">
          <img src="images/slides3.jpg" alt="...">
          <div class="carousel-caption">
           
          </div>
        </div>
      </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <div class="col-md-12"><marquee direction="right" scrollamount="8" behavior="alternate">歡迎光臨</marquee></div>
    
    <div class="wrap">
      <div class="row">
      <!--content start-->
      
        <div class="col-md-9 content"> <h5><img src="images/title_bg.png"><a href="farmer.php">小農生活</a></h5>
          <?php
		  $i=0;
		   $sql = "select * from farmer";//查詢整個表單
  $result = mysql_query($sql);
while($row = mysql_fetch_array($result)){//印出資料
     if($row['enable']=='啟用中')
		{
			if($i<4)
			{
				$i=$i+1;
				echo "<div class='col-md-3 content'><a href='farmer-content.php?A=".$row['farmerID']."'><img src='images/".$row['image']."' width='130px' height='100px'></a><a href='farmer-content.php?A=".$row['farmerID']."'>".$row['title']."</a></div>";
			}
			else
			break;
		}
	}
          ?>
          <table class="table table-striped">
            <CAPTION><img src="images/title_bg.png"><a href="activity.php">最新活動&nbsp;(更多內容請看活動公告)</a></CAPTION>
            <thead>
              <tr>
                <th>標題</th>
                <th>日期</th>          
              </tr>              
            </thead>
            <tbody>

<?php
 $sql = "select * from news";//查詢整個表單
  $result = mysql_query($sql);

while($row = mysql_fetch_array($result)){//印出資料
     if($row['enable']=='啟用中')
	{
		echo "<tr><td><div class='activity-title'><a href='activity-content.php?A=".$row['postID']."'>".$row['title']."</label></a></div></td>";
		echo "<td>".$row['date']."</td></tr>";
	}
  }
     echo mysql_error();
mysql_close($conn);
?>             
            </tbody>
          </table>
        </div>
        <!--content end-->
        <!--sidebar start-->
        <div class="col-md-3 sidebar">
          <div class="box">
            <a href="https://www.facebook.com/pg/NanliaoPenghu/notes/?ref=page_internal">
              <span class="glyphicon glyphicon-envelope"></span>
              <h3>南寮保寧宮</h3>
            </a>
          </div>
          <div class="box">
            <a href="http://blog.xuite.net/penghu.dialy/blog/183650235-%E5%8D%97%E5%AF%AE%E7%A4%BE%E5%8D%80%E7%89%9B%E5%B1%8E%E7%AA%9F%E8%90%BD%E6%88%90+%E6%B0%91%E7%9C%BE%E6%A8%82%E9%AB%94%E9%A9%97%E8%BE%B2%E6%9D%91%E6%96%87%E5%8C%96">
              <span class="glyphicon glyphicon-lock"></span>
              <h3>牛屎窟</h3>
            </a>
          </div>
          <div class="box">
            <a href="http://solomo.xinmedia.com/taiwan/11652-penghu">
              <span class="glyphicon glyphicon-qrcode"></span>
              <h3>浮球藝術</h3>
            </a>
          </div>
           <div class="box">
            <a href="#">
              <span class="glyphicon glyphicon-qrcode"></span>
              <h3>福記魚灶</h3>
            </a>
          </div>
           <div class="box">
            <a href="#">
              <span class="glyphicon glyphicon-qrcode"></span>
              <h3>許返古宅</h3>
            </a>
          </div>
        </div>
        <!--sidebar end-->
      </div>
      
    </div>
  </div>  
</body>
</html>