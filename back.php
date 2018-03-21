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
          <h2 class="sub-header">活動項目
            <span style="float:right">
              <!-- 新增 Task 按鈕 -->
              <form action="back_create.html" method="POST" class="form-inline">
                <button type="submit" class="btn btn-info">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;新增
                </button>
              </form>	
            </span>
          </h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>編號</th>
                  <th>標題</th>
                  <th>狀態</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>


<script language="javascript">
function url()
{
	window.location.replace("login.php");
}
</script>


<?php
     $dbhost = 'localhost';
     $dbuser = 'admin';
     $dbpass = 'admin';
     $dbname = 'test';
     
$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);

 $sql = "select * from news";//查詢整個表單
  $result = mysql_query($sql);
			
while($row = mysql_fetch_array($result)){//印出資料
	echo "<tr><td>".$row['postID']."</td>";
	echo "<td>".$row['title']."</td>";
	echo "<td>".$row['enable']."</td>";
	$htm = "<td><form action='newsenable.php' method='POST' class='form-inline'>
                      <button type='submit' name='enable' value='".$row['postID']."' class='btn btn-success'>
                        <span class='glyphicon glyphicon-ok' aria-hidden='true'></span>&nbsp;啟用
                      </button>
                    </form>							
                  </td>
                  <td>
                    <form action='newsdisable.php' method='POST' class='form-inline'>
                      <button type='submit' name='disable' value='".$row['postID']."' class='btn btn-warning'>
                        <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>&nbsp;停用
                      </button>
                    </form>
                  </td>
                  <td>
                    <!-- 修改 Task 按鈕 -->
                    <form action='update_back.php?id=".$row['postID']."' method='POST' class='form-inline'>
                      <button type='submit' class='btn btn-primary'>
                        <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>&nbsp;修改
                      </button>
                    </form>
                  </td>
                  <td>
                    <!-- 刪除 Task 按鈕 -->
                    <form action='newsdelete.php' method='POST' class='form-inline'>
                      <button type='submit' name='delete' value='".$row['postID']."' class='btn btn-danger'>
                        <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>&nbsp;刪除
                      </button>
                    </form>
                  </td>
				  </tr>";
				  echo $htm;
  }
?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>