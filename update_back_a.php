<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">   
</head>

<body>

<?php
     $dbhost = 'localhost';
     $dbuser = 'admin';
     $dbpass = 'admin';
     $dbname = 'test';

     $title = $_POST['title'];
     $class = $_POST['class'];
     $content = $_POST['content'];
	 $id=$_GET["id"];

$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);

$datetime = date ("Y-m-d");      //取得日期
//新增資料
 $sql="UPDATE news SET title = '$title', class='$class', content='$content',date='$datetime'
   WHERE postID=$id;
";

$result=mysql_query($sql);

     //echo mysql_error();
mysql_close($conn);
echo "更新成功<br>";
?>
<input type="button" value="返回" onClick="javascript:location.href='back.php'">
</body>