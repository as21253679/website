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
	 $id=$_GET["id"];
	 
$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);

//更新資料

 $sql="UPDATE farm SET name = '$name', product='$product'
   WHERE farmID=$id;
";


$result=mysql_query($sql);

     echo mysql_error();
mysql_close($conn);
echo "更新成功<br>";
?>
<input type="button" value="返回" onClick="javascript:location.href='back-farmer.php'">
</body>