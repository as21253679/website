<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>澎湖在地博物館-後端管理系統</title>
  <script src="bootstrap-3.3.7-dist/js/jquery.js"></script>
  <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <link href="css/back.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="back.php">澎湖在地博物館</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">登出</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="back.php">活動公告</a></li>
            <li><a href="back-attractions.php">景點介紹</a></li>
            <li><a href="back-farmer.php">小農專區</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php
		$id=$_GET["id"];
		echo "<form action='update_back_a.php?id=$id' method='POST'>";
		?>
              <div class="form-group">
		<a href="back.php" style="color: #FFF">
                  <div class="divButton btn btn-danger">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;取消
                </div></a>

                <span style="float: right">
                  <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;更新
                  </button>
                </span>
              </div>
<?php  
                 $dbhost = 'localhost';
				 $dbuser = 'admin';
				 $dbpass = 'admin';
				 $dbname = 'test';
				 $id=$_GET["id"];
			$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
			 mysql_query("SET NAMES UTF8");//設定語系
			  mysql_select_db($dbname);
			
			 $sql = "select * from news where postID=$id";//查詢整個表單
			  $result = mysql_query($sql);
						
			while($row = mysql_fetch_array($result)){//印出資料
				echo "<div class='form-group'>
                <label for='back-Creat-Header'>活動標題</label>
                <input type='text' class='form-control' id='back-Creat-Header' placeholder='活動標題' name='title' value='".$row['title']."'>
              </div>";
			  echo"<div class='form-group'>
                <label for='back-Creat-tag'>文章標籤</label>
                <input type='text' class='form-control' id='back-Creat-tag' placeholder='文章標籤' name='class' value='".$row['class']."'>
              </div>";
			  echo"<div class='form-group'>
                <label for='back-Creat-content'>活動內容</label>
                <textarea class='form-control' rows='15' id='back-Creat-content' placeholder='活動內容' name='content'>".$row['content']."</textarea>
              </div>";
			  mysql_close($conn);
			}
?>
            </form>  

        </div>
      </div>
    </div>
  </body>
</html>
