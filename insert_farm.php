<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">   
</head>
<body>

<?php
     $dbhost = 'localhost';
     $dbuser = 'admin';
     $dbpass = 'admin';
     $dbname = 'test';

     $name = $_POST['name'];
     $product = $_POST['infor'];
	 
$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);

//新增資料
 $sql="INSERT INTO farm ( 
    name, product)
   VALUES 
   ('$name','$product');";

$result=mysql_query($sql);

     echo mysql_error();
mysql_close($conn);
echo "新增成功<br>";
?>
<input type="button" value="返回" onClick="javascript:location.href='back-farmer.php'">
</body>