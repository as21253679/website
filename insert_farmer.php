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
     $content = $_POST['content'];
     $image = $_FILES['upfile']['name'];
     $error = $_FILES["upfile"]["error"];
	 $datetime = date ("Y-m-d");
	 
$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);

if ( $_FILES["upfile"]["error"] <= 0 ) 
{
	move_uploaded_file($_FILES['upfile']['tmp_name'],"images/".iconv('utf-8','big5', $image));   // 搬移上傳檔案 可中文
}  

//新增資料
 $sql="INSERT INTO farmer ( 
    title, content,date,enable,image)
   VALUES 
   ('$title','$content','$datetime','停用中','$image');";

$result=mysql_query($sql);

     echo mysql_error();
mysql_close($conn);
echo "新增成功<br>";
?>
<input type="button" value="返回" onClick="javascript:location.href='back-farmer.php'">
</body>