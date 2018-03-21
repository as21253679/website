<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>澎湖在地博物館-管理者入口</title>
  <script src="bootstrap-3.3.7-dist/js/jquery.js"></script>
  <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <link rel=stylesheet type="text/css" href="css/login.css"> 
</head>
<body>

<script language="javascript">
function show() {
	alert("帳號錯誤，請重新輸入!");
}
function url()
{
	window.location.replace("back.php");
}
</script>

<?php
if(@$_SESSION['id'] != null)
{
	$url="<script type=text/javascript>url();</script>";
	echo "$url";
}
?>
    <div class="container">

      <form class="form-signin" action="" method="POST">
      	<input type="hidden" name="chaxun" value="check" />
        <h2 class="form-signin-heading">澎湖在地博物館</h2>
        <label for="inputEmail" class="sr-only">UserName</label>
        <input type="text" id="inputEmail" class="form-control" name="user1" placeholder="UserName" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password1" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me">記住我
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登入</button>
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="location.href='register.html'">註冊新會員</button>
      </form>

    </div> <!-- /container -->


<?php
if(!empty($_POST['user1']) && !empty($_POST['password1']))
	 {
 if(!empty($_POST['chaxun']))
 {  
 	
     $dbhost = 'localhost';
     $dbuser = 'admin';
     $dbpass = 'admin';
     $dbname = 'test';
     $user = $_POST['user1'];
     $password = $_POST['password1'];
	 
     $bool=0;
     //echo "帳號:".$user." "."<br>";
     //echo "密碼:".$password." "."<br>";
$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);

 $sql = "select * from userdata";//查詢整個表單
  $result = mysql_query($sql);

while($row = mysql_fetch_array($result)){//印出資料
        if($row['username']==$user && $row['password']==$password)
	{
	$_SESSION['id'] = $user;
	$bool=1;
	$url="<script type=text/javascript>url();</script>";
 echo "$url";
	break;
	}	
  }
if(!$bool)
{
 $key="<script type=text/javascript>show();</script>";
 echo "$key";
}

    // echo mysql_error();
mysql_close($conn);
	 }
 }
?>

</body>
</html>