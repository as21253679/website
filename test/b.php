<?php session_start(); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">   
</head>
<body>

<form action="" method="POST">

  <input type="hidden" name="chaxun" value="check" />
  帳號: <input type="text" name="user1"><br>
  密碼: <input type="password" name="password1"><br>
  <input type="submit" value="登入" >
  <input type="button" value="註冊新會員" onclick="location.href='/register.html'">
</form>


<script language="javascript">
function show() {
　alert("帳號錯誤，請重新輸入!");
}
function url()
{
	window.location.replace("blogin.php");
}
</script>


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
	//echo '<meta http-equiv=REFRESH CONTENT=1;url=blogin.php>';
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