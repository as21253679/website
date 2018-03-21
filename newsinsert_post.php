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

$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);

$datetime = date ("Y-m-d");      //取得日期
//新增資料
 $sql="INSERT INTO news ( 
    title,class, content,date,enable)
   VALUES 
   ('$title','$class','$content','$datetime','停用中');";

$result=mysql_query($sql);

     //echo mysql_error();
mysql_close($conn);
echo "新增成功<br>";
?>
<input type="button" value="返回" onclick="javascript:location.href='back.php'">
</body>