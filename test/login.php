<?php session_start(); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">   
</head>

<script language="javascript">
function show() {
　alert("帳號錯誤，請重新輸入!");
history.back();
}
</script>
<body>

<?php
     $dbhost = 'localhost';
     $dbuser = 'admin';
     $dbpass = 'admin';
     $dbname = 'test';
     $user = $_POST['user1'];
     $password = $_POST['password1'];
     $bool=0;
    
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
	break;
	}	
    }
if(!$bool)
{
 $key="<script type=text/javascript>show();</script>";
 echo "$key";
 }
else
{
	echo '<a href="logout.php">登出</a>  <br><br>';
	echo "帳號:".$user." "."<br>";
    echo "密碼:".$password." "."<br>";
	echo "登入成功<br><br>";
	echo "名字:".$row['name']."<br>";
	echo "地址:".$row['address']."<br>";
	echo "電話:".$row['tel']."<br>";
	echo  "<input type='button' value='新增' onclick=location.href='/insert.html'>";
	echo  "<input type='button' value='刪除' onclick=location.href='/delete.html'>";
	echo  "<input type='button' value='修改' onclick=location.href='/update.html'>";
}

     echo mysql_error();
mysql_close($conn);
?>
</body>