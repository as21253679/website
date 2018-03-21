<?php	
     $dbhost = 'localhost';
     $dbuser = 'admin';
     $dbpass = 'admin';
     $dbname = 'test';
     $id=$_GET['A'];	
$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);
  
 $sql = "select * from farmer where farmerid=$id;";//查詢整個表單
  $result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
$mtitle=$row['title'];
}

?>

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
            <li><a href="back.php">活動公告</a></li>
            <li><a href="back-attractions.php">景點介紹</a></li>
            <li class="active"><a href="back-farmer.php">小農專區</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <a href="back-farmer.php">
                  <div class="divButton btn btn-default">
                    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;回小農專區
                  </div>
                </a>
            <h2 class="sub-header text-center">
<?php
echo $mtitle;
?>
</h2>
            <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>編號</th>
                  <th>姓名</th>
                  <th>狀態</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
<?php

 $sql = "select * from farm";//查詢整個表單
  $result = mysql_query($sql);
while($row = mysql_fetch_array($result)){//印出資料
	echo "<tr><td>".$row['farmID']."</td>";
	echo "<td>".$row['name']."</td>";
	$pid=$row['farmID'];
	$sql="SELECT id FROM farm_farmer where marketid=$id and personid=$pid";
    $result2=mysql_query($sql);
$values = mysql_fetch_array($result2);
if($values=='')
{echo "<td>"."無參與"."</td>";}
else
{echo "<td>"."有參與"."</td>";} 
	$htm = "	<td>
				  <!-- 啟用 Task 按鈕 -->
                    <form action='joinperson.php?personid=".$row['farmID']."&marketid=".$id."' method='POST' class='form-inline'>
                      <button type='submit' class='btn btn-success'>
                        <span class='glyphicon glyphicon-ok' aria-hidden='true'></span>&nbsp;參與
                      </button>
                    </form>             
                  </td>
                  <td>
                    <!-- 刪除 Task 按鈕 -->
                    <form action='nojoinperson.php?personid=".$row['farmID']."&marketid=".$id."' method='POST' class='form-inline'>
                      <button type='submit' class='btn btn-danger'>
                        <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>&nbsp;無參與
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
