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
  ?>
  
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>澎湖在地博物館-後端管理系統</title>
  <script src="https://code.jquery.com/jquery.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
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
          <a class="navbar-brand" href="back.html">澎湖在地博物館</a>
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
            <li class="active"><a href="back.html">活動公告</a></li>
            <li><a href="back-attractions.html">景點介紹</a></li>
            <li><a href="back-farmer.html">小農專區</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">活動項目
            <span style="float:right">
              <!-- 新增 Task 按鈕 -->
              <form action="insert.php" method="POST" class="form-inline">
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
                <?php
				
while($row = mysql_fetch_array($result)){//印出資料
	echo "<tr><td>".$row['postID']."</td>";
	echo "<td>".$row['title']."</td>";
	echo "<td>".$row['enable']."</td>";
	$htm = "<td><form action='enable.php' method='POST' class='form-inline'>
                      <button type='submit' name='enable' value='".$row['postID']."' class='btn btn-success'>
                        <span class='glyphicon glyphicon-ok' aria-hidden='true'></span>&nbsp;啟用
                      </button>
                    </form>							
                  </td>
                  <td>
                    <form action='disable.php' method='POST' class='form-inline'>
                      <button type='submit' name='disable' value='".$row['postID']."' class='btn btn-warning'>
                        <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>&nbsp;停用
                      </button>
                    </form>
                  </td>
                  <td>
                    <!-- 修改 Task 按鈕 -->
                    <form action='' method='POST' class='form-inline'>
                      <button type='submit' class='btn btn-primary'>
                        <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>&nbsp;修改
                      </button>
                    </form>
                  </td>
                  <td>
                    <!-- 刪除 Task 按鈕 -->
                    <form action='' method='POST' class='form-inline'>
                      <button type='submit' class='btn btn-danger'>
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
