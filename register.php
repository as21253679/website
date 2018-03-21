<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">   
</head>

<body>
<?php
     $dbhost = 'localhost';
     $dbuser = 'admin';
     $dbpass = 'admin';
     $dbname = 'test';

     $user = $_POST['user'];
     $password = $_POST['password'];
     $name = $_POST['name'];
     $addr = $_POST['addr'];
     $tel = $_POST['tel'];

$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);


//新增資料
 $sql="INSERT INTO userdata ( 
    username, password, name, address ,tel)
   VALUES 
   ('$user', '$password','$name', '$addr','$tel');";

$result=mysql_query($sql);

     //echo mysql_error();
mysql_close($conn);
?>
註冊成功<br>
 <input type="submit" name="button" id="button" value="關閉視窗" onclick="window.close()"/><br />
</body>